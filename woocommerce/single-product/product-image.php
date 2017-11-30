<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post, $product; ?>
<div class="images full-width">
    <?php if ( has_post_thumbnail() ) {
        $attachment_count = count( $product->get_gallery_attachment_ids() );
        $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
        $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post ); ?>
        <a href="<?php echo esc_url( $props['url'] ); ?>"
           itemprop="image"
           class="image full-width zoom"
           title="<?php echo esc_attr( $props['caption'] ); ?>"
           rel="group">
            <?php echo get_the_post_thumbnail( $post->ID, 'shop_single', array( 'alt' => $props['alt'] ) ); ?>
        </a>
    <?php } else { ?>
        <div class="image">
            <img src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php echo __( 'Placeholder', 'woocommerce' ); ?>" />
        </div>
    <?php }

    do_action( 'woocommerce_product_thumbnails' ); ?>
</div>