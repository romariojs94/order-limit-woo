<?php
/*
Plugin Name: Cart Quantity Limit for WooCommerce
Description: Limit the cart quantity to 1 item in WooCommerce.
Version: 1.0
Author URI: https://github.com/romariojs94
*/

if (!defined('ABSPATH')) {
    exit;
}

function limitar_quantidade_carrinho() {

    $cart = WC()->cart;
    $limit_quantity = 1;

    $cart_quantity = $cart->get_cart_contents_count();

    if ($cart_quantity > $limit_quantity) {
        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            $cart->set_quantity($cart_item_key, $limit_quantity);
        }
        wc_add_notice('Você só pode ter 1 item no carrinho. A quantidade foi ajustada.', 'notice');
    }
}
add_action('woocommerce_check_cart_items', 'limitar_quantidade_carrinho');