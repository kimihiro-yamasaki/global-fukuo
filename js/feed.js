// 縦スクロールインジケーター更新
const feed = document.getElementById('feed');
const dots = document.querySelectorAll('.feed-indicator__dot');
const rows = document.querySelectorAll('.brand-row');

const rowObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const idx = parseInt(entry.target.dataset.index);
      dots.forEach((d, i) => d.classList.toggle('is-active', i === idx));
    }
  });
}, { threshold: 0.5 });

rows.forEach(row => rowObserver.observe(row));
