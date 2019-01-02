<?php
  get_header();

    if( have_posts() ) { ?>

        <h2 class="w-100 text-center mt-4 mb-4 text-primary font-uppercase font-3rem services-letter-spacing">
          <?php

            echo 'Resultados para ' .

            '<span class="font-oblique">' .

              esc_html( get_search_query() ) .

             '</span>';

          ?>
        </h2>

      <?php

      $counter = 0;
      while ( have_posts() ) {
        the_post();
        ?>
          <?php echo $counter % 2 === 0 ? '<div class="gray-bg">' : ''; ?>

            <article class="container article-index article-index--gap pt-5 pb-5">
              <div class="row">
                <div class="col-10 col-sm-8 ml-auto ml-lg-0 mr-auto mr-lg-0 col-lg-5 <?php echo $counter % 2 === 0 ? 'article-index__excerpt order-2 order-lg-1' : 'order-1 order-lg-2 article-index__thumb'; ?>">

                  <?php
                    $attrs =
                      array(
                        'class' => 'mw-100 box-shadow',

                      );

                      if ( $counter % 2 === 0 ) {

                        echo '<a href="' . esc_url( get_the_permalink() ) . '">' .

                          get_the_post_thumbnail( get_the_ID(), 'sx-custom-thumbnail' , $attrs ) .

                        '</a>';

                      } elseif ( $counter % 2 !== 0 ) { ?>

                        <h2 class="mt-4 article-index__excerpt-tit mt-2">
                          <?php echo get_the_title(); ?>
                        </h2>

                        <p class="w-100">
                          <?php echo get_the_excerpt(); ?>
                        </p>

                        <p>
                          <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary rounded-0 font-uppercase mt-1 pl-5 pr-5">
                            <?php _e( 'Go there', 'kng' ); ?>
                          </a>
                        </p>

                    <?php } ?>
                  </div>

                <div class="col-10 col-sm-8 ml-auto ml-lg-0 mr-auto mr-lg-0 col-lg-6 <?php echo $counter % 2 === 0 ? 'article-index__excerpt order-2 order-lg-1' : 'order-1 order-lg-2 article-index__thumb'; ?>">

                  <?php


                    if ( $counter % 2 === 0 ) { ?>

                      <h2 class="mt-4 article-index__excerpt-tit mt-2">
                        <?php echo get_the_title(); ?>
                      </h2>

                      <p class="w-100">
                        <?php echo get_the_excerpt(); ?>
                      </p>

                      <p>
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary rounded-0 font-uppercase mt-1 pl-5 pr-5">
                          <?php _e( 'Go there', 'kng' ); ?>
                        </a>
                      </p>

                    <?php
                  } elseif ( $counter % 2 !== 0 ) {

                    echo get_the_post_thumbnail( get_the_ID(), 'sx-custom-thumbnail' , $attrs );
                  }

                  ?>

                </div>
              </div>
            </article>

          <?php

          echo $counter % 2 === 0 ? '</div>' : '';

        $counter++;
      }


      if ( $wp_query->max_num_pages > 1 ) :
         ?>
         <!-- Pagination -->
         <section class="mb-3">
           <h5 class="text-center mt-4">
             <?php
                 do_action( 'fes_posts_pagination', $wp_query->max_num_pages );
             ?>
           </h5>
         </section>
        <?php
      endif;

    } else {
      /* No posts found */
    }

  get_footer();
