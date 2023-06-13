<?php 
headerCande($data);
 $banner = media()."/images/uploads/".$data['arrPagina']['portada'];
 $idpagina = $data['arrPagina']['idpost'];
 $archivos = $data['arrArchivo'];
 $tabla = $data['arrTabla'];

 //dep($data['arrPagina']);
 //die();

 ?>
 <script>
  document.querySelector('header').classList.add('header-v4');

 </script>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <nav>
        <div class="container">
          <ol>
            <li><a href="<?= base_url() ?>">Inicio</a></li>
            <li><a href="<?= base_url() ?>/transparencia">Transparencia</a></li>
            <li><?= $data['arrPagina']['titulo']; ?></li>
            <input type="hidden" name="idpag" id="idpag" value="<?= $idpagina ?>">
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
    <section id="team" class="team" style="background-image: url(<?= $banner ?>);">
      <div class="container" data-aos="fade-up">



        <div class="section-header">
          <h2><?= $data['arrPagina']['titulo'] ?></h2>
        </div>
      </div>
    </section>

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-12">

          <div class="col-lg-12">

            <article class="blog-details">

              <!--<h2 class="title"><?= $data['page']['titulo'] ?></h2> -->
              <div class="content">
                  <p>
                    <?php
                      if(viewPage($idpagina)){
                        echo $data['arrPagina']['contenido'];
                      }else{
                    ?>
                      <!-- Content page -->
                      <div>
                        <div class="container-fluid py-5 text-center" >
                          <img src="<?= media() ?>/images/construction.png" alt="En construcción">
                          <h3>Estamos trabajando para usted.</h3>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  <p>
              </div><!-- End post content -->
            </article><!-- End blog post -->

          </div>

        </div>

      </div>
    </section><!-- End Blog Details Section -->

    <?php
      if( $archivos['total'] > 0){
    ?>

      <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-12">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              <div class="row">
                <div class="col-md-12">
                  <div class="tile">
                    <div class="tile-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableArchivos">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              <th>Fecha</th>
                              <th>Archivo</th>
                            </tr>
                          </thead>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


    <?php
      }
    ?>


  </main><!-- End #main -->

<?php 
  footerCande($data);
?>