<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="half-wrap">
    <?php wc_print_notices( 'password' ); ?>

    <form id="reset_password" class="form form-validate lost_reset_password full-width" method="post">
        <p><?php echo __( 'Enter a new password below.', 'woocommerce' ); ?></p>

        <div class="form-row form-row-full">
            <input type="password" class="input-text" name="password_1" id="password_1" placeholder="<?php _e( 'New password', 'woocommerce' ); ?> *" />
        </div>

        <div class="form-row form-row-full">
            <div class="change-password full-width">
                <input type="password" class="input-text" name="password_2" id="password_2" placeholder="<?php _e( 'Re-enter new password', 'woocommerce' ); ?> *" />
            </div>
        </div>

        <div class="full-margin">
            <?php wp_nonce_field( 'reset_password' ); ?>

            <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
            <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />
            <input type="hidden" name="wc_reset_password" value="true" />
            <input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>" />
        </div>
    </form>
</div>