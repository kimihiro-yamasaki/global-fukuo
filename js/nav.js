// ドロワーメニュー開閉
(function () {
  const btn     = document.querySelector('.js-menu-open');
  const nav     = document.getElementById('siteNav');
  const overlay = document.querySelector('.js-menu-close');
  const iconHamburger = btn && btn.querySelector('.icon-hamburger');
  const iconClose     = btn && btn.querySelector('.icon-close');

  if (!btn || !nav) return;

  function openMenu() {
    nav.classList.add('is-open');
    btn.setAttribute('aria-expanded', 'true');
    nav.setAttribute('aria-hidden', 'false');
    if (iconHamburger) iconHamburger.style.display = 'none';
    if (iconClose)     iconClose.style.display     = 'block';
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    nav.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
    nav.setAttribute('aria-hidden', 'true');
    if (iconHamburger) iconHamburger.style.display = 'block';
    if (iconClose)     iconClose.style.display     = 'none';
    document.body.style.overflow = '';
  }

  btn.addEventListener('click', function () {
    nav.classList.contains('is-open') ? closeMenu() : openMenu();
  });

  if (overlay) overlay.addEventListener('click', closeMenu);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });
})();
