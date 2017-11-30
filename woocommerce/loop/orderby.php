<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$active = isset( $_GET['orderby'] ) ? $_GET['orderby'] : '';
$count  = 0; ?>
<div class="orderby right table">
    <?php foreach ( $catalog_orderby_options as $id => $name ) {
        $count++; ?>
        <a <?php if ( $id == $active ) echo 'class="active"'; ?> href="#" data-id="<?php echo esc_attr( $id ); ?>">
            <?php echo esc_html( $name ); ?>
        </a>

        <?php if ( sizeof( $catalog_orderby_options ) !== $count ) { ?>
            <span class="delimiter">&nbsp;/&nbsp;</span>
        <?php }
    } ?>
</div>