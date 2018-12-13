<?php
  /**
  * Functions file to
  * configure the theme visual displaying
  */

  require_once( get_stylesheet_directory() . '/includes/customizer-settings.php' );

  // Hooks
  // add_action( 'wp_enqueque_scripts', 'fes_enqueue_scripts' );

  add_action( 'after_setup_theme', 'fes_on_activation_theme' );

  add_action( 'admin_menu', 'fes_change_taxonomies_names' );

  add_action( 'init', 'fes_change_labels_posts' );

  add_action( 'init', 'fes_insert_term_taxonomies' );

  add_action( 'add_meta_boxes', 'fes_metabox_price_product' );

  add_action( 'save_post', 'fes_save_posts' );

  add_action( 'wp_head', 'fes_fonts' );

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

  function fes_fonts() {
    ?>
      <style media="screen">

      @font-face {
      font-family: 'Helvetica';
      font-style: normal;
      font-weight: normal;
      src: local('Helvetica'), url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/Helvetica.woff') format('woff');
      }


      @font-face {
      font-family: 'Helvetica Oblique';
      font-style: normal;
      font-weight: normal;
      src: local('Helvetica Oblique'), url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/Helvetica-Oblique.woff') format('woff');
      }


      @font-face {
      font-family: 'Helvetica Bold';
      font-style: normal;
      font-weight: normal;
      src: local('Helvetica'), url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/Helvetica-Bold.woff') format('woff');
      }


      @font-face {
      font-family: 'Helvetica Bold Oblique';
      font-style: normal;
      font-weight: normal;
      src: local('Helvetica Bold Oblique'), url('<?php echo get_stylesheet_directory_uri(); ?>/fonts/Helvetica-BoldOblique.woff') format('woff');
      }

    </style>

    <?php
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

  function fes_insert_term_taxonomies() {

    if ( ! term_exists( 'boquitas', 'category' ) ) {

        wp_insert_term( 'boquitas', 'category', array( 'slug' => 'appetizer' ) );

    }

    if ( ! term_exists( 'comida', 'category' ) ) {

      wp_insert_term( 'comida', 'category', array( 'slug' => 'food' ) );

    }

    if ( ! term_exists( 'postres', 'category' ) ) {

      wp_insert_term( 'postres', 'category', array( 'slug' => 'desserts' ) );

    }

    if ( ! term_exists( 'refrescos', 'category' ) ) {

      wp_insert_term( 'refrescos', 'category', array( 'slug' => 'soda' ) );

    }

    if ( ! term_exists( 'equipos', 'category' ) ) {

      wp_insert_term( 'equipos', 'category', array( 'slug' => 'equipment' ) );

    }

    if ( ! term_exists( 'decoraciones', 'category' ) ) {

      wp_insert_term( 'decoraciones', 'category', array( 'slug' => 'decorations' ) );

    }

    if ( ! term_exists( 'otros', 'category' ) ) {

      wp_insert_term( 'otros', 'category', array( 'slug' => 'others' ) );

    }

  }

  function fes_change_taxonomies_names() {

    global $submenu;
    $submenu['edit.php'][15][0] = 'Product'; // Rename categories to Producto

    // $submenu['edit.php'][16][0] = 'Price';

  }

  function fes_metabox_price_product() {

    add_meta_box(
      'fes_price_metabox',
     __( 'Price', 'festejos' ),
       'fes_markup_metabox', // function callback to display form fields..
       'post',
       'normal',
       'high'
    );

  }

  function fes_markup_metabox() {

    global $post;

    wp_nonce_field( 'fes_mtbx_action', 'fes_mtbx_field' );

    $value_price = get_post_meta( $post->ID, 'fes_price', true );
    ?>
    <p>
      <label for="fes_price"></label>
      <!-- Commit esc_attr() function -->
      <input type="number" name="fes_price" id="fes_price" step="any" value="<?php echo $value_price ? esc_attr( $value_price ) : ''; ?>">
    </p>
    <?php
  }

  function fes_change_labels_posts() {

    global $wp_taxonomies;

    // Rename category to product labels
    $labels = &$wp_taxonomies[ 'category' ]->labels;
    $labels->name = 'Product';
    $labels->singular_name = 'Product';
    $labels->add_new = 'Add Product';
    $labels->add_new_item = 'Add Product';
    $labels->edit_item = 'Edit Product';
    $labels->new_item = 'Product';
    $labels->view_item = 'View Product';
    $labels->search_items = 'Search Products';
    $labels->not_found = 'No Products found';
    $labels->not_found_in_trash = 'No Products found in Trash';
    $labels->all_items = 'All Products';
    $labels->menu_name = 'Product';
    $labels->name_admin_bar = 'Product';
  }

  function fes_on_activation_theme() {

    // load_theme_textdomain( 'festejos', get_stylesheet_directory() . '/languages' );

    add_image_size( 'sx-custom-thumbnail', 530, 350, array( 'left', 'center' ) );

    // Create page dinamically
		/**
		 * Page ID or false if the option desn't exist yet
		 *
		 * @var string|boolean $about_page_option
		 */
		 $about_page_option = get_option( 'fes_about_pg' );

		  if ( ! $about_page_option ) { // if there is value

		    // In case that returns false we insert the page

		    /**
		     * Array of arguments for the page
		     *
		     * @var array $main_product_args
		     */
		      $about_page_option_args =
		          array(
		            'post_title' => 'Nuestra historia',
		            'post_name' => 'about-page',
		            'post_content' => '',
		            'post_status' => 'publish',
		            'post_type' => 'page',
                'page_template' => 'about-template.php',
		          );

		      /**
		       * Page ID
		       *
		       * @var string $inserted_about_page
		       */
		      $inserted_about_pg = wp_insert_post( $about_page_option_args, true );

		      // we update an option with the page ID
		      update_option( 'fes_about_pg', $inserted_about_pg );
		  }

      // Create page dinamically
  		/**
  		 * Page ID or false if the option desn't exist yet
  		 *
  		 * @var string|boolean $services_page_option
  		 */
  		 $services_page_option = get_option( 'fes_services_pg' );

  		  if ( ! $services_page_option ) { // if there is value

  		    // In case that returns false we insert the page

  		    /**
  		     * Array of arguments for the page
  		     *
  		     * @var array $main_product_args
  		     */
  		      $services_page_option_args =
		          array(
		            'post_title' => 'Nuestros servicios',
		            'post_name' => 'services-page',
		            'post_content' => '',
		            'post_status' => 'publish',
		            'post_type' => 'page',
                'page_template' => 'services-template.php',
		          );

  		      /**
  		       * Page ID
  		       *
  		       * @var string $inserted_services_page
  		       */
  		      $inserted_services_pg = wp_insert_post( $services_page_option_args, true );

  		      // we update an option with the page ID
  		      update_option( 'fes_services_pg', $inserted_services_pg );
  		  }

        // Create page dinamically
    		/**
    		 * Page ID or false if the option desn't exist yet
    		 *
    		 * @var string|boolean $services_page_option
    		 */
    		 $gallery_pg = get_option( 'fes_my_gallery' );

    		  if ( ! $gallery_pg ) { // if there is value

    		    // In case that returns false we insert the page

    		    /**
    		     * Array of arguments for the page
    		     *
    		     * @var array $main_product_args
    		     */
    		      $gallery_pg_args =
  		          array(
  		            'post_title' => 'My gallery',
  		            'post_name' => 'fes-gallery-pg',
  		            'post_content' => '',
  		            'post_status' => 'publish',
  		            'post_type' => 'page',
                  // 'page_template' => 'gallery-template.php',
  		          );

    		      /**
    		       * Page ID
    		       *
    		       * @var string $inserted_services_page
    		       */
    		      $inserted_gallery_pg = wp_insert_post( $gallery_pg_args, true );

    		      // we update an option with the page ID
    		      update_option( 'fes_my_gallery', $inserted_gallery_pg );
    		  }

        // Create page dinamically, to use as blog page

            /**
             * Page ID or false if the option desn't exist yet
             *
             * @var string|boolean $blog_page_option
             */
             $menu_page_option = get_option( 'fes_menu_pg' );

              if ( ! $menu_page_option ) { // if there is value

                // In case that returns false we insert the page

                /**
                 * Array of arguments for the page
                 *
                 * @var array $blog_page_args
                 */
                  $menu_page_option_args =
                      array(
                        'post_title' => 'Nuestro menú',
                        'post_name' => 'menu-page',
                        'post_content' => 'Esta es la página para el menú',
                        'post_status' => 'publish',
                        'post_type' => 'page',
                  );

                  /**
                   * Page ID
                   *
                   * @var string $inserted_blog_page
                   */
                  $inserted_menu_pg = wp_insert_post( $menu_page_option_args, true );

                  // Store the ID on database, so we can use it later
                  update_option( 'fes_menu_pg', $inserted_menu_pg );

                  // Set the inserted page as a blog page
                  update_option( 'page_for_posts', $inserted_menu_pg );
              }
  }

  function dwf_enqueue_resources() {

    // Enqueue styles
    wp_register_style( 'fes_magnific_popup', get_stylesheet_directory_uri() . '/Magnific-Popup-master/dist/magnific-popup.css' );

    wp_register_style( 'fes_bootstrap', get_stylesheet_directory_uri() . '/bootstrap-4.0/dist/css/bootstrap.min.css' );

    wp_register_style( 'fes_iconmoon', get_stylesheet_directory_uri() . '/IcoMoon-Free/style.css' );

    wp_enqueue_style( 'fes_stylesheets', get_stylesheet_directory_uri() . '/style.css', array( 'fes_bootstrap', 'fes_magnific_popup', 'fes_iconmoon',  ) );

    // Enqueue scripts

    wp_register_script( 'fes_jquery', get_stylesheet_directory_uri() . '/js/jquery-3.2.1.js' );

    wp_register_script( 'fes_magnific_pp_script', get_stylesheet_directory_uri() . '/Magnific-Popup-master/dist/jquery.magnific-popup.min.js' );

    wp_register_script( 'fes_popper', get_stylesheet_directory_uri() . '/bootstrap-4.0/assets/js/vendor/popper.min.js' );

    wp_register_script( 'fes_bootstrap_scripts', get_stylesheet_directory_uri() . '/bootstrap-4.0/dist/js/bootstrap.min.js' );

    wp_enqueue_script( 'fes_scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'fes_jquery', 'fes_magnific_pp_script', 'fes_popper' , 'fes_bootstrap_scripts') );
  }

  function fes_contact_form_data_filter( $name, $email, $number , $message )
  {
    $invalid_nonce = '<h3 class="text-center">' . __( 'Ha ocurrido una acción invalida.', 'festejos' ) . '</h3>';

    // if there is not a valid value for the nonce we return an error message
    if ( ! isset( $_POST['fes_form_nonce'] ) ) {
      return $invalid_nonce;
    }

    if ( ! wp_verify_nonce( $_POST['fes_form_nonce'], 'fes_form_action' ) ) {
      return $invalid_nonce;
    }

    // if is all good we sanitize data and send the email
    $name = sanitize_text_field( $name );
    $email = is_email( $email ) ? sanitize_email( $email ) : '';
    $number = sanitize_text_field( $number );
    $message = esc_textarea( $message );
    $subject = __( 'Email enviado desde el sitio web', 'festejos' );
    $to = get_option( 'admin_email' ) ? get_option( 'admin_email' ) : 'info@festejosybrindis.com';
    $headers = __( 'De: ', 'festejos' ) . $name . '(' . $number . ')' . ' <' . $email . '>';
    $mail = wp_mail( $to, $subject, $message, $headers );

    // Return a message with the status of the operation, success or failure
    if ( $mail ) {
        return apply_filters( 'fes_contact_form_data_filter', '<h3 class="text-center mt-4 text-primary">' . __( "Su mensaje fue enviado con éxito" , 'festejos' ) . '</h3>' );

    } else {
      return apply_filters( 'fes_contact_form_data_filter', '<h3 class="text-center mt-4 text-primary">' . __( 'Ocurrió un error inesperado', 'festejos' ) . '</h3>' );
    }
  }
