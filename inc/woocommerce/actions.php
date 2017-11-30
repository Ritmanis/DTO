<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Enqueue WooCommerce specific scripts

function bold_enqueue_woocommerce_scripts() {
    // Deregister default WooCommerce styles and scripts

    wp_deregister_style( 'select2' );
    wp_deregister_style( 'woocommerce_prettyPhoto_css' );

    wp_deregister_script( 'jquery-blockui' );
    wp_deregister_script( 'jquery-payment' );
    wp_deregister_script( 'jquery-ui' );
    wp_deregister_script( 'prettyPhoto' );
    wp_deregister_script( 'prettyPhoto-init' );
    wp_deregister_script( 'select2' );
    wp_deregister_script( 'wc-add-payment-method' );
    wp_deregister_script( 'wc-add-to-cart' );
    wp_deregister_script( 'wc-add-to-cart-variation' );
    wp_deregister_script( 'wc-address-i18n' );
    wp_deregister_script( 'wc-cart' );
    wp_deregister_script( 'wc-cart-fragments' );
    wp_deregister_script( 'wc-checkout' );
    wp_deregister_script( 'wc-country-select' );
    wp_deregister_script( 'wc-credit-cart-form' );
    wp_deregister_script( 'wc-geolocation' );
    wp_deregister_script( 'wc-lost-password' );
    wp_deregister_script( 'wc-password-strength-meter' );
    wp_deregister_script( 'wc-price-slider' );
    wp_deregister_script( 'wc-single-product' );
    wp_deregister_script( 'woocommerce' );

    wp_enqueue_script( 'wc-cart-fragments', get_template_directory_uri() . '/js/woocommerce/cart-fragments.min.js', array( 'jquery', 'jquery-cookie' ) );

    // Enqueue new DTO scripts

    if ( is_woocommerce() || is_cart() || is_checkout() || ( is_account_page() && ! is_user_logged_in() ) || is_wc_endpoint_url( 'edit-address' ) || is_wc_endpoint_url( 'edit-account' ) ) {
        wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ) );
    }

    if ( is_front_page() || is_shop() || is_product_category() ) {
        wp_enqueue_script( 'wc-add-to-cart', get_template_directory_uri() . '/js/woocommerce/add-to-cart.min.js', array( 'jquery', 'wc-cart-fragments' ) );
    }

    if ( is_product() ) {
        wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.min.css' );

        wp_enqueue_script( 'wc-single-product', get_template_directory_uri() . '/js/woocommerce/single-product.min.js', array( 'jquery', 'jquery-ui', 'wc-cart-fragments' ) );
        wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/woocommerce/fancybox.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'fancybox-init', get_template_directory_uri() . '/js/woocommerce/fancybox.init.min.js', array( 'jquery', 'fancybox' ) );
    }

    if ( is_cart() ) {
        wp_enqueue_script( 'wc-cart', get_template_directory_uri() . '/js/woocommerce/cart.min.js', array( 'jquery', 'jquery-ui', 'wc-cart-fragments' ) );
    }

    if ( ( is_checkout() && ! is_user_logged_in() ) || is_wc_endpoint_url( 'lost-password' ) || is_wc_endpoint_url( 'edit-account' ) ) {
        wp_enqueue_script( 'wc-password-strength-meter', get_template_directory_uri() . '/js/woocommerce/password-strength-meter.min.js', array( 'jquery', 'password-strength-meter' ) );
    }

    if ( is_checkout() ) {
        wp_enqueue_script( 'wc-checkout', get_template_directory_uri() . '/js/woocommerce/checkout.min.js', array( 'jquery', 'jquery-ui' ) );
    }

    if ( ( is_account_page() && ! is_user_logged_in() ) || is_wc_endpoint_url( 'edit-address' ) || is_wc_endpoint_url( 'edit-account' ) ) {
        wp_enqueue_script( 'form', get_template_directory_uri() . '/js/woocommerce/form.min.js', array( 'jquery', 'jquery-ui' ) );
    }
}

add_action( 'wp_enqueue_scripts', 'bold_enqueue_woocommerce_scripts' );