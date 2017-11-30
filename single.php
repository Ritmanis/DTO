<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage DTO
 * @since DTO 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

$latest = new WP_Query(
    array(
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => 3,
        'orderby'        => 'date'
    )
); ?>
    <div class="content table-row">
        <div class="content-table">
            <div class="full-wrap">
                <div class="content-table padding">
                    <div class="breadcrumbs full-width">
                        <?php woocommerce_breadcrumb(); ?>
                    </div>

                    <div class="content-body content-row table-row">
                        <div class="content-table">
                            <div class="content-left left">
                                <div class="latest-posts full-width">
                                    <?php while ( $latest->have_posts() ) : $latest->the_post(); ?>
                                        <a class="latest-post full-width" href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) {
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-thumbnail' ); ?>
                                                <div class="image-wrap full-width">
                                                    <div class="image" style="background-image: url( '<?php echo $image[0]; ?>' );">
                                                        <div class="background">
                                                            <?php the_post_thumbnail( 'blog-thumbnail' ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>

                            <article class="content-right table-cell">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <h1><?php the_title(); ?></h1>

                                    <p><?php echo get_the_date( get_option( 'date_format' ) ); ?></p>
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="post-image full-width">
                                            <?php the_post_thumbnail( 'blog-medium' ); ?>
                                        </div>
                                    <?php }

                                    the_content();

                                    $images = new Attachments( 'post_attachments' );

                                    while ( $images->get() ) { ?>
                                        <div class="post-image full-width">
                                            <?php echo $images->image( 'blog-medium' ); ?>
                                        </div>

                                        <?php echo $images->field( 'description' );
                                    } ?>
                                    <div class="social">
                                        <span class="label left"><?php _e( 'Padalīties', 'dto' ) ?>:</span>

                                        <div class="icons right">
                                            <a class="icon" href="http://www.draugiem.lv/say/ext/add.php?link=<?php the_permalink(); ?>&title=<?php the_title(); ?>&nopopup=1" target="_blank">
                                                <?php get_template_part( 'part/svg/social/draugiem' ); ?>
                                            </a>

                                            <a class="icon" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                                <?php get_template_part( 'part/svg/social/facebook' ); ?>
                                            </a>

                                            <a class="icon" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank">
                                                <?php get_template_part( 'part/svg/social/twitter' ); ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();