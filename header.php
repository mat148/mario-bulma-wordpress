<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/audiojs/1.0.1/audio.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<?php bulmapress_skip_link_screen_reader_text(); ?>
		<header id="header">
			<nav id="site-navigation" class="navbar is-fixed-top is-black" role="navigation">
				<div class="navbar-brand">
					<a href="<?php echo get_home_url(); ?>" class="navbar-item is-white is-uppercase is-size-4">Supa</a>
					<?php bulmapress_menu_toggle(); ?>
				</div>
				<div class="navbar-menu is-uppercase">
					<?php bulmapress_navigation(); ?>
				</div>
			</nav>
		</header>

		<div id="content" class="site-content">


