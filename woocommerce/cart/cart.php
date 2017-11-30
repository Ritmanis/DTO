<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="cart-wrap half-wrap">
    <?php wc_print_notices( 'cart' ); ?>

    <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" class="cart form full-width">
        <div class="cart-items full-width">
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                    $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : ''; ?>
                    <div class="cart-item full-width">
                        <div class="full-width table">
                            <?php $thumbnail = $_product->get_image();

                            if ( ! $product_permalink ) : ?>
                                <div class="thumbnail">
                                    <div class="container full-width">
                                        <?php echo $thumbnail; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <a class="thumbnail" href="<?php esc_url( $product_permalink ); ?>">
                                    <div class="container full-width">
                                        <?php echo $thumbnail; ?>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <div class="details table-cell">
                                <div class="product-title full-width" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
                                    <h3>
                                        <?php if ( ! $product_permalink ) {
                                            echo $_product->get_title();
                                        } else {
                                            echo sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() );
                                        } ?>
                                    </h3>

                                    <a href="<?php echo esc_url( WC()->cart->get_remove_url( $cart_item_key ) ); ?>"
                                       class="remove"
                                       data-product_id="<?php echo esc_attr( $product_id ); ?>"
                                       data-product_sku="<?php echo esc_attr( $_product->get_sku() ); ?>">
                                        <?php get_template_part( 'part/svg/delete' ); ?>
                                    </a>
                                </div>

                                <div class="full-width">
                            <span class="product-price left" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
                                <?php echo WC()->cart->get_product_price( $_product ); ?>
                            </span>

                                    <span class="times left">x</span>

                                    <div class="product-quantity left" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
                                        <?php if ( $_product->is_sold_individually() ) {
                                            echo sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            echo woocommerce_quantity_input( array(
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                'min_value'   => '1'
                                            ), $_product, false );
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>

        <?php wp_nonce_field( 'woocommerce-cart' ); ?>
    </form>

    <?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>