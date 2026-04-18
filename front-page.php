<?php get_header(); ?>

<?php
$brand_img_base = get_template_directory_uri() . '/images/brand';
$brands = [
    [
        'tag'   => 'Kasual / Terjangkau',
        'name'  => 'GU',
        'desc'  => 'Brand saudara Uniqlo. Brand kasual asal Jepang yang memungkinkan kamu menikmati tren fashion terkini dengan harga terjangkau.',
        'url'   => 'https://www.gu-global.com/jp/ja/',
        'image' => $brand_img_base . '/gu.png',
        'focus' => 'center center',
    ],
    [
        'tag'   => 'LifeWear / Basic',
        'name'  => 'UNIQLO',
        'desc'  => 'Brand apparel basic terkemuka dari Jepang. LifeWear berkualitas tinggi dan fungsional yang dicintai di seluruh dunia.',
        'url'   => 'https://www.uniqlo.com/jp/ja/',
        'image' => $brand_img_base . '/uniqlo.png',
        'focus' => '60% center',
    ],
    [
        'tag'   => 'Mode / Kontemporer',
        'name'  => 'Theory',
        'desc'  => 'Brand kontemporer asal New York. Desain minimalis yang elegan dengan estetika modern dan penuh gaya.',
        'url'   => 'https://www.theory.com/',
        'image' => $brand_img_base . '/theory.png',
        'focus' => '55% center',
    ],
    [
        'tag'   => 'Sneakers / Street',
        'name'  => 'Onitsuka<br>Tiger',
        'desc'  => 'Brand sneakers Jepang yang lahir di Kobe pada tahun 1949. Desain retro ikonik yang digemari di seluruh dunia.',
        'url'   => 'https://www.onitsukatiger.com/',
        'image' => $brand_img_base . '/onitsuka_tiger.png',
        'focus' => 'center center',
    ],
    [
        'tag'   => 'Running / Performa',
        'name'  => 'On',
        'desc'  => 'Brand performa asal Swiss. Sepatu lari dengan teknologi CloudTec® yang inovatif dan menjadi perbincangan di seluruh dunia.',
        'url'   => 'https://www.on.com/',
        'image' => $brand_img_base . '/on.png',
        'focus' => '65% center',
    ],
];
?>

  <main class="feed" id="feed">

    <?php foreach ( $brands as $i => $b ) : ?>
      <div class="brand-row" data-index="<?php echo (int) $i; ?>">
        <div class="panel panel--main">
          <div class="panel-bg" aria-hidden="true" style="background-image: url('<?php echo esc_url( $b['image'] ); ?>'); background-position: <?php echo esc_attr( $b['focus'] ?? 'center center' ); ?>;"></div>
          <div class="panel-overlay" aria-hidden="true"></div>

          <div class="main-content">
            <span class="brand-tag"><?php echo esc_html( $b['tag'] ); ?></span>
            <h2 class="brand-name"><?php echo wp_kses( $b['name'], [ 'br' => [] ] ); ?></h2>
            <p class="brand-desc">
              <?php echo esc_html( $b['desc'] ); ?>
            </p>
            <div class="brand-actions">
              <a href="<?php echo esc_url( $b['url'] ); ?>" class="btn btn--primary" target="_blank" rel="noopener">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                Katalog Produk Brand Ini
              </a>
              <a href="<?php echo esc_url( home_url('/contact') ); ?>" class="btn btn--outline">Jastip / Shopping Bareng di Jepang</a>
            </div>
          </div>

          <?php if ( $i === 0 ) : ?>
            <div class="scroll-down-hint" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>

  </main>

  <!-- 縦スクロールインジケーター（右端） — ブランド数に応じて生成 -->
  <div class="feed-indicator" id="feedIndicator">
    <?php foreach ( $brands as $i => $b ) : ?>
      <div class="feed-indicator__dot<?php echo $i === 0 ? ' is-active' : ''; ?>"></div>
    <?php endforeach; ?>
  </div>

<?php get_footer(); ?>
