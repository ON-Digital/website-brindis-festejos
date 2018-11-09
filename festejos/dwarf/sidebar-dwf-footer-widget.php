<?php
/**
* Template for displaying the footer widget
*
* @package Dwarf Theme
* @since Dwarf Theme 1.0
*/
  if ( is_active_sidebar( 'dwf-footer-widget' ) ) {

      echo '<div class="col">';

        dynamic_sidebar( 'dwf-footer-widget' );

      echo '</div>';
  }
