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


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-3">
            <div class="content px-xl-5">
              <h3>ESTADO<strong> PQRSD</strong></h3>
              <!-- <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            -->
            </div>
          </div>

            <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-xl-4">
                        <div class="row mb-4">
                          <div class="col-md-12">
                            <label for="txtticket" class="control-label">Número de documento o Ticket: <span class="required">*</span></label>
                            <input class="form-control con" type="number" id="txtticket" name="txtticket" required="">
                          </div>                               
                        </div>
                    </div>
                    <div class="col-lg-14 col-xl-13">
                        <form id="formCita" name="formCita" class="form-horizontal">
                            <div class="esconder notBlock"> 
                                <div class="col-md-12">
                                  <div class="tile">
                                    <div class="tile-body">
                                      <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="tableCitas">
                                          <thead>
                                            <tr>
                                              <th>Ticket</th>
                                              <th>Tipo de PQRSD</th>
                                              <th>Fecha</th>
                                              <th>Estado</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
      </div>
    </section><!-- End Frequently Asked Questions Section -->

<?php 
  footerCande($data);
?>