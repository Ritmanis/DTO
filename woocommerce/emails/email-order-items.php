<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit;

foreach ( $items as $item_id => $item ) : ?>
    <tr class="order_item">
        <td class="td"><?php echo $item['name']; ?></td>
        <td class="td"><?php echo $item['qty']; ?></td>
        <td class="td td-price"><?php echo $order->get_formatted_line_subtotal( $item ); ?></td>
    </tr>
<?php endforeach;