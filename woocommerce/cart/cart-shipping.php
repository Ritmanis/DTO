<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
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
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<h4><?php echo wp_kses_post( $package_name ); ?>:</h4>

<?php if ( 1 < count( $available_methods ) ) {
    foreach ( $available_methods as $method ) { ?>
        <div class="full-width">
            <label for="shipping_method_<?php echo $index; ?>_<?php echo sanitize_title( $method->id ); ?>">
                <input type="radio"
                       name="shipping_method[<?php echo $index; ?>]"
                       data-index="<?php echo $index; ?>"
                       id="shipping_method_<?php echo $index; ?>_<?php echo sanitize_title( $method->id ); ?>"
                       value="<?php echo esc_attr( $method->id ); ?>"
                       class="checkboxradio"
                    <?php echo checked( $method->id, $chosen_method, false ); ?> />

                <?php echo wc_cart_totals_shipping_method_label( $method ); ?>
            </label>
        </div>
    <?php }
} elseif ( 1 === count( $available_methods ) ) {
    $method = current( $available_methods ); ?>
    <input type="hidden"
           name="shipping_method[<?php echo $index; ?>]"
           data-index="<?php echo $index; ?>"
           id="shipping_method_<?php echo $index; ?>"
           value="<?php echo esc_attr( $method->id ); ?>"
           class="shipping_method" />

    <div class="full-margin">
        <?php echo wc_cart_totals_shipping_method_label( $method ); ?>
    </div>
<?php } ?>