<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
get_template_part( 'part/woocommerce/category-links' );

global $wp_query;
$category = get_queried_object();

$hide_filters = is_search() && $wp_query->found_posts < 2 || is_product_category() && $category->count < 2; ?>
    <div class="content table-row">
        <div class="full-wrap">
            <div class="breadcrumbs full-width table">
                <?php woocommerce_breadcrumb(); if ( ! $hide_filters ) woocommerce_catalog_ordering(); ?>
            </div>
        </div>

        <div class="archive-wrap">
            <div class="content-body full-width table">
                <?php if ( ! $hide_filters ) dynamic_sidebar( 'sidebar' ); ?>
                <div class="archive-products table-cell <?php if ( $hide_filters ) echo 'columns-4'; ?>">
                    <?php if ( have_posts() ) {
                        woocommerce_product_loop_start();

                        while ( have_posts() ) {
                            the_post();
                            wc_get_template_part( 'content', 'product' );
                        }

                        woocommerce_product_loop_end();
                        woocommerce_pagination();
                    } else {
                        woocommerce_product_loop_start();
                        wc_get_template( 'loop/no-products-found.php' );
                        woocommerce_product_loop_end();
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
