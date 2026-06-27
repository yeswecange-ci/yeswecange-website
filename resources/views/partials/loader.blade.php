<div id="ywc-loader" class="ywc-loader" role="status" aria-label="Chargement">
  <div class="ywc-loader__scene">
    <div class="ywc-coin">
      <span class="ywc-coin__face ywc-coin__face--front"><img src="{{ asset('images/logo_mark.png') }}" alt="YesWeCange"></span>
      <span class="ywc-coin__face ywc-coin__face--back"><img src="{{ asset('images/logo_mark.png') }}" alt=""></span>
    </div>
  </div>
  <div class="ywc-loader__brand">yeswecange</div>
</div>

<script>
(function () {
  var l = document.getElementById('ywc-loader');
  if (!l) return;
  var html = document.documentElement;
  html.style.overflow = 'hidden';
  var hidden = false;
  function done() {
    if (hidden) return;
    hidden = true;
    l.classList.add('is-done');
    html.style.overflow = '';
    setTimeout(function () { if (l && l.parentNode) l.parentNode.removeChild(l); }, 700);
  }
  // Laisse le cube tourner un court instant après le chargement complet
  window.addEventListener('load', function () { setTimeout(done, 600); });
  // Sécurité : ne jamais bloquer la page
  setTimeout(done, 4500);
})();
</script>
