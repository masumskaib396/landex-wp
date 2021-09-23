<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landex
 */

?>

<?php
/**
 * landex_content_end hook
 *
 * @since 1.0.0
 */
do_action( 'landex_content_end' );

/**
 * landex_footer_before hook
 *
 * @since 1.0.0
 */
do_action( 'landex_footer_before' );

$landex_footer_layout = get_theme_mod( 'landex_footer_widget_option', 'show' );
if ( 'show' === $landex_footer_layout ) :
	/**
	 * landex_footer_section hook
	 *
	 * @since 1.0.0
	 */
	do_action( 'landex_footer_section' );
endif;

/**
 * landex_footer_bottom hook
 *
 * @since 1.0.0
 */
do_action( 'landex_footer_bottom' );

/**
 * landex_footer_after hook
 *
 * @since 1.0.0
 */
do_action( 'landex_footer_after' );


/**
 * landex_after_page
 * 
 * @since 1.0.0
 */
do_action( 'landex_after_page' );


wp_footer(); ?>

</body>
</html>
