<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( $order ) {
    if ( $order->has_status( 'failed' ) ) { ?>
        <div class="half-wrap half-wrap-center">
            <p class="woocommerce-info">
                <?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
            </p>

            <div class="full-width">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay">
                    <?php _e( 'Pay', 'woocommerce' ) ?>
                </a>

                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay button-multi">
                        <?php _e( 'My Account', 'woocommerce' ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="content-wrap">
            <p class="woocommerce-info">
                <?php printf( __( 'Order #%s', 'woocommerce' ), $order->get_order_number() ); ?>
            </p>

            <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id );
            do_action( 'woocommerce_thankyou', $order->id ); ?>
        </div>
    <?php }
} else { ?>
    <div class="half-wrap half-wrap-center">
        <p class="woocommerce-info">
            <?php _e( 'Thank you. Your order has been received.', 'woocommerce' ); ?>
        </p>
    </div>
<?php }