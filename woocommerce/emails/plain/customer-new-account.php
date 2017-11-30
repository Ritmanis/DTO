<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/plain/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails/Plain
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

echo "= " . $email_heading . " =\n\n";

echo sprintf( __( "Thanks for creating an account on %s. Your username is <strong>%s</strong>", 'woocommerce' ), $blogname, $user_login ) . "\n\n";

echo __( 'Sekojiet saitei, lai piekļūtu savam kontam:', 'dto' ) . "\n";

echo wc_get_page_permalink( 'myaccount' );