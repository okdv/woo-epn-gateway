<?php
/*
 * Plugin Name: WooCommerce eProcessingNetwork Gateway
 * Plugin URI: https://github.com/okdv/woo-epn-gateway
 * Description: Accept payments using the eProcessingNetwork API directly within WooCommerce. 
 * Author: Otho DuBoise
 * Author URI: http://otho.dev
 * Version: 1.0.0
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

add_filter('woocommerce_payment_gateways','woo_epn_gateway_add_gateway_class');
function woo_epn_gateway_add_gateway_class($gateways) {
    $gateways[] = "WC_EPN_Gateway";
    return $gateways;
}

add_action("plugins_loaded", "woo_epn_gateway_init_gateway_class");
function woo_epn_gateway_init_gateway_class() {
	require_once plugin_dir_path( __FILE__ ) . 'class-woo-epn-gateway.php';
}