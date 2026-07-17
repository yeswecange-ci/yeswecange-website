@php
    $isQuote = ($type ?? 'contact') === 'quote';
    $en = app()->getLocale() === 'en';
    $services = $en
        ? ['Strategy', 'Social Media', 'Data Mining', 'Chatbots & WhatsApp', 'SEO / SEA', 'Branding', 'Training']
        : ['Stratégie', 'Social Media', 'Data Mining', 'Chatbots & WhatsApp', 'SEO / SEA', 'Branding', 'Formation'];

    $officeMessages = [
        'paris' => $en ? "How can YesWeCange's Paris office help you?" : "Comment l'agence YesWeCange de Paris peut-elle vous aider ?",
        'abidjan' => $en ? "How can YesWeCange's Abidjan office help you?" : "Comment l'agence YesWeCange d'Abidjan peut-elle vous aider ?",
    ];
    $messageValue = old('message', $officeMessages[request('office')] ?? '');
@endphp

@if (session('lead_success'))
  <div class="mb-6 flex items-start gap-3 rounded-2xl border border-ywc-green/30 bg-ywc-green/10 px-5 py-4" role="status">
    <span class="mt-0.5 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-ywc-green text-xs font-bold text-white">✓</span>
    <p class="m-0 text-[14.5px] font-semibold text-ywc-ink">{{ __('site.contact.success') }}</p>
  </div>
@endif

@if ($errors->any())
  <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4" role="alert">
    <p class="m-0 text-[14px] font-semibold text-red-700">{{ __('site.contact.error') }}</p>
    <ul class="mt-1.5 list-disc pl-5 text-[13px] text-red-600">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('contact.store') }}" method="POST" class="grid gap-4">
  @csrf
  <input type="hidden" name="type" value="{{ $isQuote ? 'quote' : 'contact' }}">

  {{-- Honeypot anti-spam (caché aux humains) --}}
  <div class="absolute left-[-9999px]" aria-hidden="true">
    <label>Ne pas remplir <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
  </div>

  <div class="grid gap-4 sm:grid-cols-2">
    <div>
      <label for="lf-name" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_name') }} *</label>
      <input id="lf-name" name="name" type="text" required value="{{ old('name') }}" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
    </div>
    <div>
      <label for="lf-email" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_email') }} *</label>
      <input id="lf-email" name="email" type="email" required value="{{ old('email') }}" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
    </div>
    <div>
      <label for="lf-phone" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_phone') }}</label>
      <input id="lf-phone" name="phone" type="tel" value="{{ old('phone') }}" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
    </div>
    <div>
      <label for="lf-company" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_company') }}</label>
      <input id="lf-company" name="company" type="text" value="{{ old('company') }}" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
    </div>
  </div>

  @if ($isQuote)
    <div>
      <label class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_services') }}</label>
      <div class="flex flex-wrap gap-2">
        @foreach ($services as $service)
          <label class="cursor-pointer">
            <input type="checkbox" name="services[]" value="{{ $service }}" class="peer sr-only" @checked(in_array($service, old('services', [])))>
            <span class="inline-block rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft transition peer-checked:border-transparent peer-checked:bg-ywc-blue peer-checked:text-white">{{ $service }}</span>
          </label>
        @endforeach
      </div>
    </div>
    <div>
      <label for="lf-budget" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_budget') }}</label>
      <select id="lf-budget" name="budget" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
        <option value="">{{ __('site.contact.choose') }}</option>
        <option @selected(old('budget') === '< 5 000 €')>&lt; 5 000 €</option>
        <option @selected(old('budget') === '5 000 – 15 000 €')>5 000 – 15 000 €</option>
        <option @selected(old('budget') === '15 000 – 50 000 €')>15 000 – 50 000 €</option>
        <option @selected(old('budget') === '> 50 000 €')>&gt; 50 000 €</option>
      </select>
    </div>

    <div data-appointment-picker data-slots-url="{{ route('quote.slots') }}" class="grid gap-4 sm:grid-cols-2">
      <input type="hidden" name="appointment_at" data-appointment-input value="{{ old('appointment_at') }}">
      <div>
        <label for="lf-appointment-date" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_appointment_date') }} *</label>
        <input id="lf-appointment-date" type="date" data-appointment-date min="{{ now()->addDay()->toDateString() }}" value="{{ old('appointment_at') ? \Illuminate\Support\Carbon::parse(old('appointment_at'))->toDateString() : '' }}" required class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
      </div>
      <div>
        <label class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_appointment_time') }} *</label>
        <div
          data-appointment-slots
          data-msg-choose="{{ __('site.contact.form_appointment_choose_date') }}"
          data-msg-loading="{{ __('site.contact.form_appointment_loading') }}"
          data-msg-none="{{ __('site.contact.form_appointment_none') }}"
          class="flex flex-wrap gap-2 pt-1 text-[13.5px] text-ywc-text-muted"
        >{{ __('site.contact.form_appointment_choose_date') }}</div>
      </div>
    </div>
  @else
    <div>
      <label for="lf-subject" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_subject') }}</label>
      <input id="lf-subject" name="subject" type="text" value="{{ old('subject') }}" class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">
    </div>
  @endif

  <div>
    <label for="lf-message" class="mb-1.5 block text-[13px] font-bold text-ywc-ink">{{ __('site.contact.form_message') }} *</label>
    <textarea id="lf-message" name="message" rows="5" required class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[15px] text-ywc-ink outline-none transition focus:border-ywc-blue focus:ring-2 focus:ring-ywc-blue/20">{{ $messageValue }}</textarea>
  </div>

  <label class="flex items-start gap-2.5 text-[13px] leading-[1.5] text-ywc-text-soft">
    <input type="checkbox" name="consent" value="1" required class="mt-0.5 h-4 w-4 flex-none rounded border-ywc-border text-ywc-blue focus:ring-ywc-blue/30" @checked(old('consent'))>
    <span>{{ __('site.contact.form_consent') }}</span>
  </label>

  <div>
    <button type="submit" class="rounded-xl bg-ywc-blue px-7 py-[15px] text-base font-bold text-white shadow-[0_14px_34px_-10px_rgba(43,77,255,0.6)] transition hover:bg-ywc-blue-mid">
      {{ $isQuote ? __('site.contact.submit_quote') : __('site.contact.submit') }}
    </button>
  </div>
</form>
