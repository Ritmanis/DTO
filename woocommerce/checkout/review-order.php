<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="woocommerce-checkout-review-order-table full-margin">
    <div class="full-margin">
        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product = $cart_item['data'];

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) { ?>
                <div class="half-margin">
                    <?php echo $_product->get_title() .
                        '<br>' . WC()->cart->get_product_price( $_product ) . ' x ' . $cart_item['quantity']; ?>
                </div>
            <?php }
        } ?>
    </div>

    <table class="table-content">
        <tr>
            <td><?php _e( 'Subtotal', 'woocommerce' ); ?></td>

            <td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                <?php wc_cart_totals_subtotal_html(); ?>
            </td>
        </tr>
    </table>

    <div class="full-margin">
        <?php wc_cart_totals_shipping_html(); ?>
    </div>

    <table class="table-content">
        <tr>
            <td><?php _e( 'Total', 'woocommerce' ); ?></td>

            <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                <?php wc_cart_totals_order_total_html(); ?>
            </td>
        </tr>
    </table>
</div>