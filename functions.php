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

// インクルード
require_once get_template_directory() . '/inc/enqueue.php';
