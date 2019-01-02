jQuery( document ).ready( function( $ ) {

  $( '#menu_hamburguer' ).on( 'click', function() {

    $( this ).next().toggleClass( 'menu-max1200-hide' );

  } );

  // Gallery popup

    // $('.s-gallery__item').magnificPopup({
   // type: 'image',
     // Delay in milliseconds before popup is removed
    // removalDelay: 300,

    // Class that is added to popup wrapper and background
    // make it unique to apply your CSS animations just to this exact popup
  //   mainClass: 'mfp-fade',
  //    gallery:{
  //      enabled: true
  //    }
  // });

  // Make that the footer arrow take us to the home section on click

   $( '#scroll_contact, #hacer_pedido' ).on( 'click', function( event ) {

     event.stopPropagation();
     $('html, body').animate({
       scrollTop: $("#contact_section").offset().top
     }, 1000);

   } );

   // var elements = $( '.related-posts' );
   //
   // function fes_carousel( elements ) {
   //    elements.slick( {
   //      dots: false,
   //      arrows: true,
   //      // prevArrow: icon_1,
   //      // nextArrow: icon_2,
   //      slidesToShow: 2,
   //      autoplay: false,
   //      speed: 600,
   //
   //        responsive: [ {
   //
   //          breakpoint: 992,
   //          settings: {
   //            slidesToShow: 2
   //          }
   //        }, {
   //
   //          breakpoint: 768,
   //          settings: {
   //            slidesToShow: 1
   //          }
   //        }
   //     ],
   //
   //    } );
   //  }

} );
