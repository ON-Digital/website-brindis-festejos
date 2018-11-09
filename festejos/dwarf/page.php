<?php
  /**
  * Template for pages layout
  *
  * @package Dwarf theme
  * @since Dwarf theme 1.0
  */
    get_header();
  ?>

  <div class="container">
    <div class="row">
      <div class="col-8 ml-auto mr-auto">
        <?php
          if( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              ?>

              <h1 class="text-center w-100">
                <?php
                  the_title();
                ?>
              </h1>

              <?php
              the_content();
            }
          } else {

              get_template_part( 'template-parts/content', 'no-results' );

          }
        ?>
      </div>
    </div>
  </div>
<?php
  get_footer();
