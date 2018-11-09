<?php
/**
* Template for displaying the footer
*
* @package Dwarf theme
* @since Dwarf theme 1.0
*/
?>

  <!-- Footer section -->
  <footer class="bg-primary-customize">
    <div class="container-fluid">
      <div class="row pt-4">
        <?php

        if ( is_active_sidebar( 'dwf-footer-widget' ) ) {

          get_sidebar( 'dwf-footer-widget' );

        }

        /**
           * The resulting array of menu locations registered with his assigned menus
           *
           * @var array $dwf_location
           */
          $dwf_location = get_nav_menu_locations();

          /**
           * Store the menu id of the 'footer_menu' location
           *
           * @var integer $dwf_footer_menu_id
           */
          $dwf_footer_menu_id = $dwf_location['dwf_footer_menu'];

            /**
             * Menu object of 'footer_menu'
             *
             * @var object $dwf_footer_menu_object
             */
            $dwf_footer_menu_object =
            wp_get_nav_menu_object( $dwf_footer_menu_id );

            /**
             * An array of menu items objects
             *
             * @var array $dwf_array_menu_items
             */
            $dwf_array_menu_items = wp_get_nav_menu_items( $dwf_footer_menu_object->term_id );

            echo '<div class="col-4">';

            if ( is_active_sidebar( 'dwf-footer-widget-2' ) ) {

              echo '<div class="row justify-content-center w-100">';

                  get_sidebar( 'dwf-footer-widget-2' );

              echo '</div>';
            }

            // Este filtro fue modificado revisar en functions.php y adaptar el markup aqui....

            // echo apply_filters( 'dwf_footer_menu_filter', $dwf_array_menu_items );

            echo '</div>';

            dwf_footer_copyright();
          ?>
      </div>
    </div>
  </footer>

  <?php
    wp_footer();
  ?>
</body>
</html>
