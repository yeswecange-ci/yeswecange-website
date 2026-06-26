<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:120'],
            'subject' => ['nullable', 'string', 'max:160'],
            'message' => ['required', 'string', 'max:5000'],
            'budget' => ['nullable', 'string', 'max:60'],
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:60'],
            'consent' => ['accepted'],
            // Honeypot : champ caché qui doit rester vide (anti-bot).
            'website' => ['nullable', 'size:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => __('validation.accepted', ['attribute' => 'consentement']),
            'website.size' => 'Spam détecté.',
        ];
    }
}
