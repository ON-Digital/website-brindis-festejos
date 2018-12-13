<?php
  add_action( 'customize_register', 'dwf_customizer_settings' );

  // Enqueue scripts for live preview
    add_action( 'customize_preview_init', 'fes_customizer_enqueue_scripts' );


  // add_action( 'wp_enqueque_scripts', 'dwf_print_inline_styles', 11 );

  function fes_customizer_enqueue_scripts()
  {

    wp_register_script( 'fes-customizer-scripts', get_stylesheet_directory_uri() . '/js/fes-customizer-scripts.js', array( 'jquery', 'customize-preview' ) );

    wp_enqueue_script( 'fes-customizer-scripts' );

  }

  function dwf_customizer_settings ( $wp_customize ) {

      // Carousel #1 image
      $wp_customize->add_setting(
         'fes_carousel01_img',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'fes_carousel01_img_control',
              array(
                'label' => esc_html__( 'Imagen #1', 'festejos' ),
                'description' => __( 'Carousel de imagenes', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel01_img'
              )
          )
      );

      $wp_customize->add_setting(
         'fes_carousel01_txt',
         array(
             'default' => 'VIVE TU VIDA POR LO QUE ES, UNA GRAN FIESTA',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'fes_carousel01_txt_control',
              array(
                'label' => esc_html__( 'Texto del primer slide', 'festejos' ),
                // 'description' => __( 'Texto del primer slide', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel01_txt'
              )
          )
      );


      $wp_customize->add_setting(
         'fes_carousel02_img',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'fes_carousel02_img_control',
              array(
                'label' => esc_html__( 'Imagen #2', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel02_img'
              )
          )
      );

      $wp_customize->add_setting(
         'fes_carousel02_txt',
         array(
             'default' => 'VIVE TU VIDA POR LO QUE ES, UNA GRAN FIESTA',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'fes_carousel02_txt_control',
              array(
                'label' => esc_html__( 'Texto del segundo slide', 'festejos' ),
                // 'description' => __( 'Texto del primer slide', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel02_txt'
              )
          )
      );

      $wp_customize->add_setting(
         'fes_carousel03_img',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'fes_carousel03_img_control',
              array(
                'label' => esc_html__( 'Imagen #3', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel03_img'
              )
          )
      );

      $wp_customize->add_setting(
         'fes_carousel03_txt',
         array(
             'default' => 'VIVE TU VIDA POR LO QUE ES, UNA GRAN FIESTA',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'fes_carousel03_txt_control',
              array(
                'label' => esc_html__( 'Texto del tercer slide', 'festejos' ),
                // 'description' => __( 'Texto del primer slide', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'fes_carousel03_txt'
              )
          )
      );

      // End carousel

      // Services text
      $wp_customize->add_setting(
         'services_text01',
         array(
             'default' => 'Contamos con bocaditos de estilo coctel, buffet, y servidos individuales (desechable). Además de platos fuertes estilo buffet o servidos individuales (desechable) para su conveniencia.',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'services_text01_control',
              array(
                'label' => esc_html__( 'Texto servicios de catering', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'services_text01'
              )
          )
      );

      $wp_customize->add_setting(
         'services_text02',
         array(
             'default' => 'Ofrecemos equipo de sonido para alquiler como: discoteca móvil, sonido y micrófonos (música ambiental) y karaoke.',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'services_text02_control',
              array(
                'label' => esc_html__( 'Texto servicios audiovisuales', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'services_text02'
              )
          )
      );

      $wp_customize->add_setting(
         'services_text03',
         array(
             'default' => 'Disponemos de equipo para alquilar como: mesas, sillas mantelerías, además de decoración, arreglos florales, cristalería y cubiertos.',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'services_text03_control',
              array(
                'label' => esc_html__( 'Texto servicio de eventos', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'services_text03'
              )
          )
      );

      // End Services text

      // Image front page
      $wp_customize->add_setting(
         'menu_img_frontpage',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'menu_img_frontpage_control',
              array(
                'label' => esc_html__( 'Imagen para la sección del menú', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_img_frontpage'
              )
          )
      );

      // Image front page
      $wp_customize->add_setting(
         'menu_special_txt',
         array(
             'default' => '',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize, 'menu_special_txt_control',
              array(
                'label' => esc_html__( 'Texto para la sección del menú', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_special_txt'
              )
          )
      );

      $wp_customize->add_setting(
         'menu_pdf',
         array(
             'default' => '',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Upload_Control(
              $wp_customize, 'menu_pdf_control',
              array(
                'label' => esc_html__( 'Subir documento PDF del menú especial', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_pdf'
              )
          )
      );

      $wp_customize->add_setting(
         'menu_special_pdf',
         array(
             'default' => '',
             'sanitize_callback' => 'sanitize_text_field',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Upload_Control(
              $wp_customize, 'menu_special_pdf_control',
              array(
                'label' => esc_html__( 'Subir documento PDF', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_special_pdf'
              )
          )
      );

      // Image front page
      $wp_customize->add_setting(
         'menu_img_services',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'menu_img_services_control',
              array(
                'label' => esc_html__( 'Imagen para la página "servicios"', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_img_services'
              )
          )
      );

      // Image front page
      $wp_customize->add_setting(
         'menu_img_about',
         array(
             'default' => '',
             'sanitize_callback' => 'esc_url_raw',
             'transport' => 'postMessage',
         )
      );

      $wp_customize->add_control(
          new WP_Customize_Image_Control(
              $wp_customize, 'menu_img_about_control',
              array(
                'label' => esc_html__( 'Imagen para la página about us', 'festejos' ),
                'section' => 'static_front_page',
                'settings' => 'menu_img_about'
              )
          )
      );



  }


  function dwf_print_inline_styles() {

    $carousel_item01 = get_theme_mod( 'fes_carousel01_img' );

    $carousel_item02 = get_theme_mod( 'fes_carousel02_img' );

    $carousel_item03 = get_theme_mod( 'fes_carousel03_img' );

    $carousel_items_styling01 = '.carousel-item01 {
      background-image: url( ' . $carousel_item01 . ' );
    }

    .carousel-item03 {
       background-image: url( ' . $carousel_item03 . ' );
    }';


    wp_add_inline_style( 'fes_stylesheets' , $carousel_items_styling01 );

    $carousel_items_styling02 =
      '.carousel-item02 {
        background-image: url( ' . $carousel_item02 . ' );
      }';

    wp_add_inline_style( 'fes_stylesheets' , $carousel_items_styling02 );

    $cooking_bg =
      '.cooking-bg {
        background-image: url( ' . get_stylesheet_directory_uri() . '/img/bg-cooking.png );
      }';

      wp_add_inline_style( 'fes_stylesheets' , $cooking_bg );

      // Setting menu image frontpage
      $menu_img_front = get_theme_mod( 'menu_img_frontpage' );

      $menu_img_front = '.s-menu-special {' .

         'background-image: url(' . $menu_img_front . ');

       }';

      wp_add_inline_style( 'fes_stylesheets', $menu_img_front );


      $img_about = get_theme_mod( 'menu_img_about' );


      $about_pg_img =
      '.p-about__home {
        background-image: url( ' . $img_about . ' );
      }';

      wp_add_inline_style( 'fes_stylesheets', $about_pg_img );


      $img_services = get_theme_mod( 'menu_img_services' );


      $services_pg_img = '.p-services__home {
        background-image: url(' . $img_services . ');
      }';

      wp_add_inline_style( 'fes_stylesheets', $services_pg_img );



  }
