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
            <li><a href="<?= base_url() ?>/sala">Sala de Prensa</a></li>
            <li>Noticias</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-12">

            <article class="blog-details">

              <div class="post-img col-lg-8">
                <img src="<?= media(); ?>/images/uploads/<?= $data['arrPrensa']['img'] ?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?= $data['arrPrensa']['titulo'] ?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $data['arrPrensa']['nombres'] ?> <?= $data['arrPrensa']['apellidos'] ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?= $data['arrPrensa']['fecha'] ?></time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <blockquote>
                  <p>
                    <?= $data['arrPrensa']['descripcion'] ?>
                  </p>
                </blockquote>
                <p>
                    <?= $data['arrPrensa']['cuerpo'] ?>
                </p>
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