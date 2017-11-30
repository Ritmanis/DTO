<?php if ( ! defined( 'ABSPATH' ) ) exit;

if ( get_theme_mod( 'contacts_phone' ) || get_theme_mod( 'contacts_email' ) ) : ?>
    <div class="contacts table-row">
        <?php if ( get_theme_mod( 'contacts_phone' ) ) { ?>
            <a href="tel:<?php echo str_replace( ' ', '', get_theme_mod( 'contacts_phone' ) ); ?>">
                <?php echo get_theme_mod( 'contacts_phone' ); ?>
            </a>
            <br>
        <?php }

        if ( get_theme_mod( 'contacts_email' ) ) { ?>
            <a href="mailto:<?php echo get_theme_mod( 'contacts_email' ); ?>">
                <?php echo get_theme_mod( 'contacts_email' ); ?>
            </a>
        <?php } ?>
    </div>
<?php endif;