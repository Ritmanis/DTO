<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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

global $post, $product;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) : ?>
    <div class="thumbnails full-width">
        <?php foreach ( $attachment_ids as $attachment_id ) {
            $props = wc_get_product_attachment_props( $attachment_id, $post );

            if ( ! $props['url'] ) continue; ?>
            <a href="<?php echo esc_url( $props['url'] ); ?>"
               class="thumbnail zoom"
               title="<?php echo esc_attr( $props['caption'] ); ?>"
               rel="group">
                <div class="container full-width">
                    <?php echo wp_get_attachment_image( $attachment_id, 'shop_thumbnail', 0, $props ); ?>
                </div>
            </a>
        <?php } ?>
    </div>
<?php endif;