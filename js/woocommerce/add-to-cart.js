jQuery( function( $ ) {
    /* global wc_add_to_cart_params */

    if ( typeof wc_add_to_cart_params === 'undefined' ) {
        return false;
    }

    // AJAX add to cart

    $( document ).on( 'click', 'a.add_to_cart_button', function() {
        // AJAX add to cart request

        var $thisbutton = $( this );

        if ( $thisbutton.is( '.ajax_add_to_cart' ) ) {
            if ( ! $thisbutton.data( 'product_id' ) ) {
                return true;
            }

            $thisbutton.removeClass( 'added' );

            // Collect data for request

            var data = {};

            $.each( $thisbutton.data(), function( key, value ) {
                data[key] = value;
            });

            // AJAX request

            $.post( wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' ), data, function( response ) {
                if ( ! response ) {
                    return;
                }

                if ( response.error && response.product_url ) {
                    window.location = response.product_url;
                } else {
                    // Refresh mini cart

                    $( document.body ).trigger( 'wc_fragment_refresh' );

                    // Change button class and flash mini cart

                    var header_cart = $( 'div.header-cart' );

                    $thisbutton.addClass( 'added' );
                    header_cart.addClass( 'flash' );

                    setTimeout( function() {
                        header_cart.removeClass( 'flash' );
                    }, 500 );
                }
            });

            return false;
        }

        return true;
    });
});