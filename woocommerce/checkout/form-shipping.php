<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="content-wrap">
    <h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>
</div>

<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) {
    woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
} ?>