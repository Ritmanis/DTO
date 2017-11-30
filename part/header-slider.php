<?php if ( ! defined( 'ABSPATH' ) ) exit;

$slider = new Attachments( 'slider_attachments' );

if ( $slider->exist() ) { ?>
    <div class="header-slider full-width">
        <?php if ( $slider->total() > 1 ) { ?>
            <div class="owl-carousel">
                <?php bold_slider_image_loop( $slider ); ?>
            </div>
        <?php } else {
            bold_slider_image_loop( $slider );
        } ?>
    </div>
<?php }