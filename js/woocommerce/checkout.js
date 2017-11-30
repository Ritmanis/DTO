jQuery( function( $ ) {
    /* global wc_checkout_params */

    if ( typeof wc_checkout_params === 'undefined' ) {
        return false;
    }

    // Initialize jQuery UI

    $( 'select.state_select' ).selectmenu({
        close: function() {
            addPlaceholderClass( $( this ) );
        },
        create: function() {
            addPlaceholderClass( $( this ) );
        },
        open: function() {
            addPlaceholderClass( $( this ) );
        }
    });

    function addPlaceholderClass( select ) {
        var selectmenu = select.next().find( '.ui-selectmenu-text' );

        if ( selectmenu.text() == select.data( 'placeholder' ) ) {
            selectmenu.addClass( 'ui-placeheld' );
        }
    }

    $( 'input.checkboxradio' ).checkboxradio();

    // Manage AJAX checkout requests

    var wc_checkout_form = {
        xhr:            false,
        $order_review:  $( 'div#order_review' ),
        $checkout_form: $( 'form.checkout' ),
        init: function() {
            // Update totals on page load

            if ( wc_checkout_params.is_checkout === '1' ) {
                this.update_checkout();
            }

            // Update totals on shipping method change

            this.$checkout_form.on( 'change', 'input[name^="shipping_method"]', this.update_checkout );

            // Submit form

            this.$checkout_form.on( 'submit', this.submit );

            // Toggle password input

            this.$checkout_form.on( 'change', 'input#createaccount', function() {
                $( 'div.create-account' ).slideToggle( 500 );
            });
        },
        update_checkout: function() {
            if ( wc_checkout_form.xhr ) {
                wc_checkout_form.xhr.abort();
            }

            if ( wc_checkout_form.$checkout_form.length === 0 ) {
                return;
            }

            // Collect data for request

            var data = {
                security:        wc_checkout_params.update_order_review_nonce,
                shipping_method: { 0: wc_checkout_form.$order_review.find( 'input[name^="shipping_method"]:checked' ).val() },
                payment_method:  wc_checkout_form.$order_review.find( 'input[name="payment_method"]:checked' ).val(),
                post_data:       wc_checkout_form.$checkout_form.serialize()
            };

            // AJAX request

            wc_checkout_form.xhr = $.ajax({
                type:    'POST',
                url:     wc_checkout_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'update_order_review' ),
                data:    data,
                success: function( data ) {
                    // Reload the page if requested

                    if ( 'true' === data.reload ) {
                        window.location.reload();
                        return;
                    }

                    // Update the fragments

                    if ( data && data.fragments ) {
                        $.each( data.fragments, function ( key, value ) {
                            $( key ).replaceWith( value );
                        } );
                    }

                    // Initialize jQuery UI checkboxradio

                    $( 'input.checkboxradio' ).checkboxradio();
                }

            });
        },
        submit: function() {
            var $form   = $( this ),
                $button = $form.find( 'input.button' );

            // Disable button on submit request

            $button.val( 'Apstrādā' ).prop( 'disabled', true ).addClass( 'disabled' );

            // Ensure JSON is valid once returned

            $.ajaxSetup({
                dataFilter: function( raw_response, dataType ) {
                    if ( 'json' !== dataType ) {
                        return raw_response;
                    }

                    try {
                        // Return valid JSON

                        var data = $.parseJSON( raw_response );

                        if ( data && 'object' === typeof data ) {
                            return raw_response;
                        }
                    } catch ( e ) {
                        // Attempt to fix malformed JSON

                        var valid_json = raw_response.match( /{"result.*"}/ );

                        if ( null !== valid_json ) {
                            raw_response = valid_json[0];
                        }
                    }

                    return raw_response;
                }
            });

            $.ajax({
                type:		'POST',
                url:		wc_checkout_params.checkout_url,
                data:		$form.serialize(),
                dataType:   'json',
                success:	function( result ) {
                    try {
                        if ( result.result === 'success' ) {
                            if ( -1 === result.redirect.indexOf( 'https://' ) || -1 === result.redirect.indexOf( 'http://' ) ) {
                                window.location = result.redirect;
                            } else {
                                window.location = decodeURI( result.redirect );
                            }
                        } else if ( result.result === 'failure' ) {
                            throw 'Result failure';
                        } else {
                            throw 'Invalid response';
                        }
                    } catch( err ) {
                        // Reload the page if requested

                        if ( result.reload === 'true' ) {
                            window.location.reload();

                            return;
                        }

                        // Trigger an update if a fresh nonce is needed

                        if ( result.refresh === 'true' ) {
                            wc_checkout_form.update_checkout();
                        }

                        // Manage notices

                        var old_notices = wc_checkout_form.$checkout_form.find( 'ul.woocommerce-notices' ).parent(),
                            new_notices = result.messages
                                ? $( $.parseHTML( result.messages ) ).html()
                                : '<ul class="woocommerce-notices"><li>' + wc_checkout_params.i18n_checkout_error + '</li></ul>';

                        if ( old_notices.length ) {
                            old_notices.slideUp( 500, function() {
                                this.remove();
                            });

                            setTimeout( function() {
                                wc_checkout_form.submit_error( new_notices );
                            }, 500 );
                        } else {
                            wc_checkout_form.submit_error( new_notices );
                        }
                    }
                }
            });

            return false;
        },
        submit_error: function( error_message ) {
            wc_checkout_form.$checkout_form.find( 'div.content-right' ).prepend(
                '<div class="content-wrap" style="display: none;">' + error_message + '</div>'
            );

            wc_checkout_form.$checkout_form.find( 'ul.woocommerce-notices' ).parent().slideDown( 500, function() {
                // Restore button after showing error messages

                wc_checkout_form.$checkout_form.find( 'input.button' ).val( 'Pasūtīt' ).prop( 'disabled', false ).removeClass( 'disabled' );
            });

            var body    = $( 'body' ),
                notices = $( 'ul.woocommerce-notices' ),
                offset  = $( 'div.header-account' ).css( 'display' ) !== 'block' ? notices.offset().top - 32 : notices.offset().top - 96;

            if ( body.scrollTop() > offset ) {
                body.animate({
                    scrollTop: offset
                });
            }
        }
    };

    wc_checkout_form.init();
});