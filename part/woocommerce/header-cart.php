<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="header-cart">
    <a class="header-icon" href="#">
        <?php get_template_part( 'part/svg/cart' ); ?>
    </a>

    <div class="wrap">
        <a class="link full-width" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>">
            <span><?php _e( 'Cart', 'woocommerce' ); ?></span>
            <span class="caret">&#9660;</span>
            <?php bold_cart_totals(); ?>
        </a>
        <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
    </div>
</div>