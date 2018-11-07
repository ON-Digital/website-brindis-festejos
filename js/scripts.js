jQuery( document ).ready( function( $ ) {

  $( '#menu_hamburguer' ).on( 'click', function() {

    $( this ).next().toggleClass( 'menu-max1200-hide' );

  } );

  // Gallery popup

    $('.s-gallery__item').magnificPopup({
   type: 'image',
     // Delay in milliseconds before popup is removed
    removalDelay: 300,

    // Class that is added to popup wrapper and background
    // make it unique to apply your CSS animations just to this exact popup
    mainClass: 'mfp-fade',
     gallery:{
       enabled: true
     }
  });

  // Make that the footer arrow take us to the home section on click

   $( '#scroll_contact, #hacer_pedido' ).on( 'click', function( event ) {

     event.stopPropagation();
     $('html, body').animate({
       scrollTop: $("#contact_section").offset().top
     }, 1000);

   } );

} );
