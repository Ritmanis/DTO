<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
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
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $product; ?>
<a rel="nofollow"
   href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
   data-quantity="1"
   data-product_id="<?php echo esc_attr( $product->id ); ?>"
   data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
   class="<?php echo isset( $class ) ? $class : 'button'; ?>">
    <img class="icon" width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/cart-empty.svg">
    <img class="icon" width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/cart-full.svg">
</a>