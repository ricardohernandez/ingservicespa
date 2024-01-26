 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <center><a href="#intro"><img src="<?php echo base_url() ?>assets/img/logo_splice_blanco.png" style="width: 170px;margin-left: 0px;" alt="" title="" /></a></center>
            <br>
            <p>
            Como objetivo primordial INGserviceSPA procura que cada uno de sus clientes, este satisfecho con el profesionalismo y calidad humana de sus colaboradores .
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links de interés</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#intro">Inicio</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Nosotros</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#services">Servicios</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#contact">Contacto</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Qué hacemos</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#!">Telecomunicaciones</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#!">Obras eléctricas</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#!">Obras civiles</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#!">Servicios eléctricos para minería</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contacto</h4>
            <p>
              Dieciocho de Septiembre 815 , <br>
              Iquique, Chile <br>
              <strong>Teléfono:</strong><a href="tel:+569-37782255" style="color:#fff;">+56 9 3778 2255</a><br>
              <strong>Correo:</strong> contacto@ingservicespa.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>IngserviceSPA  <?php echo date("Y") ?></strong>. Todos los derechos reservados
      </div>
      <div class="credits">
      </div>
    </div>
  </footer>

  
  <a title="Abrir chat" href="https://api.whatsapp.com/send/?phone=56936394124&text=Hola%21&type=phone_number&app_absent=0" target="_blank" class="whatsapp-icon">
      <i class="fa fa-whatsapp"></i>
  </a>

  <script type="text/javascript">
    $(function(){
        base = "<?php echo base_url() ?>"
        $("#errormessage").hide()
        $("#sendmessage").hide()
        
        $('#contactoForm').submit(function() {
          var formElement = document.querySelector("#contactoForm");
          var formData = new FormData(formElement);
          
          $.ajax({
            type: "POST",
            url: base+"enviaContacto",
            data: formData,
            cache: false,
            processData: false,
            dataType: "json",
            contentType : false,
            beforeSend:function(){
              $("#btn_contacto").prop("disabled",true);
            },
            success: function(data) {
              $("#btn_contacto").prop("disabled",false);
              if (data.res == 'ok') {
                $("#sendmessage").html(data.msg).show();
                $("#errormessage").hide("show");
                $('#contactoForm')[0].reset();
              } else {
                $("#sendmessage").hide();
                $("#errormessage").html(data.msg).show();
              }

            }
          });
        return false;
      });
    });

  </script>
  <style type="text/css">
    .blinking{
     animation:blinkingText 1.2s infinite;
    }
    @keyframes blinkingText{
        0%{     color: #fff;    }
        39%{    color: #fff; }
        60%{    color: #F7D000; }
        89%{    color: #F7D000;  }
        100%{   color: #fff;    }
    }
  </style>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <link href="<?php echo base_url() ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/main2.js"></script>

</body>
</html>
