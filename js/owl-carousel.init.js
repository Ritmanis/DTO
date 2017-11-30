jQuery( function( $ ) {
    // Initialize Owl Carousel

    $( 'div.owl-carousel' ).owlCarousel({
        items:              1,
        loop:               true,
        mouseDrag:          false,
        touchDrag:          false,
        pullDrag:           false,
        dots:               true,
        autoplay:           true,
        autoplayHoverPause: true,
        animateOut:         'fadeOut'
    });
});