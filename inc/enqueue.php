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
    wp_enqueue_style(
        'global-fukuo-style',
        get_stylesheet_uri(),
        ['global-fukuo-fonts'],
        wp_get_theme()->get('Version')
    );

    // フィードJS
    wp_enqueue_script(
        'global-fukuo-feed',
        get_template_directory_uri() . '/js/feed.js',
        [],
        wp_get_theme()->get('Version'),
        true // フッターに出力
    );
}
add_action( 'wp_enqueue_scripts', 'global_fukuo_enqueue' );
