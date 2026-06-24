<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
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

    public function store(LeadRequest $request): RedirectResponse
    {
        $type = $request->input('type') === Lead::TYPE_QUOTE
            ? Lead::TYPE_QUOTE
            : Lead::TYPE_CONTACT;

        $lead = Lead::create([
            'type' => $type,
            'name' => (string) $request->input('name'),
            'email' => (string) $request->input('email'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'subject' => $request->input('subject'),
            'message' => (string) $request->input('message'),
            'budget' => $request->input('budget'),
            'services' => $request->input('services'),
            'locale' => app()->getLocale(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Notification interne (n'interrompt pas l'utilisateur si l'envoi échoue).
        try {
            Mail::to(config('mail.contact_to', config('mail.from.address')))
                ->send(new LeadReceived($lead));
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with('lead_success', true);
    }
}
