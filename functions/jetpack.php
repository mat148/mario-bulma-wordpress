<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Bulmapress
 */

if ( ! function_exists( 'bulmapress_jetpack_setup' ) ) {
	/**
	 * Jetpack setup function.
	 *
	 * See: https://jetpack.com/support/infinite-scroll/
	 * See: https://jetpack.com/support/responsive-videos/
	 */
	function bulmapress_jetpack_setup() {
		// Add theme support for Infinite Scroll.
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'bulmapress_infinite_scroll_render',
			'footer'    => 'page',
		) );

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );
	}
}
add_action( 'after_setup_theme', 'bulmapress_jetpack_setup' );

if ( ! function_exists( 'bulmapress_infinite_scroll_render' ) ) {
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function bulmapress_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', get_post_format() );
			endif;
		}
	}
}
