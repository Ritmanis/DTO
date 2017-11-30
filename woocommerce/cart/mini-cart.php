<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! WC()->cart->is_empty() ) : ?>
    <div class="cart-products-wrap full-width">
        <div class="cart-products full-width">
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
                    $product_name      = $_product->get_title();
                    $thumbnail         = $_product->get_image();
                    $product_price     = WC()->cart->get_product_price( $_product );
                    $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : ''; ?>
                    <div class="item full-width">
                        <div class="item-row full-width">
                            <?php if ( ! $_product->is_visible() ) : ?>
                                <div class="image">
                                    <div class="container">
                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                    </div>
                                </div>

                                <span class="title full-width">
                                <?php echo $product_name; ?>
                            </span>
                            <?php else : ?>
                                <a class="image" href="<?php echo esc_url( $product_permalink ); ?>">
                                    <div class="container">
                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                    </div>
                                </a>

                                <a class="full-width" href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $product_name; ?>
                                </a>
                            <?php endif; ?>

                            <span class="quantity full-width"><?php echo $cart_item['quantity']; ?> x <?php echo $product_price; ?></span>

                            <a href="<?php echo esc_url( bold_get_remove_url( $cart_item_key ) ); ?>"
                               class="remove"
                               data-product_id="<?php echo esc_attr( $product_id ); ?>"
                               data-product_sku="<?php echo esc_attr( $_product->get_sku() ); ?>">
                                <?php get_template_part( 'part/svg/delete' ); ?>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="buttons full-width">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="left"><?php _e( 'View Cart', 'woocommerce' ); ?></a>
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
    </div>
<?php endif;