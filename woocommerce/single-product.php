<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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

get_header(); ?>
    <div class="content table-row">
        <div class="full-wrap">
            <div class="breadcrumbs full-width">
                <?php woocommerce_breadcrumb(); ?>
            </div>

            <?php wc_print_notices( 'product' ); ?>
        </div>

        <div class="single-wrap">
            <?php while ( have_posts() ) {
                the_post();
                wc_get_template_part( 'content', 'single-product' );
            } ?>
        </div>
    </div>
<?php get_footer();