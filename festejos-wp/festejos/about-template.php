<?php
/**
* Template Name: Pagina about
*
* @package Festejos
* @since Festejos 1.0
*/
get_header();
?>

<header class="grid-wrp grid-12cols">
  <h1 class="text-center w-100 whole-cols-width font-uppercase subheading--letter-spacing text-primary mt-5 mb-4">
    <?php

    global $post;

      if ( get_the_title( get_the_ID() ) ) {

        echo esc_html( get_the_title() );

      } else {
        ?>
        <span class="d-block main-heading--small font-oblique"><?php _e( 'Tradición familiar', 'festejos' ); ?></span>
          <?php _e( 'Nosotros', 'festejos' ); ?>
      <?php
    }

    ?>
  </h1>
</header>

<?php
  if ( apply_filters( 'the_content', get_post( get_the_ID() )->post_content ) ) :

    ?>

    <div class="container mb-5">
      <div class="row">

        <?php
            the_content();
        ?>

      </div>
    </div>

    <?php

  else : ?>

  <div class="p-about grid-wrp grid-12cols mb-5 pb-5">

      <div class="p-about__thumb mt-4">
        <!-- <img src="img/about-page-thumb.jpg" class="mw-100" alt=""> -->
        <?php
          echo get_the_post_thumbnail( get_the_ID() , 'sx-custom-thumbnail', array( 'class' => 'mw-100' ) );

        ?>

      </div>

      <div class="p-about__description mt-4">
        <p class="ml-5 mt-4 mt-xl-0 text-center text-xl-left">
          <?php _e( 'Festejos y Brindis nace en 1982, Como empresa dedicada a la fabricación de comidas
          para fiestas y servicio de alquiler de equipo. Actualmente contamos con más de 25
          años de experiencia brindando el complemento necesario para sus eventos. Hoy en
          día Festejos y Brindis esta bajo la Administración de la segunda generación Familiar,
          es por esto que nace nuestro lema “Tradición Familiar a su servicio.
          El compromiso de Festejos y Brindis es Ofrecer a nuestros clientes todo lo necesario
          para satisfacer la organización de su evento, por medio de un amplio surtido de
          comidas y bocaditos, alquileres de equipos y Servicios adicionales, con una alta
          calidad, a precios competitivos y económicos.
          Seguir siendo una empresa en los servicios de Catering y alquileres de equipos para
          su evento, Diversificándonos para poder ofrecer cada día, más opciones de servicios
          a nuestros clientes para la realización de sus eventos.', 'festejos' ); ?>
        </p>
      </div>
  </div>

<?php
  endif;

  get_footer(); ?>
