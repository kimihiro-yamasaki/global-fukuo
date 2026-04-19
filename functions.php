<?php
/**
 * global-fukuo テーマ関数
 */

// テーマサポート
function global_fukuo_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
}
add_action( 'after_setup_theme', 'global_fukuo_setup' );

// スラッグ about のページで body に page-about クラスを付与
add_filter( 'body_class', function( $classes ) {
    if ( is_page( 'about' ) ) {
        $classes[] = 'page-about';
    }
    if ( is_page( 'contact' ) ) {
        $classes[] = 'page-contact';
    }
    return $classes;
} );

// 必要な固定ページ（contact）を自動作成
function global_fukuo_ensure_pages() {
    $pages = [
        'about'   => 'About',
        'contact' => 'Contact',
    ];
    foreach ( $pages as $slug => $title ) {
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            wp_insert_post( [
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            ] );
        }
    }
}
add_action( 'after_switch_theme', 'global_fukuo_ensure_pages' );
add_action( 'init', 'global_fukuo_ensure_pages' );

// Contact カード本体（page-contact と モーダル で共用）
function global_fukuo_render_contact_card( $in_modal = false ) {
    $theme_uri = get_template_directory_uri();
    $members   = [ 'kimi', 'jaisy', 'ryo', 'rifan', 'tasha' ];
    $title_id  = $in_modal ? 'contact-modal-title' : 'contact-title';
    ob_start();
    ?>
    <div class="contact-page__header">
      <h<?php echo $in_modal ? '2' : '1'; ?> id="<?php echo esc_attr( $title_id ); ?>" class="contact-page__title">Ngobrol dengan kami</h<?php echo $in_modal ? '2' : '1'; ?>>
      <p class="contact-page__subtitle">Kirim DM di</p>
    </div>

    <div class="contact-team" aria-hidden="true">
      <?php foreach ( $members as $m ) : ?>
        <img
          src="<?php echo esc_url( $theme_uri . '/images/team/' . $m . '.jpg' ); ?>"
          alt=""
          class="contact-team__avatar"
          loading="lazy"
        >
      <?php endforeach; ?>
    </div>

    <nav class="contact-links" aria-label="お問い合わせリンク">
      <a href="https://www.tiktok.com/@hobbyselect" target="_blank" rel="noopener noreferrer" class="contact-link contact-link--tiktok">
        <span class="contact-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5.8 20.1a6.34 6.34 0 0 0 10.86-4.43V8.82a8.16 8.16 0 0 0 4.77 1.52V6.89a4.85 4.85 0 0 1-1.84-.2z"/></svg>
        </span>
        <span class="contact-link__label">TikTok</span>
      </a>
      <a href="https://www.instagram.com/hobbyselectjp/" target="_blank" rel="noopener noreferrer" class="contact-link contact-link--instagram">
        <span class="contact-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </span>
        <span class="contact-link__label">Instagram</span>
      </a>
      <a href="https://chat.whatsapp.com/CUOamsOXRPc74nnIiYnkkm" target="_blank" rel="noopener noreferrer" class="contact-link contact-link--whatsapp">
        <span class="contact-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.47 14.38c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15s-.77.97-.94 1.17c-.17.2-.35.22-.65.07a8.2 8.2 0 0 1-2.4-1.48 9.05 9.05 0 0 1-1.67-2.07c-.17-.3-.02-.46.13-.61.13-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51-.17-.01-.37-.01-.57-.01s-.52.07-.8.37c-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.22 1.36.19 1.87.12.57-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35zM12.04 21.5h-.01a9.5 9.5 0 0 1-4.84-1.32l-.35-.21-3.6.94.96-3.5-.22-.36a9.48 9.48 0 0 1-1.45-5.03c0-5.23 4.27-9.49 9.52-9.49 2.54 0 4.93.99 6.73 2.79a9.45 9.45 0 0 1 2.79 6.72c0 5.23-4.27 9.49-9.52 9.49zm8.1-17.58A11.4 11.4 0 0 0 12.04 0 11.47 11.47 0 0 0 .57 11.45c0 2.02.53 3.99 1.54 5.73L.47 24l6.97-1.82a11.49 11.49 0 0 0 5.49 1.39h.01c6.32 0 11.47-5.13 11.47-11.45a11.38 11.38 0 0 0-3.37-8.11z"/></svg>
        </span>
        <span class="contact-link__label">WhatsApp</span>
      </a>
    </nav>
    <?php
    return ob_get_clean();
}

// インクルード
require_once get_template_directory() . '/inc/enqueue.php';
