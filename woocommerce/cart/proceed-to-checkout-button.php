<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="checkout-button button alt wc-forward">
    <?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>
</a>

<a href="<?php echo wp_nonce_url( add_query_arg( 'empty_cart', '', wc_get_cart_url() ), 'woocommerce-cart' ); ?>" class="empty-button button button-multi">
    <?php _e( 'Iztukšot grozu', 'dto' ); ?>
</a>