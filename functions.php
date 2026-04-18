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

// インクルード
require_once get_template_directory() . '/inc/enqueue.php';
