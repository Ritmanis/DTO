<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$order = wc_get_order( $order_id );

$show_purchase_note    = $order->has_status( array( 'completed', 'processing' ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id(); ?>
<h3><?php _e( 'Order Details', 'woocommerce' ); ?></h3>

<div class="full-margin">
    <?php foreach( $order->get_items() as $item_id => $item ) {
        $product = $order->get_product_from_item( $item );

        wc_get_template( 'order/order-details-item.php', array(
            'order'   => $order,
            'item'    => $item,
            'product' => $product,
        ));
    } ?>
</div>

<table class="table-content">
    <?php foreach ( $order->get_order_item_totals() as $key => $total ) : ?>
        <tr <?php if ( $key == 'order_total' ) echo 'class="order-total"'; ?>>
            <td><?php echo $total['label']; ?></td>
            <td><?php echo $total['value']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php do_action( 'woocommerce_order_details_after_order_table', $order );

if ( $show_customer_details ) {
    wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) );
}