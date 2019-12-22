<?php
/**
 * Navigation Functions
 *
 * @package Bulmapress
 */

// This theme uses wp_nav_menu() in one location.
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'bulmapress' ),
		) );
}

// Bulmapress navigation
if ( ! function_exists( 'bulmapress_navigation' ) ) {
	function bulmapress_navigation()
	{
		wp_nav_menu( array(
			'theme_location'    => 'menu-1',
			'depth'             => 0,
			'container'         => 'div id="navigation"',
			'menu_class'        => 'navbar-end',
			'fallback_cb'       => 'bulmapress_navwalker::fallback',
			'walker'            => new bulmapress_navwalker()
			)
		);
	}
}
