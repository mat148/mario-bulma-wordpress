<?php
/**
 * Scripts & Styles
 *
 * @package Bulmapress
 */

if ( ! function_exists( 'bulmapress_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function bulmapress_scripts() {
		wp_enqueue_style( 'bulmapress-style', get_stylesheet_uri() );

		wp_enqueue_style( 'bulmapress-fontawesome', "https://use.fontawesome.com/releases/v5.2.0/css/all.css" );

		wp_enqueue_style( 'bulmapress-bulma-style', get_template_directory_uri() . '/frontend/bulmapress/css/bulmapress.css' );

		wp_enqueue_script( 'bulmapress-navigation', get_template_directory_uri() . '/frontend/js/navigation.js', array(), '20151215', true );

		wp_enqueue_script( 'bulmapress-skip-link-focus-fix', get_template_directory_uri() . '/frontend/js/skip-link-focus-fix.js', array(), '20151215', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
}
}
add_action( 'wp_enqueue_scripts', 'bulmapress_scripts' );
