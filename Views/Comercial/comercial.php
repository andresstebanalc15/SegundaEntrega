<?php 
headerCande($data);
$arrCategorias = $data['categoria_dir'];
$arrEmpresas = $data['empresas'];
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];


//dep($arrEmpresas);
//die();
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

<!-- ======= Portfolio Section ======= -->
	<section id="blog" class="blog">
      <div class="container" data-aos="fade-up" style="max-width: 100%">
        <div class="row g-12">
          <div class="col-lg-12">
            <article class="blog-details">

              <!--<h2 class="title"><?= $data['page']['titulo'] ?></h2> -->
              <div class="content">
                  <blockquote style="padding: 0px;">
	                  <div>
	                    <div class="container-fluid py-5 text-center" >
	                    <p>El <strong>Directorio Comercial</strong> es una guía telefónica para empresas organizadas según el tipo de producto o servicio. Tal y como el nombre sugiere, también es una base de datos de información electrónica que contiene el nombre de empresas.</p>
	                    	<br>
	                      <p><strong><a href="https://docs.google.com/forms/d/e/1FAIpQLSePO7_T25m5JpcCU8bUv5-JdeKjk11aK4R4ANR39a5glakR1w/viewform?usp=sharing">Quiero ser parte del Directorio Comercial</a></strong></p>
	                    </div>
	                  </div>
                  </blockquote>
              </div><!-- End post content -->
            </article><!-- End blog post -->
          </div>
        </div>
      </div>
    </section><!-- End Blog Details Section -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">Todas</li>
              <?php 
                for ($i=0; $i < count($arrCategorias) ; $i++) {
              ?>

              <li data-filter=".<?= $arrCategorias[$i]['nombre'] ?>"><?= $arrCategorias[$i]['nombre'] ?></li>

              <?php 
              }
              ?>
              
            </ul><!-- End Portfolio Filters -->
          </div>

          <div class="row gy-4 portfolio-container">

            <?php 
              if(!empty($arrEmpresas)){
                for ($c=0; $c < count($arrEmpresas) ; $c++) { 
                  
             ?>

            <div class="col-xl-4 col-md-6 portfolio-item <?= $arrEmpresas[$c]['categoria'] ?>">
              <div class="portfolio-wrap">

                <?php 
                    if(!empty($arrEmpresas[$c]['imagenes'])){
                      for ($s=0; $s < count($arrEmpresas[$c]['imagenes']) ; $s++) {        
                  ?>
                <a href="<?= $arrEmpresas[$c]['imagenes'][$s]['img']; ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?= $arrEmpresas[$c]['imagenes'][$s]['img']; ?>" class="img-fluid" alt=""></a>
                <?php 
                      }
                    } 
                ?>
                <div class="portfolio-info">
                  <h4><a target="_blank" href="https://api.whatsapp.com/send?phone=57'<?= $arrEmpresas[$c]['codigo']; ?>'&text=Hola, Vi tu anuncio en el *Directorio Comercial* de Candeaseo" title="More Details"><?= $arrEmpresas[$c]['nombre']; ?></a></h4>
                  <p><?= $arrEmpresas[$c]['descripcion']; ?></p>
                </div>
                <p class="text-corr"><?= $arrEmpresas[$c]['corregimiento']; ?></p>
              </div>
            </div><!-- End Portfolio Item -->

            <?php 
                  }
                } 
              ?>

          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

<?php 
  footerCande($data);
?>