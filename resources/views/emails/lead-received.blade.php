@component('mail::message')
# {{ $lead->type === 'quote' ? 'Nouvelle demande de devis' : 'Nouveau message de contact' }}

**Nom :** {{ $lead->name }}
**E-mail :** {{ $lead->email }}
@if($lead->phone)
**Téléphone :** {{ $lead->phone }}
@endif
@if($lead->company)
**Entreprise :** {{ $lead->company }}
@endif
@if($lead->subject)
**Sujet :** {{ $lead->subject }}
@endif
@if($lead->budget)
**Budget :** {{ $lead->budget }}
@endif
@if($lead->services)
**Services :** {{ implode(', ', $lead->services) }}
@endif

---

{{ $lead->message }}

---

@component('mail::button', ['url' => config('app.url')])
Ouvrir l'administration
@endcomponent

_Reçu le {{ $lead->created_at->format('d/m/Y à H:i') }} · langue : {{ strtoupper($lead->locale) }} · IP : {{ $lead->ip_address }}_

@endcomponent
