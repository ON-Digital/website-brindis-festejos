<?php
  /**
  * Display front page layout
  *
  * @package Dwarf theme
  * @since Dwarf theme 1.0
  */
  get_header();

    // User landing section
    get_template_part( 'template-parts/homepage/homepage-landing' );

    // Main front page content
    get_template_part( 'template-parts/homepage/front-page-main-content' );

  get_footer();
