<?php 
  headerCande($data);
  $arrSlider = $data['slider'];
  $arrDiv = $data['div'];
  $arrConteo = $data['conteo'];
  $arrImg = $data['img'];
  $arrModal = $data['modal'];
  $arrPrensa = $data['prensa'];
  $arrVideo = $data['video'];
  $arrEntidades = $data['entidades'];
 ?>

 <script>


    window.addEventListener('load', function() {
    $('.modal').fadeIn();
    }, false);


   function coloseModal(){

      $('.modal').fadeOut();
  }
 </script>

      <?php 
      for ($i=0; $i < count($arrModal) ; $i++) {
      ?>
    
  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $arrModal[$i]['nombre']; ?></h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="coloseModal();"></button>
        </div>
        <div class="modal-body">
          <a href="<?= $arrModal[$i]['enlace_url']; ?>"><img src="<?= $arrModal[$i]['portada']?>"></a>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary" onclick="coloseModal();">Cerrar</button>
        </div>
      </div>
    </div>
</div>

       <?php 
      }
      ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    
    <div class="container position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          <?php 
            for ($i=0; $i < count($arrSlider) ; $i++) {
              if($i == 0){
                ?>
                  <div class="carousel-item active">
                    <a href="<?= $arrSlider[$i]['enlace_url'] ?>"><img class="d-block w-100" src="<?= $arrSlider[$i]['portada']?>" alt="<?= $arrSlider[$i]['nombre'] ?>"></a>
                  </div>
                <?php
                }else{
                ?>
                  <div class="carousel-item">
                    <a href="<?= $arrSlider[$i]['enlace_url'] ?>"><img class="d-block w-100" src="<?= $arrSlider[$i]['portada']?>" alt="<?= $arrSlider[$i]['nombre'] ?>"></a>
                  </div>
                <?php 
                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <?php 
          for ($i=0; $i < count($arrDiv) ; $i++) {
          ?>

            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="<?= $arrDiv[$i]['icon'] ?>"></i></div>
                <h4 class="title"><a href="<?= $arrDiv[$i]['url'] ?>" class="stretched-link"><?= $arrDiv[$i]['nombre'] ?></a></h4>
              </div>
            </div>
            <!--End Icon Box -->

          <?php 
          }
          ?>
        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

  	<!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 align-items-center">

          <?php 
          for ($i=0; $i < count($arrImg) ; $i++) {
          ?>

          <div class="col-lg-6">
            <img src="<?= $arrImg[$i]['portada']?>" alt="" class="img-fluid">
          </div>

          <?php 
            }
          ?>

          <div class="col-lg-6">

            <?php 
            for ($i=0; $i < count($arrConteo) ; $i++) {
            ?>

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="<?= $arrConteo[$i]['numero'] ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong><?= $arrConteo[$i]['strong'] ?></strong> <?= $arrConteo[$i]['small'] ?></p>
            </div><!-- End Stats Item -->

            <?php 
            }
            ?>

          </div>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Ultimas Noticias</h2>
        </div>
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

   

    <!-- ======= Call To Action Section ======= -->
    <?php 
      for ($i=0; $i < count($arrVideo) ; $i++) {
    ?>
    <section id="call-to-action" class="call-to-action">
      <div class="container text-center" data-aos="zoom-out" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?= $arrVideo[$i]['portada'] ?>) center center !important;">
        <a href="<?= $arrVideo[$i]['enlace_url'] ?>" class="glightbox play-btn"></a>
        <h3><?= $arrVideo[$i]['nombre'] ?></h3>
        <p><?= $arrVideo[$i]['descripcion'] ?></p>
        <a class="cta-btn" href="#">Ver mas..</a>
      </div>  
    </section><!-- End Call To Action Section -->
    <?php 
      }
    ?>

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php 
              for ($i=0; $i < count($arrEntidades) ; $i++) {
            ?>
              <div class="swiper-slide"><img src="<?= $arrEntidades[$i]['portada'] ?>" class="img-fluid" alt="<?= $arrEntidades[$i]['nombre'] ?>"></div>
            <?php 
              }
            ?>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->

<?php 
  footerCande($data);
 ?>