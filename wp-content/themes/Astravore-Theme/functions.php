<?php
/**
 * Astravore theme setup.
 */

function astravore_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'astravore' ),
		'footer'  => __( 'Footer menu', 'astravore' ),
	) );
}
add_action( 'after_setup_theme', 'astravore_setup' );

function astravore_enqueue_assets() {
	wp_enqueue_style(
		'astravore-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400&family=Inter:wght@300;400;500&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'astravore-style',
		get_stylesheet_uri(),
		array( 'astravore-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'astravore-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'astravore_enqueue_assets' );

function astravore_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer widgets', 'astravore' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Shown in the footer.', 'astravore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'astravore_widgets_init' );

// Show "Full Moon" instead of "Category: Full Moon" in archive titles.
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

/**
 * Fallback for the primary menu until one is created under Appearance > Menus.
 */
function astravore_fallback_menu() {
	echo '<ul class="nav__list">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'astravore' ) . '</a></li>';
	wp_list_pages( array( 'title_li' => '', 'depth' => 1 ) );
	echo '</ul>';
}
