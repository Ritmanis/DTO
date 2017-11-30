<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Enqueue styles and scripts

function bold_enqueue_scripts() {
    wp_deregister_script( 'jquery' );
    wp_deregister_script( 'wp-embed' );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&subset=latin-ext' );

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js' );
	wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.min.js' );

	if ( is_front_page() ) {
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl-carousel.min.css' );

		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel.min.js' );
		wp_enqueue_script( 'owl-carousel-init', get_template_directory_uri() . '/js/owl-carousel.init.min.js' );
	}

	if ( is_page_template( 'contacts.php' ) && get_theme_mod( 'contacts_coordinates' ) ) {
		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCP3BW6SyiBVkva2Xm_CRomYWpgR-Xm4Oc&callback=initMap', array(), '1.0.0', true );
	}
}

if ( ! is_admin() ) add_action( 'wp_enqueue_scripts', 'bold_enqueue_scripts' );

// Remove WordPress generator tags

function remove_wp_generator() {
    remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'get_header', 'remove_wp_generator' );

// Disable WordPress emojicons

function bold_disable_emojicons() {
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    add_filter( 'emoji_svg_url', '__return_false' );
    add_filter( 'tiny_mce_plugins', 'bold_disable_emojicons_tinymce' );
}

function bold_disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

add_action( 'init', 'bold_disable_emojicons' );

// Register wp_nav_menu

function bold_register_menus() {
	register_nav_menus(
		array(
			'main-menu'   => __( 'Galvenā izvēlne' ),
			'page-menu' => __( 'Lapu izvēlne' )
		)
	);
}

add_action( 'init', 'bold_register_menus' );

// Add new image sizes

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'blog-medium', 1120, 640, true );
	add_image_size( 'blog-thumbnail', 528, 317, true );
}

// Disable default image links

function bold_remove_image_links() {
	$image_set = get_option( 'image_default_link_type' );

	if ( $image_set !== 'none' ) update_option( 'image_default_link_type', 'none' );
}

add_action( 'admin_init', 'bold_remove_image_links', 10 );

// Add support for Attachments plugin

function slider_attachments( $attachments ) {
	$fields = array(
		array(
			'name' 	=> 'title',
			'type' 	=> 'text',
			'label' => __( 'Virsraksts', 'attachments' )
		),
		array(
			'name' 	=> 'link',
			'type' 	=> 'text',
			'label' => __( 'Saite', 'attachments' )
		),
        array(
            'name' 	=> 'description',
            'type' 	=> 'textarea',
            'label' => __( 'Apraksts', 'attachments' )
        )
	);

	$args = array(
		'label' 	  => 'Attēli',
		'post_type'   => 'page',
		'position' 	  => 'normal',
		'priority' 	  => 'high',
		'filetype' 	  => array( 'image' ),
		'append' 	  => true,
		'button_text' => __( 'Pievienot', 'attachments' ),
		'modal_text'  => __( 'Pievienot', 'attachments' ),
		'router' 	  => 'browse',
		'post_parent' => false,
		'fields' 	  => $fields
	);

	$attachments->register( 'slider_attachments', $args );
}

add_action( 'attachments_register', 'slider_attachments' );

function post_attachments( $attachments ) {
    $fields = array(
        array(
            'name' 	=> 'description',
            'type' 	=> 'wysiwyg',
            'label' => __( 'Apraksts', 'attachments' )
        )
    );

    $args = array(
        'label' 	  => 'Attēli',
        'post_type'   => 'post',
        'position' 	  => 'normal',
        'priority' 	  => 'high',
        'filetype' 	  => array( 'image' ),
        'append' 	  => true,
        'button_text' => __( 'Pievienot', 'attachments' ),
        'modal_text'  => __( 'Pievienot', 'attachments' ),
        'router' 	  => 'browse',
        'post_parent' => false,
        'fields' 	  => $fields
    );

    $attachments->register( 'post_attachments', $args );
}

add_action( 'attachments_register', 'post_attachments' );

// Register sidebar

function bold_widgets_init() {
	register_sidebar( array(
		'name' 			=> 'Sānjosla',
		'id' 			=> 'sidebar',
		'before_widget' => '<div class="archive-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bold_widgets_init' );

// Add support for WooCommerce plugin

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );