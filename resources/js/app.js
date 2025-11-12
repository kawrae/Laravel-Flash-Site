import './bootstrap';
import './anim.js';

// lightbox
document.addEventListener('DOMContentLoaded', () => {
  const dialog = document.getElementById('lightbox');
  const img    = document.getElementById('lightbox-img');

  if (!dialog || !img) return;

  document.querySelectorAll('[data-lightbox]').forEach(btn => {
    btn.addEventListener('click', () => {
      const src = btn.getAttribute('data-lightbox-src');
      if (!src) return;
      img.src = src;
      if (dialog.showModal) dialog.showModal(); else dialog.setAttribute('open', '');
    });
  });

  const close = () => {
    if (dialog.close) dialog.close(); else dialog.removeAttribute('open');
    img.src = '';
  };
  dialog.addEventListener('click', (e) => {
    const rect = dialog.getBoundingClientRect();
    const inside = (
      e.clientY >= rect.top && e.clientY <= rect.bottom &&
      e.clientX >= rect.left && e.clientX <= rect.right
    );
    if (!inside) close();
  });
  document.querySelectorAll('[data-lightbox-close]').forEach(el => el.addEventListener('click', close));
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && dialog.open) close(); });
});

// hamburger icon
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('[data-nav-toggle]');
  const mobile = document.getElementById('site-menu-mobile');

  if (!btn || !mobile) return;

  const open  = () => { mobile.classList.remove('hidden'); btn.setAttribute('aria-expanded', 'true'); };
  const close = () => { mobile.classList.add('hidden');   btn.setAttribute('aria-expanded', 'false'); };
  const toggle = () => (mobile.classList.contains('hidden') ? open() : close());

  btn.addEventListener('click', toggle);
  document.addEventListener('keydown', (e) => e.key === 'Escape' && close());
  window.addEventListener('resize', () => { if (window.innerWidth >= 768) close(); });
  mobile.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
});

// dark mode toggle
document.querySelectorAll('[data-theme-toggle]').forEach(btn => {
  btn.addEventListener('click', () => {
    const root = document.documentElement;
    const isDark = root.classList.contains('dark');
    const next = isDark ? 'light' : 'dark';

    root.classList.toggle('dark', next === 'dark');
    localStorage.setItem('theme', next);

    document.querySelectorAll('[data-theme-toggle]').forEach(b =>
      b.setAttribute('aria-pressed', String(next === 'dark'))
    );
  });
});