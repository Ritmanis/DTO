<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
<form name="checkout" method="post" class="form checkout woocommerce-checkout full-width" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <div class="content-left left">
        <h3><?php _e( 'Your order', 'woocommerce' ); ?></h3>

        <div id="order_review" class="full-width">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        </div>
    </div>

    <div class="content-right table-cell">
        <?php wc_print_notices( 'checkout' );

        do_action( 'woocommerce_checkout_billing' );

        do_action( 'woocommerce_checkout_shipping' ); ?>
    </div>
</form>