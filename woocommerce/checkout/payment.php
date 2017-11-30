<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="woocommerce-checkout-payment full-width">
    <?php if ( WC()->cart->needs_payment() ) : ?>
        <div class="full-margin">
            <h4><?php _e( 'Payment Method:', 'woocommerce' ); ?>:</h4>

            <?php if ( ! empty( $available_gateways ) ) {
                foreach ( $available_gateways as $gateway ) {
                    wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                }
            } ?>
        </div>
    <?php endif; ?>

    <div class="checkout-button-row full-width">
        <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="<?php echo esc_attr( $order_button_text ); ?>" data-value="<?php echo esc_attr( $order_button_text ); ?>" />

        <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
    </div>
</div>