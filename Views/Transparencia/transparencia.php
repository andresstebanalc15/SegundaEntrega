<?php 
headerCande($data);
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];
 $categoria = $data['transparencia'];

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


     <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Ley 1712 de 2014 <strong>Resolución 1519 de 2020</strong></h3>
              <p align="justify">
                CANDEASEO SA ESP. pone a disposición de los ciudadanos e interesados, la nueva sección de Transparencia y Acceso a la Información Pública Nacional, donde podrán conocer de primera mano la información del Ministerio de Tecnologías de la Información y las Comunicaciones.
              </p>
              <p align="justify">
                Según lo dicta la Ley, la información generada por las entidades del Estado no podrá ser reservada o limitada, por el contrario, es de carácter público. En este sitio se proporciona y facilita el acceso a la misma en los términos más amplios posibles en el momento.
              </p>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <?php 
                if(!empty($categoria)){
                  for ($c=0; $c < count($categoria) ; $c++) { 
                    
               ?>
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $categoria[$c]['idcategoria']; ?>">
                    <span class="num"><?= $categoria[$c]['idcategoria']; ?></span>
                    <?= $categoria[$c]['nombre']; ?>
                  </button>
                </h3>
                <div id="faq-content-<?= $categoria[$c]['idcategoria']; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <?php 
                    if(!empty($categoria[$c]['subcategorias'])){
                      for ($s=0; $s < count($categoria[$c]['subcategorias']) ; $s++) {        
                  ?>

                  <div class="accordion-body">
                    <a href="<?= base_url() ?>/transparencia/pagina/<?= $categoria[$c]['subcategorias'][$s]['ruta']; ?>"><?= $categoria[$c]['subcategorias'][$s]['nombre']; ?></a>
                  </div>
                  
                  <?php 
                      }
                    } 
                  ?>
                </div>
              </div><!-- # Faq item-->
              <?php 
                  }
                } 
              ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

<?php 
  footerCande($data);
?>









