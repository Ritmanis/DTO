jQuery( function( $ ) {
    /* global wc_cart_fragments_params */

    if ( typeof wc_cart_fragments_params === 'undefined' ) {
        return false;
    }

    // Initialize jQuery UI spinner

    $( 'input.qty' ).spinner();

    // AJAX add to cart

    $( 'div.content' ).on( 'click', 'button.single_add_to_cart_button', function( evt ) {
        evt.preventDefault();

        var $thisbutton = $( this ),
            $product_id = $thisbutton.prev( 'input[name="add-to-cart"]' ).val(),
            $quantity   = $thisbutton.parent().find( 'input[name="quantity"]' ).val();

        if ( ! $product_id ) {
            return true;
        }

        // Collect data for request

        var data = {
            product_id: $product_id,
            quantity:   $quantity
        };

        // AJAX request

        $.post( wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart_single' ), data, function( response ) {
            if ( ! response ) {
                return;
            }

            if ( ! response.error ) {
                // Refresh mini cart

                $( document.body ).trigger( 'wc_fragment_refresh' );

                // Flash mini cart

                var header_cart = $( 'div.header-cart' );

                header_cart.addClass( 'flash' );

                setTimeout( function() {
                    header_cart.removeClass( 'flash' );
                }, 500 );
            }

            if ( response.messages ) {
                var old_notices = $( 'ul.woocommerce-notices' ),
                    new_notices = $( $.parseHTML( response.messages ) ).html();

                if ( old_notices.length ) {
                    old_notices.slideUp( 500, function() {
                        this.remove();
                    });

                    setTimeout( function() {
                        add_notices( new_notices );
                    }, 500 );
                } else {
                    add_notices( new_notices );
                }
            }
        });

        return true;
    });

    // Remove added notices

    $( 'header.header' ).on( 'click', 'div.item-row > a.remove', function( evt ) {
        evt.preventDefault();

        var removed_id = $( evt.currentTarget ).data( 'product_id' ),
            product_id = $( 'div.content' ).find( 'input[name="add-to-cart"]' ).val();

        // Remove notices if removed item matches current product

        if ( removed_id == product_id ) {
            $( 'ul.woocommerce-notices' ).slideUp( 500, function() {
                this.remove();
            });
        }
    });

    // Add new notices

    function add_notices( new_notices ) {
        $( 'div.breadcrumbs' ).after( '<ul class="woocommerce-notices" style="display: none;">' + new_notices + '</ul>' );
        $( 'ul.woocommerce-notices' ).slideDown( 500 );
    }
});