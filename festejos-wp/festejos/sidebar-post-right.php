<?php
/**
* Template to display the sidebar widget
*
* @package Festejos
* @since Festejos 1.0
*/
  ?>

<aside>
  <ul class="sidebar-right list-unstyled">
    <?php
        if ( is_active_sidebar( 'post-right' ) ) {
          // Display dynamic widget
          dynamic_sidebar( 'post-right' );
        }
    ?>
  </ul>
</aside>
