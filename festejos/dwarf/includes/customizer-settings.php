<?php
// css parser to sanitize customizer styles coming from database
include( get_template_directory() . '/csstidy/class.csstidy.php' );

// Hooks

  // Register customizer settings
  add_action( 'customize_register', 'dwf_customizer_settings' );

  // Get styles from database, pass it throught
  // a parser filter and printed in a dynamic inline way
  add_action( 'wp_enqueue_scripts', 'dwf_print_inline_styles', 11 );

// End Hooks


function dwf_parse_css( $css_rule ) {

    $css = new csstidy();

    $css->set_cfg( 'remove_last_;', true );

    $css->parse( $css_rule );

    return strip_tags( $css->print->formatted() );
}



if ( ! function_exists( 'dwf_print_inline_styles' ) ) :

// Get styles from database, pass it throught
// a parser filter and printed in a dynamic inline way
function dwf_print_inline_styles() {

    // Home hero image
    $hero_image_url =  get_theme_mod( 'dwf_hero_img', get_template_directory_uri() . '/static-img/landing-section.jpeg' );

    $hero_image_frontpage =
      '.landing-section {
        background: url(' . $hero_image_url . ');
      }';

    $hero_image_frontpage_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $hero_image_frontpage ) );

    wp_add_inline_style( 'dwf-style', $hero_image_frontpage_output );


    // Theme primary color
    $primary_color = get_theme_mod( 'dwf_primary_color', '#000' );

    $bg_primary = '.bg-primary-customize {
      background: ' . $primary_color . ';
    }

    .bg-primary-customize .search-field {
      background: ' . $primary_color . ';
    }';

    $bg_primary_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $bg_primary ) );

    wp_add_inline_style( 'dwf-style', $bg_primary_output );

    // Theme secondary color
    $secondary_color = get_theme_mod( 'dwf_secondary_color', '#000' );

    $bg_secondary = '.bg-secondary-customize {
      background: ' . $secondary_color . ';
    }';

    $bg_secondary_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $bg_secondary ) );

    wp_add_inline_style( 'dwf-style', $bg_secondary_output );


    // Text color inside containers

    // Text primary color
    $dwf_color_text_primary_containers =
    get_theme_mod( 'dwf_color_text_primary_containers' );

    $text_primary_color =
      '.bg-primary-customize a,
      .bg-primary-customize label,
      .bg-primary-customize h1,
      .bg-primary-customize h2,
      .bg-primary-customize h3,
      .bg-primary-customize h4,
      .bg-primary-customize h5,
      .bg-primary-customize h6,
      .bg-primary-customize p
       {
        color: ' . $dwf_color_text_primary_containers . ';
      }';

    $text_primary_color_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $text_primary_color ) );

    wp_add_inline_style( 'dwf-style', $text_primary_color_output );

    // Placeholder color
    $placeholder_color =
     '.bg-primary-customize ::-webkit-input-placeholder,
     .bg-primary-customize .form-control {
        color:' . $dwf_color_text_primary_containers .  '!important;
      }

      .bg-primary-customize :-ms-input-placeholder {
        color:' . $dwf_color_text_primary_containers .  '!important;
      }

      .bg-primary-customize ::-moz-placeholder {
        color:' . $dwf_color_text_primary_containers .  '!important;
        opacity: 1;
      }';

      $placeholder_color_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $placeholder_color ) );

      wp_add_inline_style( 'dwf-style', $placeholder_color_output );


    // Border search field inside bg-primary color
    $border_searchfield =
    '.bg-primary-customize .search-field {
        border-color: ' . $dwf_color_text_primary_containers .
    '}';

    $border_searchfield_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $border_searchfield ) );

    wp_add_inline_style( 'dwf-style', $border_searchfield_output );

    // Text secondary color

    $dwf_color_text_secondary_containers =
    get_theme_mod( 'dwf_color_text_secondary_containers' );

    $text_secondary_color =
      '.dwf-main-menu li a {
        color: ' . $dwf_color_text_secondary_containers . ';
      }';

    $text_secondary_color_output = apply_filters( 'dwf_parse_css', dwf_parse_css( $text_secondary_color ) );

    wp_add_inline_style( 'dwf-style', $text_secondary_color_output );

}
endif;

if ( ! function_exists( 'dwf_customizer_settings' ) ) :

// Register customizer settings
function dwf_customizer_settings( $wp_customize ) {


  // $wp_customize->add_setting(
  //   'dwf_home_pages', array(
  //     'default' => '',
  //     'transport' => 'postMessage',
  //   )
  // );
  //
  // $wp_customize->add_control(
  //   new Dropdown_Pages(
  //     $wp_customize,
  //     'dwf_home_pages_ctrl',
  //     array(
  //       'label'    => esc_html__( 'Pages', 'dwarf' ),
  //       'description' => esc_html__( 'Select some pages, which info you want to show on the front page', 'dwarf' ),
  //       'section'  => 'static_front_page',
  //       'settings' => 'dwf_home_pages',
  //       'priority' => 10,
  //       'input_attrs' => array(
  //         'id' => 'page',
  //         'name' => 'page',
  //       )
  //     )
  //   )
  // );


  // Primary color theme
  $wp_customize->add_setting(
     'dwf_primary_color',
     array(
         'default' => '#ffc600',
         'sanitize_callback' => 'sanitize_hex_color',
         'transport' => 'postMessage',

     )
  );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize, 'dwf_primary_color_control',
          array(
              'label' => esc_html__( 'Primary color', 'dwarf-theme' ),
              'section' => 'colors',
              'settings' => 'dwf_primary_color'
          )
      )
  );

  // Theme secondary color
  $wp_customize->add_setting(
    'dwf_secondary_color',
    array(
      'default' => '#ae09b2',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'dwf_secondary_color_control',
      array(
        'label' => esc_html__( 'Secondary color', 'dwarf-theme' ),
        'section' => 'colors',
        'settings' => 'dwf_secondary_color'
      )
    )
  );

  // Text color inside secondary color containers
  $wp_customize->add_setting(
     'dwf_color_text_secondary_containers',
     array(
         'default' => '#fff',
         'sanitize_callback' => 'sanitize_hex_color',
         'transport' => 'postMessage',

     )
  );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize, 'dwf_color_text_secondary_containers_control',
          array(
              'label' => esc_html__( 'Text secondary color', 'dwarf-theme' ),
              'description' => wordwrap( esc_html__( 'Text color inside secondary color sections', 'dwarf-theme' ), 26, "<br />\n" ),
              'section' => 'colors',
              'settings' => 'dwf_color_text_secondary_containers'
          )
      )
  );


  // Text color inside primary color containers
  $wp_customize->add_setting(
     'dwf_color_text_primary_containers',
     array(
         'default' => '#000',
         'sanitize_callback' => 'sanitize_hex_color',
         'transport' => 'postMessage',
     )
  );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize, 'dwf_color_text_primary_containers_control',
          array(
              'label' => esc_html__( 'Text primary color', 'dwarf-theme' ),
              'description' => wordwrap( esc_html__( 'Text color inside primary color sections', 'dwarf-theme' ), 26, "<br />\n" ),
              'section' => 'colors',
              'settings' => 'dwf_color_text_primary_containers'
          )
      )
  );

  // Home hero image settings
  $wp_customize->add_setting(
    'dwf_hero_img', array(
      'default' => get_template_directory_uri() . '/static-img/landing-section.jpeg',
      'sanitize_callback' => 'esc_url_raw',
      'transport' => 'postMessage',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'dwf_hero_img_ctrl',
      array(
        'label'    => esc_html__( 'Front page hero image', 'dwarf' ),
        'description' => esc_html__( 'Select an image to use as a cover photo', 'dwarf' ),
        'section'  => 'static_front_page',
        'settings' => 'dwf_hero_img',
        'priority' => 10,
      )
    )
  );


  // Input a phrase or slogan to
  // appear on the home section of front page
  $wp_customize->add_setting(
    'dwf_front_page_phrase',
    array(
      'default' => "Hello I'm the Dwarf",
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'dwf_front_page_phrase_ctrl',
      array(
        'label' => esc_html__( 'Input some slogan or phrase', 'dwarf' ),
        'section' => 'static_front_page',
        'settings' => 'dwf_front_page_phrase',
      )
    )
  );
}
endif;
?>
