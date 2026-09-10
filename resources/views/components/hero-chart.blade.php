{{-- Illustration décorative affichée à côté du titre de certaines pages d'expertise (pas de données réelles). --}}
@props(['kind' => 'growth'])

@php
  $badgeIcon = match ($kind) {
      'automation' => 'bolt',
      'chat' => 'message',
      'ads' => 'target',
      'tracking' => 'pulse',
      'seo' => 'search',
      default => 'trending-up',
  };
@endphp

<div {{ $attributes->class(['relative h-[220px] w-full max-w-[300px] overflow-hidden rounded-[24px] border border-ywc-border-soft bg-gradient-to-b from-ywc-bg-soft to-white p-6 shadow-[0_24px_50px_-28px_rgba(10,10,15,0.18)]']) }} aria-hidden="true">
  <div class="absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full bg-ywc-blue text-white shadow-[0_10px_20px_-8px_rgba(43,77,255,0.55)]">
    <x-icon :name="$badgeIcon" class="h-4.5 w-4.5" />
  </div>

  @switch($kind)
    @case('automation')
      {{-- IA Marketing & Automatisation : pipeline déclencheur → IA → action --}}
      <div class="relative flex h-full w-full items-center justify-center">
        <div class="flex w-full items-center">
          <div class="relative flex h-11 w-11 flex-none items-center justify-center rounded-full bg-white ring-2 ring-ywc-blue text-ywc-blue shadow-sm">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/30"></span>
            <x-icon name="signal" class="relative h-5 w-5" />
          </div>
          <div class="h-[3px] flex-1 rounded-full bg-[repeating-linear-gradient(90deg,#2b4dff_0_6px,transparent_6px_14px)] bg-[length:20px_3px] animate-ywcb-dash"></div>
          <div class="relative flex h-11 w-11 flex-none items-center justify-center rounded-full bg-white ring-2 ring-ywc-blue text-ywc-blue shadow-sm">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/30" style="animation-delay:0.6s"></span>
            <x-icon name="bolt" class="relative h-5 w-5" />
          </div>
          <div class="h-[3px] flex-1 rounded-full bg-[repeating-linear-gradient(90deg,#2b4dff_0_6px,transparent_6px_14px)] bg-[length:20px_3px] animate-ywcb-dash"></div>
          <div class="relative flex h-11 w-11 flex-none items-center justify-center rounded-full bg-ywc-blue text-white shadow-[0_10px_20px_-8px_rgba(43,77,255,0.55)]">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/30" style="animation-delay:1.2s"></span>
            <x-icon name="check" class="relative h-5 w-5" />
          </div>
        </div>
      </div>
      @break

    @case('chat')
      {{-- WhatsApp Business API : conversation qui s'anime --}}
      <div class="relative flex h-full w-full flex-col justify-center gap-2.5">
        <div class="ywc-bubble-pop max-w-[78%] rounded-2xl rounded-bl-sm bg-ywc-bg-soft px-3.5 py-2 text-[12px] font-semibold text-ywc-text" style="animation-delay:0s">Bonjour 👋</div>
        <div class="ywc-bubble-pop ml-auto max-w-[78%] rounded-2xl rounded-br-sm bg-ywc-blue px-3.5 py-2 text-[12px] font-semibold text-white" style="animation-delay:0.9s">J'ai une question…</div>
        <div class="ywc-bubble-pop flex max-w-[56%] items-center gap-1 rounded-2xl rounded-bl-sm bg-ywc-bg-soft px-3.5 py-2.5" style="animation-delay:1.8s">
          <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-ywc-text-muted"></span>
          <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-ywc-text-muted" style="animation-delay:0.15s"></span>
          <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-ywc-text-muted" style="animation-delay:0.3s"></span>
        </div>
      </div>
      @break

    @case('ads')
      {{-- Google Ads & Meta Ads : deux formats publicitaires --}}
      <div class="relative flex h-full w-full flex-col justify-center gap-3">
        <div class="relative rounded-xl border border-ywc-border-soft bg-white p-3">
          <div class="mb-2 flex items-center gap-1.5">
            <span class="rounded bg-ywc-green/15 px-1.5 py-0.5 text-[9px] font-bold uppercase tracking-wide text-ywc-green">Ad</span>
            <span class="h-2 w-20 rounded-full bg-ywc-bg-soft"></span>
          </div>
          <span class="block h-2 w-full rounded-full bg-ywc-bg-soft"></span>
          <span class="mt-1.5 block h-2 w-3/4 rounded-full bg-ywc-bg-soft"></span>
          <span class="absolute -right-2 -top-2 flex h-6 w-6 items-center justify-center">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/40"></span>
            <span class="relative h-2.5 w-2.5 rounded-full bg-ywc-blue"></span>
          </span>
        </div>
        <div class="flex items-center gap-2.5 rounded-xl border border-ywc-border-soft bg-white p-3">
          <span class="h-8 w-8 flex-none rounded-lg bg-gradient-to-br from-ywc-blue-pale to-ywc-blue"></span>
          <div class="flex-1">
            <span class="block h-2 w-full rounded-full bg-ywc-bg-soft"></span>
            <span class="mt-1.5 block h-2 w-2/3 rounded-full bg-ywc-bg-soft"></span>
          </div>
        </div>
      </div>
      @break

    @case('tracking')
      {{-- Tracking & Data : signal qui se dessine + événements --}}
      <div class="relative flex h-full w-full flex-col items-center justify-center gap-6">
        <svg class="h-[70px] w-full" viewBox="0 0 220 70" fill="none" preserveAspectRatio="none">
          <path class="ywc-grow-line" d="M2 40 L40 40 L52 14 L64 58 L76 26 L88 40 L140 40 L152 10 L164 56 L176 40 L218 40" stroke="#2b4dff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <div class="flex w-full items-center justify-between gap-2">
          <div class="h-2 flex-1 rounded-full bg-ywc-bg-soft"></div>
          <span class="relative flex h-2.5 w-2.5 flex-none">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/50"></span>
            <span class="relative h-2.5 w-2.5 rounded-full bg-ywc-blue"></span>
          </span>
          <div class="h-2 flex-1 rounded-full bg-ywc-bg-soft"></div>
          <span class="relative flex h-2.5 w-2.5 flex-none">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-ywc-blue/50" style="animation-delay:0.5s"></span>
            <span class="relative h-2.5 w-2.5 rounded-full bg-ywc-blue"></span>
          </span>
          <div class="h-2 flex-1 rounded-full bg-ywc-bg-soft"></div>
        </div>
      </div>
      @break

    @case('seo')
      {{-- SEO, GEO & AEO : résultat qui grimpe en position 1 --}}
      <div class="relative flex h-full w-full flex-col justify-center gap-2.5">
        <div class="flex items-center gap-2.5 rounded-xl border-[1.5px] border-ywc-blue bg-white px-3 py-2.5 shadow-[0_10px_20px_-10px_rgba(43,77,255,0.35)]">
          <span class="flex h-5 w-5 flex-none animate-pulse items-center justify-center rounded-full bg-ywc-blue text-[10px] font-bold text-white">1</span>
          <div class="flex-1">
            <span class="block h-2 w-3/4 rounded-full bg-ywc-blue-pale/60"></span>
            <span class="mt-1.5 block h-1.5 w-1/2 rounded-full bg-ywc-bg-soft"></span>
          </div>
          <span class="flex h-6 w-6 flex-none animate-bounce items-center justify-center rounded-full bg-ywc-green/15 text-ywc-green">
            <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
          </span>
        </div>
        <div class="flex items-center gap-2.5 rounded-xl border border-ywc-border-soft bg-white px-3 py-2.5 opacity-70">
          <span class="flex h-5 w-5 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-[10px] font-bold text-ywc-text-muted">2</span>
          <span class="block h-2 w-2/3 flex-1 rounded-full bg-ywc-bg-soft"></span>
        </div>
        <div class="flex items-center gap-2.5 rounded-xl border border-ywc-border-soft bg-white px-3 py-2.5 opacity-50">
          <span class="flex h-5 w-5 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-[10px] font-bold text-ywc-text-muted">3</span>
          <span class="block h-2 w-1/2 flex-1 rounded-full bg-ywc-bg-soft"></span>
        </div>
      </div>
      @break

    @default
      {{-- Growth & Performance Marketing : courbe + barres en croissance --}}
      <div class="relative flex h-full w-full items-end">
        <svg class="pointer-events-none absolute inset-x-0 top-4 h-[110px] w-full" viewBox="0 0 220 90" fill="none" preserveAspectRatio="none">
          <path class="ywc-grow-line" d="M2 78 C 40 70, 55 40, 90 46 C 120 51, 130 16, 165 12 C 185 10, 200 6, 218 4" stroke="#2b4dff" stroke-width="2.5" stroke-linecap="round" />
        </svg>
        <div class="relative flex h-full w-full items-end justify-between gap-2.5">
          <div class="ywc-grow-bar w-full rounded-t-lg bg-gradient-to-t from-ywc-blue-faint to-ywc-blue-pale" style="height:32%; animation-delay:0s"></div>
          <div class="ywc-grow-bar w-full rounded-t-lg bg-gradient-to-t from-ywc-blue-pale to-ywc-blue-soft" style="height:48%; animation-delay:0.15s"></div>
          <div class="ywc-grow-bar w-full rounded-t-lg bg-gradient-to-t from-ywc-blue-soft to-ywc-blue-mid" style="height:40%; animation-delay:0.3s"></div>
          <div class="ywc-grow-bar w-full rounded-t-lg bg-gradient-to-t from-ywc-blue-mid to-ywc-blue" style="height:70%; animation-delay:0.45s"></div>
          <div class="ywc-grow-bar w-full rounded-t-lg bg-gradient-to-t from-ywc-blue to-[#1b33d6]" style="height:95%; animation-delay:0.6s"></div>
        </div>
      </div>
  @endswitch
</div>
