<?php
/**
 * スタイル・スクリプト読み込み
 */
function global_fukuo_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'global-fukuo-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;700&display=swap',
        [],
        null
    );

    // テーマスタイル
    $style_path = get_stylesheet_directory() . '/style.css';
    wp_enqueue_style(
        'global-fukuo-style',
        get_stylesheet_uri(),
        ['global-fukuo-fonts'],
        file_exists( $style_path ) ? filemtime( $style_path ) : wp_get_theme()->get('Version')
    );

    // フィードJS
    $feed_js = get_template_directory() . '/js/feed.js';
    wp_enqueue_script(
        'global-fukuo-feed',
        get_template_directory_uri() . '/js/feed.js',
        [],
        file_exists( $feed_js ) ? filemtime( $feed_js ) : wp_get_theme()->get('Version'),
        true
    );

    // ナビゲーションJS
    $nav_js = get_template_directory() . '/js/nav.js';
    wp_enqueue_script(
        'global-fukuo-nav',
        get_template_directory_uri() . '/js/nav.js',
        [],
        file_exists( $nav_js ) ? filemtime( $nav_js ) : wp_get_theme()->get('Version'),
        true
    );

    // Contactモーダル制御JS
    $contact_modal_js = get_template_directory() . '/js/contact-modal.js';
    wp_enqueue_script(
        'global-fukuo-contact-modal',
        get_template_directory_uri() . '/js/contact-modal.js',
        [],
        file_exists( $contact_modal_js ) ? filemtime( $contact_modal_js ) : wp_get_theme()->get('Version'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'global_fukuo_enqueue' );
