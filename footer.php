<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage DTO
 * @since DTO 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; ?>
        <footer class="layout footer full-width">
            <div class="top full-width">
                <div class="full-wrap">
                    <div class="left-col left table">
                        <?php wp_nav_menu( array(
                            'theme_location'  => 'main-menu',
                            'container'       => 'nav',
                            'container_class' => 'menu table-row',
                            'menu_class'      => 'container'
                        ) ); ?>

                        <div class="banners table-row">
                            <a href="https://www.salidzini.lv" target="_blank">
                                <img class="left" alt="Mobilie telefoni, Kuponi, Interneta veikali, Ce&#316;ojumi, L&#275;tas aviobi&#316;etes, Portat&#299;vie datori, Kasko, &#256;trie kred&#299;ti, Octa, Plan&#353;etdatori, Digit&#257;l&#257;s fotokameras" src="https://static.salidzini.lv/images/logo_button.gif" width="120" height="40">
                            </a>

                            <a href="http://www.kurpirkt.lv" target="_blank">
                                <img class="left" alt="Atrodi telefonus, datorus, fotokameras un citas preces interneta veikalos" src="http://www.kurpirkt.lv/media/kurpirkt120.gif" width="120" height="40">
                            </a>
                        </div>
                    </div>

                    <div class="right-col right table">
                        <?php wp_nav_menu( array(
                            'theme_location'  => 'page-menu',
                            'container'       => 'nav',
                            'container_class' => 'menu table-row',
                            'menu_class'      => 'container'
                        ) );

                        get_template_part( 'part/header-contacts' ); ?>
                    </div>
                </div>
            </div>

            <div class="bottom full-width">
                <div class="full-wrap">
                    <span class="left">&copy; <?php bloginfo( 'name' ); echo " " . date( 'Y' ); ?></span>
                    <span class="right"><?php _e( "Izstrādāja", 'dto' ); ?> <a href="<?php _e( "http://bold.lv", 'dto' ); ?>" target="_blank">Bold</a></span>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>