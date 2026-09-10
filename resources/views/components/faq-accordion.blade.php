@props(['items' => []])

@if (count($items))
  <div {{ $attributes->class(['space-y-3']) }}>
    @foreach ($items as $i => $item)
      <details class="group rounded-2xl border border-ywc-border bg-white px-5 py-1 [&_summary::-webkit-details-marker]:hidden" @if($i === 0) open @endif>
        <summary class="flex cursor-pointer items-center justify-between gap-4 py-4 font-display text-[16.5px] font-bold tracking-[-0.01em] text-ywc-ink">
          {{ $item['q'] }}
          <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-ywc-bg-soft text-ywc-blue transition group-open:rotate-45">+</span>
        </summary>
        <p class="m-0 pb-5 pr-10 text-[15px] leading-[1.65] text-ywc-text-soft">{{ $item['a'] }}</p>
      </details>
    @endforeach
  </div>
@endif
