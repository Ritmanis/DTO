jQuery( function( $ ) {
    /* global wc_cart_fragments_params */

    if ( typeof wc_cart_fragments_params === 'undefined' ) {
        return false;
    }

    // Handle storage

    var $supports_html5_storage;
    var cart_hash_key = wc_cart_fragments_params.ajax_url.toString() + '-wc_cart_hash';

    try {
        $supports_html5_storage = ( 'sessionStorage' in window && window.sessionStorage !== null );
        window.sessionStorage.setItem( 'wc', 'test' );
        window.sessionStorage.removeItem( 'wc' );
        window.localStorage.setItem( 'wc', 'test' );
        window.localStorage.removeItem( 'wc' );
    } catch( err ) {
        $supports_html5_storage = false;
    }

    // Base expiration on cart session creation time

    function set_cart_creation_timestamp() {
        if ( $supports_html5_storage ) {
            sessionStorage.setItem( 'wc_cart_created', ( new Date() ).getTime() );
        }
    }

    // Set cart hash in session and local storage

    function set_cart_hash( cart_hash ) {
        if ( $supports_html5_storage ) {
            localStorage.setItem( cart_hash_key, cart_hash );
            sessionStorage.setItem( cart_hash_key, cart_hash );
        }
    }

    // Refresh cart fragment

    function refresh_cart_fragment( scrollTop ) {
        $.ajax({
            url:     wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
            type:    'POST',
            success: function( data ) {
                if ( data && data.fragments ) {
                    $.each( data.fragments, function( key, value ) {
                        $( key ).replaceWith( value );
                    });

                    if ( $supports_html5_storage ) {
                        sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( data.fragments ) );
                        set_cart_hash( data.cart_hash );

                        if ( data.cart_hash ) {
                            set_cart_creation_timestamp();
                        }
                    }

                    // Restore scroll position

                    if ( scrollTop ) {
                        $( 'header.header' ).find( 'div.cart-products-wrap' ).scrollTop( scrollTop );
                    }

                    $( document.body ).trigger( 'wc_fragments_refreshed' );
                }
            }
        });
    }

    // Handle cart

    if ( $supports_html5_storage ) {
        var cart_timeout = null,
            day_in_ms    = ( 24 * 60 * 60 * 1000 );

        $( document.body ).bind( 'wc_fragment_refresh updated_wc_div', function() {
            refresh_cart_fragment();
        });

        $( 'header.header' ).on( 'click', 'div.item-row > a.remove', function( evt ) {
            evt.preventDefault();

            var $a   = $( evt.currentTarget ),
                item = $a.closest( 'div.item' );

            $.ajax( {
                type:     'GET',
                url:      $a.attr( 'href' ),
                dataType: 'html',
                success:  function() {
                    // Hide cart item or the whole cart if it's the last item

                    if ( item.siblings().length ) {
                        item.slideUp( 500 );

                        setTimeout( function() {
                            // Pass scroll position to cart refresh

                            var scrollTop = item.closest( 'div.cart-products-wrap' ).scrollTop();

                            refresh_cart_fragment( scrollTop );

                            // Restore add to cart icon if still on the same page

                            $( 'div.products' ).find( 'a.added[data-product_id="' + $a.data( 'product_id' ) + '"]' ).removeClass( 'added' );
                        }, 500 );
                    } else {
                        refresh_cart_fragment();
                        $( 'div.products' ).find( 'a.added[data-product_id="' + $a.data( 'product_id' ) + '"]' ).removeClass( 'added' );
                    }
                }
            });
        });

        $( document.body ).bind( 'wc_fragments_refreshed', function() {
            clearTimeout( cart_timeout );
            cart_timeout = setTimeout( refresh_cart_fragment, day_in_ms );
        } );

        // Refresh cart when storage changes in another tab

        $( window ).on( 'storage onstorage', function ( e ) {
            if ( cart_hash_key === e.originalEvent.key && localStorage.getItem( cart_hash_key ) !== sessionStorage.getItem( cart_hash_key ) ) {
                refresh_cart_fragment();
            }
        });

        try {
            var wc_fragments = $.parseJSON( sessionStorage.getItem( wc_cart_fragments_params.fragment_name ) ),
                cart_hash    = sessionStorage.getItem( cart_hash_key ),
                cookie_hash  = $.cookie( 'woocommerce_cart_hash'),
                cart_created = sessionStorage.getItem( 'wc_cart_created' );

            if ( cart_hash === null || cart_hash === undefined || cart_hash === '' ) {
                cart_hash = '';
            }

            if ( cookie_hash === null || cookie_hash === undefined || cookie_hash === '' ) {
                cookie_hash = '';
            }

            if ( cart_hash && ( cart_created === null || cart_created === undefined || cart_created === '' ) ) {
                throw 'No cart_created';
            }

            if ( cart_created ) {
                var cart_expiration = ( ( 1 * cart_created ) + day_in_ms ),
                    timestamp_now   = ( new Date() ).getTime();

                if ( cart_expiration < timestamp_now ) {
                    throw 'Fragment expired';
                }

                cart_timeout = setTimeout( refresh_cart_fragment, ( cart_expiration - timestamp_now ) );
            }

            if ( wc_fragments && wc_fragments['div.widget_shopping_cart_content'] && cart_hash === cookie_hash ) {
                $.each( wc_fragments, function( key, value ) {
                    $( key ).replaceWith( value );
                });

                $( document.body ).trigger( 'wc_fragments_loaded' );
            } else {
                throw 'No fragment';
            }
        } catch( err ) {
            refresh_cart_fragment();
        }
    } else {
        refresh_cart_fragment();
    }
});