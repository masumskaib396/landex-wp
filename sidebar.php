<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landex
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$landex_archive_sidebar      = get_theme_mod( 'landex_archive_sidebar', 'right_sidebar' );
$landex_post_default_sidebar = get_theme_mod( 'landex_default_post_sidebar', 'right_sidebar' );
$landex_page_default_sidebar = get_theme_mod( 'landex_default_page_sidebar', 'right_sidebar' );
$landex_product_default_sidebar = get_theme_mod( 'landex_product_page_sidebar', 'right_sidebar' );
$product_singlet_sidebar = get_theme_mod( 'landex_single_product_sidebar', 'right_sidebar' );

if ( is_woocommerce_active() && is_product() ) {
	if ( 'no_sidebar' === $product_singlet_sidebar ) {
		return;
	}
}  elseif ( is_single() ) {
	if ( 'no_sidebar' === $landex_post_default_sidebar ) {
		return;
	}
} elseif ( is_page() ) {
	if ( 'no_sidebar' === $landex_page_default_sidebar ) {
		return;
	}
} elseif ( is_woocommerce_active() && is_shop() ) {
	if ( 'no_sidebar' === $landex_product_default_sidebar ) {
		return;
	}
} else {
	if ( 'no_sidebar' === $landex_archive_sidebar ) {
		return;
	}
}
?>

<aside id="secondary" class="<?php echo esc_attr( landex_sidebar_class() ); ?>">
	<div class="landex-sidebar-wrap">
		<?php
			if( is_woocommerce_active() && (is_shop() || is_product()) )
				dynamic_sidebar( 'product-sidebar' );
			else
				dynamic_sidebar( 'sidebar-1' );
		?>
	</div>
</aside><!-- #secondary -->
