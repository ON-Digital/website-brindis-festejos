  <section class="s-contact grid-wrp grid-12cols pb-5 pt-5 gray-bg" id="contact_section">
      <h2 class="whole-cols-width text-primary text-center font-uppercase mb-5 pb-4 subheading--letter-spacing s-contact__heading">
        <?php _e( 'Contáctanos', 'festejos' ); ?>
        <span class="d-block heading2-small font-oblique mt-2"><?php _e( 'Estamos a tu servicio', 'festejos' ); ?></span>
      </h2>

      <div class="s-contact__details justify-self-center cols12-media992">
        <p class="text-primary font-uppercase text-center text-xl-left">

          <span class="s-contact__details-font font-bold"><?php _e( 'Teléfono', 'festejos' ); ?></span>

            <span class="d-block">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 width="21px" height="29.8px" viewBox="0 0 34.3 29.8" preserveAspectRatio="xMidYMax meet">

                 <use xlink:href="#celphone_icon"></use>

              </svg>
              <span class="text-dark">226-4236 / 226-1293</span>
            </span>
        </p>

        <p class="text-primary font-uppercase text-center text-xl-left mt-4 mt-xl-0">
          <span class="s-contact__details-font font-bold">
            <?php _e( 'Fax', 'festejos' ); ?>
          </span>

          <span class="d-block">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       width="27px" height="29.8px" viewBox="0 0 34.3 29.8" preserveAspectRatio="xMidYMax meet" class="icon-translatey">
              <use xlink:href="#fax_icon"></use>
            </svg>

            <span class="text-dark">226-8467</span>
          </span>
        </p>

        <p class="text-primary text-center text-xl-left mt-4 mt-xl-0">

          <span class="s-contact__details-font font-bold">
            <?php _e( 'Email', 'festejos' ); ?>

          </span>

          <span class="d-block">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       width="27px" height="29.8px" viewBox="0 0 34.3 29.8" preserveAspectRatio="xMidYMax meet" class="icon-translatey">
              <use xlink:href="#mail_icon"></use>
            </svg>

            <span class="text-dark">info@festejosybrindis.com</span>
          </span>
        </p>

        <p class="text-primary font-uppercase text-center  text-xl-left mt-4 mt-xl-0">
          <span class="s-contact__details-font font-bold">
            <?php _e( 'Redes sociales', 'festejos' ); ?>
          </span>

          <span class="s-contact__social-icon d-block text-dark mt-2">
            <a href="#" class="text-dark">
              <span class="icon icon-facebook"></span>
            </a>

            <a href="#" class="text-dark">
              <span class="icon icon-instagram"></span>
            </a>
          </span>

        </p>

        <p class="text-primary text-center text-xl-left mt-4 mt-xl-0">
          <span class="s-contact__details-font font-uppercase font-bold">
            <?php _e( 'Dirección', 'festejos' ); ?>
          </span>

          <span class="d-block">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    	 width="34.3px" height="29.8px" viewBox="0 0 34.3 29.8">
              <use xlink:href="#icon_location"></use>
            </svg>

            <span class="pr-md-4 text-dark">

              <?php _e( 'Vía Israel # 97, San Francisco frente
               al Colegio Don Bosco', 'festejos' ); ?>

            </span>
          </span>
        </p>

         <!-- https://api.whatsapp.com/send?phone=50766750995&text=Me%20gustar%C3%ADa%20cotizar%20sus%20servicios -->

        <p class="text-center text-xl-left">
          <a href="https://api.whatsapp.com/send?phone=50766750995&text=Me%20gustar%C3%ADa%20cotizar%20sus%20servicios" target="_blank" class="btn btn-whatsapp font-uppercase font-bold text-white rounded-0 pt-2 pb-2">
            <span class="icon icon-whatsapp icon-whatsapp--size"></span>
            <span class="vertical-align-super">

              <?php _e( 'Contáctenos de inmediato', 'festejos' ); ?>

            </span>
          </a>
        </p>
      </div>

      <div class="s-contact__form mt-5 pt-2 pt-lg-0 mt-lg-0">
        <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post" class="grid-form grid-wrp">

          <?php
            // Nonce for security
             wp_nonce_field( 'fes_form_action', 'fes_form_nonce' );
          ?>
          <label for="name_user" class="sr-only"></label>
          <input type="text" class="form-control outline-0-onfocus rounded-0 border border-dark placeholder-black grid-form__input mb-2 form-control-lg grid-form__input-576" name="name_user" id="name_user" placeholder="Nombre" required>

          <label for="email_user" class="sr-only"></label>
          <input type="email" class="form-control outline-0-onfocus rounded-0 border border-dark ml-sm-5 placeholder-black grid-form__input mb-2 form-control-lg grid-form__input-576" name="email_user" id="email_user" placeholder="Email" required>

          <label for="number_user" class="sr-only"></label>
          <input type="number" class="form-control mt-sm-3 whole-cols-width outline-0-onfocus rounded-0 placeholder-black border border-dark form-control-lg grid-form__input-576" name="number_user" id="number_user" placeholder="Teléfono" required>

          <textarea name="contact_message" id="contact_message" rows="8" cols="80" class="whole-cols-width mt-2 mt-sm-4 p-2 outline-0-onfocus border border-dark placeholder-black grid-form__input-576" placeholder="Su mensaje" required></textarea>

          <input type="submit" class="btn btn-primary rounded-0 mt-2 c-btn-width font-uppercase cursor-pointer" name="submit_contact_values" id="submit_contact_values" value="Enviar">
        </form>

        <?php
            // if data is submitted we call the filter callback that handle that data, send the mail and display a message that indicate the status of the operation
           if ( isset( $_POST['submit_contact_values'] ) )
           {
             $name_user = $_POST['name_user'];
             $email_user = $_POST['email_user'];
             $number_user = $_POST['number_user'];
             $message = $_POST['contact_message'];

             if ( ! empty( $name_user ) && ! empty( $email_user ) && ! empty( $number_user ) && ! empty ( $message ) ) {

               echo apply_filters( 'fes_contact_form_data_filter', fes_contact_form_data_filter( $name_user, $email_user, $number_user , $message ) );

             } else {

               $die_message = '<h3 class="text-center mt-3 text-primary">' . __( 'Lo siento, pero todos los campos son requeridos', 'festejos' ) . '</h3>';

               wp_die( $die_message );
             }
           }
        ?>
      </div>
    </section>

    <footer class="grid-wrp grid-12cols overflow-hidden gray-bg">
      <h2 class="whole-cols-width font-uppercase text-primary subheading--letter-spacing text-center mb-4 gray-bg mt-5">
        <?php _e( 'Mapa', 'festejos' ); ?>
      </h2>

      <div class="whole-cols-width">
        <iframe class="mw-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.8344695079504!2d-79.51002868521368!3d8.987374993549734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca904597702d9%3A0x9f34060c81637512!2sFestejos+y+Brindis!5e0!3m2!1ses!2sve!4v1541330588977" width="9999" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <?php

        $frontpage_id = get_option( 'page_on_front' );

        $about_page_option = get_option( 'fes_about_pg' );

        $services_page_option = get_option( 'fes_services_pg' );

        ?>

        <div class="whole-cols-width text-center bg-dark w-100">
          <ul class="list-unstyled pt-3">
            <li class="d-inline-block ml-sm-5 text-center text-sm-left w-100 w-sm-inherit">
              <a href="<?php echo esc_url( get_the_permalink( $frontpage_id ) ); ?>" class="text-white menu-item font-uppercase menu-item--letter-spacing">Inicio <span class="d-inline-block arrow-character ml-3">&#711;</span>
              </a>
            </li>

            <li class="d-inline-block ml-sm-5 text-center text-sm-left w-100 w-sm-inherit">
              <a href="<?php echo esc_url( get_the_permalink( $about_page_option ) ); ?>" class="text-white menu-item font-uppercase menu-item--letter-spacing">Nosotros <span class="d-inline-block arrow-character ml-3">&#711;</span>
              </a>
            </li>

            <li class="d-inline-block ml-sm-5 text-center text-sm-left w-100 w-sm-inherit">
              <a href="<?php echo esc_url( get_the_permalink( $services_page_option ) ); ?>" class="text-white font-uppercase menu-item menu-item--letter-spacing">Servicios <span class="d-inline-block arrow-character ml-3">&#711;</span>
              </a>
            </li>

            <li class="d-inline-block ml-sm-5 text-center text-sm-left w-100 w-sm-inherit">
              <a href="<?php echo esc_url( get_theme_mod( 'menu_special_pdf' ) ? get_theme_mod( 'menu_special_pdf' ) : '' ); ?>" target="_blank" class="text-white font-uppercase menu-item menu-item--letter-spacing">Menú <span class="d-inline-block arrow-character ml-3">&#711;</span>
              </a>
            </li>
          </ul>

        <p class="text-white text-center w-100 whole-cols-width s-contact__social-icon">
          <a href="https://www.facebook.com/festejosybrindis/" target="_blank" class="text-white">
            <span class="icon icon-facebook"></span>
          </a>

          <a href="https://www.instagram.com/fyb_panama/" target="_blank" class="text-white">
            <span class="icon icon-instagram"></span>
          </a>
        </p>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
