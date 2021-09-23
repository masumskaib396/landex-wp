<?php
/**
 * Landex Page layout for archive/sing/blog, page and single blog post
 *
 * @package Landex
 * @since 1.0.0
 */

add_action( 'customize_register', 'landex_design_settings_register' );

function landex_design_settings_register( $wp_customize ) {

	// Register the radio image control class as a JS control type.
    $wp_customize->register_control_type( 'Landex_Customize_Control_Radio_Image' );

	/**
     * Add Layout Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'landex_layout_settings_panel',
	    array(
	        'priority'       => 25,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Layout Settings', 'landex' ),
	    )
    );

    /**
     * Archive Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'landex_archive_settings_section',
        array(
            'title'     => esc_html__( 'Archive/Blog Settings', 'landex' ),
            'panel'     => 'landex_layout_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Image Radio field for archive sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_archive_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'landex_sanitize_select',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'landex_archive_sidebar',
            array(
                'label'    => esc_html__( 'Archive Sidebars', 'landex' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'landex' ),
                'section'  => 'landex_archive_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/left-sidebars.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/right-sidebars.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/three-column.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Text field for archive read more
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_archive_read_more_text',
        array(
            'default'      => esc_html__( 'Read More', 'landex' ),
            'transport'    => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control(
        'landex_archive_read_more_text',
        array(
            'type'      	=> 'text',
            'label'        	=> esc_html__( 'Read More Text', 'landex' ),
            'description'  	=> esc_html__( 'Enter read more button text for archive page.', 'landex' ),
            'section'   	=> 'landex_archive_settings_section',
            'priority'  	=> 15
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'landex_archive_read_more_text',
            array(
                'selector' => '.entry-footer > a.landex-icon-btn',
                'render_callback' => 'landex_customize_partial_archive_more',
            )
    );

    /**
     * Page Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'landex_page_settings_section',
        array(
            'title'     => esc_html__( 'Page Settings', 'landex' ),
            'panel'     => 'landex_layout_settings_panel',
            'priority'  => 10,
        )
    );

    /**
     * Image Radio for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_default_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'landex_sanitize_select',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'landex_default_page_sidebar',
            array(
                'label'    => esc_html__( 'Page Sidebars', 'landex' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'landex' ),
                'section'  => 'landex_page_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/page-left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/page-right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/full-content.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Post Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'landex_post_settings_section',
        array(
            'title'     => esc_html__( 'Single Post Settings', 'landex' ),
            'panel'     => 'landex_layout_settings_panel',
            'priority'  => 15,
        )
    );

    /**
     * Image Radio for post sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_default_post_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'landex_sanitize_select',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'landex_default_post_sidebar',
            array(
                'label'    => esc_html__( 'Post Sidebars', 'landex' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'landex' ),
                'section'  => 'landex_post_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/page-left-sidebar.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/page-right-sidebar.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/full-content.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Switch option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_related_posts_option',
        array(
            'default' => 'show',
            'transport'  => 'refresh',
            'sanitize_callback' => 'landex_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new landex_Customize_Switch_Control(
        $wp_customize,
            'landex_related_posts_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Related Post Option', 'landex' ),
                'description'   => esc_html__( 'Show/Hide option for related posts section at single post page.', 'landex' ),
                'section'   => 'landex_post_settings_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'landex' ),
                    'hide'  => esc_html__( 'Hide', 'landex' )
                ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Text field for related post section title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_related_posts_title',
        array(
            'default'    => esc_html__( 'Related Posts', 'landex' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'landex_related_posts_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Related Post Section Title', 'landex' ),
            'section'   => 'landex_post_settings_section',
            'active_callback' => 'landex_is_related_shown',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'landex_related_posts_title',
            array(
                'selector' => 'h2.landex-related-title',
                'render_callback' => 'landex_customize_partial_related_title',
            )
    );

    $wp_customize->add_setting(
        'landex_related_post_from',
        array(
            'transport'  => 'refresh',
            'sanitize_callback' => 'landex_sanitize_select',
            'default' => 'category',
        )
    );

    $wp_customize->add_control(
        'landex_related_post_from', array(
            'type' => 'select',
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'section' => 'landex_post_settings_section', // Add a default or your own section
            'label'     => esc_html__( 'Select Related Post Type', 'landex' ),
            'active_callback' => 'landex_is_related_shown',
            'description' => esc_html__( 'Select whish taxonomy you want to fetch related post', 'landex' ),
            'choices' => array(
                'category' => esc_html__( 'Category', 'landex' ),
                'tag' => esc_html__( 'Tag', 'landex' ),
            ),
        )
    );




    if ( class_exists( 'WooCommerce' ) ) :

    /**
     * Product Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'landex_product_settings_section',
        array(
            'title'     => esc_html__( 'Product Page Settings', 'landex' ),
            'panel'     => 'landex_layout_settings_panel',
            'priority'  => 20,
        )
    );

    /**
     * Image Radio for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_product_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'landex_sanitize_select',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'landex_product_page_sidebar',
            array(
                'label'    => esc_html__( 'Product Page Sidebars', 'landex' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'landex' ),
                'section'  => 'landex_product_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/left-sidebars.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/right-sidebars.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/no-sidebars.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Single Product Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'landex_single_product_settings_section',
        array(
            'title'     => esc_html__( 'Single Product Settings', 'landex' ),
            'panel'     => 'landex_layout_settings_panel',
            'priority'  => 25,
        )
    );

    /**
     * Image Radio for post sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_single_product_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'landex_sanitize_select',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'landex_single_product_sidebar',
            array(
                'label'    => esc_html__( 'Single Product Sidebars', 'landex' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'landex' ),
                'section'  => 'landex_single_product_settings_section',
                'choices'  => array(
                        'left_sidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/left-sidebars.png'
                        ),
                        'right_sidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/right-sidebars.png'
                        ),
                        'no_sidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'landex' ),
                            'url'   => '%s/assets/images/no-sidebars.png'
                        )
                ),
                'priority' => 5
            )
        )
    );

    /**
     * Switch option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_related_product_option',
        array(
            'default' => 'show',
            'transport'  => 'refresh',
            'sanitize_callback' => 'landex_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new landex_Customize_Switch_Control(
        $wp_customize,
            'landex_related_product_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Related Product Option', 'landex' ),
                'description'   => esc_html__( 'Show/Hide option for related product section at single product page.', 'landex' ),
                'section'   => 'landex_single_product_settings_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'landex' ),
                    'hide'  => esc_html__( 'Hide', 'landex' )
                ),
                'priority'  => 10,
            )
        )
    );


    endif; // if woocommerce available

} // Layout panel closed