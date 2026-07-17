<?php

namespace App\Http\Controllers;

use App\Mail\LeadReceived;
use App\Models\Lead;
use App\Support\AppointmentSlots;
use Carbon\CarbonImmutable;
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
    public function store(Request $request): RedirectResponse
    {
        // Anti-spam honeypot : un bot remplit ce champ caché.
        if ($request->filled('website')) {
            return back()->with('contact_success', true);
        }

        $isQuote = $request->input('type') === Lead::TYPE_QUOTE;

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:120'],
            'subject' => ['nullable', 'string', 'max:160'],
            'service' => ['nullable', 'string', 'max:120'],
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:60'],
            'budget' => ['nullable', 'string', 'max:60'],
            'appointment_at' => [$isQuote ? 'required' : 'nullable', 'date'],
            'message' => ['required', 'string', 'max:5000'],
            'type' => ['nullable', 'in:contact,quote'],
            'consent' => ['accepted'],
        ]);

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
        } catch (\Illuminate\Database\QueryException $e) {
            // Deux visiteurs ont réservé le même créneau au même instant : le premier gagne.
            if ($isQuote && str_contains($e->getMessage(), 'appointment_at')) {
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
