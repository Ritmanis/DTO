<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage DTO
 * @since DTO 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
    <div class="content table-row">
        <div class="full-wrap">
            <div class="breadcrumbs full-width">
                <?php woocommerce_breadcrumb(); ?>
            </div>

            <div class="content-body full-width">
                <div class="half-wrap half-wrap-center">
                    <p class="woocommerce-info"><?php _e( 'Lapa nav atrasta.', 'dto' ) ?></p>

                    <p>
                        <?php _e( 'Lapa, kurai mēģinājāt piekļūt, nav atrasta.', 'dto' ) ?><br>
                        <?php _e( 'Pārbaudiet, vai saite uz lapu tika ievadīta pareizi un mēģiniet vēlreiz.', 'dto' ) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();