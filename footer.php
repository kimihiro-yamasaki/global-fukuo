
  </main><!-- /.feed -->

  <?php // ---- Contact モーダル（全ページ共通・JS制御） ---- ?>
  <div class="contact-modal" id="contact-modal" aria-hidden="true" role="dialog" aria-labelledby="contact-modal-title" aria-modal="true">
    <div class="contact-modal__backdrop" data-contact-close aria-hidden="true"></div>
    <div class="contact-modal__card">
      <button type="button" class="contact-modal__close" data-contact-close aria-label="閉じる">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M6 6 L18 18 M6 18 L18 6"/></svg>
      </button>
      <?php echo global_fukuo_render_contact_card( true ); ?>
    </div>
  </div>

<?php wp_footer(); ?>
</body>
</html>
