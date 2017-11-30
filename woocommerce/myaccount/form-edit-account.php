<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
<form id="edit_account"  class="form form-validate edit-account full-width" method="post">
    <div class="form-row">
        <input type="text" class="input-text" name="account_first_name" id="account_first_name" placeholder="<?php _e( 'First name', 'woocommerce' ); ?> *" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
    </div>

    <div class="form-row">
        <input type="text" class="input-text" name="account_last_name" id="account_last_name" placeholder="<?php _e( 'Last name', 'woocommerce' ); ?> *" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
    </div>

    <div class="form-row">
        <input type="email" class="input-text" name="account_email" id="account_email" placeholder="<?php _e( 'Email Address', 'woocommerce' ); ?> *" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
    </div>

    <div class="full-margin"></div>

    <fieldset class="change-password full-width">
        <div class="content-wrap">
            <legend><?php _e( 'Password Change', 'woocommerce' ); ?> <span><?php _e( '(atstājiet tukšu, ja nevēlaties mainīt)', 'dto' ); ?></span></legend>
        </div>

        <div class="form-row">
            <input type="password" class="input-text" name="password_current" id="password_current" placeholder="<?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?>" />
        </div>

        <div class="form-row">
            <input type="password" class="input-text" name="password_1" id="password_1" placeholder="<?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?>" />
        </div>

        <div class="form-row">
            <input type="password" class="input-text" name="password_2" id="password_2" placeholder="<?php _e( 'Confirm New Password', 'woocommerce' ); ?>" />
        </div>
    </fieldset>

    <div class="full-margin"></div>

    <div class="content-wrap">
        <?php wp_nonce_field( 'save_account_details' ); ?>

        <input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
        <input type="hidden" name="action" value="save_account_details" />
    </div>
</form>