<?php
class Delivery_Time_Checkout {

	public function __construct() {
		// Register actions and hooks
		add_action('woocommerce_before_order_notes', array($this, 'add_delivery_time_field'));
		add_action('woocommerce_checkout_update_order_meta', array($this, 'save_delivery_time_field'));
		add_action('woocommerce_order_details_after_order_table', array($this, 'display_delivery_time_in_order'));
		add_action('woocommerce_admin_order_data_after_billing_address', array($this, 'display_delivery_time_in_admin_order'));
		// Add more actions as needed
	}

	public function add_delivery_time_field($checkout) {
		echo '<div id="delivery_time_field" class="form-row">';

		woocommerce_form_field('delivery_time', array(
			'type' => 'textarea',
			'class' => array('form-row-wide'),
			'label' => __('Delivery Time'),
			'placeholder' => __('Enter the delivery time'),
		), $checkout->get_value('delivery_time'));

		echo '</div>';
	}

	public function save_delivery_time_field($order_id) {
		if (!empty($_POST['delivery_time'])) {
			$order = wc_get_order($order_id);
			$order->update_meta_data('_delivery_time', sanitize_text_field($_POST['delivery_time']));
			$order->save();
		}
	}

	public function display_delivery_time_in_order($order) {
		$delivery_time = $order->get_meta('_delivery_time', true);

		if (!empty($delivery_time)) {
			echo '<tr class="woocommerce-table__line-item order_item">';
			echo '<td class="woocommerce-table__product-name product-name">';
			echo '<strong>' . __('Delivery Time') . ':</strong> ' . esc_html($delivery_time);
			echo '</td>';
			echo '<td class="woocommerce-table__product-total product-total">';
			echo '</td>';
			echo '</tr>';
		}
	}

	public function display_delivery_time_in_admin_order($order) {
		$delivery_time = $order->get_meta('_delivery_time', true);

		if (!empty($delivery_time)) {
			echo '<div class="order_delivery_time">';
			echo '<p><strong>' . __('Delivery Time') . ':</strong> ' . esc_html($delivery_time) . '</p>';
			echo '</div>';
		}
	}

	// Add more methods as needed

}
