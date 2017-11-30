<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Output content part of the slider image

function bold_slider_image_content( $slider ) {
    echo $slider->image( 'slider' ); ?>

    <div class="gradient full-width">
        <?php if ( $slider->field( 'title' ) || $slider->field( 'description' ) ) : ?>
            <div class="full-wrap">
                <div class="article-wrap full-width">
                    <article class="article">
                        <?php if ( $slider->field( 'title' ) ) { ?>
                            <h2><?php echo $slider->field( 'title' ); ?></h2>
                        <?php }

                        echo wpautop( $slider->field( 'description' ) ); ?>
                    </article>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php }

// Output slider image loop

function bold_slider_image_loop( $slider ) {
    while ( $slider->get() ) {
        if ( $slider->field( 'link' ) ) { ?>
            <a class="image" style="background-image: url( '<?php echo $slider->src( 'slider' ); ?>' );" href="<?php echo $slider->field( 'link' ); ?>">
                <?php bold_slider_image_content( $slider ); ?>
            </a>
        <?php } else { ?>
            <div class="image" style="background-image: url( '<?php echo $slider->src( 'slider' ); ?>' );">
                <?php bold_slider_image_content( $slider ); ?>
            </div>
        <?php }
    }
}

// Output Google Maps initialization scripts

function bold_google_maps() { ?>
    <script>
        var map, marker;

        function initMap() {
            var center = new google.maps.LatLng( <?php echo get_theme_mod( 'contacts_coordinates' ); ?> );

            map = new google.maps.Map( document.getElementById( 'map' ), {
                center: center,
                zoom: 16,
                mapTypeControl: false,
                styles: [{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}]
            });

            marker = new google.maps.Marker({
                position: center,
                icon: '<?php echo get_template_directory_uri(); ?>/img/map-pin.png',
                map: map
            });
        }
    </script>
<?php }

// Truncate content by character count

function bold_excerpt() {
    $text = strip_tags( strip_shortcodes( get_the_content() ) );
    $text_length = mb_strlen( $text, 'UTF-8' );
    $excerpt_length = 220;
    $excerpt = '<p>' . mb_substr( $text, 0, $excerpt_length, 'UTF-8' );

    if ( $text_length > $excerpt_length ) {
        $excerpt .= '...</p><a class="more left" href="' . get_the_permalink() . '">' . __( 'Read more...' ) . '</a>';
    } else {
        $excerpt .= '</p>';
    }

    echo $excerpt;
}