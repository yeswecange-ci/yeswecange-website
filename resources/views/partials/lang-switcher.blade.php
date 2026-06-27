@php $current = app()->getLocale(); @endphp
<div class="inline-flex items-center gap-0.5 rounded-full border border-ywc-border-soft bg-ywc-bg-soft p-[3px]" role="group" aria-label="{{ __('site.lang.switch') }}">
  <svg class="ml-1.5 mr-0.5 h-3.5 w-3.5 flex-none text-ywc-text-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
    <circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.5 2.5 15 0 18M12 3c-2.5 2.5-2.5 15 0 18"/>
  </svg>
  @foreach (['fr', 'en'] as $loc)
    <a href="{{ route('locale.switch', $loc) }}"
       @if($current === $loc) aria-current="true" @endif
       class="rounded-full px-2.5 py-[5px] text-[12px] font-bold uppercase leading-none tracking-wide no-underline transition {{ $current === $loc ? 'bg-ywc-blue text-white shadow-[0_2px_6px_-1px_rgba(43,77,255,0.5)]' : 'text-ywc-text-muted hover:text-ywc-ink' }}">{{ $loc }}</a>
  @endforeach
</div>
