<?php
/**
 * The Header for our theme
 *
 * @package WordPress
 * @subpackage DTO
 * @since DTO 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'noscript' ); ?>>
	<header class="layout header full-width">
		<div class="top full-width">
			<div class="full-wrap">
				<div class="left-col left table">
					<div class="table-row">
						<a class="logo" href="/">
							<img class="left" width="80" height="80" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg">

							<?php if ( is_front_page() ) : ?>
								<h1><?php bloginfo( 'name' ); ?></h1>
							<?php else : ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
							<?php endif; ?>
						</a>
					</div>

					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => 'nav', 'container_class' => 'menu table-row', 'menu_class' => 'container' ) ); ?>
				</div>

				<div class="right-col right table">
					<?php get_template_part( 'part/header-contacts' ); get_template_part( 'part/woocommerce/header-auth' ); ?>
				</div>
			</div>
		</div>

		<div class="bottom full-width">
			<div class="bottom-wrap">
				<div class="full-width table">
					<?php get_product_search_form(); ?>

                    <div class="header-account">
                        <a class="header-icon" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>">
                            <?php get_template_part( 'part/svg/account' ); ?>
                        </a>
                    </div>

                    <?php get_template_part( 'part/woocommerce/header-cart' ); ?>
				</div>
			</div>
		</div>
	</header>