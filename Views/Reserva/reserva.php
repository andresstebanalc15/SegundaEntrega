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
            <li><a href="<?= base_url() ?>/ciudadanos">PQRSD</a></li>
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

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Paso a paso para radicación en línea PQRSD</h2>
        </div>
        <div class="row gx-lg-0 gy-4">
          <form id="formIdentificacion" name="formIdentificacion" class="form-horizontal">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                <div class="row">
                  <div class="col-md-12">
                    
                    <p class="text-primary">Contenido.</p>
                    <hr>
                    <div class="form-row">
                      
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Tipo de solicitud:</label>
                        <select class="form-control" data-live-search="true" id="listTipoSolicitudid" name="listTipoSolicitudid" required >
                        </select>
                      </div>
                      <div class="form-group col-md-8">
                        <small class="form-text text-muted" id="fileHelp">Petición: Solicitud presentada por los ciudadanos ante CANDEASEO SA ESP.<br><br>
                        Queja: Insatisfacción por la conducta de un servidor público o por la deficiencia en la atención prestada por CANDEASEO ESA ESP.<br><br>
                        Reclamo: Insatisfacción por la desatención de un servicio prestado por CANDEASEO ESA ESP.</small>
                      </div>                     
                    </div>
                     <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Área: </label>
                        <small class="form-text text-muted" id="fileHelp">Seleccione la dependencia donde quieres dirigir tu solicitud</small>
                        <select class="form-control" data-live-search="true" id="listAreaId" name="listAreaId">
                        </select>
                      </div>                     
                    </div>
                    <div class="form-group">
                      <label class="control-label">Descripción <span class="required"></span></label>
                      <small class="form-text text-muted" id="fileHelp">Describa en maximo 600 caracteres en que consiste su solicitud</small>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>
                    </div>
                    <br>
                    <p class="text-primary">Archivo</p>
                    <hr>
                    <div class="form-row"> 
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FilePQR"><span class="required"></span>Archivo:</label>
                        <input class="form-control-file" name="FilePQR" id="FilePQR" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Puedes anexar un archivo de soporte con un máximo de 5mgs, que puede ser .JPG, .PNG, .PDF</small>
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="acepto" required>
                        <label class="form-check-label" for="acepto">Conozco y Acepto la <strong><a href="<?= base_url() ?>/privacidad" target=”_blank”>Política de Privacidad de Datos</a></strong> </label>
                      </div>
                    </div>                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                      </div>
                    </div>
                  </div>
                </div>
          </form>
        </div>
      </div>
    </section><!-- End Contact Section -->

<?php 
  footerCande($data);
?>