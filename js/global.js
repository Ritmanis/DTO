jQuery( function( $ ) {
    // Disable noscript styling

    $( 'body' ).removeClass( 'noscript' );

    // Define variables

    var header         = $( 'header.header' ),
        headerHeight   = header.children( 'div.top' ).height(),
        headerBottom   = header.find( 'div.bottom-wrap' ),
        search         = header.find( 'div.header-search > a.header-icon' );

    // Make mini cart fixed to top if scrolled past header

    toggleCartFixed();

    $( window ).scroll( toggleCartFixed );

    $( window ).resize( function() {
        headerHeight = header.children( 'div.top' ).height();

        toggleCartFixed();
    });

    // Enable search toggle

    search.on( 'click', function( event ) {
        event.preventDefault();

        $( this ).parent().toggleClass( 'open' );
    });

    // Enable category toggle

    $( 'a.category-toggle' ).on( 'click', function( event ) {
        event.preventDefault();

        $( this ).parent().slideUp( 500 );
        $( 'div.categories' ).slideDown( 500 );
    });

    function toggleCartFixed() {
        if ( $( window ).scrollTop() > headerHeight ) {
            headerBottom.addClass( 'fixed' );
        } else {
            headerBottom.removeClass( 'fixed' );
        }
    }
});