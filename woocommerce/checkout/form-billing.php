<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit;

wc_get_template( 'checkout/form-login.php' ); ?>
<div class="content-wrap">
    <h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>
</div>

<?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) {
    woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
}

if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>
    <div class="register-wrap full-width">
        <?php if ( $checkout->enable_guest_checkout ) { ?>
            <div class="content-wrap">
                <label for="createaccount" class="checkboxradio-label left">
                    <input class="checkboxradio" name="createaccount" type="checkbox" id="createaccount" value="1" /> <?php _e( 'Create an account?', 'woocommerce' ); ?>
                </label>
            </div>
        <?php }

        if ( ! empty( $checkout->checkout_fields['account'] ) ) { ?>
            <div class="create-account full-width">
                <?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) {
                    woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                } ?>
            </div>
        <?php } ?>
    </div>
<?php endif;