<?php

/**
* Custom theme functions
*
* @package Dwarf theme
* @since Dwarf theme 1.0
*/

require_once( get_template_directory() . '/includes/customizer-settings.php' );
require_once( get_template_directory() . '/includes/template-tags.php' );

// Set content width
add_action( 'after_setup_theme', 'dwf_content_width', 0 );

// Configure theme settings
add_action( 'after_setup_theme', 'dwf_setup_features' );

// Enqueue js scripts and styles
add_action( 'wp_enqueue_scripts', 'dwf_enqueue_resources' );

add_filter( 'dwf_attr_classes', 'dwf_attr_classes' );

// Register widgets
add_action( 'widgets_init', 'dwf_register_sidebars' );

// Filter footer menu output
add_filter( 'dwf_get_menu_items', 'dwf_get_menu_items_cb' );

// output main post loop markup
add_filter( 'dwf_post_loop_filter', 'dwf_post_loop_filter' );

// Output 404 page message markup
add_action( 'dwf_404_message_markup', 'dwf_404_message_markup' );

// Filter comments form markup and add css classes
add_filter( 'comment_form_default_fields', 'dwf_comment_form_default_fields' );

/* --------------------------------------------  */

    if ( ! function_exists( 'dwf_comment_form_default_fields' ) ) :
      /**
      * Filter callback to add some css classes on inputs comments markup
      * @param array $fields Input elements for the comments form
      * @return array $fields Input elements for the comments form
      */
       function dwf_comment_form_default_fields( $fields )
      {
        /**
         * Data of the current commenter
         *
         * @var array $commenter
         */
          $commenter = wp_get_current_commenter();

          /**
           * Wether there's name and email data for the current commenter
           *
           * @var integer $req
           */
          $req = get_option( 'require_name_email' );
          $aria_req = ( $req ? " aria-required='true'" : '' );

          $fields['author'] =

              '<p class="comment-form-author"><label for="author">' . __( 'Name', 'sweet-experience' ) . '</label> ' .
              ( $req ? '<span class="required">*</span>' : '' ) .
              '<input class="form-control margin-bottom" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
              '" size="30"' . $aria_req . ' placeholder="' . __( 'Write your single name', 'sweet-experience' ) . '" /></p>';

            $fields['email'] =
              '<p class="comment-form-email"><label for="email">' . __( 'Email', 'sweet-experience' ) . '</label> ' .
              ( $req ? '<span class="required">*</span>' : '' ) .
              '<input class="form-control margin-bottom" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
              '" size="30"' . $aria_req . ' placeholder="' . __( 'Write your personal email', 'sweet-experience' ) . '" /></p>';
            //
            $fields['url'] =
              '<p class="comment-form-url"><label for="url">' . __( 'Website', 'sweet-experience' ) . '</label>' .
              '<input class="form-control margin-bottom" id="url" name="url" type="text" value="' . esc_url( $commenter['comment_author_url'] ) .
              '" size="30" placeholder="' . __( 'Write your website url', 'sweet-experience' ) . '" /></p>';

          return $fields;
      }
    endif;


    /**
    * Function callback for wp_list_comments() to display comments
    * and pingbacks, you can override this function just writing
    * your own dwf_comments_cb() on your child theme
    *
    * @param array $comments
    * @param array $args
    * @param integer $depth
    */
    if ( ! function_exists( 'dwf_comments_cb' ) ) :
      function dwf_comments_cb( $comments, $args, $depth )
      {
        global $post;
        ?>

        <!-- If it's a pingpack or trackback -->
        <?php
        if ( ( $comments->comment_type === 'pingback' ) || ( $comments->comment_type === 'trackback' ) ) : ?>

            <li class="list-unstyled">
              <article class="dwf-pingback">
                  <h3 class="text-color-secondary-customize d-inline">
                    <?php
                        _e( 'Pingback: ', 'dwarf-theme' );
                      comment_author_link();
                    ?>
                  </h3>
              </article>

        <?php
        endif;
        ?>

          <li class="list-unstyled">
            <article class="<?php echo $comments->user_id === $post->post_author ? 'border-primary-color-customizer container--padding' : ''; ?>">
                <h3 class="display-inline">

                  <?php

                      // Print avatar
                      echo get_avatar( $comments, 41 );

                      // Name of the author wrapped on a link to his/her site
                      comment_author_link( $comments->comment_ID );
                  ?>

                  <!-- Bubble icon -->
                   <span class="icon icon-bubble2"></span>
                </h3>

                <span class="comment-meta commentmetadata">
                   <?php
                   /* translators: 1: date, 2: time */
                   printf( __( '%1$s at %2$s', 'dwarf-theme' ), esc_html( get_comment_date() ),  esc_html( get_comment_time() ) ); ?>
                </span>

                <!-- Message if the comment have not been aproved yet -->
                <?php if ( $comments->comment_approved == '0' ) : ?>
                     <span class="comment-awaiting-moderation">
                       <?php _e( 'Your comment is awaiting moderation.', 'dwarf-theme' ); ?>
                     </span>
                      <br />
                <?php endif; ?>

                <!-- comment text -->

                <p>
                  <?php echo get_comment_text(); ?>
                </p>

                <!-- Replay link -->
                <div class="reply">
                    <?php

                      comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );

                     ?>
                </div>
            </article>
            <hr>
        <?php
      }
    endif;


if ( ! function_exists( 'dwf_posts_pagination' ) ) {
  function dwf_posts_pagination( $dwf_total_pags ) {
    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      // 'format' => '?paged=%#%',
      'current' => max( 1, get_query_var( 'paged' ) ),
      'prev_text'          => '<span class="icon icon-arrow-left2"></span>' . __( ' Previous', 'dwarf-theme' ),
      'next_text'          => __( 'Next ', 'dwarf-theme' ) . '<span class="icon icon-arrow-right2"></span>',
      'total' => $dwf_total_pags
    ) );
  }
}

if ( ! function_exists( 'dwf_regular_taxonomies_content' ) ) {

  function dwf_regular_taxonomies_content() {
    ?>
    <div class="row">
          <?php
            if ( is_category() ) {

              global $cat;

            } elseif ( is_tag() ) {
              /**
               * Query for get the tag posts
               *
               * @var string $single_tag_title Get the current tag title request
               */
                $single_tag_title = single_tag_title( '', false );
            }
          ?>
    </div>
    <?php
    /**
     * Current pagination number
     *
     * @var integer $paged
     */
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    /**
     * Default taxonomy name
     *
     * @var string $taxonomy
     */
    $taxonomy = is_category() ? 'cat' : 'tag';

    /**
     * Term name
     *
     * @var string $term
     */
    $term = is_category() ? $cat : $single_tag_title;

    $args = array(
        $taxonomy => $term,
        'paged' => $paged,
    );

    $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) { $counter_post_archive = 0;
      while ( $my_query->have_posts() ) {
        $my_query->the_post();

         // Display loop content layout
         apply_filters( 'dwf_post_loop_filter', $counter_post_archive );

            $counter_post_archive++;
          } //endwhile

              if ( $my_query->max_num_pages > 1 ) :
                 ?>
                 <!-- Pagination -->
                 <section>
                   <h4 class="text-center">
                     <?php
                         do_action( 'dwf_posts_pagination', $my_query->max_num_pages );
                     ?>
                   </h4>
                 </section>
                 <hr>
                <?php
              endif;

            } else {
              get_template_part( 'template-parts/template-no-results' );
            }

            wp_reset_postdata();
  }
}

if ( ! function_exists( 'dwf_404_message_markup' ) ) {
  // Output 404 page message markup
  function dwf_404_message_markup() {
    ?>
    <div class="row">
        <section class="col-6 ml-auto">
            <h1 class="text-center">
              <?php _e( 'Oops! It seems that page can&rsquo;t be found.', 'dwarf_theme' ); ?>
              <span class="icon icon-confused"></span>
            </h1>

            <p class="text-center">
              <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'dwarf_theme' ); ?>
            </p>
            <hr>
            <?php get_search_form(); ?>
        </section>
    </div>
    <?php
  }
}

if ( ! function_exists( 'dwf_post_loop_filter' ) ) {

  // output main post loop markup
  function dwf_post_loop_filter( $dwf_counter ) {

    return 'The post content';
  }
}

if ( ! function_exists( 'dwf_create_pages_dinamically' ) ) {
  function dwf_create_pages_dinamically() {

    // Create page dinamically, to use as a static front page
    /**
     * Page ID or false if the option desn't exist yet
     *
     * @var string|boolean $front_page_option
     */
     $front_page_option = get_option( 'dwf_front_page_id' );

      if ( ! $front_page_option ) { // if there is value

        // In case that returns false we insert the page

        /**
         * Array of arguments for the page
         *
         * @var array $front_page_args
         */
          $front_page_args =
              array(
                'post_title' => 'Home',
                'post_name' => 'home-page',
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
              );

          /**
           * Page ID
           *
           * @var string $inserted_front_page
           */
          $inserted_front_page = wp_insert_post( $front_page_args, true );

          // we update an option with the page ID
          update_option( 'dwf_front_page_id', $inserted_front_page );

            // Set the created page as a static front page
          update_option( 'page_on_front', $inserted_front_page );
          update_option( 'show_on_front', 'page' );
      }


      // Create page dinamically, to use as blog page

      /**
       * Page ID or false if the option desn't exist yet
       *
       * @var string|boolean $blog_page_option
       */
       $blog_page_option = get_option( 'dwf_blog_page_id' );

        if ( ! $blog_page_option ) { // if there is value

          // In case that returns false we insert the page

          /**
           * Array of arguments for the page
           *
           * @var array $blog_page_args
           */
            $blog_page_args =
                array(
                  'post_title' => 'Blog',
                  'post_name' => 'blog-page',
                  'post_content' => 'This is my blog page',
                  'post_status' => 'publish',
                  'post_type' => 'page',
            );

            /**
             * Page ID
             *
             * @var string $inserted_blog_page
             */
            $inserted_blog_page = wp_insert_post( $blog_page_args, true );

            // Store the ID on database, so we can use it later
            update_option( 'dwf_blog_page_id', $inserted_blog_page );

            // Set the inserted page as a blog page
            update_option( 'page_for_posts', $inserted_blog_page );
        }

  }
}

if ( ! function_exists( 'dwf_get_menu_items_cb' ) ) :

  /**
   * Objects menu item collection
   *
   * @param array $dwf_array_menu_items
   * @return array $args Array of items titles and urls
   */
  function dwf_get_menu_items_cb( $menu_id ) {

    $location = get_nav_menu_locations();

    $menu_id = $location[ $menu_id ];

    $menu_object = wp_get_nav_menu_object( $menu_id );

    $dwf_array_menu_items = wp_get_nav_menu_items( $menu_object->term_id );

    // $args = array();
    //
    //   // Loop throught menu items and print them
    //     foreach ( $dwf_array_menu_items as $key => $dwf_menu_item ) :
    //
    //         /**
    //          * Menu item name
    //          *
    //          * @var string $dwf_title
    //          */
    //         $dwf_title = $dwf_menu_item->title;
    //
    //         /**
    //          * Menu item url
    //          *
    //          * @var string $dwf_url
    //          */
    //         $dwf_url = $dwf_menu_item->url;
    //
    //         $args['title'] = $dwf_title;
    //
    //         $args['url'] = $dwf_url;
    //
    //         endforeach;
    //
    //
    //       $args = array(
    //         'titles' => $dwf_title,
    //         'urls' => $dwf_url,
    //       );

          return $dwf_array_menu_items;
  }
endif;

if ( ! function_exists( 'dwf_register_sidebars' ) ) :

  // Register widgets
  function dwf_register_sidebars() {
    register_sidebar( array (
      'name' => __( "First footer widget", 'dwarf-theme' ),
      'id' => 'dwf-footer-widget',
      'description' => __( 'This is the first footer widget', 'dwarf-theme' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>",
      'before_title' => '<h2 class="sidebar-title">',
      'after_title' => "</h2>"
    ));

    register_sidebar( array (
      'name' => __( "Second Footer widget", 'dwarf-theme' ),
      'id' => 'dwf-footer-widget-2',
      'description' => __( 'This is the second footer widget', 'dwarf-theme' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>",
      'before_title' => '<h2 class="sidebar-title">',
      'after_title' => "</h2>"
    ));

    register_sidebar( array (
      'name' => __( "Header widget", 'dwarf-theme' ),
      'id' => 'dwf-header-widget',
      'description' => __( 'This is the header widget', 'dwarf-theme' ),
      'before_widget' => '<li id="%1$s" class="widget %2$s">',
      'after_widget' => "</li>",
      'before_title' => '<h2 class="sidebar-title">',
      'after_title' => "</h2>"
    ));

  }
endif;

if ( ! function_exists( 'dwf_footer_copyright' )  ) {

  function dwf_footer_copyright() {
    echo '<p class="text-center w-100 mt-2">' . esc_html( get_bloginfo( 'name' ) ) . ' &copy; ' . esc_html( get_the_date( 'Y' ) ) . '</p>';
  }

}

if ( ! function_exists( 'dwf_attr_classes' ) ) {
  function dwf_attr_classes( $slug ) {

    if ( $slug === 'dwf_post_index_container' ) {
      return 'dwf-post-index-container';
    }
  }
}

if ( ! function_exists( 'dwf_get_home_phrase' ) ) :

// Get the home phrase inputted on the customize screen
function dwf_get_home_phrase() {
  $home_phrase = get_theme_mod( 'dwf_front_page_phrase' );

  // Filtering phrase
  $home_phrase_output = apply_filters( 'dwf_get_home_phrase_filter', dwf_get_home_phrase_filter( $home_phrase ) );

  echo esc_html( $home_phrase_output );
}
endif;

if ( ! function_exists( 'dwf_get_home_phrase_filter' ) ) {

  // This filter us for using on child themes,
  // depend on the current project, here we do nothing..
  function dwf_get_home_phrase_filter( $phrase_input ) {

    if ( $phrase_input ) {

      $phrase_output = $phrase_input;

      return apply_filters( 'dwf_get_home_phrase_filter', $phrase_output );
    }
    return apply_filters( 'dwf_get_home_phrase_filter', $phrase_input );
  }
}

if ( ! function_exists( 'dwf_enqueue_resources' ) ) :

// Enqueue js scripts and styles
function dwf_enqueue_resources() {

  // Enqueue styles

  // Register iconmoon
  wp_register_style( 'dwf-iconmoon', get_template_directory_uri() . '/icons/IcoMoon-Free/style.css' );

  // Register bootstrap
  wp_register_style( 'dwf-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );

  wp_enqueue_style( 'dwf-style', get_template_directory_uri() . '/style.css', array( 'dwf-iconmoon', 'dwf-bootstrap' ) );

  // Enqueue scripts
  wp_register_script( 'dwf-bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );

  // Enqueue script for thread comments
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
endif;


if ( ! function_exists( 'dwf_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
 function dwf_content_width()
{
  $GLOBALS['content_width'] = apply_filters( 'dwf_content_width', 800 );
}
endif;

if ( ! function_exists( 'dwf_custom_logo_size' ) ) {

  function dwf_custom_logo_size( $width = 20, $height = 40, $flex_height = true, $flex_width = true ) {

  // Add custom logo feature support
  $args =
    array(
      'width' => $width,
      'height' => $height,
      'flex_height' => $flex_height,
      'flex_width' => $flex_width
    );

  return apply_filters( 'dwf_custom_logo_size', $args );
  }
}


if ( ! function_exists( 'dwf_setup_features' ) ) :
  // Configure theme settings
  function dwf_setup_features() {

    // Create pages dinamically
    dwf_create_pages_dinamically();

    // Add woocommerce plugin support
    add_theme_support( 'woocommerce' );

    // Support html title tag
    add_theme_support( 'title-tag' );

    // Support rss feed
    add_theme_support( 'automatic-feed-links' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add navigation menu
    register_nav_menu( 'dwf_main_menu', __( 'Menu de cabecera', 'dwarf-theme' ) );
    register_nav_menu( 'dwf_footer_menu', __( 'Menu de pie de página', 'dwarf-theme' ) );

    add_theme_support( 'custom-logo', apply_filters( 'dwf_custom_logo_size', dwf_custom_logo_size() ) );

    // Support html5 features
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );
  }
endif;
?>
