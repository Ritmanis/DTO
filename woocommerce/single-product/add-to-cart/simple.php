<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $product;

if ( ! $product->is_purchasable() ) {
    return;
}

if ( $product->is_in_stock() ) : ?>
    <div class="summary-row full-width">
        <form class="form left" method="post" enctype='multipart/form-data'>
            <?php if ( ! $product->is_sold_individually() ) {
                woocommerce_quantity_input( array(
                    'min_value'   => 1,
                    'max_value'   => $product->backorders_allowed() ? '' : $product->get_stock_quantity(),
                    'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
                ) );
            } ?>

            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
            <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        </form>
    </div>
<?php endif;