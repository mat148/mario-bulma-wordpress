<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */
?>

<?php the_content( sprintf(
	/* translators: %s: Name of current post. */
	wp_kses(
		__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bulmapress' ),
		array(
			'span' => array(
				'class' => array()
				)
			)
		),
	the_title( '<span class="screen-reader-text">"', '"</span>', false )
	)
);

wp_link_pages( array(
	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bulmapress' ),
	'after'  => '</div>',
	) );
	?>
</div><!-- .entry-content -->

<footer class="content entry-footer">
	<?php bulmapress_entry_footer(); ?>
</footer><!-- .entry-footer -->
