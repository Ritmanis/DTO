<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
    <?php wc_print_notices( 'login' ); ?>

    <form id="login" class="form form-validate full-width" method="post">
        <div class="form-row form-row-full">
            <input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="<?php _e( 'Username or email address', 'woocommerce' ); ?> *" />
        </div>

        <div class="form-row form-row-full">
            <input class="input-text" type="password" name="password" id="password" placeholder="<?php _e( 'Password', 'woocommerce' ); ?> *" />
        </div>

        <div class="full-margin">
            <label for="rememberme" class="rememberme left">
                <input class="checkboxradio" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
            </label>
        </div>

        <div class="full-margin">
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

            <input type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
            <input type="hidden" name="action" value="login" />
        </div>

        <div class="full-margin">
            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
        </div>
    </form>
</div>