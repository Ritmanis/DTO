<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
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
                <?php while ( have_posts() ) {
                    the_post(); ?>
                    <article class="article full-width">
                        <div class="left-col left">
                            <a class="image-wrap full-width" href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) {
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-medium' ); ?>
                                    <div class="image" style="background-image: url( '<?php echo $image[0]; ?>' );">
                                        <div class="background">
                                            <?php the_post_thumbnail( 'blog-medium' ); ?>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="image" style="background-image: url( '<?php echo get_template_directory_uri(); ?>/img/placeholder-blog.png' );">
                                        <div class="background">
                                            <img width="1120" height="672" src="<?php echo get_template_directory_uri(); ?>/img/placeholder-blog.png">
                                        </div>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>

                        <div class="right-col right">
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <p><?php echo get_the_date( get_option( 'date_format' ) ); ?></p>
                            <?php bold_excerpt(); ?>
                        </div>
                    </article>
                <?php }

                woocommerce_pagination(); ?>
            </div>
        </div>
    </div>
<?php get_footer();