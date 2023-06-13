<?php 
headerCande($data);
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?= base_url() ?>">Inicio</a></li>
            <li><?= $data['page_title'] ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
</main>
<section id="team" class="team" style="background-image: url(<?= $banner ?>);">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2><?= $data['page_title'] ?></h2>
    </div>
  </div>
</section>

<!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Formulario para la radicación de Peticiones, Quejas, Reclamos, Sugerencias y Denuncias</h2>
          <p>CANDEASEO SA ESP ofrece a la ciudadanía la posibilidad de realizar sus solicitudes a través del formulario de radicación en línea, promoviendo el uso de las tecnologías.</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Denuncias de Corrupción</h3>
              <p>Realice aqui sus denuncia sobre presunto hecho de corrupción.</p>
              <a href="<?= base_url() ?>/reserva" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-person-fill-check"></i>
              </div>
              <h3>PQRS con identificación</h3>
              <p>Formulario de radicación de Peticiones, Quejas, Reclamos y Solicitudes.</p>
              <a href="<?= base_url() ?>/identificado" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-person-fill-slash"></i>
              </div>
              <h3>PQRS Anónimo</h3>
              <p> Peticiones, Quejas, Reclamos y Solicitudes con identidad reservada.</p>
              <a href="<?= base_url() ?>/reserva" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->
      </div>
    </section><!-- End Our Services Section -->



<?php 
  footerCande($data);
?>