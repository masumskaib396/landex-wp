<?php
/**
 * Landex Footer Settings panel at Theme Customizer
 *
 * @package Landex
 * @since 1.0.0
 */

add_action( 'customize_register', 'landex_footer_settings_register' );

function landex_footer_settings_register( $wp_customize ) {


	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'landex_footer_settings_panel',
	    array(
	        'priority'       => 30,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => esc_html__( 'Footer Settings', 'landex' ),
	    )
    );

    /**
	 * Widget Area Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'landex_footer_widget_section',
        array(
            'title'		=> esc_html__( 'Widget Area', 'landex' ),
            'panel'     => 'landex_footer_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_footer_widget_option',
        array(
            'default' => 'show',
            'transport'    => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Landex_Customize_Switch_Control(
        $wp_customize,
            'landex_footer_widget_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Footer Widget Section', 'landex' ),
                'description'   => esc_html__( 'Show/Hide option for footer widget area section.', 'landex' ),
                'section'   => 'landex_footer_widget_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'landex' ),
                    'hide'  => esc_html__( 'Hide', 'landex' )
                ),
                'priority'  => 5,
            )
        )
    );


    /**
     * Field for Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'footer_widget_layout',
        array(
            'default'           => 'column_three',
            'transport'    => 'refresh',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Landex_Customize_Control_Radio_Image(
        $wp_customize,
        'footer_widget_layout',
            array(
                'label'    => esc_html__( 'Footer Widget Layout', 'landex' ),
                'description' => esc_html__( 'Choose layout from available layouts', 'landex' ),
                'section'  => 'landex_footer_widget_section',
                'active_callback' => 'landex_is_footer_shown',
                'choices'  => array(
	                    'column_four' => array(
	                        'label' => esc_html__( 'Columns Four', 'landex' ),
	                        'url'   => '%s/assets/images/column-4.png'
	                    ),
	                    'column_three' => array(
	                        'label' => esc_html__( 'Columns Three', 'landex' ),
	                        'url'   => '%s/assets/images/column-3.png'
	                    ),
	                    'column_two' => array(
	                        'label' => esc_html__( 'Columns Two', 'landex' ),
	                        'url'   => '%s/assets/images/column-2.png'
	                    ),
	                    'column_one' => array(
	                        'label' => esc_html__( 'Column One', 'landex' ),
	                        'url'   => '%s/assets/images/column-1.png'
	                    )
	            ),
	            'priority' => 10
            )
        )
    );

    $wp_customize->add_setting(
        'footer_background_color',
        array(
            'default' => '#22304A',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_background_color',
        array(
            'label'      => esc_html__( 'Footer Background Color', 'landex' ),
            'section'    => 'landex_footer_widget_section',
            'active_callback' => 'landex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default' => '#FFFFFF',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_text_color',
        array(
            'label'      => esc_html__( 'Footer Text Color', 'landex' ),
            'section'    => 'landex_footer_widget_section',
            'active_callback' => 'landex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_anchor_color',
        array(
            'default' => '#666666',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_anchor_color',
        array(
            'label'      => esc_html__( 'Footer Anchor Color', 'landex' ),
            'section'    => 'landex_footer_widget_section',
            'active_callback' => 'landex_is_footer_shown',
            'priority'   => 20,
        ) )
    );

    /**
	 * Bottom Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'landex_footer_bottom_section',
        array(
            'title'		=> esc_html__( 'Bottom Section', 'landex' ),
            'panel'     => 'landex_footer_settings_panel',
            'priority'  => 10,
        )
    );

    /**
     * Text field for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'landex_copyright_text',
        array(
            'default'    => esc_html__( 'Landex', 'landex' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'landex_minimal_html_senitize'
        )
    );
    $wp_customize->add_control(
        'landex_copyright_text',
        array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Copyright Text', 'landex' ),
            'section'   => 'landex_footer_bottom_section',
            'priority'  => 5,
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'landex_copyright_text',
        array(
            'selector' => 'span.landex-copyright-text',
            'render_callback' => 'landex_customize_partial_copyright',
        )
    );

    $wp_customize->add_setting(
        'footer_bottom_background_color',
        array(
            'default' => '#22304A',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_background_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Background Color', 'landex' ),
            'section'    => 'landex_footer_bottom_section',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_bottom_text_color',
        array(
            'default' => '#FFFFFF',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_text_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Text Color', 'landex' ),
            'section'    => 'landex_footer_bottom_section',
            'priority'   => 20,
        ) )
    );

    $wp_customize->add_setting(
        'footer_bottom_anchor_color',
        array(
            'default' => '#666666',
            'transport'=>'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'footer_bottom_anchor_color',
        array(
            'label'      => esc_html__( 'Footer Bottom Anchor Color', 'landex' ),
            'section'    => 'landex_footer_bottom_section',
            'priority'   => 20,
        ) )
    );

} //Footer panel close