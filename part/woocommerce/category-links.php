<?php if ( ! defined( 'ABSPATH' ) ) exit;

$terms = get_terms( 'product_cat', array( 'hide_empty' => false ) );

if ( $terms ) : ?>
    <div class="category-links full-width">
        <div class="full-wrap">
            <div class="category-wrap full-width">
                <div class="toggle full-width">
                    <a class="category category-toggle inline-block" href="#">
                        <div class="full-width"><?php get_template_part( 'part/svg/categories/citi' ); ?></div>
                        <div class="full-width"><h4 class="inline-block"><?php _e( "Produktu kategorijas", 'dto' ); ?></h4></div>
                    </a>
                </div>
                <div class="categories full-width">
                    <?php foreach ( $terms as $term ) : ?>
                        <a class="category inline-block" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                            <div class="full-width"><?php get_template_part( 'part/svg/categories/' . $term->slug ); ?></div>
                            <div class="full-width"><h4 class="inline-block"><?php echo $term->name; ?></h4></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;