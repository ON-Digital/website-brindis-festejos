<?php
  /**
  * Template for regular posts layout
  *
  * @package Dwarf theme
  * @since Dwarf theme 1.0
  */

    get_header();
  ?>
  <div class="container-fluid">
      <main class="row" role="main">
        <!-- Article columns -->
          <article class="<?php echo is_active_sidebar( 'post-right' ) ? 'col-md-8 ml-md-auto' : 'col-12'; ?> text-center">

              <?php if( have_posts() ):
                    while ( have_posts() ) : the_post();
              ?>

              <h2 class="text-center">
                <?php the_title(); ?>
              </h2>
              <hr>
              <?php the_content(); ?>
          </article>

          <?php

            if ( is_active_sidebar( 'post-right' ) ) {
              ?>
                <!-- Widgets columns -->
                <div class="col-md-2 ml-md-auto d-md-block">
                  <div class="row d-md-block">
                      <?php get_sidebar( 'post-right' ); ?>
                  </div>
                </div>
              <?php
            }
           ?>
      </main>

        <!-- Enable post pagination -->
      <aside class="row">
          <?php
             wp_link_pages( array(
                  'before'      => '<div class="page-links col-12 col-md-6 ml-md-auto"><h4 class="page-links-title text-center">',
                  'after'       => '</h4></div>',
                  'link_before' => '<span>',
                  'link_after'  => ' &raquo</span>',
                  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'sweet-experience' ) . ' </span>%',
                  'separator'   => '<span class="screen-reader-text">, </span>',
                  'next_or_number' => 'next',
              ) );
           ?>
      </aside>
      <?php
      // Comments
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          ?>
              <div class="row">
                <div class="col-md-6 ml-md-auto">
                  <?php comments_template(); ?>
                </div>
              </div>
      <?php
          endif;
      ?>
  </div>
  <?php
    get_footer();
