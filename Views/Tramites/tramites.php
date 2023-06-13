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
          <p>CANDEASEO SA ESP ofrece a la ciudadanía la posibilidad de realizar sus tramites a través del formulario de radicación en línea, promoviendo el uso de las tecnologías.</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <!--<div class="icon">
                <i class="bi bi-hand-thumbs-up"></i>
              </div>-->
              <h3>VINCULACIÓN</h3>
              <p>Acceder al servicio público para un predio residencial, comercial, industrial, oficial o especial.</p>
              <strong><a href="<?= base_url() ?>/tramites/formulario/11" class="readmore stretched-link">Empezar <i class="bi bi-arrow-right"></i></a></strong>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <!--<div class="icon">
                <i class="bi bi-hand-thumbs-up"></i>
              </div>-->
              <h3>RECLAMOS POR FACTURACIÓN</h3>
              <p>Modificar la tarifa de servicios públicos de un inmueble, por cambios en el uso y destinación del inmueble..</p>
              <strong><a href="<?= base_url() ?>/tramites/formulario/12" class="readmore stretched-link">Empezar <i class="bi bi-arrow-right"></i></a></strong>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <!--<div class="icon">
                <i class="bi bi-hand-thumbs-up"></i>
              </div>-->
              <h3>RECOLECCIONES ESPECIALES</h3>
              <p>Recolección de residuos de Construcción, Demolición, Muebles, Enseres y Colchones.</p>
              <strong><a href="<?= base_url() ?>/tramites/formulario/13" class="readmore stretched-link">Empezar <i class="bi bi-arrow-right"></i></a></strong>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <!--<div class="icon">
                <i class="bi bi-hand-thumbs-up"></i>
              </div>-->
              <h3>VIABILIDAD Y DISPONIBILIDAD</h3>
              <p>Obtener el documento mediante el cual se certifica la posibilidad técnica de conectar un predio o predios objeto de la licencia urbanística a las redes matrices de servicios públicos existentes.</p>
              <strong><a href="<?= base_url() ?>/tramites/formulario//14" class="readmore stretched-link">Empezar <i class="bi bi-arrow-right"></i></a></strong>
            </div>
          </div><!-- End Service Item -->

      </div>
    </section><!-- End Our Services Section -->



<?php 
  footerCande($data);
?>