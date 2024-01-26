<section id="contact" class="section-bg" style="margin-top: 70px">
    <div class="container">

       <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>contacto">Contacto</a></li>
        </ol>
      </nav>

      <div class="section-header">
        <h3>Contáctanos</h3>
        <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p> -->
      </div>

      <div class="row contact-info wow fadeInUp">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="ion-ios-location-outline"></i>
            <h3>Dirección</h3>
            <address><a target="_blank" href="https://www.google.cl/maps/place/Brisas+del+Maipo+442,+La+Cisterna,+Regi%C3%B3n+Metropolitana/@-33.5313151,-70.6711404,17z/data=!3m1!4b1!4m5!3m4!1s0x9662dafe21383b49:0x47ad1187a83871db!8m2!3d-33.5313196!4d-70.6689517">Brisas del Maipo 0442, La Cisterna</a></address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="ion-ios-telephone-outline"></i>
            <h3>Teléfono</h3>
            <p><a href="tel:+56-224921091">+562 229824377</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="ion-ios-email-outline"></i>
            <h3>Correo</h3>
            <p><a href="mailto:contacto@splice.cl">contacto@splice.cl</a></p>
          </div>
        </div>

      </div>

      <div class="form wow fadeInUp">
        
        <form role="form" id="contactoForm" class="contactForm">
          <div class="form-row">
            <div class="form-group col-md-4">
              <input autocomplete="on" type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" data-rule="minlen:4" data-msg="Debe ingresar un asunto de al menos 4 caractéres" />
              <div class="validation"></div>
            </div>
            <div class="form-group col-md-4">
              <input autocomplete="on" type="email" class="form-control" name="correo" id="correo" placeholder="Correo" data-rule="email" data-msg="Ingrese un correo válido porfavor." />
              <div class="validation"></div>
            </div>

            <div class="form-group col-md-4">
              <input autocomplete="on" type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" data-rule="minlen:4" data-msg="Debe ingresar un asunto de al menos 8 caractéres" />
              <div class="validation"></div>
            </div>
          </div>

          <!-- <div class="form-row">


             <div class="form-group col-md-6">
              <input type="file" class="form-control" name="file" id="file" placeholder="" style="padding: 7px 14px!important" />
              <div class="validation"></div>
            </div>

          </div> -->

          <div class="form-group">
            <textarea class="form-control" name="mensaje" rows="5" data-rule="required" data-msg="Ingrese un mensaje porfavor." placeholder="Mensaje"></textarea>
            <div class="validation"></div>
          </div>

          <div id="sendmessage">El mensaje a sido enviado con éxito. Gracias!</div>
          <div id="errormessage"></div>

          <div class="text-center"><button type="submit" id="btn_contacto">Enviar</button></div>
        </form>
      </div>

    </div>
  </section><!-- #contact -->