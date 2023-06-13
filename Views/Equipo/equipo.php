<?php 
headerCande($data);
$arrDirectores = $data['directores'];
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

<!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="row gy-4">
          <?php 
            for ($i=0; $i < count($arrDirectores) ; $i++) {
          ?>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <img src="<?= $arrDirectores[$i]['portada'] ?>" class="img-fluid" alt="">
                <h4><?= $arrDirectores[$i]['nombre'] ?></h4>
                <span><?= $arrDirectores[$i]['descripcion'] ?></span>
                <div class="social">
                  <a href="<?= $arrDirectores[$i]['enlace_url'] ?>"><i class="bi bi-filetype-doc"></i></a>
                </div>
              </div>
            </div><!-- End Team Member -->

          <?php 
          }
          ?>

        </div>

      </div>
    </section><!-- End Our Team Section -->

<?php 
  footerCande($data);
?>