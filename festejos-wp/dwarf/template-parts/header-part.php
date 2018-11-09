<header class="bg-primary-customize">
  <div class="container-fluid">
    <div class="row">
      <?php
          if ( has_custom_logo() )
          {
            ?>
              <div class="col-2">
                  <?php
                     the_custom_logo();
                   ?>
               </div>
            <?php
          }

          if ( has_nav_menu( 'dwf_main_menu' ) || is_active_sidebar( 'dwf-header-widget' ) ) : ?>

            <div class="col-10 d-flex w-100 justify-content-end">

                  <?php
                    get_sidebar( 'dwf-header-widget' );

                  /**
                   * Arguments for the wp_nav_menu function
                   *
                   * @var array $args_menu
                   */
                    $args_menu = array(
                      'menu_id' => 'header_main_menu',
                      'theme_location' => 'dwf_main_menu',
                      'menu_class' => 'nav dwf-main-menu',
                      'container' => 'nav',
                      'container_class' => 'mt-2',
                    );

                    // Main menu
                    wp_nav_menu( $args_menu );
                  ?>
                  </div>
              <?php
        endif; /** has_nav_menu( 'main_menu' ) statement  */
      ?>
    </div>
  </div>
</header>
