<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'service' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Mail::raw(
            "Nom : {$validated['name']}\n"
                ."Email : {$validated['email']}\n"
                .'Téléphone : '.($validated['phone'] ?: '—')."\n"
                ."Service : {$validated['service']}\n\n"
                ."Message :\n{$validated['message']}",
            function ($mail) use ($validated) {
                $mail->to(config('mail.from.address'))
                    ->subject('Nouvelle demande de devis — '.$validated['name'])
                    ->replyTo($validated['email'], $validated['name']);
            }
        );

        return back()->with('contact_success', true);
    }
}
