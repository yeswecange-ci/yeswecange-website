import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

(function () {
  const root = document.getElementById('ywc-b');
  if (!root) return;

  const EN = window.YWC_LOCALE === 'en';

  // footer year
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // ===== services bento =====
  const bento = root.querySelector('[data-bbento]');
  if (bento) {
    const items = EN ? [
      { t: 'Chatbots & WhatsApp', d: 'We automate the conversation 24/7 and continuously qualify your leads.', tag: 'Featured', icon: '💬', col: 'span 3', row: 'span 2', dark: true, href: '#chatbots', pills: ['WhatsApp', 'Web', 'Messenger', 'SMS'] },
      { t: 'Strategy & Design', d: 'Positioning, message, high-value action plan.', icon: '🎯', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Social Media & 360° Comm', d: 'Content that sparks reactions, across every channel.', icon: '📱', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Marketing Intelligence', d: 'Marketing 3.0 and social business, driven by data.', icon: '📊', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'Data Mining & Tech', d: 'Your data becomes audiences and leads.', icon: '🛰️', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'SEO', d: 'Found at the right time by the right people.', icon: '🔍', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'Branding & Lean Marketing', d: 'A brand that creates emotion and leaves a mark.', icon: '🎨', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Training', d: 'We hand you the keys to digital, in practice.', icon: '🎓', col: 'span 3', row: 'span 1', href: '/services' },
    ] : [
      { t: 'Chatbots & WhatsApp', d: 'On automatise la conversation 24/7 et on qualifie vos leads en continu.', tag: 'À la une', icon: '💬', col: 'span 3', row: 'span 2', dark: true, href: '#chatbots', pills: ['WhatsApp', 'Web', 'Messenger', 'SMS'] },
      { t: 'Stratégie & Conception', d: 'Positionnement, message, plan d’action à forte valeur ajoutée.', icon: '🎯', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Social Media & Comm 360°', d: 'Des contenus qui font réagir, sur tous les canaux.', icon: '📱', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Marketing Intelligence', d: 'Marketing 3.0 et social business, décidés par la data.', icon: '📊', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'Data Mining & Tech', d: 'Vos données deviennent audiences et leads.', icon: '🛰️', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'Référencement SEO', d: 'Trouvé au bon moment par les bonnes personnes.', icon: '🔍', col: 'span 2', row: 'span 1', href: '/services' },
      { t: 'Branding & Lean Marketing', d: 'Une marque qui crée l’émotion et marque les esprits.', icon: '🎨', col: 'span 3', row: 'span 1', href: '/services' },
      { t: 'Formation', d: 'On vous donne les clés du digital, en pratique.', icon: '🎓', col: 'span 3', row: 'span 1', href: '/services' },
    ];
    bento.innerHTML = items.map(s => {
      const dark = s.dark;
      const right = s.tag ? `<span class="b-bento__tag">${s.tag}</span>` : `<span class="b-bento__arrow">→</span>`;
      const pills = s.pills ? `<div class="b-bento__pills">${s.pills.map(p => `<span>${p}</span>`).join('')}</div>` : '';
      const watermark = dark ? `<img src="/images/logo_mark.png" alt="" class="b-bento__watermark">` : '';
      return `<a href="${s.href}" data-bcard class="b-bento__card ${dark ? 'b-bento__card--dark' : 'b-bento__card--light'}" style="grid-column:${s.col};grid-row:${s.row};">
        ${watermark}
        <div class="b-bento__top">${right}</div>
        <div class="b-bento__bottom ${dark ? 'b-bento__bottom--dark' : ''}">
          <h3 class="b-bento__title ${dark ? 'b-bento__title--large' : ''}">${s.t}</h3>
          <p class="b-bento__desc ${dark ? 'b-bento__desc--light' : ''}">${s.d}</p>
          ${pills}
        </div>
      </a>`;
    }).join('');
  }

  // ===== client logo wall =====
  const cgrid = root.querySelector('[data-bclient-grid]');
  if (cgrid) {
    const logos = [
      { n: 'Orange CI', file: 'orange-ci.png' },
      { n: 'Biofar', file: 'biofar.png' },
      { n: 'Bracongo', file: 'braconfologo.png' },
      { n: 'Mercedes', file: 'mercedes.png' },
      { n: 'Bridge Bank', file: 'bridge-bank.png' },
      { n: 'Suzuki', file: 'suzuki.png' },
      { n: 'NSIA', file: 'nsia.png' },
      { n: 'Total Énergie', file: 'total-energie.png' },
      { n: 'Yamaha', file: 'yamaha.png' },
      { n: 'Toyota CI', file: 'toyota.png' },
      { n: 'Mitsubishi', file: 'mitsubishi.png' },
      { n: 'Solibra', file: 'solibra.png' },
      { n: 'Lonaci', file: 'lonaci.png' },
      { n: 'Brakina', file: 'brakina.png' },
      { n: 'BAD', file: 'bad.png' },
      { n: 'Ecobank', file: 'ecobank.png' },
      { n: 'BNI', file: 'bni.png' },
      { n: 'nhood', file: 'nhood.png' },
    ];
    const cards = logos.map(l => {
      return `<div class="b-client">
        <img src="/images/clients/${l.file}" alt="${l.n}" class="b-client__logo" loading="lazy" onerror="this.style.display='none';this.nextElementSibling.style.display='inline'">
        <span class="b-client__name" style="display:none">${l.n}</span>
      </div>`;
    }).join('');
    cgrid.innerHTML = cards;
  }

  // ===== chat bubbles =====
  function bubblePlain(text, side) {
    const me = side === 'me';
    const el = document.createElement('div');
    el.style.cssText = `max-width:80%;align-self:${me ? 'flex-end' : 'flex-start'};background:${me ? '#2B4DFF' : '#fff'};color:${me ? '#fff' : '#0A0A0F'};border:${me ? 'none' : '1px solid #EEF0F5'};padding:9px 13px;border-radius:${me ? '14px 14px 4px 14px' : '14px 14px 14px 4px'};font-size:13px;line-height:1.4;box-shadow:0 2px 6px rgba(10,10,15,.05);opacity:0;transform:translateY(8px);transition:opacity .35s ease, transform .35s ease;`;
    el.textContent = text;
    requestAnimationFrame(() => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; });
    return el;
  }

  function bubbleWa(text, side) {
    const me = side === 'me';
    const el = document.createElement('div');
    el.style.cssText = `max-width:82%;align-self:${me ? 'flex-end' : 'flex-start'};background:${me ? '#DCF8C6' : '#fff'};color:#0A0A0F;padding:8px 12px;border-radius:10px;font-size:13px;line-height:1.4;box-shadow:0 1px 2px rgba(0,0,0,.12);opacity:0;transform:translateY(8px);transition:opacity .35s ease, transform .35s ease;`;
    el.textContent = text;
    requestAnimationFrame(() => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; });
    return el;
  }

  function startChat(container, script, mk) {
    if (!container) return;
    let i = 0;
    const step = () => {
      if (!document.body.contains(container)) return;
      if (i >= script.length) {
        setTimeout(() => { container.innerHTML = ''; i = 0; step(); }, 2600);
        return;
      }
      container.appendChild(mk(script[i][0], script[i][1]));
      container.scrollTop = container.scrollHeight;
      i++;
      setTimeout(step, 1300);
    };
    setTimeout(step, 500);
  }

  const c1 = root.querySelector('#ywc-chatb');
  const c2 = root.querySelector('#ywc-chatb2');
  const s1 = EN ? [
    ['Hi, I want more clients 🚀', 'them'],
    ['We’ve got you: strategy + chatbots.', 'me'],
    ['Where are you based?', 'them'],
    ['Paris & Abidjan 🌍', 'me'],
  ] : [
    ['Bonjour, je veux plus de clients 🚀', 'them'],
    ['On s’en occupe : stratégie + chatbots.', 'me'],
    ['Vous êtes où ?', 'them'],
    ['Paris & Abidjan 🌍', 'me'],
  ];
  const s2 = EN ? [
    ['Do you handle WhatsApp?', 'them'],
    ['Yes! Broadcast + automated 1:1 ✅', 'me'],
    ['And a quote?', 'them'],
    ['Free, within 24h 🎉', 'me'],
  ] : [
    ['Vous gérez WhatsApp ?', 'them'],
    ['Oui ! Diffusion + 1:1 automatisé ✅', 'me'],
    ['Et un devis ?', 'them'],
    ['Gratuit, sous 24h 🎉', 'me'],
  ];
  startChat(c1, s1, bubblePlain);
  startChat(c2, s2, bubbleWa);

  // ===== GSAP animations =====
  function waitGsap() {
    if (!window.gsap) { setTimeout(waitGsap, 70); return; }
    const gsap = window.gsap;
    if (window.ScrollTrigger) gsap.registerPlugin(window.ScrollTrigger);

    // hero entrance
    const tl = gsap.timeline({ defaults: { ease: 'power3.out', immediateRender: false } });
    tl.from(root.querySelectorAll('[data-bhero]'), { y: 30, opacity: 0, duration: 0.85, stagger: 0.09, clearProps: 'transform,opacity,willChange' });
    tl.from(root.querySelectorAll('[data-bfloat]'), { y: 70, opacity: 0, scale: 0.92, duration: 1.0, stagger: 0.12, clearProps: 'transform,opacity,willChange' }, '-=0.5');

    // gentle float loop on hero cards
    root.querySelectorAll('[data-bfloat]').forEach((el, i) => {
      gsap.to(el, { y: '+=14', duration: 2.4 + i * 0.4, ease: 'sine.inOut', yoyo: true, repeat: -1, delay: 1 + i * 0.2 });
    });

    if (window.ScrollTrigger) {
      // hero stage parallax on scroll
      const floats = root.querySelectorAll('[data-bfloat]');
      floats.forEach((el, i) => {
        gsap.to(el, { yPercent: -14 * (i + 1), ease: 'none', scrollTrigger: { trigger: '#top', start: 'top top', end: 'bottom top', scrub: 0.6 } });
      });
      // reveals
      root.querySelectorAll('[data-breveal]').forEach(el => {
        gsap.from(el, { y: 46, opacity: 0, duration: 0.8, ease: 'power3.out', immediateRender: false, clearProps: 'transform,opacity,willChange', scrollTrigger: { trigger: el, start: 'top 86%' } });
      });
      // bento cards
      root.querySelectorAll('[data-bcard]').forEach((el, i) => {
        gsap.from(el, { y: 40, opacity: 0, duration: 0.7, ease: 'power3.out', delay: (i % 3) * 0.06, immediateRender: false, clearProps: 'transform,opacity,willChange', scrollTrigger: { trigger: el, start: 'top 92%' } });
      });
      root.querySelectorAll('[data-bbot]').forEach((el, i) => {
        gsap.from(el, { y: 22, opacity: 0, duration: 0.55, ease: 'power2.out', delay: (i % 6) * 0.05, immediateRender: false, clearProps: 'transform,opacity,willChange', scrollTrigger: { trigger: el, start: 'top 94%' } });
      });
    }

    bindTilt(gsap);
    bindTilt3d(gsap);
    bindSim3d(gsap);
  }

  // Scène 3D "vivante" : le téléphone flotte/pivote en continu et réagit au curseur
  function bindSim3d(gsap) {
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    root.querySelectorAll('[data-sim-scene]').forEach(function (scene) {
      var stage = scene.querySelector('[data-sim-stage]');
      if (!stage) return;
      gsap.set(stage, { transformPerspective: 1100, transformOrigin: 'center center' });

      if (reduce) { gsap.set(stage, { rotateY: 0, rotateX: 4 }); return; }

      // Flottement propre des cartes
      scene.querySelectorAll('[data-sim-card]').forEach(function (c, i) {
        gsap.to(c, { y: '+=12', duration: 2.2 + i * 0.5, ease: 'sine.inOut', yoyo: true, repeat: -1, delay: i * 0.3 });
      });

      // Animation idle : rotation + flottement en continu
      var idle = gsap.timeline({ repeat: -1, yoyo: true, defaults: { duration: 3.6, ease: 'sine.inOut' } })
        .fromTo(stage, { rotateY: -9, rotateX: 6, y: -10 }, { rotateY: 9, rotateX: 2, y: 10 });

      var hovering = false;
      scene.addEventListener('mouseenter', function () { hovering = true; idle.pause(); });
      scene.addEventListener('mousemove', function (e) {
        if (!hovering) return;
        var r = scene.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width - 0.5;
        var py = (e.clientY - r.top) / r.height - 0.5;
        gsap.to(stage, { rotateY: px * 32, rotateX: -py * 22, y: 0, duration: 0.5, ease: 'power2.out' });
      });
      scene.addEventListener('mouseleave', function () {
        hovering = false;
        gsap.to(stage, { rotateY: 0, rotateX: 4, y: 0, duration: 0.8, ease: 'power3.out', onComplete: function () { idle.restart(); } });
      });
    });
  }

  function bindTilt(gsap) {
    const cards = root.querySelectorAll('[data-bcard]');
    cards.forEach(card => {
      const onMove = (e) => {
        const r = card.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        gsap.to(card, { rotateY: px * 9, rotateX: -py * 9, y: -6, duration: 0.4, ease: 'power2.out', transformPerspective: 700 });
      };
      const onLeave = () => gsap.to(card, { rotateY: 0, rotateX: 0, y: 0, duration: 0.6, ease: 'power3.out' });
      card.addEventListener('mousemove', onMove);
      card.addEventListener('mouseleave', onLeave);
    });
  }

  // Tilt 3D interactif et marqué pour les simulateurs (carte chat + mockups téléphone)
  function bindTilt3d(gsap) {
    root.querySelectorAll('[data-tilt3d]').forEach(el => {
      const ry = parseFloat(el.dataset.restY || '0');
      const rx = parseFloat(el.dataset.restX || '0');
      const glare = el.querySelector('[data-glare]');
      gsap.set(el, { transformPerspective: 1000, transformOrigin: 'center', rotateY: ry, rotateX: rx });
      const zone = el.closest('[data-tilt3d-zone]') || el;
      const onMove = (e) => {
        const r = zone.getBoundingClientRect();
        const px = (e.clientX - r.left) / r.width - 0.5;
        const py = (e.clientY - r.top) / r.height - 0.5;
        gsap.to(el, { rotateY: ry + px * 20, rotateX: rx - py * 16, duration: 0.5, ease: 'power2.out', transformPerspective: 1000 });
        if (glare) gsap.to(glare, { opacity: 0.55, '--gx': (50 + px * 80) + '%', '--gy': (50 + py * 80) + '%', duration: 0.4 });
      };
      const onLeave = () => {
        gsap.to(el, { rotateY: ry, rotateX: rx, duration: 0.9, ease: 'power3.out' });
        if (glare) gsap.to(glare, { opacity: 0, duration: 0.6 });
      };
      zone.addEventListener('mousemove', onMove);
      zone.addEventListener('mouseleave', onLeave);
    });
  }

  waitGsap();
})();

// ===== generic category filter chips =====
(function () {
  document.querySelectorAll('[data-filter-group]').forEach((group) => {
    const target = document.querySelector(group.dataset.filterGroup);
    if (!target) return;
    const items = target.querySelectorAll('[data-category]');
    group.querySelectorAll('[data-filter]').forEach((btn) => {
      btn.addEventListener('click', () => {
        group.querySelectorAll('[data-filter]').forEach((b) => b.classList.remove('is-active'));
        btn.classList.add('is-active');
        const cat = btn.dataset.filter;
        items.forEach((item) => {
          item.style.display = cat === 'all' || item.dataset.category === cat ? '' : 'none';
        });
      });
    });
  });
})();

// ===== mobile burger menu =====
(function () {
  const toggle = document.querySelector('[data-menu-toggle]');
  const panel = document.querySelector('[data-menu-panel]');
  if (!toggle || !panel) return;
  const icon = toggle.querySelector('[data-menu-icon]');

  const close = () => {
    panel.classList.add('hidden');
    toggle.setAttribute('aria-expanded', 'false');
    if (icon) icon.textContent = '☰';
  };

  toggle.addEventListener('click', () => {
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    panel.classList.toggle('hidden', isOpen);
    toggle.setAttribute('aria-expanded', String(!isOpen));
    if (icon) icon.textContent = isOpen ? '☰' : '✕';
  });

  panel.querySelectorAll('a').forEach((link) => link.addEventListener('click', close));
})();
