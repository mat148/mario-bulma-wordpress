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
	add_action('acf/init', 'register_hero_block_type');
	add_action('acf/init', 'register_content_block_type');
	add_action('acf/init', 'register_gallery_block_type');
	add_action('acf/init', 'register_music_block_type');
}

function register_hero_block_type() {
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

function register_content_block_type() {
	acf_register_block_type(
		array(
			'name' => 'content-block',
			'title' => __('Content Block'),
			'description' => __('Custom Content block'),
			'render_template' => 'template-parts/blocks/content-block/content-block.php',
			'icon' => 'editor-paste-text',
			'keywords' =>array('Content'),
		)
	);
}

function register_gallery_block_type() {
	acf_register_block_type(
		array(
			'name' => 'gallery',
			'title' => __('Gallery'),
			'description' => __('Custom Content block'),
			'render_template' => 'template-parts/blocks/gallery/gallery.php',
			'icon' => 'editor-paste-text',
			'keywords' =>array('Gallery'),
		)
	);
}

function register_music_block_type() {
	acf_register_block_type(
		array(
			'name' => 'music',
			'title' => __('Music'),
			'description' => __('Custom Content block'),
			'render_template' => 'template-parts/blocks/music/music.php',
			'icon' => 'editor-paste-text',
			'keywords' =>array('Music'),
		)
	);
}

function additional_custom_styles() {
    /*Enqueue The Styles*/
    wp_enqueue_style( 'uniquestylesheetid', get_template_directory_uri() . '/frontend/bulmapress/css/main.css' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Cantata+One|Open+Sans&display=swap', false ); 
}
	
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function wpb_add_font_awesome() {
	wp_enqueue_style( 'wpb-font-awesome', 'https://kit.fontawesome.com/4801ac2f81.js', false ); 
}
	
add_action( 'wp_enqueue_scripts', 'wpb_add_font-awesome' );

function get_copyright() {
	global $wpdb;

	$copyright_dates = $wpdb->get_results("
		SELECT
			YEAR(min(post_date_gmt)) AS firstdate,
			YEAR(max(post_date_gmt)) AS lastdate
		FROM
			$wpdb->posts
		WHERE
			post_status = 'publish'
	");

	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}
	return $output;
}

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'music',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Music' ),
                'singular_name' => __( 'Music' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'music'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );