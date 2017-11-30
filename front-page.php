<?php
/**
 * The template for displaying the front page
 *
 * @package WordPress
 * @subpackage DTO
 * @since DTO 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
get_template_part( 'part/header-slider' );
get_template_part( 'part/woocommerce/category-links' ); ?>
    <div class="content table-row">
        <div class="archive-wrap">
            <div class="featured-products full-width">
                <?php echo do_shortcode( '[featured_products per_page="4" columns="4"]' ); ?>
            </div>
        </div>
    </div>
<?php get_footer();