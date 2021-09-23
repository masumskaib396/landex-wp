<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Landex
 */

get_header();
?>
	<div id="primary" class="<?php echo esc_attr( landex_content_class() ); ?>">
		<main id="main" class="site-main">
			<div class="row posts-row">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
					<div class="col-lg-12">
						<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
