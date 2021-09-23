<?php
/**
 * Page Start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_page_wrap_start' ) ) :
	function landex_page_wrap_start() {
        $page_attr = array(
			'class' => array('site', 'logisitco_page_wrap'),
			'id' => 'page'
        );
        $page_attr = apply_filters('landex_page_attr', $page_attr);
        echo '<div '. landex_set_attributes( $page_attr ) .'>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<a class="skip-link screen-reader-text" href="#content">'. esc_html__('Skip to content', 'landex') . '</a>';
	}
endif;


/**
 * Page End
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_page_wrap_end' ) ) :
	function landex_page_wrap_end() {
		echo '</div><!-- #page -->';
	}
endif;


/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_content_start' ) ) :
	function landex_content_start() {
        echo '<div id="content" class="site-content">';
    }
endif;


/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_content_end' ) ) :
	function landex_content_end() {
        echo '</div><!-- #content -->';
    }
endif;


/**
 * Content wrap start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_content_inner_start' ) ) :
	function landex_content_inner_start() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template('elementor_canvas') )
            return;

        echo '<div class="container">';
        echo '<div class="row blog-content-row">';
    }
endif;

/**
 * Content wrap end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_content_inner_end' ) ) :
	function landex_content_inner_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;

        echo '</div> <!-- .container -->';
        echo '</div> <!-- .row -->';
    }
endif;



/**
 * Custom hooks functions are define about general section.
 *
 * @package Landex
 * @since 1.0.0
 */

/**
 * Header section wrap
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_header_wrap' ) ) :
	function landex_header_wrap() {
        ?>
        <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 d-flex align-items-center">
            <div class="site-branding">
                <?php landex_logo_wrap(); ?>
            </div><!-- .site-branding -->
            <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'landex' ); ?></button>

        </div>
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 d-flex align-items-center justify-content-end">
            <div class="landex-nav-wrap landex-nav-wrap-2 landex-nav-wrap-3 landex-nav-wrap-4">
                <div id="site-header-menu" class="site-header-menu">
                    <?php
                    $nav_attr = array(
                        'id' => 'site-navigation',
                        'class' => array(
                            'main-navigation',
                            'landex-menu',
                            'landex-menu-4',
                            'landex-responsive-menu',
                            'main-navigation'
                        ),
                        'aria-label' => esc_attr__( 'Top Menu', 'landex' )
                    );
                    $nav_attr = apply_filters('landex_nav_attr', $nav_attr);
                    ?>
                    <nav <?php echo landex_set_attributes($nav_attr); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                        <?php do_action( 'landex_nav_before' ); ?>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'main-menu',
                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ) );
                        ?>
                        <?php do_action( 'landex_nav_after' ); ?>
                    </nav><!-- #site-navigation -->
                    <button class="screen-reader-text landex-menu-close"><i class="ti-close"></i></button>
                </div>
            </div>

        </div> <!-- .col-lg-9 -->
        <?php
    }
endif;

/**
 * Header section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_header_start' ) ) :
	function landex_header_start() {
        echo '<header id="masthead" class="site-header">';
        echo '<div class="container">';
        echo '<div class="row">';
    }
endif;


/**
 * Header section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_header_end' ) ) :
	function landex_header_end() {
        echo '</div><!-- .row -->';
        echo '</div><!-- .container -->';
        echo '</header><!-- .side-header -->';
    }
endif;


/**
 * Header banner section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_banner_section_start' ) ) :
	function landex_banner_section_start() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;
        $breadcrumb_attr = array(
            'class' => array(
                'landex-breadcrumb-section',
                'p-t-b-55'
            )
        );
        $breadcrumb_attr = apply_filters('landex_breadcrumb_class', $breadcrumb_attr);
        echo '<section '. landex_set_attributes( $breadcrumb_attr ) .'>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<div class="container breadcrumb-container">';
        echo '<div class="landex-breadcrumb-content-wrap landex-breadcrumb-content-wrap-3 text-center">';
    }
endif;


/**
 * Header banner title
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_banner_title' ) ) :
	function landex_banner_title() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') || is_page_template( 'elementor_canvas' ) )
            return;

        $breadcrumb = new Landex_BreadCrumb();
        echo wp_kses_post( $breadcrumb->init() );
    }
endif;


/**
 * Header banner section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_banner_section_end' ) ) :
	function landex_banner_section_end() {
        if ( is_page_template( "template-full.php" ) || is_page_template('elementor_header_footer') )
            return;

		echo '</div>';
		echo '</div>';
		echo '</section><!-- .landex-breadcrumb-section-->';
	}
endif;



/**
 * Footer section start
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_footer_section_start' ) ) :
	function landex_footer_section_start() {
        echo '<footer id="colophon" class="site-footer landex-section bg-cloud-burst">';
	}
endif;



/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_footer_section_widgets' ) ) :
	function landex_footer_section_widgets() {
        if ( is_active_sidebar( 'footer-widget-area' ) ) :
        $footer_layout = get_theme_mod('footer_widget_layout', 'column_four');
        ?>
        <div class="landex-footer-top p-t-b-95 p-sm-t-b-70 landex-footer-<?php echo esc_attr($footer_layout); ?>">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!--.landex-footer-top -->
        <?php
        endif;
	}
endif;


/**
 * Footer section widget area
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_footer_section_bottom' ) ) :
	function landex_footer_section_bottom() {
        ?>
        <div class="landex-footer-bottom landex-footer-border-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 justify-content-center">
                        <?php
                        $copyright = get_theme_mod( 'landex_copyright_text', 'Landex' );
                        if( $copyright ) :
                        $allowed_html = array(
                            'a' => array(
                                'href' => array(),
                                'title' => array()
                            ),
                            'br' => array(),
                            'em' => array(),
                            'strong' => array(),
                        );
                        ?>
                        <p class="landex-copywright">
                            <?php echo wp_kses($copyright, $allowed_html); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .landex-footer-bottom -->
        <?php
	}
endif;


/**
 * Footer section end
 *
 * @since 1.0.0
 */
if( ! function_exists( 'landex_footer_section_end' ) ) :
	function landex_footer_section_end() {
		echo '</footer><!-- #colophon-->';
	}
endif;





/**
 * Page Wrapper
 *
 * @since 1.0.0
 */
add_action('landex_before_page', 'landex_page_wrap_start' );
add_action('landex_after_page', 'landex_page_wrap_end' );


/**
 * Main content wrapper
 *
 * @since 1.0.0
 */
add_action( 'landex_content_start', 'landex_content_start', 10 );
add_action( 'landex_content_start', 'landex_content_inner_start', 20 );
add_action( 'landex_content_end', 'landex_content_inner_end', 10 );
add_action( 'landex_content_end', 'landex_content_end', 20 );



/**
 * Managed functions for Header section hooking
 *
 * @since 1.0.0
 */
add_action( 'landex_header_section', 'landex_header_start', 10 );
add_action( 'landex_header_section', 'landex_header_wrap', 20 );
add_action( 'landex_header_section', 'landex_header_end', 30 );


/**
 * Managed functions for top banner hook
 *
 * @since 1.0.0
 */
add_action( 'landex_banner_section', 'landex_banner_section_start', 10 );
add_action( 'landex_banner_section', 'landex_banner_title', 20 );
add_action( 'landex_banner_section', 'landex_banner_section_end', 30 );


/**
 * Managed functions for footer area hook
 *
 * @since 1.0.0
 */
add_action( 'landex_footer_before', 'landex_footer_section_start' );
add_action( 'landex_footer_section', 'landex_footer_section_widgets' );
add_action( 'landex_footer_bottom', 'landex_footer_section_bottom' );
add_action( 'landex_footer_after', 'landex_footer_section_end' );
