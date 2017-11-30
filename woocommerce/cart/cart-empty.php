<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="cart-wrap half-wrap half-wrap-center cart-empty">
    <?php wc_print_notices( 'cart' ); ?>

    <p class="woocommerce-info">
        <?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?>
    </p>

    <div class="full-width">
        <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
            <?php _e( 'Return To Shop', 'woocommerce' ) ?>
        </a>
    </div>
</div>