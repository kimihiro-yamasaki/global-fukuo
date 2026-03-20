<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- HEADER（固定） -->
  <header class="site-header">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
      global.<span>fukuo</span>.jp
    </a>
    <div class="header-actions">
      <button class="header-icon-btn" aria-label="検索">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </button>
      <button class="header-icon-btn js-menu-open" aria-label="メニューを開く" aria-expanded="false" aria-controls="siteNav">
        <svg class="icon-hamburger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="display:none"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
  </header>

  <!-- ドロワーメニュー -->
  <nav class="site-nav" id="siteNav" aria-hidden="true">
    <div class="site-nav__overlay js-menu-close"></div>
    <div class="site-nav__drawer">
      <ul class="site-nav__list">
        <li class="site-nav__item">
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-nav__link<?php echo is_front_page() ? ' is-current' : ''; ?>">
            <span class="site-nav__label">Home</span>
          </a>
        </li>
        <li class="site-nav__item">
          <a href="<?php echo esc_url( home_url('/about') ); ?>" class="site-nav__link<?php echo is_page('about') ? ' is-current' : ''; ?>">
            <span class="site-nav__label">About</span>
          </a>
        </li>
        <li class="site-nav__item">
          <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="site-nav__link<?php echo is_page('contact') ? ' is-current' : ''; ?>">
            <span class="site-nav__label">Contact</span>
          </a>
        </li>
      </ul>
      <p class="site-nav__copy">Made in Japan, Made by Japan</p>
    </div>
  </nav>

  <!-- 縦スクロールインジケーター（右端） -->
  <div class="feed-indicator" id="feedIndicator">
    <div class="feed-indicator__dot is-active"></div>
    <div class="feed-indicator__dot"></div>
    <div class="feed-indicator__dot"></div>
  </div>
