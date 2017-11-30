jQuery( function( $ ) {
    /* global wc_cart_fragments_params */

    if ( typeof wc_cart_fragments_params === 'undefined' ) {
        return false;
    }

    var form = $( 'div.content' ).find( 'form.form-validate' );

    // Initialize jQuery UI

    if ( form.prop( 'id' ) === 'edit_address' ) {
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
    }

    if ( form.prop( 'id' ) === 'login' ) {
        $( 'input.checkboxradio' ).checkboxradio();
    }

    // Validate form input with AJAX

    form.on( 'submit', function() {
        var input = $( this );

        $.ajax({
            type:		'POST',
            url:		wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', input.prop( 'id' ) ),
            data:		input.serialize(),
            dataType:   'json',
            success:	function( response ) {
                if ( response.result === 'success' ) {
                    // Redirect on successful validation

                    if ( -1 === response.redirect.indexOf( 'https://' ) || -1 === response.redirect.indexOf( 'http://' ) ) {
                        window.location = response.redirect;
                    } else {
                        window.location = decodeURI( response.redirect );
                    }
                } else if ( response.result === 'failure' ) {
                    // Return error messages on failed validation

                    var wrapped = input.parent( 'div.content-right' ).length,
                        old_notices = wrapped ? input.prev( 'div.content-wrap' ) : input.prev( 'ul.woocommerce-notices' ),
                        new_notices = wrapped
                            ? '<div class="content-wrap" style="display: none;">' + $( $.parseHTML( response.messages ) ).html() + '</div>'
                            : '<ul class="woocommerce-notices" style="display: none;">' + $( $.parseHTML( response.messages ) ).html() + '</ul>';

                    if ( old_notices.length ) {
                        // Remove old errors if present

                        old_notices.slideUp( 500, function() {
                            this.remove();

                            input.before( new_notices ).prev().slideDown( 500 );
                            scrollToNotices();
                        });
                    } else {
                        input.before( new_notices ).prev().slideDown( 500 );
                        scrollToNotices();
                    }
                }
            }
        });

        return false;
    });

    // Scroll to notices if out of view

    function scrollToNotices() {
        var body    = $( 'body' ),
            notices = $( 'ul.woocommerce-notices' ),
            offset  = $( 'div.header-account' ).css( 'display' ) !== 'block' ? notices.offset().top - 32 : notices.offset().top - 96;

        if ( body.scrollTop() > offset ) {
            body.animate({
                scrollTop: offset
            });
        }
    }
});