<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
                <div class="content-table">
                    <?php if ( ! ( is_account_page() || is_cart() || is_checkout() )  ) { ?>
                        <div class="content-left left">
                            <?php wp_nav_menu( array(
                                'theme_location'  => 'page-menu',
                                'container'       => 'nav',
                                'container_class' => 'page-menu full-width',
                                'menu_class'      => 'container'
                            ) ); ?>
                        </div>

                        <div class="content-right table-cell">
                            <?php while ( have_posts() ) {
                                the_post();

                                the_title( '<h1>', '</h1>' );
                                the_content();
                            } ?>
                        </div>
                    <?php } else {
                        while ( have_posts() ) {
                            the_post();
                            the_content();
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();