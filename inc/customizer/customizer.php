<?php
/**
 * Landex Theme Customizer
 *
 * @package Landex
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function landex_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_control("display_header_text");


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'landex_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'landex_customize_partial_blogdescription',
		) );
	}


}
add_action( 'customize_register', 'landex_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function landex_customize_preview_js() {
	wp_enqueue_script( 'landex-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'landex_customize_preview_js' );


/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function landex_customize_backend_scripts() {

    wp_enqueue_style( 'landex_admin_customizer_style', get_template_directory_uri() . '/assets/css/landex-customizer-style.css' );

    wp_enqueue_script( 'landex_admin_customizer', get_template_directory_uri() . '/assets/js/landex-customizer-controls.js', array( 'jquery', 'customize-controls' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'landex_customize_backend_scripts', 10 );


/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */

get_template_part('inc/customizer/landex','custom-classes');         // Custom Classes
get_template_part('inc/customizer/landex','customizer-sanitize');    // Customizer Sanitize
get_template_part('inc/customizer/landex','general-panel');          // General Settings
get_template_part('inc/customizer/landex','header-panel');  		    // Header Settings
get_template_part('inc/customizer/landex','layout-panel');       	// Layout Settings
get_template_part('inc/customizer/landex','footer-panel');           // Footer Settings


