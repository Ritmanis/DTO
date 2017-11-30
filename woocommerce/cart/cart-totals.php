<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
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
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="cart-totals full-width">
    <table class="table-content">
        <tr>
            <td><?php _e( 'Total', 'woocommerce' ); ?></td>

            <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                <?php wc_cart_totals_order_total_html(); ?>
            </td>
        </tr>
    </table>

    <div class="full-width">
        <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
    </div>
</div>