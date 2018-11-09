<?php
  get_header();
    ?>

    <section class="s-menu grid-wrp grid-12cols mt-5">
      <h1 class="whole-cols-width text-center mb-5 text-primary font-uppercase main-heading--letter-spacing">
        <?php

          $blog_ID = get_option( 'page_for_posts' );

          echo esc_html( get_the_title( $blog_ID ) );

        ?>
        <hr>

      </h1>

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
  </section>

<?php
  get_footer();
