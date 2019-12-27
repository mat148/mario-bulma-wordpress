<?php
/**
 * Bulmapress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bulmapress
 */


require get_template_directory() . '/functions/bulmapress_navwalker.php';
require get_template_directory() . '/functions/bulmapress_helpers.php';
require get_template_directory() . '/functions/bulmapress_custom_query.php';

if ( ! function_exists( 'bulmapress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bulmapress_setup() {
	require get_template_directory() . '/functions/base.php';
	require get_template_directory() . '/functions/post-thumbnails.php';
	require get_template_directory() . '/functions/navigation.php';
	require get_template_directory() . '/functions/content.php';
	require get_template_directory() . '/functions/pagination.php';
	require get_template_directory() . '/functions/widgets.php';
	require get_template_directory() . '/functions/search.php';
	require get_template_directory() . '/functions/scripts-styles.php';
}
endif;
add_action( 'after_setup_theme', 'bulmapress_setup' );

require get_template_directory() . '/functions/template-tags.php';
require get_template_directory() . '/functions/extras.php';
require get_template_directory() . '/functions/customizer.php';
require get_template_directory() . '/functions/jetpack.php';

//MY CUSTOM FUNCTIONS
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name' => 'hero',
			'title' => __('Hero'),
			'description' => __('Custom Hero block'),
			'render_template' => 'template-parts/blocks/hero/hero.php',
			'icon' => 'editor-paste-text',
			'keywords' =>array('hero', 'product'),
		)
	);
}

function additional_custom_styles() {
    /*Enqueue The Styles*/
    wp_enqueue_style( 'uniquestylesheetid', get_template_directory_uri() . '/frontend/bulmapress/css/main.css' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Cantata+One|Imprima&display=swap', false ); 
}
	
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function wpb_add_font_awesome() {
	wp_enqueue_style( 'wpb-font-awesome', 'https://kit.fontawesome.com/4801ac2f81.js', false ); 
}
	
add_action( 'wp_enqueue_scripts', 'wpb_add_font-awesome' );