  <!-- PAGE HEADER -->
  <section class="relative overflow-hidden bg-ywc-bg">
    <div class="absolute -top-24 -right-24 h-[420px] w-[420px] rounded-full bg-[radial-gradient(circle,rgba(43,77,255,0.12),transparent_65%)]"></div>
    <div class="relative mx-auto max-w-7xl px-5 py-20 sm:px-[30px] sm:py-[96px]">
      <div data-bhero class="mb-[18px] inline-flex items-center gap-[9px] whitespace-nowrap rounded-full border border-ywc-border-blue bg-[#eef2ff]/86 px-[15px] py-[7px] text-[13px] font-semibold text-ywc-blue backdrop-blur-sm">
        <span class="h-[7px] w-[7px] rounded-full bg-ywc-blue"></span>{{ $eyebrow }}
      </div>
      <h1 data-bhero class="m-0 mb-[18px] max-w-[760px] font-display text-[clamp(34px,4.6vw,60px)] font-bold leading-[1.02] tracking-[-0.03em] text-ywc-ink">{!! $title !!}</h1>
      <p data-bhero class="m-0 max-w-[560px] text-[clamp(16px,1.2vw,18px)] leading-[1.55] text-ywc-text">{{ $lead }}</p>

      @isset($stats)
        <div data-bhero class="mt-9 flex max-w-[640px] flex-wrap gap-8 border-t border-ywc-border-soft pt-7">
          @foreach ($stats as $stat)
            <div>
              <div class="font-display text-xl font-bold tracking-[-0.02em] text-ywc-blue">{{ $stat['value'] }}</div>
              <div class="mt-0.5 text-[13px] text-ywc-text-muted">{{ $stat['label'] }}</div>
            </div>
          @endforeach
        </div>
      @endisset
    </div>
  </section>
