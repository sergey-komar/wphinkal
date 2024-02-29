<?php

function hinkal_scripts() {
    wp_enqueue_style('hinkal-style', get_template_directory_uri() . '/assets/css/style.min.css', [], '2023', 'all');

    wp_enqueue_script('hinkal-unpkg', get_template_directory_uri() . 'https://unpkg.com/imask', [], '2023', true);
    wp_enqueue_script('hinkal-js', get_template_directory_uri() . '/assets/js/main.min.js', [], '2023', true);
}
add_action('wp_enqueue_scripts', 'hinkal_scripts');


function hinkal() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider' );

    register_nav_menus([
        'menu_header' => 'меню в шапке'
    ]);
}

add_action('after_setup_theme', 'hinkal');


require_once get_template_directory() . '/inc/woocommerce-hooks.php';


// САЙДБАР
function woostudy_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Sidebar', 'woostudy' ),
			'id' => 'sidebar-1',
			'description' => esc_html__( 'Add widgets here.', 'woostudy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
		)
	);
}
add_action( 'widgets_init', 'woostudy_widgets_init' );


function debug($data) {
    echo '<pre>' . print_r($data, 1) . '</pre>';
}


