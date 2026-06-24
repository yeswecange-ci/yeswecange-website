@php $current = app()->getLocale(); @endphp
<div class="flex items-center gap-1 rounded-full border border-ywc-border-soft bg-ywc-bg-soft p-0.5" role="group" aria-label="{{ __('site.lang.switch') }}">
  @foreach (['fr', 'en'] as $loc)
    <a href="{{ route('locale.switch', $loc) }}"
       class="rounded-full px-2.5 py-1 text-[12.5px] font-bold uppercase no-underline transition {{ $current === $loc ? 'bg-white text-ywc-blue shadow-sm' : 'text-ywc-text-muted hover:text-ywc-ink' }}"
       @if($current === $loc) aria-current="true" @endif>{{ $loc }}</a>
  @endforeach
</div>
