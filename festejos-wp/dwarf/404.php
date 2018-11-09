<?php
  /**
  * The template for displaying 404 pages (Not Found).
  *
  * @package Dwarf theme
  * @since Dwarf theme 1.0
  */
  get_header();

  /**
   * Blog page ID
   *
   * @var string $dwf_blog_page_id
   */
   $dwf_blog_page_id = absint( get_option( 'dwf_blog_page_id' ) );
?>
<div class="container-fluid">
    <?php
      // Print 404 'page not found' message
      dwf_404_message_markup();
    ?>

  <hr>
  <div class="row">
    <div class="col-6 ml-auto">
      <p class="text-center">
        <a role="button" class="btn btn-primary btn-primary--customize btn-lg btn-block" href="<?php the_permalink( $dwf_blog_page_id ); ?>">
          <?php _e( 'Go to blog page', 'dwarf-theme' ); ?>
        </a>
      </p>
    </div>
  </div>
</div>
<?php
get_footer();
