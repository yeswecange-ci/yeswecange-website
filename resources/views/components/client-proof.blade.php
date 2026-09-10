@props(['text' => null, 'caseStudyHref' => null])

@php
  $isPending = $text && (str_starts_with($text, 'À documenter') || str_starts_with($text, 'À construire'));
  $isCentered = str_contains((string) $attributes->get('class'), 'text-center');
@endphp

@if ($text)
  <div {{ $attributes->class(['relative overflow-hidden rounded-2xl border-l-[3px] bg-ywc-bg-soft p-6 sm:p-7', $isPending ? 'border-ywc-text-pale' : 'border-ywc-blue']) }}>
    <div class="mb-2 text-[12px] font-bold uppercase tracking-[0.08em] {{ $isPending ? 'text-ywc-text-muted' : 'text-ywc-blue' }}">
      {{ $isPending ? 'Références en cours de constitution' : 'Preuve client' }}
    </div>
    <p class="m-0 max-w-[640px] text-[15px] leading-[1.6] {{ $isPending ? 'text-ywc-text-muted' : 'text-ywc-ink' }}">{{ $text }}</p>
    <div class="mt-4 flex flex-wrap items-center gap-2.5 {{ $isCentered ? 'justify-center' : '' }}">
      @if ($caseStudyHref)
        <a href="{{ $caseStudyHref }}" class="inline-flex items-center gap-1.5 text-[14px] font-bold text-ywc-blue no-underline hover:text-ywc-blue-mid">
          Voir l'étude de cas complète →
        </a>
      @endif
      <a href="{{ route('realisations') }}" class="inline-flex items-center gap-2 rounded-full border border-ywc-blue bg-white px-4 py-2 text-[13.5px] font-bold text-ywc-blue no-underline transition hover:bg-ywc-blue hover:text-white">
        Voir toutes nos réalisations →
      </a>
    </div>
  </div>
@endif
