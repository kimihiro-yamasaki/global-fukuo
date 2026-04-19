<?php get_header(); ?>

<?php
$theme_uri = get_template_directory_uri();
$members = [
    [
        'name'   => 'Kimi',
        'role'   => 'Fashion Trend Enthusiast',
        'origin' => 'Tokyo',
        'image'  => $theme_uri . '/images/team/kimi.jpg',
        'desc'   => 'Pecinta fashion yang hobi banget ngulik tren dan brand terbaru. Sebagai seorang engineer, misi utama gue adalah ngenalin kerennya fashion Jepang ke seluruh dunia lewat kekuatan internet.',
    ],
    [
        'name'   => 'Jaisy',
        'role'   => 'Japan Fashion Trend Enthusiast',
        'origin' => 'Tokyo',
        'image'  => $theme_uri . '/images/team/jaisy.jpg',
        'desc'   => '9 tahun di Jepang, hobi mengikuti tren fashion lokal Jepang. Ingin mengenalkan fashion culture ke ranah global. Akhir-akhir ini aktif jastip hobby stuff.',
    ],
    [
        'name'   => 'Ryo',
        'role'   => 'Influencer',
        'origin' => 'Jakarta',
        'image'  => $theme_uri . '/images/team/ryo.jpg',
        'desc'   => 'Sama dengan Kimi, Orang Jepang asli. Tapi lagi jadi influencer terkenal di Jakarta. Suka bagi bagi certia fashion dan hal unik dari Jepang!',
    ],
    [
        'name'   => 'Rifan',
        'role'   => 'Illustrator, designer, and Artist',
        'origin' => 'Bandung',
        'image'  => $theme_uri . '/images/team/rifan.jpg',
        'desc'   => 'Professional illustrator and designer with over 7 years of experience in the comic and creative industry, known for delivering compelling visual storytelling and versatile design solutions.',
    ],
    [
        'name'   => 'Tasha - chan',
        'role'   => 'Designer & Illustrator',
        'origin' => 'Tokyo',
        'image'  => $theme_uri . '/images/team/tasha.jpg',
        'desc'   => 'Pelajar Indonesia sedang kuliah di Tokyo dan hobi design, illustration, fashion, and contemporary Art !',
    ],
];
?>

  <main class="about-page">

    <!-- ============================================================
         TEAM
         ============================================================ -->
    <section class="about-section about-section--dark">
      <div class="about-section__inner">
        <span class="about-label">Tim HobbySelectJP</span>
        <h2 class="about-section__title">Member kita ada di Tokyo, Jakarta, dan Bandung.</h2>
        <p class="about-section__body">
          Member native orang Jepang di Tokyo dan Indonesia bisa bantu Jastip dan private guide shopping fashion, hidden gem, local spot unik dan seru!
        </p>

        <div class="team-list">
          <?php foreach ( $members as $m ) : ?>
            <div class="team-card">
              <div class="team-card__avatar" aria-hidden="true">
                <img
                  src="<?php echo esc_url( $m['image'] ); ?>"
                  alt="<?php echo esc_attr( $m['name'] ); ?>"
                  class="team-card__avatar-img"
                  loading="lazy"
                  onerror="this.style.display='none';this.parentNode.classList.add('team-card__avatar--fallback');this.parentNode.dataset.initial='<?php echo esc_attr( mb_substr( $m['name'], 0, 1 ) ); ?>';"
                >
              </div>
              <div class="team-card__body">
                <div class="team-card__meta">
                  <span class="team-card__role"><?php echo esc_html( $m['role'] ); ?></span>
                  <span class="team-card__origin">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo esc_html( $m['origin'] ); ?>
                  </span>
                </div>
                <h3 class="team-card__name"><?php echo esc_html( $m['name'] ); ?></h3>
                <p class="team-card__desc">
                  <?php echo esc_html( $m['desc'] ); ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </main><!-- /.about-page -->

<?php get_footer(); ?>
