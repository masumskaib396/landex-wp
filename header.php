<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landex
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * landex_before_page hook
 *
 * @since 1.0.0
 */
do_action( 'landex_before_page' );

/**
 * landex_header_top_bar hook
 *
 * @since 1.0.0
 */
do_action( 'landex_header_top_bar' );

/**
 * landex_header_section hook
 *
 * @hooked - landex_header_start - 10
 * @hooked - landex_header_wrap - 20
 * @hooked - landex_header_end - 30
 * 
 * @since 1.0.0
 */
do_action( 'landex_header_section' );

/**
 * landex_banner_section hook
 *
 * @hooked - landex_banner_section_start - 10
 * @hooked - landex_banner_title - 20
 * @hooked - landex_banner_section_end - 30
 *
 * @since 1.0.0
 */
do_action( 'landex_banner_section' );

/**
 * landex_content_start hook
 *
 *
 * @since 1.0.0
 */
do_action( 'landex_content_start' );
