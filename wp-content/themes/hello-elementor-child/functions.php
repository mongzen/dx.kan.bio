<?php
/**
 * Hello Elementor Child theme functions.
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '1.0.0' );
define( 'HELLO_ELEMENTOR_CHILD_PATH', get_stylesheet_directory() );
define( 'HELLO_ELEMENTOR_CHILD_URL', get_stylesheet_directory_uri() );

/**
 * Load child-theme translations.
 *
 * @return void
 */
function hello_elementor_child_setup() {
	load_child_theme_textdomain(
		'hello-elementor-child',
		HELLO_ELEMENTOR_CHILD_PATH . '/languages'
	);
}
add_action( 'after_setup_theme', 'hello_elementor_child_setup' );

/**
 * Enqueue child assets after Hello Elementor's styles.
 *
 * @return void
 */
function hello_elementor_child_enqueue_assets() {
	$custom_css_path = HELLO_ELEMENTOR_CHILD_PATH . '/assets/css/style.css';
	$custom_js_path  = HELLO_ELEMENTOR_CHILD_PATH . '/assets/js/main.js';

	wp_enqueue_style(
		'hello-elementor-child',
		get_stylesheet_uri(),
		[ 'hello-elementor', 'hello-elementor-theme-style' ],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

	wp_enqueue_style(
		'hello-elementor-child-custom',
		HELLO_ELEMENTOR_CHILD_URL . '/assets/css/style.css',
		[ 'hello-elementor-child' ],
		file_exists( $custom_css_path ) ? filemtime( $custom_css_path ) : HELLO_ELEMENTOR_CHILD_VERSION
	);

	if ( file_exists( $custom_js_path ) ) {
		wp_enqueue_script(
			'hello-elementor-child',
			HELLO_ELEMENTOR_CHILD_URL . '/assets/js/main.js',
			[],
			filemtime( $custom_js_path ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_assets', 20 );
