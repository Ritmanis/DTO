<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
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
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="header-search table-cell">
    <a class="header-icon" href="#">
        <?php get_template_part( 'part/svg/search' ); ?>
    </a>

    <form class="form full-width" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
        <input type="search" id="woocommerce-product-search-field" class="input-text" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <input type="hidden" name="post_type" value="product" />
    </form>
</div>