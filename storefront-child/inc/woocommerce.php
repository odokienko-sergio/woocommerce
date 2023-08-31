<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function mystore_add_woocommerce_support() {
		add_theme_support( 'woocommerce' ); // Corrected typo here
	}

	add_action( 'after_setup_theme', 'mystore_add_woocommerce_support' );

	// Remove sidebar from WooCommerce archive-product.php
	remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);

	add_filter('woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter');
	function  wcc_change_breadcrumb_delimiter ( $defaults ) {
		$defaults['delimiter'] = ' / ';
		return $defaults;
	}

}