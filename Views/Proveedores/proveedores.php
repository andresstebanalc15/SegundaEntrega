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
        <div class="row gx-lg-0 gy-4">
          <form id="formProveedor" name="formProveedor" class="form-horizontal">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                <div class="row">
                  <div class="col-md-12">
                    <br>
                    <p class="text-primary">Datos de Identificación.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Tipo de Persona: </label>
                        <select class="form-control" data-live-search="true" id="listSolicitanteid" name="listSolicitanteid" onchange="fntRemoveRazon();" required>
                        </select>
                      </div>
                      <div class="form-group col-md-6" >
                        <label class="control-label"><span class="required">*</span> Razón Social: </label>
                        <input type="text" class="form-control" id="txtRazon" name="txtRazon" required="" value="">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="listCategoria" class="control-label">Tipo Documento: <span class="required">*</span></label>
                        <select class="form-control" data-live-search="true" id="listTipoid" name="listTipoid"></select>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Numero: </label>
                        <input type="text" class="form-control" id="txtNit" name="txtNit" required="">
                      </div>
                    </div>                  
                    <br>
                    <p class="text-primary">Representante Legal.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Primer Nombre:</label>
                        <input type="text" class="form-control valid validText" id="txtNombrea" name="txtNombrea" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Segundo Nombre: </label>
                        <input type="text" class="form-control valid validText" id="txtNombreb" name="txtNombreb">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required">*</span> Primer Apellido: </label>
                        <input type="text" class="form-control valid validText" id="txtApellidoa" name="txtApellidoa" required="">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Segundo Apellido: </label>
                        <input type="text" class="form-control valid validText" id="txtApellidob" name="txtApellidob">
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Ubicación Geografica.</p>
                    <hr>
                     <div class="form-row">
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Departamento: </label>
                        <select class="form-control" data-live-search="true" id="listDepartamentoid" name="listDepartamentoid" onchange="fntMunicipios();" required >
                        </select>
                      </div>
                      <div id="municipio" class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Municipio: </label>
                         <select class="form-control" data-live-search="true" id="listMunicipioid" name="listMunicipioid" onchange="fntCorregimiento();"  required >
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Corregimiento: </label>
                        <select class="form-control" data-live-search="true" id="listCorregimientoid" name="listCorregimientoid">
                        </select>
                      </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                          <label class="control-label"><span class="required">*</span> Dirección: </label>
                          <input type="text" class="form-control valid " id="txtDireccion" name="txtDireccion" required="">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label"><span class="required">*</span> Teléfono: </label>
                          <input type="number" class="form-control valid " id="txtTelefono" name="txtTelefono" required="">
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label"><span class="required">*</span> Email: </label>
                          <input type="email" class="form-control valid" id="txtemail" name="txtemail" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label"><span class="required">*</span> Barrio / Vereda: </label>
                          <input type="text" class="form-control valid " id="txtBarrio" name="txtBarrio" required="">
                        </div>      
                    </div>

                    <br>
                    <p class="text-primary">Adjuntar los siguientes documentos en formato PDF:</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FileHV"><span class="required">*</span>Hoja de Vida:</label>
                        <input class="form-control-file" name="FileHV" id="FileHV" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Hoja de vida en formato función pública</small>
                      </div>
                       <div class="form-group col-md-6">
                        <label class="control-label" for="FileCedula"><span class="required"></span>Cédula:</label>
                        <input class="form-control-file" name="FileCedula" id="FileCedula" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Fotocopia de la cédula de ciudadanía del proveedor.  Tratándose de personas jurídicas, deberá presentarla su representante legal.</small>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FileRUT"><span class="required"></span>RUT:</label>
                        <input class="form-control-file" name="FileRUT" id="FileRUT" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Registro Único Tributario actualizado</small>    
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FileAntecedentes"><span class="required"></span>Antecedentes:</label>
                        <input class="form-control-file" name="FileAntecedentes" id="FileAntecedentes" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Los antecedentes disciplinarios, fiscales y judiciales deben ser consultados por la empresa en desarrollo del buen funcionamiento de la misma. Adjuntarlos en un .rar</small>
                      </div>
                    </div> 
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label" for="txtCE"><span class="required"></span>Certificado de Existencia:</label>
                        <input class="form-control-file" name="txtCE" id="txtCE" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Copia de certificado de inscripción en el registro mercantil (persona natural) o certificado de existencia y representación legal (persona jurídica), con fecha de expedición no mayor a noventa (90) días contados a partir de la fecha de expedición del certificado.</small>    
                      </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label class="control-label"><span class="required"></span></label>
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