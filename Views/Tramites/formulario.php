<?php 
headerCande($data);
//$banner = media()."/tienda/images/bg-01.jpg";
 $banner = $data['page']['portada'];
 $idpagina = $data['page']['idpost'];

 $tramite = $data['arrTramite'];
 $idTramite = $data['arrIdTramite'];
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
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>FORMULARIO PARA RADICAR TRAMITE <?= $tramite ?></h2>
        </div>
        <div class="row gx-lg-0 gy-4">
          <form id="formIdentificacion" name="formIdentificacion" class="form-horizontal">
            <input type="hidden" id="listTipoSolicitudid" name="listTipoSolicitudid" value="<?= $idTramite ?>">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-primary">1. Información de Identificación.</p>
                    <small class="form-text text-muted" id="fileHelp">Información básica de identificación de la persona u organización que hace la solicitud</small>

                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="listCategoria" class="control-label">Tipo Documento: <span class="required">*</span></label>
                        <small class="form-text text-muted" id="fileHelp">Selecciona un tipo de documento</small>
                        <select class="form-control" data-live-search="true" id="listTipoid" name="listTipoid"></select>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Identificación: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe tu cedula sin puntos, comas o guiones. Ej: 79940063</small>
                        <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Tipo Solicitante: </label>
                        <small class="form-text text-muted" id="fileHelp">Selecciona a quien se refiere la solicitud</small>
                        <select class="form-control" data-live-search="true" id="listSolicitanteid" name="listSolicitanteid" required >
                        </select>
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Datos Personales.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Primer Nombre:</label>
                        <small class="form-text text-muted" id="fileHelp">Escribe tu primer nombre, Solo puedes escribir texto.</small>
                        <input type="text" class="form-control valid validText" id="txtNombrea" name="txtNombrea" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Segundo Nombre: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe tu segundo nombre, Solo puedes escribir texto.</small>
                        <input type="text" class="form-control valid validText" id="txtNombreb" name="txtNombreb">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Primer Apellido: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe tu primer apellido, Solo puedes escribir texto.</small>
                        <input type="text" class="form-control valid validText" id="txtApellidoa" name="txtApellidoa" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Segundo Apellido: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe tu segundo apellido, Solo puedes escribir texto.</small>
                        <input type="text" class="form-control valid validText" id="txtApellidob" name="txtApellidob">
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Ubicación Geografica y Contacto.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label class="control-label"><span class="required">*</span> Pais: </label>
                        <small class="form-text text-muted" id="fileHelp">Pais de residencia.</small>
                        <select class="form-control" data-live-search="true" id="listPaisId" name="listPaisId" onchange="fntDepartamento();" required >
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="control-label"><span class="required">*</span> Departamento: </label>
                        <small class="form-text text-muted" id="fileHelp">Departamento de residencia.</small>
                        <select class="form-control" data-live-search="true" id="listDepartamentoid" name="listDepartamentoid" onchange="fntMunicipios();" required >
                        </select>
                      </div>
                      <div id="municipio" class="form-group col-md-3">
                        <label class="control-label"><span class="required">*</span> Municipio: </label>
                        <small class="form-text text-muted" id="fileHelp">Municipio de residencia.</small>
                        <select class="form-control" data-live-search="true" id="listMunicipioid" name="listMunicipioid" onchange="fntCorregimiento();"  required >
                        </select>
                      </div>
                      <div id="corregimiento" class="form-group col-md-3">
                        <label class="control-label"><span class="required">*</span> Corregimiento: </label>
                        <small class="form-text text-muted" id="fileHelp">Corregimiento de residencia</small>
                        <select class="form-control" data-live-search="true" id="listCorregimientoid" name="listCorregimientoid">
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Dirección: </label>
                        <small class="form-text text-muted" id="fileHelp">Dirección de residencia actual. Ej: Calle 3C # 65 - 60</small>
                        <input type="text" class="form-control valid " id="txtDireccion" name="txtDireccion" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Teléfono Fijo: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe el teléfono fijo con los guiones. Ej: 23216543</small>
                        <input type="text" class="form-control valid " id="txtFijo" name="txtFijo">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Teléfono Celular: </label>
                        <small class="form-text text-muted" id="fileHelp">Escribe el teléfono móvil con los guiones. Ej: 3026549876</small>
                        <input type="text" class="form-control valid " id="txtTelefono" name="txtTelefono" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Email: </label>
                        <small class="form-text text-muted" id="fileHelp">Seguir el siguiente formato. Ej: ejemplo@correo.com</small>
                        <input type="email" class="form-control valid" id="txtemail" name="txtemail" required>
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Contenido.</p>
                    <hr>
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
                        <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Radicar Tramite</span></button>
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