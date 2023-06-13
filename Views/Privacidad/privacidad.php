<?php 
headerCande($data);
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];
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
            <li><?= $data['page']['titulo'] ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
    <section id="team" class="team" style="background-image: url(<?= $banner ?>);">
      <div class="container" data-aos="fade-up">



        <div class="section-header">
          <h2><?= $data['page_title'] ?></h2>
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
                  <blockquote>
                    <?php
                      if(viewPage($idpagina)){
                        echo $data['page']['contenido'];
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
                  <blockquote>
              </div><!-- End post content -->
            </article><!-- End blog post -->

          </div>

        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

<?php 
  footerCande($data);
?>