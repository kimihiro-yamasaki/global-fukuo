/**
 * Contact モーダル制御
 * - /contact への内部リンクを intercept してモーダル表示
 * - ×ボタン / 背景クリック / Escキー / popstate で閉じる
 * - History API で URL は /contact にする（再読み込みでも直アクセス可）
 */
(function () {
  const modal = document.getElementById('contact-modal');
  if (!modal) return;

  const body      = document.body;
  const closeEls  = modal.querySelectorAll('[data-contact-close]');
  const CONTACT_PATH = '/contact';

  function matchesContactHref(href) {
    if (!href) return false;
    try {
      const url = new URL(href, location.origin);
      if (url.origin !== location.origin) return false;
      return /\/contact\/?$/.test(url.pathname);
    } catch (_) { return false; }
  }

  function openModal(pushHistory) {
    if (modal.classList.contains('is-open')) return;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    body.classList.add('has-modal-open');
    if (pushHistory !== false) {
      try { history.pushState({ contactModal: true }, '', CONTACT_PATH); } catch (_) {}
    }
  }

  function closeModal(popHistory) {
    if (!modal.classList.contains('is-open')) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    body.classList.remove('has-modal-open');
    if (popHistory !== false && history.state && history.state.contactModal) {
      history.back();
    }
  }

  // 内部の /contact リンクを intercept
  document.addEventListener('click', function (e) {
    const a = e.target.closest('a[href]');
    if (!a) return;
    if (a.hasAttribute('data-contact-close')) return;       // close 用リンクは除外
    if (a.target && a.target !== '_self') return;
    if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
    if (!matchesContactHref(a.getAttribute('href'))) return;
    e.preventDefault();
    openModal(true);
  });

  // 閉じる系
  closeEls.forEach(function (el) {
    el.addEventListener('click', function (e) {
      // スタンドアロンページの close リンク（href=home）はそのまま遷移させる
      if (el.tagName === 'A' && el.closest('.contact-page--standalone')) return;
      e.preventDefault();
      closeModal(true);
    });
  });

  // Esc で閉じる
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal(true);
  });

  // 戻るボタンで閉じる
  window.addEventListener('popstate', function () {
    if (modal.classList.contains('is-open')) closeModal(false);
  });
})();
