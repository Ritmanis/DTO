<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Disable default WooCommerce styles

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Update mini cart product and price total with AJAX

function bold_add_to_cart_fragments( $fragments ) {
    ob_start();

    bold_cart_totals();
    $fragments['div.cart-contents'] = ob_get_clean();

    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'bold_add_to_cart_fragments' );

// Replace default placeholder image

function bold_placeholder_img_src() {
    return get_template_directory_uri() . '/img/placeholder-blog.png';
}

add_filter( 'woocommerce_placeholder_img_src', 'bold_placeholder_img_src' );

// Customize price HTML structure

function bold_get_price_html_from_to( $price, $from, $to ) {
    $price = '<span class="price sale left">' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</span><span class="price old left"><del>' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</del></span>';

    return $price;
}

add_filter( 'woocommerce_get_price_html_from_to' , 'bold_get_price_html_from_to', 10, 3 );

function bold_price_html( $price, $product ) {
    $price = '<span class="price regular left">' . wc_price( $product->get_display_price() ) . '</span>';

    return $price;
}

add_filter( 'woocommerce_price_html' , 'bold_price_html', 10, 2 );

function bold_free_price_html() {
    $price = '<span class="price regular left">' . __( 'Free!', 'woocommerce' ) . '</span>';

    return $price;
}

add_filter( 'woocommerce_free_price_html', 'bold_free_price_html' );

// Customize catalog orderby option list

function bold_catalog_orderby() {
    $catalog_orderby_options = array(
        'date'       => __( 'Sort by newness', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
    );

    return $catalog_orderby_options;
}

add_filter( 'woocommerce_catalog_orderby' , 'bold_catalog_orderby' );

// Remove items from account navigation

function bold_account_menu_items( $items ) {
    unset( $items['dashboard'] );
    unset( $items['downloads'] );

    return $items;
}

add_filter( 'woocommerce_account_menu_items' , 'bold_account_menu_items' );

// Customize billing fields

function bold_billing_fields( $address_fields ) {
    $required = ' *';

    $address_fields = array(
        'billing_first_name' => array(
            'label'        => __( 'First Name', 'woocommerce' ),
            'placeholder'  => __( 'First Name', 'woocommerce' ) . $required,
            'required'     => true,
            'autocomplete' => 'given-name'
        ),
        'billing_last_name' => array(
            'label'        => __( 'Last Name', 'woocommerce' ),
            'placeholder'  => __( 'Last Name', 'woocommerce' ) . $required,
            'required'     => true,
            'autocomplete' => 'family-name',
        ),
        'billing_email' => array(
            'label'        => __( 'Email Address', 'woocommerce' ),
            'placeholder'  => __( 'Email Address', 'woocommerce' ) . $required,
            'required'     => true,
            'type'         => 'email',
            'clear'        => true,
            'validate'     => array( 'email' ),
            'autocomplete' => 'email',
        ),
        'billing_phone' => array(
            'label'        => __( 'Phone', 'woocommerce' ),
            'placeholder'  => __( 'Phone', 'woocommerce' ) . $required,
            'required'     => true,
            'type'         => 'tel',
            'validate'     => array( 'phone' ),
            'autocomplete' => 'tel',
        ),
        'billing_address_1' => array(
            'label'        => __( 'Address', 'woocommerce' ),
            'placeholder'  => __( 'Address', 'woocommerce' ) . $required,
            'required'     => true,
            'class'        => array( 'form-row-wide' ),
            'clear'        => true,
            'autocomplete' => 'address-line1',
        ),
        'billing_city' => array(
            'label'        => __( 'Town / City', 'woocommerce' ),
            'placeholder'  => __( 'Town / City', 'woocommerce' ) . $required,
            'required'     => true,
            'autocomplete' => 'address-level2',
        ),
        'billing_state' => array(
            'type'         => 'state',
            'label'        => __( 'State / County', 'woocommerce' ),
            'placeholder'  => __( 'State / County', 'woocommerce' ) . $required,
            'required'     => true,
            'validate'     => array( 'state' ),
            'autocomplete' => 'address-level1',
        ),
        'billing_postcode' => array(
            'label'        => __( 'Postcode / ZIP', 'woocommerce' ),
            'placeholder'  => __( 'Postcode / ZIP', 'woocommerce' ) . $required,
            'required'     => true,
            'validate'     => array( 'postcode' ),
            'clear'        => true,
            'autocomplete' => 'postal-code',
        ),
    );

    return $address_fields;
}

add_filter( 'woocommerce_billing_fields', 'bold_billing_fields' );

// Add Latvian states to billing address

function bold_states( $states ) {
    $states['LV'] = array(
        'LV1' => 'Ādažu novads',
        'LV2' => 'Aglonas novads',
        'LV3' => 'Aizkraukles novads',
        'LV4' => 'Aizputes novads',
        'LV5' => 'Aknīstes novads',
        'LV6' => 'Alojas novads',
        'LV7' => 'Alsungas novads',
        'LV8' => 'Alūksnes novads',
        'LV9' => 'Amatas novads',
        'LV10' => 'Apes novads',
        'LV11' => 'Auces novads',
        'LV12' => 'Babītes novads',
        'LV13' => 'Baldones novads',
        'LV14' => 'Baltinavas novads',
        'LV15' => 'Balvu novads',
        'LV16' => 'Bauskas novads',
        'LV17' => 'Beverīnas novads',
        'LV18' => 'Brocēnu novads',
        'LV19' => 'Burtnieku novads',
        'LV20' => 'Carnikavas novads',
        'LV21' => 'Cēsu novads',
        'LV22' => 'Cesvaines novads',
        'LV23' => 'Ciblas novads',
        'LV24' => 'Dagdas novads',
        'LV25' => 'Daugavpils',
        'LV26' => 'Daugavpils novads',
        'LV27' => 'Dobeles novads',
        'LV28' => 'Dundagas novads',
        'LV29' => 'Durbes novads',
        'LV30' => 'Engures novads',
        'LV31' => 'Ērgļu novads',
        'LV32' => 'Garkalnes novads',
        'LV33' => 'Grobiņas novads',
        'LV34' => 'Gulbenes novads',
        'LV35' => 'Iecavas novads',
        'LV36' => 'Ikšķiles novads',
        'LV37' => 'Ilūkstes novads',
        'LV38' => 'Inčukalna novads',
        'LV39' => 'Jaunjelgavas novads',
        'LV40' => 'Jaunpiebalgas novads',
        'LV41' => 'Jaunpils novads',
        'LV42' => 'Jēkabpils',
        'LV43' => 'Jēkabpils novads',
        'LV44' => 'Jelgava',
        'LV45' => 'Jelgavas novads',
        'LV46' => 'Jūrmala',
        'LV47' => 'Kandavas novads',
        'LV48' => 'Kārsavas novads',
        'LV49' => 'Ķeguma novads',
        'LV50' => 'Ķekavas novads',
        'LV51' => 'Kocēnu novads',
        'LV52' => 'Kokneses novads',
        'LV53' => 'Krāslavas novads',
        'LV54' => 'Krimuldas novads',
        'LV55' => 'Krustpils novads',
        'LV56' => 'Kuldīgas novads',
        'LV57' => 'Lielvārdes novads',
        'LV58' => 'Liepāja',
        'LV59' => 'Līgatnes novads',
        'LV60' => 'Limbažu novads',
        'LV61' => 'Līvānu novads',
        'LV62' => 'Lubānas novads',
        'LV63' => 'Ludzas novads',
        'LV64' => 'Madonas novads',
        'LV65' => 'Mālpils novads',
        'LV66' => 'Mārupes novads',
        'LV67' => 'Mazsalacas novads',
        'LV68' => 'Mērsraga novads',
        'LV69' => 'Naukšēnu novads',
        'LV70' => 'Neretas novads',
        'LV71' => 'Nīcas novads',
        'LV72' => 'Ogres novads',
        'LV73' => 'Olaines novads',
        'LV74' => 'Ozolnieku novads',
        'LV75' => 'Pārgaujas novads',
        'LV76' => 'Pāvilostas novads',
        'LV77' => 'Pļaviņu novads',
        'LV78' => 'Preiļu novads',
        'LV79' => 'Priekules novads',
        'LV80' => 'Priekuļu novads',
        'LV81' => 'Raunas novads',
        'LV82' => 'Rēzekne',
        'LV83' => 'Rēzeknes novads',
        'LV84' => 'Riebiņu novads',
        'LV85' => 'Rīga',
        'LV86' => 'Rojas novads',
        'LV87' => 'Ropažu novads',
        'LV88' => 'Rucavas novads',
        'LV89' => 'Rugāju novads',
        'LV90' => 'Rūjienas novads',
        'LV91' => 'Rundāles novads',
        'LV92' => 'Salacgrīvas novads',
        'LV93' => 'Salas novads',
        'LV94' => 'Salaspils novads',
        'LV95' => 'Saldus novads',
        'LV96' => 'Saulkrastu novads',
        'LV97' => 'Sējas novads',
        'LV98' => 'Siguldas novads',
        'LV99' => 'Skrīveru novads',
        'LV100' => 'Skrundas novads',
        'LV101' => 'Smiltenes novads',
        'LV102' => 'Stopiņu novads',
        'LV103' => 'Strenču novads',
        'LV104' => 'Talsu novads',
        'LV105' => 'Tērvetes novads',
        'LV106' => 'Tukuma novads',
        'LV107' => 'Vaiņodes novads',
        'LV108' => 'Valkas novads',
        'LV109' => 'Valmiera',
        'LV110' => 'Varakļānu novads',
        'LV111' => 'Vārkavas novads',
        'LV112' => 'Vecpiebalgas novads',
        'LV113' => 'Vecumnieku novads',
        'LV114' => 'Ventspils',
        'LV115' => 'Ventspils novads',
        'LV116' => 'Viesītes novads',
        'LV117' => 'Viļakas novads',
        'LV118' => 'Viļānu novads',
        'LV119' => 'Zilupes novads'
    );

    return $states;
}

add_filter( 'woocommerce_states', 'bold_states' );

// Remove shipping method name when shipping is not free

add_filter( 'woocommerce_order_shipping_to_display_shipped_via', '__return_empty_string' );

// Customize checkout fields

function bold_checkout_fields( $checkout_fields ) {
    $checkout_fields['account']['account_password'] = array(
        'type'        => 'password',
        'label'       => __( 'Account password', 'woocommerce' ),
        'required'    => true,
        'class'       => array( 'change-password' ),
        'placeholder' => __( 'Password', 'woocommerce' ) . ' *'
    );

    return $checkout_fields;
}

add_filter( 'woocommerce_checkout_fields', 'bold_checkout_fields' );

// Customize cart shipping method label

function bold_cart_shipping_method_full_label( $label, $method ) {
    $label = $method->get_label();

    if ( $method->cost > 0 ) {
        $label .= ' ' . wc_price( $method->cost );
    }

    return $label;
}

add_filter( 'woocommerce_cart_shipping_method_full_label', 'bold_cart_shipping_method_full_label', 10, 2 );