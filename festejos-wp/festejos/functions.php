<?php
  /**
  * Functions file to
  * configure the theme visual displaying
  */

  require_once( get_stylesheet_directory() . '/includes/customizer-settings.php' );

  // Hooks
  add_action( 'after_setup_theme', 'fes_on_activation_theme' );

  add_action( 'wp_head', 'fes_fonts' );

  add_action( 'widgets_init', 'fes_widgets' );

  // add_action( 'fes_related_posts' , 'fes_related_posts' );

  add_action( 'fes_posts_pagination' , 'fes_posts_pagination' );

  add_action( 'wp_head', 'fes_hero_img' );

  function fes_hero_img()
  {
    global $post;

    $url = get_the_post_thumbnail_url( $post->ID , 'large' );
    ?>

    <style media="screen">

      .bg-thumb-heroPg {
          background-image: url( <?php echo $url; ?> );
      }

    </style>
    <?php
  }

  // Pagination for posts
   function fes_posts_pagination( $sx_total_pags )
  {
      $big = 999999999; // need an unlikely integer

      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        // 'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'prev_text'          => '<span class="icon icon-arrow-left2"></span>' . __( ' Previous', 'festejos' ),
        'next_text'          => __( 'Next ', 'festejos' ) . '<span class="icon icon-arrow-right2"></span>',
        'total' => $sx_total_pags
      ) );
  }

  function fes_related_posts( $sx_tags )
  {
    global $post;

    $args =
      array(
        'tag__in' => $sx_tags, // We use the array of term ids tags
        'post__not_in' => array( $post->ID ),
        'posts_per_page' => 3,
        'has_password' => false,
      );

      $my_query = new WP_Query( $args );

    // So we loop throught posts that have the same tags that the current posts
    if( $my_query->have_posts() ) {

        echo '<section class="row mt-4 related-posts" id="">';
    ?>

      <!-- <h2 class="text-center text-primary p-1 col-12 mb-4 related-posts-tit">
        <?php #_e( 'Publicaciones relacionadas', 'festejos' ); ?>
      </h2> -->

    <?php

      while ( $my_query->have_posts() ) {
        $my_query->the_post();

          /**
           * Thumbnail ID
           *
           * @var integer $id_thumbnail
           */
          $id_thumbnail = get_post_thumbnail_id();

         /**
          * Thumbnail alternative text
          *
          * @var string $alt_thumbnail
          */
         $alt_thumbnail = get_post_meta( $id_thumbnail, '_wp_attachment_image_alt', true );

         /**
          * Number of comments on the current post
          *
          * @var string $comments
          */
         $comments = get_comments_number();

         /**
          * Url post comments
          *
          * @var string $link_comments
          */
         $link_comments = get_comments_link();
        ?>
      <div class="ml-auto mr-auto mb-4">
          <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( 'sx-custom-thumbnail', array( 'class' => 'mw-100 h-75 ml-auto mr-auto', 'alt' => $alt_thumbnail ) ); ?>
          </a>

          <h4 class="line-height mt-3">
            <a href="<?php the_permalink(); ?>" class="text-dark">
              <?php the_title(); ?>
            </a>
          </h4>
          <!-- <div class=""></div> -->

          <p class="">
            <a href="<?php esc_url( $link_comments ); ?>" class="text-primary">
              <?php
                  // translators: %s: Number of comments
                  echo sprintf( _n( '%s comentario', '%s comentarios', $comments, 'festejos'  ), $comments  );
               ?>
             </a>
          </p>
      </div>
        <?php
      }

      echo '</section>';
    }
    wp_reset_postdata();
  }

  function fes_comments_cb( $comments, $args, $depth )
  {
    global $post;
    ?>

    <!-- If it's a pingpack or trackback -->
    <?php
    if ( ( $comments->comment_type === 'pingback' ) || ( $comments->comment_type === 'trackback' ) ) : ?>

        <li class="list-unstyled">
          <article class="sx-pingback mb-4">
              <h3 class="mb-4 d-inline">
                <?php
                    _e( 'Pingback: ', 'festejos' );
                  comment_author_link();
                ?>
              </h3>
          </article>

    <?php
    endif;
    ?>

      <li class="list-unstyled mt-3">
        <article class="<?php echo $comments->user_id === $post->post_author ? 'border border-primary box-shadow p-4' : ''; ?>">
            <h3 class="mb-4 d-inline">

              <?php

                  // Print avatar
                  echo get_avatar( $comments, 41 );

                  // Name of the author wrapped on a link to his/her site
                  comment_author_link( $comments->comment_ID );
              ?>
            </h3>

            <span class="comment-meta commentmetadata">
               <?php
               /* translators: 1: date, 2: time */
               printf( __( '%1$s at %2$s', 'festejos' ), esc_html( get_comment_date() ),  esc_html( get_comment_time() ) ); ?>
            </span>

            <!-- Message if the comment have not been aproved yet -->
            <?php if ( $comments->comment_approved == '0' ) : ?>
                 <span class="comment-awaiting-moderation">
                   <?php _e( 'Tu comentario está esperando por aprobación.', 'festejos' ); ?>
                 </span>
                  <br />
            <?php endif; ?>

            <!-- comment text -->

            <p class="mt-4">
              <?php echo get_comment_text(); ?>
            </p>

            <!-- Replay link -->
            <div class="reply">
                <?php

                  comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );

                 ?>
            </div>
        </article>
    <?php
  }

  function fes_widgets()
  {
    register_sidebar( array (
      'name' => __( "Blog post sidebar 1", 'festejos' ),
      'id' => 'post-right',
      'description' => __( 'Sidebar para blog post en la parte derecha de la pantalla', 'festejos' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>",
      'before_title' => '<h2 class="sidebar-title">',
      'after_title' => "</h2>"
    ) );

    register_sidebar( array (
      'name' => __( "Blog post sidebar 2", 'festejos' ),
      'id' => 'post-down',
      'description' => __( 'Sidebar para blog post en la parte inferior de la pantalla', 'festejos' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>",
      'before_title' => '<h2 class="sidebar-title">',
      'after_title' => "</h2>"
    ) );
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
                        'post_title' => 'Blog',
                        'post_name' => 'fes-blog-pg',
                        'post_content' => 'Página para el blog',
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

    // Enqueue script for thread comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

      wp_enqueue_script( 'comment-reply' );
    }

    // Enqueue styles

    wp_register_style( 'fes_bootstrap', get_stylesheet_directory_uri() . '/bootstrap-4.0/dist/css/bootstrap.min.css' );

    wp_register_style( 'fes_iconmoon', get_stylesheet_directory_uri() . '/IcoMoon-Free/style.css' );

    wp_enqueue_style( 'fes_stylesheets', get_stylesheet_directory_uri() . '/style.css', array( 'fes_bootstrap', 'fes_iconmoon' ) );

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
