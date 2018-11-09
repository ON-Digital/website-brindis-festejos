<?php
  /**
  * Template Name: Pagina Servicios
  *
  * @package Festejos
  * @since Festejos 1.0
  */
  get_header();
?>

  <header class="grid-wrp grid-12cols">
    <h1 class="text-center w-100 whole-cols-width font-uppercase subheading--letter-spacing text-primary mt-5">
      <?php

      global $post;

        if ( get_the_title( get_the_ID() ) ) {

          echo esc_html( get_the_title() );

        } else {
          ?>
          <span class="main-heading--small font-oblique"><?php _e( 'Nuestros', 'festejos' ); ?></span>
          <span class="d-block"><?php _e( 'Servicios', 'festejos' ); ?></span>
        <?php
      }

      ?>
    </h1>
  </header>

 <?php if ( apply_filters( 'the_content', get_post( get_the_ID() )->post_content ) ) :

   echo apply_filters( 'the_content', get_post( get_the_ID() )->post_content );

 else: ?>

   <main class="grid-wrp grid-12cols mb-5">
    <div class="p-services p-services--cols mt-5 pt-3 text-center w-100">
      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#boquitas_icon"></use>
        </svg>

        <p class="font-uppercase mt-1"><?php _e( 'Boquitas', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#cutlery_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Comidas', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#ice_cream_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Postres', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#soda_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Refrescos', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#microphone_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Equipo', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#decoration_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Decoraciones', 'festejos' ); ?></p>
      </span>

      <span class="mr-3 mt-2 d-inline-block p-2">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  width="88px" height="84px" viewBox="0 0 88 84" enable-background="new 0 0 88 84" xml:space="preserve">
          <use xlink:href="#innkeeper_icon"></use>
        </svg>
        <p class="font-uppercase mt-1"><?php _e( 'Otros servicios', 'festejos' ); ?></p>
      </span>

      <hr class="mt-3">

      <p class="pt-3 p-services__description text-primary">
        <?php _e( 'En Festejos y Brindis contamos con un amplio surtido de servicios para su evento', 'festejos' ); ?>
      </p>
    </div>
  </main>
  <?php
endif; ?>

<?php
  get_footer();
