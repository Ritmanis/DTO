<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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

    <form id="lost_password" class="form form-validate full-width" method="post">
        <p><?php echo __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ); ?></p>

        <div class="form-row form-row-full">
            <input class="input-text" type="text" name="user_login" id="user_login" placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?> *" />
        </div>

        <div class="full-margin">
            <?php wp_nonce_field( 'lost_password' ); ?>

            <input type="hidden" name="wc_reset_password" value="true" />
            <input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset Password', 'woocommerce' ); ?>" />
        </div>
    </form>
</div>