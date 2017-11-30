<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="content-wrap">
    <?php if ( $has_orders ) { ?>
        <table class="orders full-width">
            <thead>
                <tr>
                    <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                        <th class="<?php echo esc_attr( $column_id ); ?>"><?php echo esc_html( $column_name ); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ( $customer_orders->orders as $customer_order ) : $order = wc_get_order( $customer_order ); ?>
                    <tr>
                        <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                            <td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
                                <?php if ( 'order-number' === $column_id ) { ?>
                                    <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                        <?php echo '#' . $order->get_order_number(); ?>
                                    </a>
                                <?php } elseif ( 'order-date' === $column_id ) { ?>
                                    <time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>">
                                        <?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?>
                                    </time>

                                    <time class="short" datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>">
                                        <?php echo date_i18n( 'd.m.Y', strtotime( $order->order_date ) ); ?>
                                    </time>
                                <?php } elseif ( 'order-status' === $column_id ) {
                                    echo wc_get_order_status_name( $order->get_status() );
                                } elseif ( 'order-total' === $column_id ) {
                                    echo $order->get_formatted_order_total();
                                } elseif ( 'order-actions' === $column_id ) {
                                    $actions = array(
                                        'pay'    => array(
                                            'url'  => $order->get_checkout_payment_url(),
                                            'name' => __( 'Pay', 'woocommerce' )
                                        ),
                                        'cancel' => array(
                                            'url'  => $order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ),
                                            'name' => __( 'Cancel', 'woocommerce' )
                                        ),
                                        'view'   => array(
                                            'url'  => $order->get_view_order_url(),
                                            'name' => __( 'View', 'woocommerce' )
                                        )
                                    );

                                    if ( ! $order->needs_payment() ) {
                                        unset( $actions['pay'] );
                                    }

                                    if ( ! in_array( $order->get_status(), array( 'pending', 'failed' ) ) ) {
                                        unset( $actions['cancel'] );
                                    }

                                    foreach ( $actions as $key => $action ) {
                                        echo '<a href="' . esc_url( $action['url'] ) . '" class="' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                                    }
                                } ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ( 1 < $customer_orders->max_num_pages ) { ?>
            <div class="pagenav full-width">
                <?php if ( 1 !== $current_page ) { ?>
                    <a class="left" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>">
                        <?php _e( 'Previous', 'woocommerce' ); ?>
                    </a>
                <?php }

                if ( $current_page !== intval( $customer_orders->max_num_pages ) ) { ?>
                    <a class="left" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>">
                        <?php _e( 'Next', 'woocommerce' ); ?>
                    </a>
                <?php } ?>
            </div>
        <?php }
    } else { ?>
        <p class="woocommerce-info"><?php _e( 'No order has been made yet.', 'woocommerce' ); ?></p>
    <?php } ?>
</div>