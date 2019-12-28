<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer hero is-black" role="contentinfo">
	<div class="container">
		<div class="hero-body has-text-centered">
			<div class="site-info">
				Copyright <?php echo get_copyright(); ?> SUPA
			</div><!-- .site-info -->
		</div>
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
