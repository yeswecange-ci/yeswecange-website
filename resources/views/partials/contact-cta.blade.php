  <!-- CONTACT -->
  <section id="contact" class="mx-auto max-w-7xl px-[30px] py-24">
    <div data-breveal class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-ywc-blue to-[#1b33d6] p-9 sm:p-[56px]">
      <div class="absolute -top-20 -right-[60px] h-[340px] w-[340px] rounded-full bg-[radial-gradient(circle,rgba(255,255,255,0.18),transparent_64%)]"></div>
      <div class="relative grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">

        <div class="text-white">
          <h2 class="m-0 font-display text-[clamp(28px,3.4vw,44px)] font-bold leading-[1.06] tracking-[-0.03em] text-white">Discutons de votre projet.</h2>
          <p class="mt-3.5 mb-9 max-w-[420px] text-[16px] leading-[1.55] text-[#d4dbff]">Contactez-nous dès maintenant pour un devis gratuit. On vous répond sous 24h.</p>

          <div class="grid gap-5">
            @foreach (\App\Models\OfficeLocation::orderBy('order_column')->get() as $office)
              <div>
                <div class="mb-[7px] text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue-faint">{{ $office->localized('title') }}</div>
                <div class="text-[14.5px] leading-[1.5] text-[#edf1ff]">{{ str_replace("\n", ', ', $office->address) }} · {{ $office->phone }}</div>
              </div>
              <div class="h-px bg-white/20"></div>
            @endforeach
            <div>
              <div class="mb-[7px] text-[11.5px] font-bold uppercase tracking-[0.05em] text-ywc-blue-faint">Horaires</div>
              <div class="text-[14.5px] leading-[1.5] text-[#edf1ff]">Lundi – Samedi · 09h – 18h</div>
            </div>
          </div>
        </div>

        <div class="rounded-[22px] bg-white p-6 shadow-[0_30px_60px_-20px_rgba(10,10,15,0.35)] sm:p-8">
          @if (session('contact_success'))
            <div class="mb-5 rounded-xl border border-[#bfe9d3] bg-[#eafcf3] px-4 py-3 text-[13.5px] font-semibold text-[#1f8a57]">
              Merci, votre demande a bien été envoyée ! On vous répond sous 24h.
            </div>
          @endif

          <form method="POST" action="{{ route('contact.store') }}" class="grid gap-4">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label for="contact-name" class="mb-1.5 block text-[12.5px] font-semibold text-ywc-text">Nom complet</label>
                <input type="text" id="contact-name" name="name" value="{{ old('name') }}" required
                  class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[14.5px] text-ywc-ink placeholder:text-ywc-text-faint focus:border-ywc-blue focus:outline-none focus:ring-2 focus:ring-ywc-blue/20">
                @error('name')<div class="mt-1 text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror
              </div>
              <div>
                <label for="contact-email" class="mb-1.5 block text-[12.5px] font-semibold text-ywc-text">Email</label>
                <input type="email" id="contact-email" name="email" value="{{ old('email') }}" required
                  class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[14.5px] text-ywc-ink placeholder:text-ywc-text-faint focus:border-ywc-blue focus:outline-none focus:ring-2 focus:ring-ywc-blue/20">
                @error('email')<div class="mt-1 text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror
              </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label for="contact-phone" class="mb-1.5 block text-[12.5px] font-semibold text-ywc-text">Téléphone <span class="text-ywc-text-faint">(optionnel)</span></label>
                <input type="tel" id="contact-phone" name="phone" value="{{ old('phone') }}"
                  class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[14.5px] text-ywc-ink placeholder:text-ywc-text-faint focus:border-ywc-blue focus:outline-none focus:ring-2 focus:ring-ywc-blue/20">
                @error('phone')<div class="mt-1 text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror
              </div>
              <div>
                <label for="contact-service" class="mb-1.5 block text-[12.5px] font-semibold text-ywc-text">Service souhaité</label>
                <select id="contact-service" name="service" required
                  class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[14.5px] text-ywc-ink focus:border-ywc-blue focus:outline-none focus:ring-2 focus:ring-ywc-blue/20">
                  <option value="" disabled @selected(old('service') === null)>Choisir…</option>
                  @foreach (['Stratégie digitale', 'Social Media & Communication', 'Chatbots & WhatsApp', 'Référencement SEO', 'Branding', 'Formation', 'Autre'] as $option)
                    <option value="{{ $option }}" @selected(old('service') === $option)>{{ $option }}</option>
                  @endforeach
                </select>
                @error('service')<div class="mt-1 text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror
              </div>
            </div>

            <div>
              <label for="contact-message" class="mb-1.5 block text-[12.5px] font-semibold text-ywc-text">Votre projet</label>
              <textarea id="contact-message" name="message" rows="4" required
                class="w-full rounded-xl border border-ywc-border bg-white px-4 py-3 text-[14.5px] text-ywc-ink placeholder:text-ywc-text-faint focus:border-ywc-blue focus:outline-none focus:ring-2 focus:ring-ywc-blue/20">{{ old('message') }}</textarea>
              @error('message')<div class="mt-1 text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror
            </div>

            {{-- Honeypot anti-spam --}}
            <div class="absolute left-[-9999px]" aria-hidden="true">
              <label>Ne pas remplir <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </div>

            <label class="flex items-start gap-2.5 text-[12.5px] leading-[1.5] text-ywc-text-soft">
              <input type="checkbox" name="consent" value="1" required @checked(old('consent'))
                class="mt-0.5 h-4 w-4 flex-none rounded border-ywc-border text-ywc-blue focus:ring-ywc-blue/30">
              <span>{{ __('site.contact.form_consent') }}</span>
            </label>
            @error('consent')<div class="text-[12px] font-medium text-red-600">{{ $message }}</div>@enderror

            <button type="submit" class="mt-1 inline-flex items-center justify-center gap-2 rounded-xl bg-ywc-blue px-7 py-3.5 text-base font-bold text-white transition hover:bg-ywc-blue-mid">{{ __('site.contact.submit') }}</button>
          </form>
        </div>

      </div>
    </div>
  </section>
