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

// 横スワイプドット更新
document.querySelectorAll('.brand-slides').forEach(slides => {
  const dotActive = slides.closest('.brand-row').querySelector('.swipe-hint__dot--active');
  const dotNext   = slides.closest('.brand-row').querySelector('.swipe-hint__dot:not(.swipe-hint__dot--active)');

  slides.addEventListener('scroll', () => {
    const atStart = slides.scrollLeft < slides.offsetWidth * 0.5;
    if (dotActive && dotNext) {
      dotActive.style.background = atStart ? 'white'                  : 'rgba(255,255,255,0.25)';
      dotNext.style.background   = atStart ? 'rgba(255,255,255,0.25)' : 'white';
      dotActive.style.width      = atStart ? '18px' : '6px';
      dotNext.style.width        = atStart ? '6px'  : '18px';
    }
  });
});
