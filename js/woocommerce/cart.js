jQuery( function( $ ) {
    // Initialize jQuery UI on number input

    $( 'input.qty' ).spinner();

    // Update cart content

    var update_wc_div = function( html_str ) {
        var $html        = $.parseHTML( html_str ),
            $new_form    = $( 'form.cart', $html ),
            $cart        = $( 'form.cart' ),
            $new_notices = $( 'ul.woocommerce-notices', $html ),
            $new_totals  = $( 'div.cart-totals', $html );

        if ( $new_form.length ) {
            // Update cart with new items

            $cart.replaceWith( $new_form );
            $( 'input.qty' ).spinner();

            // Update notices

            if ( $new_notices.length ) {
                $new_notices.hide();
                $( 'form.cart' ).before( $new_notices );

                var notices = $( 'ul.woocommerce-notices' );

                notices.slideDown( 500 );

                var body    = $( 'body' ),
                    offset  = $( 'div.header-account' ).css( 'display' ) !== 'block' ? notices.offset().top - 32 : notices.offset().top - 96;

                if ( body.scrollTop() > offset ) {
                    body.animate({
                        scrollTop: offset
                    });
                }
            }

            // Update cart totals

            $( 'div.cart-totals' ).replaceWith( $new_totals );
            $( document.body ).trigger( 'updated_cart_totals' );
        } else {
            // Collect empty cart HTML

            var $cart_html = $( 'div.cart-empty', $html ).closest( 'div.woocommerce' ).hide();

            // Include notices

            if ( $new_notices.length ) {
                $cart_html.find( 'p.woocommerce-info' ).before( $new_notices );
            }

            // Replace cart content with empty cart HTML

            $cart.closest( 'div.woocommerce' ).replaceWith( $cart_html );
            $( 'div.woocommerce' ).slideDown( 500 );
        }

        $( document.body ).trigger( 'updated_wc_div' );
    };

    // Update cart quantity

    var quantity_update = function( form ) {
        // Provide the submit button value

        $( '<input />' ).attr( 'type', 'hidden' )
            .attr( 'name', 'update_cart' )
            .attr( 'value', 'Update Cart' )
            .appendTo( form );

        // Make call to form post URL

        $.ajax({
            type:     form.attr( 'method' ),
            url:      form.attr( 'action' ),
            data:     form.serialize(),
            dataType: 'html',
            success:  update_wc_div
        });
    };

    // Handle cart UI

    var cart = {
        // Initialize cart UI events

        init: function() {
            var $cart_body      = $( 'div.woocommerce' );
            this.input_keypress = this.input_keypress.bind( this );

            $cart_body.on( 'keypress',  'div.cart-wrap > form input[type=number]', this.input_keypress );
            $cart_body.on( 'spinstop', 'div.cart-wrap > form input[type=number]', this.input_changed );
            $cart_body.on( 'blur', 'div.cart-wrap > form input[type=number]', this.input_empty );
            $cart_body.on( 'click', 'div.product-title > a.remove', this.item_remove_clicked );
            $cart_body.on( 'click', 'div.cart-totals a.empty-button', this.empty_clicked );
        },

        // Handle the <ENTER> key for quantity fields

        input_keypress: function( evt ) {
            // Catch the enter key and don't let it submit the form

            if ( 13 === evt.keyCode ) {
                evt.preventDefault();
            }
        },

        // Update cart totals on quantity changes

        input_changed: function() {
            if ( $( this ).val() !== '' ) {
                quantity_update( $( 'form.cart' ) );
            }
        },

        // Set quantity to 1 if input is empty on losing focus

        input_empty: function() {
            if ( $( this ).val() === '' ) {
                $( this ).val( 1 );

                quantity_update( $( 'form.cart' ) );
            }
        },

        // Handle remove item click

        item_remove_clicked: function( evt ) {
            evt.preventDefault();

            var $a       = $( evt.currentTarget ),
                $item    = $a.closest( 'div.cart-item' ),
                $notices = $( 'ul.woocommerce-notices' );

            $.ajax( {
                type:     'GET',
                url:      $a.attr( 'href' ),
                dataType: 'html',
                success:  function( html_str ) {
                    // Hide cart item or the whole cart if it's the last item

                    if ( $item.siblings().length ) {
                        $item.slideUp( 500 );

                        if ( $notices.length ) {
                            $notices.slideUp( 500, function() {
                                this.remove();
                            });
                        }
                    } else {
                        $item.closest( 'div.woocommerce' ).slideUp( 500 );
                    }

                    setTimeout( function() {
                        update_wc_div( html_str );
                    }, 500 );
                }
            });
        },

        // Handle empty cart click

        empty_clicked: function( evt ) {
            evt.preventDefault();

            var $a = $( evt.currentTarget );

            $.ajax( {
                type:     'GET',
                url:      $a.attr( 'href' ),
                dataType: 'html',
                success:  function( html_str ) {
                    $a.closest( 'div.woocommerce' ).slideUp( 500 );

                    setTimeout( function() {
                        update_wc_div( html_str );
                    }, 500 );
                }
            });
        }
    };

    cart.init();
});