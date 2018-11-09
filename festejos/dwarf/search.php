<?php
  /**
  * Template for display search queries
  *
  * @package Dwarf Theme
  * @since Dwarf Theme 1.0
  */
  get_header();
 ?>
  <main class="container-fluid" role="main">
    <header class="row">
        <h1 class="text-center">
            <?php
                 echo __( 'Results for: ', 'dwarf-theme' ) . esc_html( get_search_query() );
            ?>
        </h1>
    </header>

    <div class="row">
      <?php
        get_template_part( 'template-parts/content', 'index-pages' );
      ?>
    </div>
  </main>
<?php
get_footer();
