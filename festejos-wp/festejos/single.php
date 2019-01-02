<?php
    get_header();
  ?>

  <div class="container-fluid post-content mt-5 mb-5">
    <div class="row">
      <div class="<?php echo is_active_sidebar( 'post-right' ) ? 'col-11 col-xl-9' : 'col-10'; ?> ml-auto mr-auto">
          <?php
              if( have_posts() ) {
                while ( have_posts() ) {
                  the_post(); ?>

                  <h1 class="text-center text-primary mb-4">

                    <?php
                      $title_post = get_the_title();

                      echo $title_post;
                    ?>
                  </h1>

                  <hr>

                  <?php
                    the_content();
                }
              } else {
                /* No posts found */
              }

          ?>
      </div>

      <?php

        if ( is_active_sidebar( 'post-right' ) ) { ?>

          <div class="d-none d-xl-block col-xl-2 ml-auto">
            <?php get_sidebar( 'post-right' ); ?>
          </div>
          <?php
        }
      ?>
    </div>
  </div>

<?php

    if ( is_active_sidebar( 'post-down' ) ) {
      ?>

        <hr class="mb-4">

      <?php
      get_sidebar( 'post-down' );
    }

    if ( comments_open() || get_comments_number() ) {
      ?>

      <div class="container-fluid">
        <div class="row">
          <div class="w-100 separator-comments mb-5 mt-2 d-none d-lg-block">
          </div>

          <!-- <hr> -->
          <div class="col-md-6 ml-auto mr-auto mt-5 mt-lg-0">
            <?php comments_template(); ?>
          </div>
        </div>
      </div>

      <?php
    }
    get_footer();
