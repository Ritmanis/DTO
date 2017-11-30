<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Register custom options for managing contacts

function bold_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'contacts_phone' );
    $wp_customize->add_setting( 'contacts_email' );
    $wp_customize->add_setting( 'contacts_coordinates' );

    $wp_customize->add_control( 'contacts_phone_control', array(
        'label'    => __( 'Tālrunis' ),
        'type'     => 'text',
        'section'  => 'title_tagline',
        'settings' => 'contacts_phone',
    ) );

    $wp_customize->add_control( 'contacts_email_control', array(
        'label'    => __( 'E-pasts' ),
        'type'     => 'text',
        'section'  => 'title_tagline',
        'settings' => 'contacts_email',
    ) );

    $wp_customize->add_control( 'contacts_location_control', array(
        'label'    => __( 'Koordinātas' ),
        'type'     => 'text',
        'section'  => 'title_tagline',
        'settings' => 'contacts_coordinates',
    ) );
}

add_action( 'customize_register', 'bold_customize_register' );