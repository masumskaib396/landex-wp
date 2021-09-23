<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Landex
 */

get_header();
?>
<div id="primary" class="<?php echo esc_attr( landex_content_class() ); ?>">
	<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation();

		$landex_related_posts = get_theme_mod( 'landex_related_posts_option', 'show' );
		if ( 'show' === $landex_related_posts ) :
			/**
			 * landex_related_posts hook
			 *
			 * @since 1.0.0
			 */
			do_action( 'landex_related_posts' );
		endif;

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
