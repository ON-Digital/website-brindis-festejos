jQuery( document ).ready( function( $ ) {

  wp.customize( 'fes_carousel01_img', function( value ) {

   value.bind( function( to ) {
     $( '.carousel-item01' ).css( 'background-image', 'url(' + to + ')' );
   } );

 } );

   wp.customize( 'fes_carousel02_img', function( value ) {

    value.bind( function( to ) {
      $( '.carousel-item02' ).css( 'background-image', 'url(' + to + ')' );
    } );

  } );

  wp.customize( 'fes_carousel03_img', function( value ) {

   value.bind( function( to ) {
     $( '.carousel-item03' ).css( 'background-image', 'url(' + to + ')' );
   } );

  } );

  wp.customize( 'menu_img_frontpage', function( value ) {

   value.bind( function( to ) {
     $( '.s-menu-special' ).css( 'background-image', 'url(' + to + ')' );
   } );

  } );


  wp.customize( 'fes_carousel01_txt', function( value ) {

   value.bind( function( to ) {
     $( '#carousel_txt_01' ).html( to );
   } );

  } );

  wp.customize( 'fes_carousel02_txt', function( value ) {

   value.bind( function( to ) {
     $( '#carousel_txt_02' ).html( to );
   } );

  } );

  wp.customize( 'fes_carousel03_txt', function( value ) {

   value.bind( function( to ) {
     $( '#carousel_txt_03' ).html( to );
   } );

  } );

  wp.customize( 'services_text01', function( value ) {

   value.bind( function( to ) {
     $( '#services_txt01' ).html( to );
   } );

  } );

  wp.customize( 'services_text02', function( value ) {

   value.bind( function( to ) {
     $( '#services_txt02' ).html( to );
   } );

  } );

  wp.customize( 'services_text03', function( value ) {

   value.bind( function( to ) {
     $( '#services_txt03' ).html( to );
   } );

  } );

  wp.customize( 'menu_special_txt', function( value ) {

   value.bind( function( to ) {
     $( '#menu_special_txt' ).html( to );
   } );

  } );

  wp.customize( 'menu_img_about', function( value ) {

   value.bind( function( to ) {
     $( '.p-about__home' ).css( 'background-image', 'url(' + to + ')' );
   } );

  } );

  wp.customize( 'menu_img_services', function( value ) {

   value.bind( function( to ) {
     $( '.p-services__home' ).css( 'background-image', 'url(' + to + ')' );
   } );

  } );

  wp.customize( 'btn_txt_wht', function( value ) {

   value.bind( function( to ) {
     $( '#btn_txt_wht' ).html( to );
   } );

  } );

  wp.customize( 'horario_txt', function( value ) {

   value.bind( function( to ) {
     $( '#horario_txt' ).html( to );
   } );

  } );

} );
