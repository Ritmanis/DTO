<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! empty( $breadcrumb ) ) {
    echo $wrap_before;

    foreach ( $breadcrumb as $key => $crumb ) {
        if ( sizeof( $breadcrumb ) !== $key + 1 ) {
            echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a><span class="delimiter">' . $delimiter . '</span>';
        } elseif ( ! ( is_single() || ( is_page() && ! ( is_cart() || is_checkout() || is_account_page() || is_page_template( 'contacts.php' ) ) ) ) ) {
            echo '<h1>' . esc_html( $crumb[0] ) . '</h1>';
        } else {
            echo '<strong>' . esc_html( $crumb[0] ) . '</strong>';
        }
    }

    echo $wrap_after;
}
