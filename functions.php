<?php
/**
 * Landex functions.php file
 *
 * Author:          mlimon <limon@landex.com>
 * Created on:      17/01/2019
 *
 * @package Landex
 */

define( 'LANDEX_VERSION', '1.0' );
define( 'LANDEX_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'LANDEX_LIB_DIR', trailingslashit( get_template_directory() ) . 'lib/' );
define( 'LANDEX_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );


/**
 * Landex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Landex
 */

if ( ! function_exists( 'landex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function landex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Landex, use a find and replace
		 * to change 'landex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'landex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'landex-featured-thumb', 350, 230, true );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'landex' ),
				'menu-2' => esc_html__( 'Footer', 'landex' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', landex_fonts_url() ) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 180,
				'width'       => 40,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support(
			'custom-header',
			array(
				'flex-width'       => true,
				'width'            => 1920,
				'flex-height'      => true,
				'height'           => 200,
				'wp-head-callback' => 'landex_header_style',
			)
		);

		// add gutenberg color palette support.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'shark', 'landex' ),
					'slug'  => 'shark',
					'color' => '#202427',
				),
				array(
					'name'  => __( 'coral red', 'landex' ),
					'slug'  => 'coral-red',
					'color' => '#46DEB1',
				),
				array(
					'name'  => __( 'aztec', 'landex' ),
					'slug'  => 'aztec',
					'color' => '#22304A',
				),
				array(
					'name'  => __( 'very light gray', 'landex' ),
					'slug'  => 'very-light-gray',
					'color' => '#F8F8F8',
				),
				array(
					'name'  => __( 'dove gray', 'landex' ),
					'slug'  => 'dove-gray',
					'color' => '#666666',
				),
				array(
					'name'  => __( 'manatee', 'landex' ),
					'slug'  => 'manatee',
					'color' => '#9095A0',
				),
			)
		);

		// Default block styles.
		add_theme_support( 'wp-block-styles' );

		// Responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// add theme woocommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'landex_setup' );


if ( ! function_exists( 'landex_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @since 1.0
	 */
	function landex_header_style() {

		$landex_header_text_color = get_header_textcolor();

		/*
		* If no custom options for text are set, let's bail.
		* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $landex_header_text_color ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			/*<![CDATA[*/
			<?php
			if ( display_header_text() ) {
				?>
			.landex-breadcrumb-content-wrap h1.landex-breadcrumb-title,
			.landex-breadcrumb-content-wrap h5.post_meta_output {
				color: #<?php echo esc_attr( $landex_header_text_color ); ?>;
			}
				<?php
			}
			?>
			/*]]>*/
		</style>
		<?php
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'landex_content_width', 640 );
}
add_action( 'after_setup_theme', 'landex_content_width', 0 );



/**
 * Enqueue styles for the block-based editor.
 *
 * @since Landex 1.0
 */
function landex_block_editor_styles() {
	// Add custom fonts.
	wp_enqueue_style( 'landex-fonts', landex_fonts_url(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'landex_block_editor_styles' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function landex_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'landex_skip_link_focus_fix' );



/**
 * Implement the Custom Header feature.
 */
require LANDEX_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require LANDEX_INC_DIR . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require LANDEX_INC_DIR . 'template-functions.php';


/**
 * Functions which enhance the theme by clumn gride
 */
require LANDEX_INC_DIR . 'clumn-gride.php';

/**
 * Customizer additions.
 */
require LANDEX_INC_DIR . 'customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require LANDEX_INC_DIR . 'jetpack.php';
}



/**
 * Custom files for hook
 */
require LANDEX_INC_DIR . 'hooks/general-hooks.php';
require LANDEX_INC_DIR . 'hooks/single-hooks.php';

/*
 * Import themify icons list.
 */
require LANDEX_INC_DIR . '/widgets/themify-icons.php';

/*
 * Breadcrumb.
 */
require LANDEX_INC_DIR . '/class-landex-breadcrumb.php';

/**
 * Custom Widgets
 */
require LANDEX_INC_DIR . 'widgets/class-landexcontacts.php';
require LANDEX_INC_DIR . 'widgets/class-landexabout.php';
require LANDEX_INC_DIR . 'widgets/class-landexrecentpost.php';


