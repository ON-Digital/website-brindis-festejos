<?php
  /**
  * The template for the site header
  *
  * @package Dwarf theme
  * @since Dwarf theme 1.0
  */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
  <body <?php body_class( 'overflow-hidden' ); ?>>

    <?php
      dwf_svg_header_definitions();

      get_template_part( 'template-parts/header-part' );
