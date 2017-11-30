<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<h3><?php _e( 'Customer Details', 'woocommerce' ); ?></h3>

<table class="table-content">
    <?php if ( $order->customer_note ) : ?>
        <tr>
            <td><?php _e( 'Note:', 'woocommerce' ); ?></td>
            <td><?php echo wptexturize( $order->customer_note ); ?></td>
        </tr>
    <?php endif; ?>

    <?php if ( $order->billing_email ) : ?>
        <tr>
            <td><?php _e( 'Email:', 'woocommerce' ); ?></td>
            <td><?php echo esc_html( $order->billing_email ); ?></td>
        </tr>
    <?php endif; ?>

    <?php if ( $order->billing_phone ) : ?>
        <tr>
            <td><?php _e( 'Telephone:', 'woocommerce' ); ?></td>
            <td><?php echo esc_html( $order->billing_phone ); ?></td>
        </tr>
    <?php endif; ?>

    <tr>
        <td><?php _e( 'Address', 'woocommerce' ); ?></td>
        <td><?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?></td>
    </tr>
</table>
