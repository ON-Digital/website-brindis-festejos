<?php
    /**
    * Blog posts index template, this is the main
    * loop template, to show the latest posts
    *
    * @package Dwarf Theme
    * @since Dwarf Theme 1.0
    */
    get_header();

    /**
     * @var string $dwf_blog_title
     */
    $dwf_blog_title = 'dwf_blog_title';

    /**
     * @var string $dwf_post_index_container
     */
    $dwf_post_index_container = 'dwf_post_index_container';
 ?>

   <main role="main">
     <header>
       <h1 class="<?php echo apply_filters( 'dwf_attr_classes', $dwf_blog_title ); ?>" >
         <?php
            /**
            * @var int $dwf_blog_title - Blog page ID
            */
            $dwf_blog_title = get_option( 'page_for_posts', true );

            echo get_the_title( $dwf_blog_title );
         ?>
       </h1>
     </header>

     <?php
        $dwf_post_container_classes =
        apply_filters( 'dwf_attr_classes', $dwf_post_index_container );

        $default = 'row ' . $dwf_post_container_classes;

        $args = array( $default );
     ?>

     <div <?php post_class( $args ); ?> >
        <?php get_template_part( 'template-parts/content', 'index-pages' ); ?>
     </div>
   </main>

<?php
  get_footer();
