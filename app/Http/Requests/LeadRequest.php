<?php

namespace App\Http\Requests;

use App\Models\Lead;
use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Source unique de validation pour le formulaire rapide (#contact) ET
     * les formulaires détaillés (/contact, /devis).
     */
    public function rules(): array
    {
        $isQuote = $this->input('type') === Lead::TYPE_QUOTE;

        return [
            'type' => ['nullable', 'in:contact,quote'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:120'],
            'subject' => ['nullable', 'string', 'max:160'],
            // "service" : champ unique du formulaire rapide.
            'service' => ['nullable', 'string', 'max:120'],
            // "services[]" : cases à cocher du formulaire détaillé.
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:60'],
            'budget' => ['nullable', 'string', 'max:60'],
            'appointment_at' => [$isQuote ? 'required' : 'nullable', 'date'],
            'message' => ['required', 'string', 'max:5000'],
            'consent' => ['accepted'],
            // Honeypot : champ caché qui doit rester vide (anti-bot).
            'website' => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => __('validation.accepted', ['attribute' => 'consentement']),
            'website.max' => 'Spam détecté.',
        ];
    }
}
