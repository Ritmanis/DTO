<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Disable XMLRPC

add_filter( 'xmlrpc_enabled', '__return_false' );

// Disable WordPress admin bar

add_filter( 'show_admin_bar', '__return_false' );

// Remove white spaces from wp_title

function bold_despace_title( $title ) {
	return trim( $title );
}

add_filter( 'wp_title' , 'bold_despace_title' );

// Disable default image sizes

function bold_disable_image_sizes( $sizes ) {
	unset( $sizes['thumbnail'] );
	unset( $sizes['medium'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['large'] );

	return $sizes;
}

add_filter( 'intermediate_image_sizes_advanced', 'bold_disable_image_sizes' );

// Disable post columns

function bold_disable_post_columns( $columns ) {
	unset( $columns['author'] );
	unset( $columns['tags'] );
	unset( $columns['comments'] );

	return $columns;
}

add_filter( 'manage_edit-post_columns', 'bold_disable_post_columns', 10, 1 );

// Disable page columns

function bold_disable_page_columns( $columns ) {
	unset( $columns['author'] );
	unset( $columns['comments'] );
	unset( $columns['date'] );

	return $columns;
}

add_filter( 'manage_edit-page_columns', 'bold_disable_page_columns', 10, 1 );

// Change default image size dropdown list

function bold_image_size_names_choose( $size_names ) {
    $size_names = array(
        'blog-medium' => __( 'Large' )
    );

    return $size_names;
}

add_filter( 'image_size_names_choose', 'bold_image_size_names_choose' );

// Allow SVG image uploads

function bold_allow_mimes( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'bold_allow_mimes' );

// Disable attachment default instance

add_filter( 'attachments_default_instance', '__return_false' );

// Disable srcset

add_filter( 'wp_calculate_image_srcset', '__return_false' );

// Customize default WordPress translations

function bold_gettext( $translated, $original, $domain ) {
    switch ( $translated ) {
        case '<strong>KĻŪDA</strong>: Parole, kura tika ievadīta lietotājvārdam %s ir nepareiza.':
            $translated = 'Parole nav pareiza.';
            break;
        case '<strong>KĻŪDA</strong>: Nederīgs lietotājvārds.':
            $translated = 'Lietotājvārds nav derīgs.';
            break;
    }

    return $translated;
}

add_filter( 'gettext', 'bold_gettext', 10, 3 );