<?php
/*
Plugin Name: Delivery Time Checkout Field
Description: Adds a "Delivery Time" field to WooCommerce checkout.
Version: 1.0
Author: Serhii Odokiienko
Text Domain: delivery-time-checkout
*/

if (!defined('ABSPATH')) {
	die;
}

require plugin_dir_path(__FILE__) . 'inc/class-delivery-time-checkout.php';

class Delivery_Time_Checkout_Plugin {

	public function __construct() {
		register_activation_hook(__FILE__, array($this, 'activation'));
		register_deactivation_hook(__FILE__, array($this, 'deactivation'));

		$this->init();
	}

	public function activation() {
		flush_rewrite_rules();
	}

	public function deactivation() {
		flush_rewrite_rules();
	}

	public function init() {
		new Delivery_Time_Checkout();
		// You can initialize other classes here if needed
	}
}

new Delivery_Time_Checkout_Plugin();
