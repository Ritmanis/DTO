<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $product; ?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="left-col left">
        <?php woocommerce_show_product_images(); ?>
    </div>

    <div class="right-col right">
        <?php woocommerce_template_single_title();
        woocommerce_template_single_price();
        woocommerce_simple_add_to_cart();
        the_content();
        $product->list_attributes(); ?>
    </div>

    <meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>