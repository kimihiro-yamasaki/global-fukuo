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
    return $classes;
} );

// インクルード
require_once get_template_directory() . '/inc/enqueue.php';
