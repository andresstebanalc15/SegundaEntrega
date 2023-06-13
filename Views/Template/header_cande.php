<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $data['page_tag'] ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= media() ?>/candeaseo/img/favicon.png" rel="icon">
  <link href="<?= media() ?>/candeaseo/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= media() ?>/candeaseo/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= media() ?>/candeaseo/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= media() ?>/candeaseo/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= media() ?>/candeaseo/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= media() ?>/candeaseo/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/candeaseo/css/estilo.css">

    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/js/datepicker/jquery-ui.min.css">

  <!-- Template Main CSS File -->
  <link href="<?= media() ?>/candeaseo/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact - v1.2.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <div id="divLoading" >
    <div>
      <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
    </div>
  </div>

  <!-- ======= Header ======= -->
  <section id="topbargov" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="gov"><a href="https://www.gov.co"><img src="<?= media() ?>/candeaseo/img/gov.png" alt="gov"></a></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="text-plus"><i class="bi bi-file-earmark-plus"></i></a>
        <a href="#" class="text-minus"><i class="bi bi-file-earmark-minus"></i></a>
        <a href="#" class="text-contraste"><i class="bi bi-file-font-fill"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar .GOV -->

  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= EMAIL_REMITENTE ?>"><?= EMAIL_REMITENTE ?></a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= CONTACTO_REMITENTE ?></span></i>
        <nav class="navbar">
          <ul>
          <li></li> 
          
          </ul>
        </nav>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="<?= TWITTER ?>" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="<?= FACEBOOK ?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="<?= INSTAGRAM ?>" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="<?= LINKEDIN ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="/Login" class="linkedin"><i class="bi bi-box-arrow-in-right"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-left justify-content-between">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?= media() ?>/candeaseo/img/logo.png" alt="Logo">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url() ?>">Inicio</a></li>
          <li class="dropdown"><a href="#"><span>Nosotros</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <!--<li><a href="<?= base_url(); ?>/historia">Historia</a></li>-->
              <li><a href="<?= base_url(); ?>/nosotros">Misión y Visión</a></li>
              <li><a href="<?= base_url() ?>/frecuencia">Frecuencia y Horarios</a></li>
              <li><a href="<?= base_url() ?>/tarifas">Tarifas</a></li>
              <!--<li><a href="<?= base_url(); ?>/area">Área de Servicio</a></li>-->
              <li><a href="<?= base_url(); ?>/transparencia/pagina/codigo-de-integridad">Politica Integral </a></li>
              <li><a href="<?= base_url(); ?>/equipo">Directores</a></li>
              <!--<li><a href="<?= base_url(); ?>/valores">Valores Corporativos</a></li>-->
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Atención y Servicios a la Ciudadania</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?= base_url() ?>/tramites">Tramites</a></li>
              <li class="dropdown"><a href="#"><span>Servicios</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="<?= base_url(); ?>/barrido">Barrido</a></li>
                  <li><a href="<?= base_url(); ?>/recoleccion">Recolección Domiciliaria</a></li>
                  <li><a href="<?= base_url(); ?>/corte">Corte de Césped</a></li>
                  <li><a href="<?= base_url(); ?>/especiales">Servicios Especiales</a></li>
                  <li><a href="<?= base_url(); ?>/poda">Poda de Árboles</a></li>
                  <li><a href="<?= base_url(); ?>/lavado">Lavado de áreas Públicas</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url() ?>/transparencia/pagina/mecanismos-de-atencion">Canales de Atención y Pida una Cita </a></li>
              <li><a href="<?= base_url() ?>/ciudadanos">Peticiones, Quejas, Reclamos, Sugerencias y Denuncias</a></li>              
              <li><a href="<?= base_url() ?>/terceros">Notificación por Aviso</a></li>
              <li><a href="<?= base_url() ?>/estado">Estado de la Solicitud</a></li>
              <li><a href="<?= base_url() ?>/sala">Sala de Prensa</a></li>
              <li><a href="<?= base_url() ?>/proveedores">Contrata Con Nosotros</a></li>
              <li><a href="<?= base_url() ?>/hv">Hoja de Vida</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url() ?>/participa">Participa</a></li>
          <li><a href="<?= base_url() ?>/transparencia">Transparencia</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->