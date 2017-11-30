<?php
/**
 * Template Name: Kontakti
 *
 * @package WordPress
 * @subpackage Bold
 * @since Bold 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
    <div class="content table-row">
        <div class="content-table">
            <div class="full-wrap">
                <div class="content-table padding">
                    <div class="breadcrumbs full-width">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>

                    <div class="content-body content-row table-row">
                        <div class="content-table">
                            <?php while ( have_posts() ) {
                                the_post(); ?>
                                <article class="content-left left"><?php the_content(); ?></article>

                                <?php if ( get_theme_mod( 'contacts_coordinates' ) ) { ?>
                                    <div id="map" class="content-right table-cell"></div>

                                    <?php bold_google_maps();
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();