<?php
  get_header();
  ?>
  <article class="s-booking cooking-bg background-no-repeat-cover grid-wrp align-items-center justify-items-center grid-12cols pt-5 pb-5">

      <div class="s-booking__schedule clarfix cols12-media992">
        <span class="open-icon mr-3 float-lg-left text-center d-block d-lg-inline">
          <svg  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      	 width="65px" height="65px" viewBox="0 0 47.4 44">

           <use xlink:href="#open_icon"></use>
          </svg>
        </span>

        <span class="d-block d-lg-inline-block s-booking__text mt-lg-3">
          <?php _e( 'Lunes - Viernes  8am - 5pm', 'festejos' ); ?>
          <span class="d-block"><?php _e( 'Sábado  8am - 12pm', 'festejos' ); ?></span>

        </span>
      </div>

      <div class="s-booking__contact clearfix cols12-media992 mt-5 mt-lg-0">
        <span class="booking-icon float-lg-left text-center d-block d-lg-inline">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      	 width="71.3px" height="66.8px" viewBox="0 0 71.3 66.8" enable-background="new 0 0 71.3 66.8" xml:space="preserve">

            <use xlink:href="#booking_icon"></use>

         </svg>
        </span>
        <span class="s-booking__text mt-3 d-inline-block">
          <strong><?php _e( 'Email:', 'festejos' ); ?></strong> info@festejosybrindis.com
          <span class="d-block"><strong><?php _e( 'Teléfono:', 'festejos' ); ?></strong> 226-4236 / 226-1293</span>
        </span>
      </div>

      <div class="s-booking__cta cols12-media992 mt-4 mt-lg-0">
        <a href="#contact_section" class="btn btn-md btn-primary rounded-0 pl-5 pr-5 font-uppercase" role="button" id="hacer_pedido"><?php _e( 'Hacer pedido', 'festejos' ); ?></a>
      </div>
  </article>

  <section class="s-history grid-wrp gray-bg grid-12cols pt-5 pb-4">

    <?php
      /**
      ** @var int $id_about_pg
      */
      $id_about_pg = get_option( 'fes_about_pg' );
    ?>

    <div class="s-history__header grid-wrp align-items-center">
      <h2 class="font-uppercase text-primary subheading subheading--letter-spacing ml-4 ml-sm-0">

        <?php

          // New version

          $title_about = esc_html( get_the_title( $id_about_pg ) );

          $title_about = strtok( $title_about, ' ' );

          echo '<span class="d-block heading2-small font-oblique ml-1">' .

              $title_about .

        '</span>' .

            strtok( ' ' );

        ?>

      </h2>


      <div class="s-history__thumb d-block d-lg-none mb-3 mt-2">
        <?php
          $attrs_thumb = array( 'class' => 'mw-100 ml-4 ml-sm-0' );

          if ( get_the_post_thumbnail( $id_about_pg , 'medium' ) ) {

            echo get_the_post_thumbnail( $id_about_pg , 'medium' );

          }
        ?>
      </div>

      <p class="ml-4 ml-sm-0">
        <?php
        // If there's any content on the about page we print it

          if ( apply_filters( 'the_content', get_post( $id_about_pg )->post_content ) ) {

            echo apply_filters( 'the_content', get_post( $id_about_pg )->post_content );

            // default text in case there's nothing
          } else {

            _e( 'Festejos y Brindis nace en 1982, como empresa dedicada a la fabricación de comidas para fiestas y servicio de alquiler de equipo. Actualmente contamos con más de 25 años de experiencia brindando el complemento necesario para sus eventos.', 'festejos' );

          }
        ?>
      </p>

      <p class="text-right">
        <a href="<?php echo esc_url( get_the_permalink( $id_about_pg ) ); ?>" class="btn btn-primary pl-5 pr-5 rounded-0 font-uppercase">
          <?php _e( 'Conoce más', 'festejos' ); ?>
        </a>
      </p>
    </div>

    <div class="s-history__thumb d-none d-lg-block">

      <?php echo get_the_post_thumbnail( $id_about_pg , 'sx-custom-thumbnail' ); ?>

    </div>
  </section>

  <section class="s-services grid-wrp grid-12cols mt-5">
    <?php
      // Services page ID
      $services_pg_id = get_option( 'fes_services_pg' );
    ?>
    <div class="s-services__catering cols12-media992 mt-4 mt-lg-0">

      <?php


      $catering_services = __( 'Contamos con bocaditos de estilo coctel, buffet, y servidos individuales (desechable).  Además de platos fuertes estilo buffet o servidos individuales (desechable) para su conveniencia.', 'festejos' );

      $audiovisual_services = __( 'Ofrecemos equipo de sonido para alquiler como: discoteca móvil, sonido y micrófonos (música ambiental) y karaoke.', 'festejos' );

      $events_services = __( 'Disponemos de equipo para alquilar como: mesas, sillas mantelerías, además de decoración, arreglos florales, cristalería y cubiertos.', 'festejos' );

      ?>
      <p class="catering-icon text-center mb-2">
        <a href="<?php echo esc_url( get_the_permalink( $services_pg_id ) ); ?>">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        	 width="71.3px" height="66.8px" viewBox="0 0 71.3 66.8">

           <use xlink:href="#catering_icon"></use>

           <span class="d-block font-uppercase text-primary services-letter-spacing">
             <?php _e( 'Catering', 'festejos' ); ?>
           </span>
          </svg>
        </a>
      </p>

      <p class="text-center w-75 w-xl-100 ml-auto mr-auto" id="services_txt01">
        <?php
          echo esc_html( get_theme_mod( 'services_text01', $catering_services ) );
        ?>
      </p>
    </div>

    <div class="s-services__audiovisual cols12-media992 mt-5 mt-lg-0">

      <?php get_option( $services_pg_id ); ?>
      <p class="audiovisual-icon text-center mb-2">
        <a href="<?php echo esc_url( get_the_permalink( $services_pg_id ) ); ?>">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       width="71.3px" height="66.8px" viewBox="0 0 71.3 66.8">
         <use xlink:href="#audiovisual_icon"></use>

         <span class="d-block font-uppercase text-primary services-letter-spacing">
           <?php _e( 'Audiovisual', 'festejos' ); ?>
         </span>
       </svg>
        </a>
     </p>

      <p class="text-center w-75 w-xl-100 ml-auto mr-auto" id="services_txt02">
        <?php echo esc_html( get_theme_mod( 'services_text02', $audiovisual_services ) ); ?>
      </p>
    </div>

    <div class="s-services__eventos cols12-media992 mt-5 mt-lg-0">
      <p class="events-icon text-center mb-2">
        <a href="<?php echo esc_url( get_the_permalink( $services_pg_id ) ); ?>">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      	 width="71.3px" height="66.8px" viewBox="0 0 71.3 66.8" enable-background="new 0 0 71.3 66.8" xml:space="preserve">

         <use xlink:href="#events_icon"></use>

           <span class="d-block font-uppercase text-primary services-letter-spacing">
             <?php _e( 'Eventos', 'festejos' ); ?>
           </span>

         </svg>
        </a>
     </p>

      <p class="text-center w-75 w-xl-100 ml-auto mr-auto" id="services_txt03">
        <?php echo esc_html( get_theme_mod( 'services_text03', $events_services ) ); ?>
      </p>
    </div>
  </section>

  <div class="s-menu-special bg-attachment-fixed bg-dark-layer s-menu-special--h45vh grid-wrp grid-12cols justify-items-center mt-5">

    <?php
      $menu_pageID = get_option( 'fes_menu_pg' );
    ?>
    <h2 class="w-100 whole-cols-width text-center pt-5 mt-5 text-white subheading--letter-spacing" id="menu_special_txt">
      <?php

      if ( ! get_theme_mod( 'menu_special_txt' ) ) :

        _e( 'MENÚ ESPECIAL', 'festejos' ); ?>
        <span class="heading2-small font-oblique d-block mt-2">- <?php _e( 'ÉSTA TEMPORADA', 'festejos' ); ?> -</span>
      <?php
    else:

      $title_spc_menu = esc_html( get_theme_mod( 'menu_special_txt' ) );

      $title_spc_menu = strtok( $title_spc_menu, ' ' );

      echo $title_spc_menu .

      '<span class="d-block heading2-small font-oblique ml-1">' .

          strtok( ' ' ) .

      '</span>';

      endif;
    ?>

    </h2>

    <p class="whole-cols-width mt-2 mb-5">
      <a href="<?php echo esc_url( get_theme_mod( 'menu_special_pdf' ) ? get_theme_mod( 'menu_special_pdf' ) : '' ); ?>" target="_blank" class="btn btn-primary text-white box-shadow rounded-0 pl-5 pr-5 pt-2 pb-2">
        <?php _e( 'VER MENÚ', 'festejos' ); ?>
      </a>
    </p>
  </div>

  <section class="s-menu grid-wrp grid-12cols mt-5">

    <h2 class="text-primary font-uppercase whole-cols-width text-center subheading--letter-spacing mb-3 mb-md-5">

      <?php
        $menu_title = esc_html( get_the_title( $menu_pageID ) );

        $menu_title = strtok( $menu_title, ' ' );

        echo
            '<span class="heading2-small font-oblique d-block">' .

                $menu_title .

            '</span>' .

              strtok( ' ' );

        ?>

    </h2>

    <ul class="mt-3 s-menu__buttons pt-3 text-center nav nav-tabs" role="tablist">
        <li class="nav-item mb-4">
            <a href="#tab_panel1" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link active" tabindex="0" role="tab" aria-controls="tab_panel1" id="boquitas_tab" data-toggle="tab" aria-selected="true">
              Boquitas
            </a>
          </li>

          <li class="nav-item mb-4">
            <a href="#tab_panel2" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link" id="comida_tab" data-toggle="tab" aria-selected="false">

              Comida
            </a>
          </li>

          <li class="nav-item mb-4">
            <a href="#tab_panel3" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link" id="postres_tab" data-toggle="tab" aria-selected="false">
              Postres
            </a>
          </li>

          <li class="nav-item mb-4">
            <a href="#tab_panel4" id="refrescos_tab" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link" data-toggle="tab" aria-selected="false">
              Refrescos
            </a>
          </li>

          <li class="nav-item mb-4">
            <a href="#tab_panel5" id="equipos_tab" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link" data-toggle="tab" aria-selected="false">
              EQUIPOS
            </a>
          </li>

          <li class="nav-item mb-4">
            <a href="#tab_panel6" id="decoraciones_tab" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link" data-toggle="tab" aria-selected="false">
              DECORACIONES
            </a>
          </li>

          <li class="nav-item">
            <a href="#tab_panel7" id="otros_tab" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link mb-5" data-toggle="tab" aria-selected="false">
              OTROS
            </a>
          </li>
    </ul>

    <div class="tab-content s-menu__items">
      <div id="tab_panel1" role="tabpanel" class="fade show active tab-pane grid-12cols mt-3" aria-labelledby="boquitas_tab">
        <div class="tab-pane__col1">
          <?php
            $args_loop =
              array(
                'category_name' => 'appetizer',
                'post_type' => 'post',
                'status' => 'published',
                'posts_per_page' => -1,
            );

            $boquitas_query = new WP_Query( $args_loop );

            if( $boquitas_query->have_posts() ) {

                  while( $boquitas_query->have_posts() ) {
                    $boquitas_query->the_post();

                    $price = get_post_meta( get_the_ID(), 'fes_price', true );

                    ?>
                      <p>
                        <?php echo esc_html( get_the_title() ); ?>
                        <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                      </p>
                    <?php
                  }

                }
                wp_reset_postdata();
             ?>
          </div>
        </div>

        <div id="tab_panel2" role="tabpanel" aria-labelledby="comida_tab" class="fade tab-pane grid-12cols mt-3">
          <div class="tab-pane__col1">

            <?php
              $args_loop =
                array(
                  'category_name' => 'food',
                  'post_type' => 'post',
                  'status' => 'published',
                  'posts_per_page' => -1,
              );

              $food_query = new WP_Query( $args_loop );

              if( $food_query->have_posts() ) {
                while ( $food_query->have_posts() ) {
                  $food_query->the_post(); ?>

                  <p>
                    <?php echo esc_html( get_the_title() ); ?>

                    <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                  </p>

              <?php  }
                }

                wp_reset_postdata();
            ?>

          </div>
        </div>

        <div id="tab_panel3" role="tabpanel" aria-labelledby="postres_tab" class="fade grid-12cols tab-pane mt-3">
          <div class="tab-pane__col1">

            <?php
            $args_loop =
              array(
                'category_name' => 'desserts',
                'post_type' => 'post',
                'status' => 'published',
                'posts_per_page' => -1,
            );

            $desserts_query = new WP_Query( $args_loop );

            if( $desserts_query->have_posts() ) {
              while ( $desserts_query->have_posts() ) {
                $desserts_query->the_post();

                ?>

                <p>
                  <?php echo esc_html( get_the_title() ); ?>

                  <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                </p>

                <?php
              }
            }

            wp_reset_postdata();

          ?>
          </div>
        </div>

        <div id="tab_panel4" role="tabpanel" aria-labelledby="refrescos_tab" class="fade tab-pane grid-12cols mt-3">
          <div class="tab-pane__col1">

            <?php
              $args_loop =
                array(
                  'category_name' => 'soda',
                  'post_type' => 'post',
                  'status' => 'published',
                  'posts_per_page' => -1,
              );

              $soda_query = new WP_Query( $args_loop );

              if( $soda_query->have_posts() ) {
                while ( $soda_query->have_posts() ) {
                  $soda_query->the_post(); ?>

                  <p>
                    <?php echo esc_html( get_the_title() ); ?>

                    <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                  </p>

              <?php  }
                }

                wp_reset_postdata();
            ?>

          </div>
        </div>

        <div id="tab_panel5" role="tabpanel" aria-labelledby="equipos_tab" class="fade tab-pane grid-12cols mt-3">
          <div class="tab-pane__col1">

            <?php
              $args_loop =
                array(
                  'category_name' => 'equipment',
                  'post_type' => 'post',
                  'status' => 'published',
                  'posts_per_page' => -1,
              );

              $equipment_query = new WP_Query( $args_loop );

              if( $equipment_query->have_posts() ) {
                while ( $equipment_query->have_posts() ) {
                  $equipment_query->the_post(); ?>

                  <p>
                    <?php echo esc_html( get_the_title() ); ?>

                    <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                  </p>

              <?php  }
                }

                wp_reset_postdata();
            ?>

          </div>
        </div>

        <div id="tab_panel6" role="tabpanel" aria-labelledby="decorations_tab" class="fade tab-pane grid-12cols mt-3">
          <div class="tab-pane__col1">

            <?php
              $args_loop =
                array(
                  'category_name' => 'decorations',
                  'post_type' => 'post',
                  'status' => 'published',
                  'posts_per_page' => -1,
              );

              $decorations_query = new WP_Query( $args_loop );

              if( $decorations_query->have_posts() ) {
                while ( $decorations_query->have_posts() ) {
                  $decorations_query->the_post(); ?>

                  <p>
                    <?php echo esc_html( get_the_title() ); ?>

                    <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                  </p>

              <?php  }
                }

                wp_reset_postdata();
            ?>

          </div>
        </div>

        <div id="tab_panel7" role="tabpanel" aria-labelledby="others_tab" class="fade tab-pane grid-12cols mt-3">
          <div class="tab-pane__col1">

            <?php
              $args_loop =
                array(
                  'category_name' => 'others',
                  'post_type' => 'post',
                  'status' => 'published',
                  'posts_per_page' => -1,
              );

              $others_query = new WP_Query( $args_loop );

              if( $others_query->have_posts() ) {
                while ( $others_query->have_posts() ) {
                  $others_query->the_post(); ?>

                  <p>
                    <?php echo esc_html( get_the_title() ); ?>

                    <span class="float-right">B/. <?php echo esc_html( $price ); ?></span>
                  </p>

              <?php  }
                }

                wp_reset_postdata();
            ?>

          </div>
        </div>


      </div>
    </div>
  </div>

    <p class="text-center mr-5 whole-cols-width btn-grid-panes mt-5">
      <a href="<?php echo esc_url( get_theme_mod( 'menu_special_pdf' ) ? get_theme_mod( 'menu_special_pdf' ) : '' ); ?>" target="_blank" class="btn btn-primary rounded-0 font-uppercase"><?php _e( 'Ver menú completo', 'festejos' ); ?></a>
    </p>

    <div class="whole-cols-width cooking-bg background-no-repeat-cover cooking-bg--height w-100 mt-4">
    </div>
  </section>

  <section class="s-gallery mt-5 mb-5">
    <?php
      $gallery_page_option = get_option( 'fes_my_gallery' );

      $args =
        array(
          'post_type' => 'page',
          'page_id' => $gallery_page_option,
       );

       $query_gallery = new WP_Query( $args );

      if( $query_gallery->have_posts() ) {
        while ( $query_gallery->have_posts() ) {
          $query_gallery->the_post(); ?>

          <h2 class="text-center w-100 text-primary mb-4 font-uppercase whole-cols-width subheading--letter-spacing">
            <?php echo esc_html( get_the_title( $gallery_page_option ) ); ?>
          </h2>

          <div>
            <?php the_content(); ?>
          </div>

          <?php
        }
      }

      wp_reset_postdata();
    ?>
  </section>

  <?php
    get_footer();
