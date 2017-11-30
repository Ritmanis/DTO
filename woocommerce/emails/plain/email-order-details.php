<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

echo sprintf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ) . "\n";

echo "\n" . $order->email_order_items_table( array(
    'plain_text'  => true
) );

echo "==========\n\n";

if ( $totals = $order->get_order_item_totals() ) {
    foreach ( $totals as $total ) {
        echo $total['label'] . "\t " . $total['value'] . "\n";
    }
}

do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email );