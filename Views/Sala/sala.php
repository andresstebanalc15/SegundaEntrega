<?php 
headerCande($data);
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];
 $arrPrensa = $data['prensa'];
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


    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <?php 
            for ($i=0; $i < count($arrPrensa) ; $i++) {
          ?>
          <div class="col-xl-4 col-md-6">
            <article>
              <div class="post-img">
                <img src="<?= $arrPrensa[$i]['portada'] ?>" alt="" class="img-fluid">
              </div>
              <p class="post-category"><?= $arrPrensa[$i]['titulo'] ?></p>

              <h2 class="title">
                <a href="<?= base_url().'/Sala/noticia/'.$arrPrensa[$i]['id'] ?>"><?= $arrPrensa[$i]['descripcion'] ?></a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="<?= media() ?>/candeaseo/img/apple-touch-icon.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author"><?= $arrPrensa[$i]['autor'] ?></p>
                  <p class="post-date">
                    <time datetime="2022-01-01"><?= $arrPrensa[$i]['fecha'] ?></time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->
          <?php 
            }
          ?>
        </div><!-- End recent posts list -->
      </div>
    </section><!-- End Recent Blog Posts Section -->


<?php 
  footerCande($data);
?>