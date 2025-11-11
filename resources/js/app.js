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