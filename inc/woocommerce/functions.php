<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Check whether WooCommerce is activated

function is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

// Output cart product and price total

function bold_cart_totals() { ?>
    <div class="cart-contents right">
        <span class="total"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?> </span>
        <span><?php echo wp_kses_data( _n( 'prece', 'preces', WC()->cart->get_cart_contents_count(), 'dto' ) ); ?></span>
        <span class="slash">/</span>
        <span><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
    </div>
<?php }

// Generate custom URL if product removed from mini cart

function bold_get_remove_url( $cart_item_key ) {
    $cart_page_url = wc_get_page_permalink( 'cart' );

    return $cart_page_url ? wp_nonce_url( add_query_arg( 'remove_product', $cart_item_key, $cart_page_url ), 'woocommerce-cart' ) : '';
}