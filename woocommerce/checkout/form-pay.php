<?php
/**
 * Pay for order form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-pay.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see      https://docs.woocommerce.com/document/template-structure/
 * @author   WooThemes
 * @package  WooCommerce/Templates
 * @version  2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<form id="order_review" class="form content-wrap" method="post">
    <h3><?php _e( 'Order Details', 'woocommerce' ); ?></h3>

    <div class="full-margin">
        <?php foreach( $order->get_items() as $item_id => $item ) : ?>
            <div class="half-margin">
                <?php echo $item['name'] . '<br>' . wc_price( $order->get_item_total( $item ) ) . ' x ' . $item['qty']; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <table class="table-content">
        <?php foreach ( $order->get_order_item_totals() as $key => $total ) : ?>
            <tr <?php if ( $key == 'order_total' ) echo 'class="order-total"'; ?>>
                <td><?php echo $total['label']; ?></td>
                <td><?php echo $total['value']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="full-margin">
        <h4><?php _e( 'Payment Method:', 'woocommerce' ); ?>:</h4>

        <?php if ( ! empty( $available_gateways ) ) {
            foreach ( $available_gateways as $gateway ) {
                wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
            }
        } ?>
    </div>

    <div class="full-width">
        <?php wp_nonce_field( 'woocommerce-pay' ); ?>

        <input type="hidden" name="woocommerce_pay" value="1" />
        <input type="submit" class="button alt" id="place_order" value="<?php echo esc_attr( $order_button_text ); ?>" data-value="<?php echo esc_attr( $order_button_text ); ?>" />
    </div>
</form>