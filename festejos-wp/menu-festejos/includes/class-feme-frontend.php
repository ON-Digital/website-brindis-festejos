<?php

// Hooks
  add_action( 'init', 'feme_shortcuts' );
// End hooks

  function feme_shortcuts() {

    add_shortcode( 'menu_productos_servicios', 'menu_productos_servicios_cb' );

  }

  function menu_productos_servicios_cb()
  {
    ob_start();

    ?>

    <section class="s-menu grid-wrp grid-12cols mt-5">
      <ul class="mt-3 s-menu__buttons pt-3 text-center nav nav-tabs" role="tablist">
        <?php
        $args = array(
                  'taxonomy' => 'feme-categoria',
                );

        $categories = get_terms( $args );

        // var_dump( $categories );

        if ( ! empty( $categories ) && is_array( $categories ) ) {

          $cat_counter = 1;

          foreach ( $categories as $key_cat => $value_cat ) {

            $cat_name = $value_cat->name;

            ?>

              <li class="nav-item mb-4">
                <a href="#tab_panel<?php echo $cat_counter; ?>" class="btn btn-primary btn-primary--ghost c-btn-width rounded-0 font-uppercase nav-link <?php echo $cat_counter === 1 ? 'active' : ''; ?>" tabindex="0" role="tab" aria-controls="tab_panel<?php echo $cat_counter; ?>" id="<?php echo apply_filters( 'fes_attr_filtered', fes_attr_filtered( $cat_name ) ); ?>_tab" data-toggle="tab" aria-selected="<?php echo $cat_counter === 1 ? 'true' : 'false'; ?>">

                  <?php
                    echo $cat_name;
                  ?>
                </a>
              </li>

            <?php
            $cat_counter++;
          }

        }
      ?>
      </ul>

    <div class="tab-content s-menu__items">
      <?php

        // var_dump( $categories );

        if ( ! empty( $categories ) && is_array( $categories ) ) {

          $cat_counter = 1;

          foreach ( $categories as $cat_key => $cat_value ) {
            // $cat_name = $value_cat->name;
            ?>
            <div id="tab_panel<?php echo $cat_counter;?>" role="tabpanel" class="fade <?php echo $cat_counter === 1 ? 'show active' : ''; ?> tab-pane grid-12cols mt-3" aria-labelledby="<?php echo apply_filters( 'fes_attr_filtered', fes_attr_filtered( $cat_name ) ); ?>_tab">

            <?php
              $args =
                array(
                  'post_type' => 'feme_productos',
                  'tax_query' =>
                    array(
                      array(
                        'taxonomy' => 'feme-categoria',
                        'field' => 'name',
                        'terms' => $categories[$cat_key],
                      )
                    )
                );

                $cat_query = new WP_Query( $args );

                if( $cat_query->have_posts() ) {
                  ?>
                  <div class="tab-pane__col1">

                  <?php
                  while ( $cat_query->have_posts() ) {
                    $cat_query->the_post();

                    $price = get_post_meta( get_the_ID(), 'fes_price', true );
                    ?>
                      <p>
                        <?php
                          echo esc_html( get_the_title() );
                        ?>
                        <span class="float-right">B/. <?php
                          echo esc_html( $price );
                        ?>
                        </span>
                      </p>
                    <?php
                  }
                  ?>
                  </div>
                  <?php

                } else {
                  /* No posts found */
                }

                wp_reset_postdata();
              ?>

              </div>
            <?php
            $cat_counter++;
          }
        }
      ?>
    </div>
  </section>

    <?php
    return ob_get_clean();
  }


  add_filter( 'fes_attr_filtered', 'fes_attr_filtered' );

  function fes_attr_filtered( $cat_name ) {


    if ( preg_match( '/\s/', $cat_name ) ) {

      $cat_name = preg_replace( '/\s+/', '_', $cat_name );

    }

    $args =
      array(
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'ñ' => 'n',
      );

    $cat_name = strtolower( strtr( $cat_name, $args ) );

    return $cat_name;
  }

  add_action( 'add_meta_boxes', 'fes_metabox_price_product' );

  function fes_metabox_price_product() {

    add_meta_box(
      'fes_price_metabox',
     __( 'Precio', 'festejos' ),
       'fes_markup_metabox', // function callback to display form fields..
       'feme_productos',
       'normal',
       'high'
    );

  }

  function fes_save_posts( $post_id ) {

        if ( isset( $_POST[ 'fes_mtbx_field' ] ) && ! wp_verify_nonce( $_POST[ 'fes_mtbx_field' ], 'fes_mtbx_action' ) ) {
            return;
        }

        if( ! current_user_can( 'edit_post', $post_id ) ){
          return;
        }

        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }

        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        if ( isset( $_POST[ 'fes_price' ] ) ) {
    			update_post_meta( $post_id, 'fes_price', sanitize_text_field( $_POST[ 'fes_price' ] ) );
    		}

   }

   add_action( 'save_post', 'fes_save_posts' );

  function fes_markup_metabox() {

    global $post;

    wp_nonce_field( 'fes_mtbx_action', 'fes_mtbx_field' );

    $value_price = get_post_meta( $post->ID, 'fes_price', true );
    ?>
    <p>
      <label for="fes_price"></label>

      <input type="text" name="fes_price" id="fes_price" step="any" value="<?php echo $value_price ? esc_attr( $value_price ) : ''; ?>">
    </p>
    <?php
  }
