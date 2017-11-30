<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="content-wrap">
    <p class="woocommerce-info">
        <?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?>
    </p>

    <table class="table-content">
        <tr>
            <td><?php _e( 'Izveidots', 'dto' ); ?></td>
            <td><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></td>
        </tr>

        <tr>
            <td><?php _e( 'Status', 'woocommerce' ); ?></td>
            <td><?php echo wc_get_order_status_name( $order->get_status() ); ?></td>
        </tr>
    </table>

    <?php if ( $notes = $order->get_customer_order_notes() ) { ?>
        <h3><?php _e( 'Order Updates', 'woocommerce' ); ?></h3>

        <table class="table-content order-updates">
            <?php foreach ( $notes as $note ) : ?>
                <tr>
                    <td>
                        <?php echo date_i18n( __( 'j. F', 'woocommerce' ), strtotime( $note->comment_date ) ) .
                            '<br>' . date_i18n( __( 'H:i', 'woocommerce' ), strtotime( $note->comment_date ) ); ?>
                    </td>

                    <td><?php echo wptexturize( $note->comment_content ); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php }

    do_action( 'woocommerce_view_order', $order_id ); ?>
</div>