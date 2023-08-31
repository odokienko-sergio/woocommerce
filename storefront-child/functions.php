<?php

// Include custom WooCommerce file
function include_custom_woocommerce_file() {
	$custom_woocommerce_file = get_stylesheet_directory() . '/inc/woocommerce.php';
	if (file_exists($custom_woocommerce_file)) {
		require_once $custom_woocommerce_file;
	}
}
add_action('wp', 'include_custom_woocommerce_file');
