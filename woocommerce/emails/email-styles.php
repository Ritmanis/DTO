<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates/Emails
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$bg        = get_option( 'woocommerce_email_background_color' );
$base      = get_option( 'woocommerce_email_base_color' );
$text      = get_option( 'woocommerce_email_text_color' );
$base_text = wc_light_or_dark( $base, '#202020', '#ffffff' );
$body      = get_option( 'woocommerce_email_body_background_color' ); ?>
    #wrapper {
    width: 100%;
    margin: 0;
    padding: 64px 0;
    background-color: <?php echo esc_attr( $bg ); ?>;
    -webkit-text-size-adjust: none !important;
    }

    #template_header {
    border-bottom: 0;
    background-color: <?php echo esc_attr( $base ); ?>;
    }

    #header_wrapper {
    padding: 18px 48px;
    display: block;
    }

    #template_header a {
    display: block;
    }

    img {
    width: 60px;
    height: 60px;
    margin: 0 32px 0 0;
    border: none;
    border-color: <?php echo esc_attr( $base ); ?>;
    outline: none;
    display: inline;
    vertical-align: middle;
    color: <?php echo esc_attr( $base ); ?>;
    text-decoration: none;
    }

    h1, h2, h3, #body_content_inner {
    font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
    font-size: 17px;
    font-weight: normal;
    line-height: 32px;
    color: <?php echo esc_attr( $text ); ?>;
    }

    h1 {
    margin: 0;
    display: inline;
    vertical-align: middle;
    color: <?php echo esc_attr( $base_text ); ?>;
    text-transform: uppercase;
    }

    h2, h3 {
    margin: 32px 0 16px 0;
    display: block;
    font-weight: bold;
    }

    p {
    margin: 0 0 16px 0;
    }

    a {
    font-weight: normal;
    color: #ff7919 !important;
    text-decoration: none;
    }

    #template_subject {
    border-bottom: 0;
    background-color: #2e3133;
    }

    #subject_wrapper {
    padding: 16px 48px;
    display: block;
    }

    #template_subject h2 {
    margin: 0;
    font-weight: normal;
    color: <?php echo esc_attr( $base_text ); ?>;
    }

    #body_content {
    background-color: <?php echo esc_attr( $body ); ?>;
    }

    #body_content table td {
    padding: 48px 48px 32px;
    }

    #body_content table table {
    width: 100%;
    border: 1px solid <?php echo esc_attr( $bg ); ?>;
    }

    #body_content table td th,
    #body_content table td td {
    padding: 0 10px;
    border: 1px solid <?php echo esc_attr( $bg ); ?>;
    font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
    font-size: 17px;
    line-height: 32px;
    text-align: left;
    }

    #body_content table td td.td-first {
    font-weight: bold;
    }

    #body_content table td th.td-price,
    #body_content table td td.td-price {
    text-align: right;
    }
<?php