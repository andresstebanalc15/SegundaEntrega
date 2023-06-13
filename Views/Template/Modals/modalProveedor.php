<!-- Modal -->
<div class="modal fade" id="modalFormProveedor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formProveedor" name="formProveedor" class="form-horizontal">
                <input type="hidden" id="idProveedor" name="idProveedor" value="0">
                <input type="hidden" id="hvac" name="hvac" value="">
                <input type="hidden" id="ceac" name="ceac" value="">
                <input type="hidden" id="cedulaac" name="cedulaac" value="">
                <input type="hidden" id="rutac" name="rutac" value="">
                <input type="hidden" id="antecedentesac" name="antecedentesac" value="">
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
                        <div class="form-group col-md-3">
                          <label for="listStatus"><span class="required">*</span> Status</label>
                          <select class="form-control selectpicker" id="listStatus" name="listStatus" required >
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="listCritico"><span class="required">*</span> Crítico:</label>
                          <select class="form-control selectpicker" id="listCritico" name="listCritico" required >
                            <option value="1">General</option>
                            <option value="3">Ambiental</option>
                            <option value="2">Ninguno</option>
                          </select>
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
                        <label class="control-label" for="FileCedula"><span class="required">*</span>Cédula:</label>
                        <input class="form-control-file" name="FileCedula" id="FileCedula" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Fotocopia de la cédula de ciudadanía del proveedor.  Tratándose de personas jurídicas, deberá presentarla su representante legal.</small>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FileRUT"><span class="required">*</span>RUT:</label>
                        <input class="form-control-file" name="FileRUT" id="FileRUT" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Registro Único Tributario actualizado</small>    
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label" for="FileAntecedentes"><span class="required">*</span>Antecedentes:</label>
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
                    <div class="form-group col-md-4">
                      <label class="control-label"><span class="required"></span></label>
                      <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewProveedor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Información del Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="verproveedor" class="modal-body">
        <table class="table table-bordered">
          <tbody>
             <tr>
              <td><strong>Tipo de Persona:</strong></td>
              <td id="celTPersona"></td>
              <td><strong>Razón Social:</strong></td>
              <td id="celRazon"></td>
            </tr>
            <tr>
              <td><strong>Tipo de Documento:</strong></td>
              <td id="celTDocumento"></td>
              <td><strong>Número</strong></td>
              <td id="celNit"></td>
            </tr>

            <tr>
              <th colspan="6"><p class="text-primary">Representante Legal</p></th>
            </tr>
            <tr>
              <td><strong>Primer Nombre:</strong></td>
              <td id="celNombrea"></td>
              <td><strong>Segundo Nombre:</strong></td>
              <td id="celNombreb"></td>
            </tr>
            <tr>
              <td><strong>Primer Apellido:</strong></td>
              <td id="celApellidoa"></td>
              <td><strong>Segundo Apellido:</strong></td>
              <td id="celApellidob"></td>
            </tr>
            <tr>
              <th colspan="6"><p class="text-primary">Contacto y Ubicación Geografica</p></th>
            </tr>
             <tr>
              <td><strong>Teléfono:</strong></td>
              <td id="celTelefono"></td>
              <td><strong>Correo Electrónico:</strong></td>
              <td id="celemail" colspan="2"></td>
            </tr>
            <tr>
              <td><strong>Departamento:</strong></td>
              <td id="celDepartamento"></td>
              <td><strong>Municipio:</strong></td>
              <td id="celMunicipio" colspan="2"></td>
            </tr>
            <tr>
              <td><strong>Corregimiento:</strong></td>
              <td id="celCorregimiento"></td>
               <td><strong>Barrio / Vereda:</strong></td>
              <td id="celBarrio" colspan="2"></td>
            </tr>
            <tr>
              <td><strong>Dirección de residencia:</strong></td>
              <td id="celDireccion" ></td>
              <td><strong>Crítico:</strong></td>
              <td id="celCritico" ></td>
            </tr>
            <tr>
              <th colspan="6"><p class="text-primary">Documentación Adjunta</p></th>
            </tr>
            <tr>
              <td><strong>Hoja de Vida:</strong></td>
              <td class="adj" id="celhv"></td>
               <td><strong>Certificado de Existencia:</strong></td>
              <td class="adj" id="celce" colspan="2"></td>
            </tr>
             <tr>
              <td><strong>Cedula:</strong></td>
              <td class="adj" id="celcedula"></td>
               <td><strong>RUT:</strong></td>
              <td class="adj" id="celrut" colspan="2"></td>
            </tr>
            <tr>
              <td><strong>Antecedentes:</strong></td>
              <td class="adj" id="celantecedentes"></td>
            </tr>

            <tr>
              <th colspan="6"><p class="text-primary"></p></th>
            </tr>
            <tr>
              <td><strong>Última Modificación:</strong></td>
              <td id="celDate"></td>
              <td><strong>Usuario:</strong></td>
              <td id="celUsuario" colspan="2"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="button" onClick="fntPrintBarcode('#verpqr')"><i class="fas fa-print"></i> Imprimir</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFormNote" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Calificar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <section class="invoice">
                 <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped" id="tableNote">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Calidad</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Plazo</th>
                          <th>Postventa</th>
                          <th>Administravo</th>
                          <th class="resultado">Resultado</th>
                          <th>Calificación</th>
                          <th>Usuario</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                 </div>
                </section>
             
              &nbsp;&nbsp;&nbsp;


            <form id="formNote" name="formNote" class="form-horizontal">
              <input type="hidden" id="idproveedorn" name="idproveedorn" value="">
              <input type="hidden" id="idnote" name="idnote" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Calidad del Bien o Servicio. (30%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="calidad" id="calidad" value="30">Supera las expectativas y requerimientos del bien y/o servicio adquirido - Mejoró las especificaciones técnicas establecidas del bien y/o servicio adquirido.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="calidad" id="calidad" value="24">Cumple con los requisitos del bien y/o servicio - Cumplió con las especificaciones técnicas establecidas del bien y/o servicio adquirido.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="calidad" id="calidad" value="18">Presentó No conformidades y devoluciones  pero no son graves, las corrigió oportunamente y  No se considera que incumplió el contrato.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="calidad" id="calidad" value="12">Incumplió con alguna de las especificaciones técnicas establecidas, generando devoluciones parciales  las cuales son corregidas, por lo tanto no se considera que incumplió el contrato.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="calidad" id="calidad" value="6">No cumple con los requisitos exigidos del bien y/o servicio adquirido - Se rechazó el prodcuto o servicio y el contrato presentó inconformidades graves y se considera que no cumplió.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Cumplimineto en Cantidad. (20%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cantidad" id="cantidad" value="20">Entregó la cantidad solicitada.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cantidad" id="cantidad" value="16">N/A.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cantidad" id="cantidad" value="12">Entregó más del 80% de la cantidad solicitada.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cantidad" id="cantidad" value="8">Entrego menos del 80% la cantidad solicitada.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cantidad" id="cantidad" value="4">No entregó lo solicitado.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Cumplimiento de Plazos del Contrato. (20%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plazo" id="plazo" value="20">Antes de lo estipulado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plazo" id="plazo" value="16">En la fecha estipulada.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plazo" id="plazo" value="12">Posterior a la fecha estipulada, pero no superior al 20% de la duración del mismo.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plazo" id="plazo" value="8">El contrato se entregó en fecha posterior a la estipulada, superior al 20% de la duración del mismo.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plazo" id="plazo" value="4">El contrato se entregó en fecha posterior a la estipulada, superior al 50% de la duración del mismo.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Precios. (15%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="precios" id="precios" value="15">Precios muy favorables comparados con el precio del mercado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="precios" id="precios" value="12">Precios ligeramente inferiores  a los del mercado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="precios" id="precios" value="9">Precio igual al del mercado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="precios" id="precios" value="6">Precio ligeramente superior al del mercado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="precios" id="precios" value="3">Precio muy por encima de el del mercado.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Servicio Postventa. (10%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="postventa" id="postventa" value="10">Tiene canales de atención de fácil acceso y usabilidad y Atiende las solicitudes inmediatamente dando soluciones efectivas.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="postventa" id="postventa" value="8">Tiene canales de atención que no son de fácil acceso ni usabilidad pero  Atiende las solicitudes inmediatamente dando soluciones efectivas.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="postventa" id="postventa" value="6">Tiene canales de atención pero toca insistir en reiteradas ocasiones para que atienda y resuelva las solicitudes.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="postventa" id="postventa" value="4">Tiene canales de atención de servicio postventa pero nunca los ateniente ni resuelve.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="postventa" id="postventa" value="2">No tiene canales para la atención de servicio postventa.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>

              <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-12"><strong>Cumplimineto de Aspectos Administrativos. (5%)</strong></label>
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="administrativos" id="administrativos" value="5">Cumple con todos los requisitos y compromisos de pagos, trámites y documentos pactados antes del tiempo estipulado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="administrativos" id="administrativos" value="4">Cumple con todos los requisitos y compromisos de pagos, trámites y documentos pactados en el tiempo estipulado.
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="administrativos" id="administrativos" value="3">Cumple con todos los requisitos y compromisos de pagos, trámites y documentos pactados (corto ).
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="administrativos" id="administrativos" value="2">No cumple oportunamente con todos los requisitos y compromisos de pagos, trámites y documentos pactados (Largo).
                      </label>
                    </div><br>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="administrativos" id="administrativos" value="1">No cumple con todos los requisitos y compromisos de pagos, trámites y documentos pactados.
                      </label>
                    </div>
                  </div>
                </div>
              </div><br>


              <div class="form-row">
                <div class="form-group col-md-6">
                   <div class="tile-footer">
                    <button id="btnActionFormn" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                  </div>  
                </div>
              </div>             
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFormEditFamiliar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister headereditar">
        <h5 class="modal-title" id="editarfamiliar">Nuevo Familiar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formFamiliae" name="formFamiliae" class="form-horizontal">
              <input type="hidden" id="idFamiliare" name="idFamiliare" value="">
              <input type="hidden" id="documento_actual" name="documento_actual" value="">
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="required"></span>Última Modificación:</label>
                    <p id="txtDateadd"></p>
                </div>
                <div class="form-group col-md-6">
                    <label><span class="required"></span>Usuario:</label>
                    <p id="txtUsuario"></p>
                </div>
              </div>
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="listFamiid"><span class="required">*</span>Familiaridad</label>
                    <select class="form-control" data-live-search="true" id="listFamiide" name="listFamiide" required >
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtNacimientof"><span class="required">*</span>Fecha de Nacimiento:</label>
                  <input type="date" class="form-control" id="txtNacimientofe" name="txtNacimientofe" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ListTipoidf"><span class="required">*</span>Tipo de Documento:</label>
                    <select class="form-control" data-live-search="true" id="ListTipoidfe" name="ListTipoidfe" required >
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtIdentificacionf"><span class="required">*</span>Identificación</label>
                  <input type="text" class="form-control" id="txtIdentificacionfe" name="txtIdentificacionfe" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombref"><span class="required">*</span>Nombres</label>
                  <input type="text" class="form-control valid validText" id="txtNombrefe" name="txtNombrefe" required="">
                </div>                
                <div class="form-group col-md-6">
                  <label for="txtApellidof"><span class="required">*</span>Apellidos</label>
                  <input type="text" class="form-control valid validText" id="txtApellidofe" name="txtApellidofe" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" class="form-control valid validNumber" id="txtTelefonofe" name="txtTelefonofe" required="" onkeypress="return controlTag(event);">
                </div>
                <div class="form-group col-md-6">
                  <label for="txtEmail">Email</label>
                  <input type="email" class="form-control valid validEmail" id="txtEmailfe" name="txtEmailfe" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="control-label"><span class="required"></span>Documento de Identidad:</label>
                  <input class="form-control" id="txtdocumentofe" name="txtdocumentofe" type="file">
                </div>
              </div>


              <div class="tile-footer">
                <button id="btnActionFormfe" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnTexte">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

