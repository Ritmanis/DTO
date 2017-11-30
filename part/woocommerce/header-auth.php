<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="header-auth table-row">
    <?php if ( is_user_logged_in() ) : ?>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
            <?php echo esc_html( wp_get_current_user()->display_name ); ?>
        </a>
        <span class="slash">/</span>
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>">
            <?php _e( 'Logout', 'woocommerce' ); ?>
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
            <?php _e( 'Login', 'woocommerce' ); ?>
        </a>
    <?php endif; ?>
</div>