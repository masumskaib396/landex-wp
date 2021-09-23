<?php

if ( !function_exists( 'landex_content_wrap_calc' ) ) {
	/**
	 * Landex content wrap classes list
	 *
	 */
	function landex_content_wrap_calc( $type_layout ) {
		$wrap_class = array(
			'col-lg-8',
			'col-md-8',
			'col-sm-12',
			'content-area',
		);
		if ( 'no_sidebar' === $type_layout ) {
			$wrap_class = array(
				'col-lg-12',
				'col-md-12',
				'col-sm-12',
				'content-area',
			);
		} elseif ( 'left_sidebar' === $type_layout ) {
			$wrap_class[] = 'order-lg-2';
			$wrap_class[] = 'order-md-2';
		}
		return $wrap_class;
	}
}



if ( !function_exists( 'landex_column_wrap_calc' ) ) {
	/**
	 * Landex clumn wrap  list
	 *
	 */
	function landex_column_wrap_calc() {

		$column_archive_sidebar      = get_theme_mod( 'landex_archive_sidebar', 'right_sidebar' );
		if( 'no_sidebar' === $column_archive_sidebar ){
			$gride = 'col-lg-4 col-md-6 col-sm-12';
		}else{
			$gride = 'col-lg-6 col-md-6 col-sm-12';
		};

		return $gride;
	}
}






if ( !function_exists( 'landex_content_class' ) ) {
	/**
	 * Landex content class init
	 */
	function landex_content_class() {

		$archive_sidebar      = get_theme_mod( 'landex_archive_sidebar', 'right_sidebar' );
		$post_default_sidebar = get_theme_mod( 'landex_default_post_sidebar', 'right_sidebar' );
		$page_default_sidebar = get_theme_mod( 'landex_default_page_sidebar', 'right_sidebar' );
		$product_default_sidebar = get_theme_mod( 'landex_product_page_sidebar', 'right_sidebar' );
		$product_singlet_sidebar = get_theme_mod( 'landex_single_product_sidebar', 'right_sidebar' );

		if ( is_woocommerce_active() && is_product() ) {
			$content_class = landex_content_wrap_calc( $product_singlet_sidebar );
		} elseif ( is_single() ) {
			$content_class = landex_content_wrap_calc( $post_default_sidebar );
		} elseif ( is_page_template('template-full.php') ) {
			$content_class = landex_content_wrap_calc( 'no_sidebar' );
		} elseif ( is_page_template('template-full-width.php') ) {
			$content_class = landex_content_wrap_calc( 'no_sidebar' );
		} elseif ( is_page() ) {
			$content_class = landex_content_wrap_calc( $page_default_sidebar );
		} elseif ( is_woocommerce_active() && is_shop() ) {
			$content_class = landex_content_wrap_calc( $product_default_sidebar );
		} else {
			$content_class = landex_content_wrap_calc( $archive_sidebar );
		}

		$content_class = apply_filters('landex_content_class', $content_class);

		$content_class = implode( ' ', $content_class );
		return $content_class;
	}
}

if ( !function_exists( 'landex_sidebar_wrap_calc' ) ) {
	/**
	 * Landex sidebar classes list
	 */
	function landex_sidebar_wrap_calc( $type_layout ) {
		$wrap_class = array(
			'col-lg-4 col-md-4',
			'col-md-4',
			'col-sm-12',
			'widget-area',
		);
		if ( 'left_sidebar' === $type_layout ) {
			$wrap_class[] = 'order-lg-1';
			$wrap_class[] = 'order-md-1';
		}
		return $wrap_class;
	}
}

if ( !function_exists( 'landex_sidebar_class' ) ) {
	/**
	 * Landex sidebar class init
	 */
	function landex_sidebar_class() {

		$archive_sidebar      = get_theme_mod( 'landex_archive_sidebar', 'right_sidebar' );
		$post_default_sidebar = get_theme_mod( 'landex_default_post_sidebar', 'right_sidebar' );
		$page_default_sidebar = get_theme_mod( 'landex_default_page_sidebar', 'right_sidebar' );
		$product_default_sidebar = get_theme_mod( 'landex_product_page_sidebar', 'right_sidebar' );
		$product_singlet_sidebar = get_theme_mod( 'landex_single_product_sidebar', 'right_sidebar' );

		if ( is_woocommerce_active() && is_product() ) {
			$sidebar_class = landex_sidebar_wrap_calc( $product_singlet_sidebar );
		} elseif ( is_single() ) {
			$sidebar_class = landex_sidebar_wrap_calc( $post_default_sidebar );
		} elseif ( is_page() ) {
			$sidebar_class = landex_sidebar_wrap_calc( $page_default_sidebar );
		} elseif ( is_woocommerce_active() && is_shop() ) {
			$sidebar_class = landex_sidebar_wrap_calc( $product_default_sidebar );
		} else {
			$sidebar_class = landex_sidebar_wrap_calc( $archive_sidebar );
		}

		$sidebar_class = apply_filters('landex_sidebar_class', $sidebar_class);
		$sidebar_class = implode( ' ', $sidebar_class );
		return $sidebar_class;
	}
}