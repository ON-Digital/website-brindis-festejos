<?php
   global $wp_query;

   if( have_posts() ) {

     /**
      * @var int $dwf_counter Post counter
      */
     $dwf_counter = 0;

     while ( have_posts() ) {
       the_post();

       echo apply_filters( 'dwf_post_loop_filter', $dwf_counter );

       $dwf_counter++;
     }

     // Pagination if there's more than 1 page
     if ( $wp_query->max_num_pages > 1 ) :

       dwf_posts_pagination();

     endif; /** end pagination conditional */

   } else {
     /* No posts found */
     get_template_part( 'template-parts/content', 'no-results' );
   }
