<?php

/**
 * Plugin Name: WooCommerce Tedarikçi
 * Plugin URI: http://www.recepuncu.github.io/woocommerce-tedarikci
 * Description: Ürünün tedarikci adını saklamanızı sağlar.
 * Version: 1.0.0
 * Author: Recep UNCU
 * Author URI: http://www.recepuncu.github.io
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @package WooCommerce/Templates
 * @author Recep UNCU
 * @since 1.0.0
 */

add_action( 'woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields' ); 
function woocommerce_product_custom_fields () {
	global $woocommerce, $post;
	echo '<div class="product_merchant">';	
		woocommerce_wp_text_input([
			'id' => '_merchant_name',
			'placeholder' => 'Satıcı mağaza adını buraya girin.',
			'label' => __('Satıcı Mağaza Adı', 'woocommerce'),
			'desc_tip' => 'true'
		]);			
	echo '</div>';
}

add_action( 'woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save' );
function woocommerce_product_custom_fields_save($post_id) {    
    $woocommerce_merchant_name = $_POST['_merchant_name'];
    if (!empty($woocommerce_merchant_name)) {
		update_post_meta($post_id, '_merchant_name', esc_attr($woocommerce_merchant_name));	
	}        
}