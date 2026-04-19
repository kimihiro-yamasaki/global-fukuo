<?php get_header(); ?>

  <main class="contact-page contact-page--standalone">
    <div class="contact-page__card" role="dialog" aria-labelledby="contact-title" aria-modal="true">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="contact-modal__close" aria-label="閉じる" data-contact-close>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M6 6 L18 18 M6 18 L18 6"/></svg>
      </a>
      <?php echo global_fukuo_render_contact_card( false ); ?>
    </div>
  </main>

<?php get_footer(); ?>
