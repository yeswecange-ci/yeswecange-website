<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use App\Support\AppointmentSlots;
use Carbon\CarbonImmutable;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function showContact(): View
    {
        return view('pages.contact', ['type' => Lead::TYPE_CONTACT]);
    }

    public function showQuote(): View
    {
        return view('pages.quote', ['type' => Lead::TYPE_QUOTE]);
    }

    /**
     * Créneaux disponibles pour une date donnée (utilisé par le sélecteur du formulaire d'audit).
     */
    public function slots(Request $request): JsonResponse
    {
        $data = $request->validate([
            'date' => ['required', 'date_format:Y-m-d'],
        ]);

        $date = CarbonImmutable::createFromFormat('Y-m-d', $data['date'])->startOfDay();

        $slots = collect(AppointmentSlots::availableFor($date))
            ->map(fn (CarbonImmutable $slot) => [
                'value' => $slot->toIso8601String(),
                'label' => $slot->format('H:i'),
            ])
            ->all();

        return response()->json(['slots' => $slots]);
    }

    /**
     * Traite à la fois le formulaire rapide (section #contact) et le
     * formulaire détaillé des pages /contact et /devis.
     */
    public function store(LeadRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $isQuote = ($data['type'] ?? null) === Lead::TYPE_QUOTE;

        if ($isQuote) {
            $slot = CarbonImmutable::parse($data['appointment_at']);

            if (! AppointmentSlots::isAvailable($slot)) {
                return back()
                    ->withInput()
                    ->withErrors(['appointment_at' => __('site.contact.form_appointment_taken')]);
            }
        }

        // Fusionne le champ unique "service" (formulaire rapide) et le
        // tableau "services[]" (formulaire détaillé).
        $services = $data['services'] ?? [];
        if (! empty($data['service'])) {
            $services[] = $data['service'];
        }

        try {
            $lead = Lead::create([
                'type' => ($data['type'] ?? null) === Lead::TYPE_QUOTE ? Lead::TYPE_QUOTE : Lead::TYPE_CONTACT,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'company' => $data['company'] ?? null,
                'subject' => $data['subject'] ?? null,
                'message' => $data['message'],
                'budget' => $data['budget'] ?? null,
                'appointment_at' => $isQuote ? $data['appointment_at'] : null,
                'services' => $services ?: null,
                'locale' => app()->getLocale(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (QueryException $e) {
            // Deux visiteurs ont réservé le même créneau au même instant : le premier
            // gagne. SQLSTATE 23000 = violation de contrainte d'intégrité (index unique
            // sur appointment_at), plus robuste qu'une recherche dans le message SQL.
            if ($isQuote && $e->getCode() === '23000') {
                return back()
                    ->withInput()
                    ->withErrors(['appointment_at' => __('site.contact.form_appointment_taken')]);
            }

            throw $e;
        }

        // Notification interne (n'interrompt pas l'utilisateur si l'envoi échoue).
        try {
            Mail::to(config('mail.contact_to', config('mail.from.address')))
                ->send(new LeadReceived($lead));
        } catch (\Throwable $e) {
            report($e);
        }

        // Deux clés flash : le formulaire rapide attend "contact_success",
        // les pages détaillées attendent "lead_success".
        return back()
            ->with('contact_success', true)
            ->with('lead_success', true);
    }
}
