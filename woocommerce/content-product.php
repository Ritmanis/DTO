<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
} ?>
<div <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>" class="link full-width">
        <div class="image full-width"><?php echo woocommerce_get_product_thumbnail(); ?></div>
        <div class="title full-width"><h3><?php the_title(); ?></h3></div>
    </a>

    <div class="full-width"><?php woocommerce_template_loop_price(); woocommerce_template_loop_add_to_cart(); ?></div>
</div>