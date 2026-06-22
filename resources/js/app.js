import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

(function () {
  const root = document.getElementById('ywc-b');
  if (!root) return;

  // footer year
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // ===== services bento =====
  const bento = root.querySelector('[data-bbento]');
  if (bento) {
    const items = [
      { t: 'Chatbots & WhatsApp', d: 'On automatise la conversation 24/7 et on qualifie vos leads en continu.', tag: 'À la une', col: 'span 3', row: 'span 2', dark: true, icon: '💬' },
      { t: 'Stratégie & Conception', d: 'Positionnement, message, plan d’action à forte valeur ajoutée.', col: 'span 3', row: 'span 1', icon: '🎯' },
      { t: 'Social Media & Comm 360°', d: 'Des contenus qui font réagir, sur tous les canaux.', col: 'span 3', row: 'span 1', icon: '📣' },
      { t: 'Marketing Intelligence', d: 'Marketing 3.0 et social business, décidés par la data.', col: 'span 2', row: 'span 1', icon: '🧠' },
      { t: 'Data Mining & Tech', d: 'Vos données deviennent audiences et leads.', col: 'span 2', row: 'span 1', icon: '🛰️' },
      { t: 'Référencement SEO', d: 'Trouvé au bon moment par les bonnes personnes.', col: 'span 2', row: 'span 1', icon: '🔎' },
      { t: 'Branding & Lean Marketing', d: 'Une marque qui crée l’émotion et marque les esprits.', col: 'span 3', row: 'span 1', icon: '✦' },
      { t: 'Formation', d: 'On vous donne les clés du digital, en pratique.', col: 'span 3', row: 'span 1', icon: '🎓' },
    ];
    bento.innerHTML = items.map(s => {
      const dark = s.dark;
      return `<div data-bcard class="b-bento__card ${dark ? 'b-bento__card--dark' : 'b-bento__card--light'}" style="grid-column:${s.col};grid-row:${s.row};">
        <div class="b-bento__top">
          <span class="b-bento__icon">${s.icon}</span>
          ${s.tag ? `<span class="b-bento__tag">${s.tag}</span>` : ''}
        </div>
        <div class="b-bento__bottom ${dark ? 'b-bento__bottom--dark' : ''}">
          <h3 class="b-bento__title ${dark ? 'b-bento__title--large' : ''}">${s.t}</h3>
          <p class="b-bento__desc ${dark ? 'b-bento__desc--light' : ''}">${s.d}</p>
        </div>
      </div>`;
    }).join('');
  }

  // ===== client logo wall (placeholder wordmarks — swap with real logos) =====
  const cgrid = root.querySelector('[data-bclient-grid]');
  if (cgrid) {
    const logos = [
      { n: 'Orange CI', f: "'Space Grotesk',sans-serif", w: 700, ls: '-.02em', mark: '●' },
      { n: 'Biofar', f: "'Manrope',sans-serif", w: 700, ls: '-.01em', mark: '' },
      { n: 'Bracongo', f: "'Space Grotesk',sans-serif", w: 700, ls: '.06em', mark: '' },
      { n: 'CFAO group', f: "'Manrope',sans-serif", w: 800, ls: '-.01em', mark: '◆' },
      { n: 'Bridge Bank', f: "'Manrope',sans-serif", w: 600, ls: '0', mark: '○' },
      { n: 'Red Africa', f: "'Space Grotesk',sans-serif", w: 700, ls: '.02em', mark: '' },
      { n: 'NSIA', f: "'Manrope',sans-serif", w: 700, ls: '-.01em', mark: '✦' },
      { n: 'Total Énergie', f: "'Space Grotesk',sans-serif", w: 700, ls: '.04em', mark: '/' },
      { n: 'SODIAM', f: "'Manrope',sans-serif", w: 700, ls: '-.01em', mark: '' },
      { n: 'Toyota CI', f: "'Space Grotesk',sans-serif", w: 700, ls: '.06em', mark: '' },
      { n: 'Terra', f: "'Manrope',sans-serif", w: 700, ls: '-.01em', mark: '▲' },
      { n: 'cobra', f: "'Space Grotesk',sans-serif", w: 700, ls: '-.02em', mark: '' },
    ];
    cgrid.innerHTML = logos.map(l => {
      return `<div class="b-client">
        ${l.mark ? `<span class="b-client__mark">${l.mark}</span>` : ''}
        <span class="b-client__name" style="font-family:${l.f};font-weight:${l.w};letter-spacing:${l.ls};">${l.n}</span>
      </div>`;
    }).join('');
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
  const s1 = [
    ['Bonjour, je veux plus de clients 🚀', 'them'],
    ['On s’en occupe : stratégie + chatbots.', 'me'],
    ['Vous êtes où ?', 'them'],
    ['Paris & Abidjan 🌍', 'me'],
  ];
  const s2 = [
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
