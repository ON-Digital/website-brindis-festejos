<?php
  /**
  * Template for displaying footer widget
  *
  * @package Dwarf Theme
  * @since Dwarf Theme 1.0
  */


  if ( is_active_sidebar( 'dwf-header-widget' ) ) {

    echo '<p>';

      dynamic_sidebar( 'dwf-header-widget' );
      
    echo '</p>';
  }
