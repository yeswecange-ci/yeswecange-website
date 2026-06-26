<div id="ywc-cookie" class="fixed inset-x-3 bottom-3 z-[60] hidden sm:inset-x-auto sm:right-5 sm:bottom-5 sm:max-w-[420px]">
  <div class="rounded-2xl border border-ywc-border bg-white p-5 shadow-[0_30px_70px_-24px_rgba(10,10,15,0.4)]">
    <p class="m-0 text-[13.5px] leading-[1.55] text-ywc-text-soft">{{ __('site.cookies.message') }}</p>
    <div class="mt-4 flex flex-wrap items-center gap-2.5">
      <button type="button" data-cookie-accept class="rounded-full bg-ywc-blue px-4 py-2 text-[13.5px] font-bold text-white transition hover:bg-ywc-blue-mid">{{ __('site.cookies.accept') }}</button>
      <button type="button" data-cookie-reject class="rounded-full border border-ywc-border-soft bg-ywc-bg-soft px-4 py-2 text-[13.5px] font-semibold text-ywc-text-soft transition hover:text-ywc-ink">{{ __('site.cookies.reject') }}</button>
      <a href="{{ route('legal.cookies') }}" class="ml-auto text-[13px] font-semibold text-ywc-blue no-underline hover:underline">{{ __('site.cookies.learn_more') }}</a>
    </div>
  </div>
</div>

<script>
(function () {
  var KEY = 'ywc_cookie_consent';
  var banner = document.getElementById('ywc-cookie');
  if (!banner) return;
  try {
    if (!localStorage.getItem(KEY)) {
      banner.classList.remove('hidden');
    }
  } catch (e) { banner.classList.remove('hidden'); }

  function decide(value) {
    try { localStorage.setItem(KEY, value); } catch (e) {}
    banner.classList.add('hidden');
  }
  banner.querySelector('[data-cookie-accept]').addEventListener('click', function () { decide('accepted'); });
  banner.querySelector('[data-cookie-reject]').addEventListener('click', function () { decide('rejected'); });
})();
</script>
