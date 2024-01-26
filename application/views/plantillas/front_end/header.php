<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Splice Chile</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
  
  <meta name="author" content="Splice Chile">
  <meta name="reply-to" content="contacto@splice.cl">
  <link rev="made" href="mailto:contacto@splice.cl">
  <meta name="description" content="Somos una empresa de soluciones integrales con más de 15 años de trayectoria en las áreas de Ingeniería, Construcción, Mantenimiento, Servicios y Outsourcing.">
  <meta name="keywords" content="ley de ductos,20080,empresa,telecomunicaciones,construcción redes,mantenimiento,rpi,rit">
  <meta name="robots" content="ALL">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/style2.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/lib/jquery/jquery.min.js"></script>

</head>

<body>
<style type="text/css">
  .dropdown-toggle::after {
    content: none!important;
  }
</style>
<!--MENU-->
    
  <?php 
    $header = $this->uri->segment(1)=="" ? 'header' : 'header2';
   ?>
    <header id="<?php echo $header ?>">
  
    <div class="header-top">
        <div class="container">
              <div class="row">
                    <div class="col-lg-8">
                          <div class="topbar-left">
                                <ul>
                                      <li><i class="fa fa-envelope-o"></i><span>Email: </span><a href="mailto:contacto@ingservicespa.com">contacto@ingservicespa.com</a></li>
                                      <li><i class="fa fa-phone"></i><a href="tel:+56 9 3778 2255">+56 9 3778 2255</a></li>
                                </ul>
                          </div>
                    </div>
                    <div class="col-lg-4">
                          <div class="topbar-right">
                                <ul>
                                      <li class="toph-loc"><i class="fa fa-map-marker"></i>Dieciocho de Septiembre 815 , Iquique.</li>
                                </ul> 
                          </div>
                    </div>
              </div>
        </div>
    </div>

    <div class="container-fluid"> 

      <div class="menu">
        <div id="logo" class="pull-left">
          <!-- <h1><a href="#intro" class="scrollto">BizPage</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" title=""/></a>
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="#intro">Inicio</a></li>
            <li><a  href="#about">Nosotros</a></li>
            <li><a  href="#services">SERVICIOS</a></li>
            <li><a  href="#contact">Contacto</a></li>
            
            <li> 
              <a class="nav-link dropdown-toggle" style="margin-top: -5px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
              <i class="ion-ios-email" style="font-size: 20px;"></i>
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <div class="dropdown-divider"></div>
                <a style="color:#4B74B3;" class="dropdown-item" target="_blank" href="#!">Correo</a>
              </div>
            </li>

          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </div>
  </header><!-- #header -->


 