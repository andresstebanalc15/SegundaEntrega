<!-- Modal -->
<div class="modal fade" id="modalFormIdentificacion" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">NUEVA PQRSD CON IDENTIFICACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formIdentificacion" name="formIdentificacion" class="form-horizontal">
              <input type="hidden" id="idIdentificacion" name="idIdentificacion" value="">
              <input type="hidden" id="archivo_ac" name="archivo_ac" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-primary">Identificación.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="listCategoria" class="control-label">Tipo Documento: <span class="required">*</span></label>
                        <select class="form-control" data-live-search="true" id="listTipoid" name="listTipoid"></select>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Identificación: </label>
                        <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Tipo Solicitante: </label>
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
                    <p class="text-primary">Ubicación Geografica y Contacto.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Pais: </label>
                        <select class="form-control" data-live-search="true" id="listPaisId" name="listPaisId" onchange="fntDepartamento();" required >
                        </select>
                      </div>
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
                      <div id="corregimiento" class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Corregimiento: </label>
                        <select class="form-control" data-live-search="true" id="listCorregimientoid" name="listCorregimientoid">
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Dirección: </label>
                        <input type="text" class="form-control valid " id="txtDireccion" name="txtDireccion" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Teléfono Fijo: </label>
                        <input type="text" class="form-control valid " id="txtFijo" name="txtFijo">
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Teléfono Celular: </label>
                        <input type="text" class="form-control valid " id="txtTelefono" name="txtTelefono" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label class="control-label"><span class="required"></span> Email: </label>
                        <input type="email" class="form-control valid" id="txtemail" name="txtemail" required>
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Solicitud</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Fecha: </label>
                        <input type="date" class="form-control valid" id="txtFecha" name="txtFecha" value=""  required >
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Canal de Ingreso:</label>
                        <select class="form-control" data-live-search="true" id="listCanalId" name="listCanalId" required >
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label class="control-label"><span class="required">*</span> Medio de Respuesta:</label>
                        <select class="form-control" data-live-search="true" id="listMedioid" name="listMedioid" required >
                        </select>
                      </div>
                    </div>
                    <br>
                    <p class="text-primary">Contenido.</p>
                    <hr>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label class="control-label" for="FilePQR"><span class="required"></span>Archivo:</label>
                        <input class="form-control-file" name="FilePQR" id="FilePQR" type="file" aria-describedby="fileHelp">
                        <small class="form-text text-muted" id="fileHelp">Adjuntar archivo</small>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="control-label"><span class="required">*</span> Tipo de solicitud:</label>
                        <select class="form-control" data-live-search="true" id="listTipoSolicitudid" name="listTipoSolicitudid" required >
                        </select>
                      </div>
                      <div class="form-group col-md-5">
                        <label class="control-label"><span class="required">*</span> Área: </label>
                        <select class="form-control" data-live-search="true" id="listAreaId" name="listAreaId">
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Descripción <span class="required"></span></label>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>
                    </div>
                    <br>
                    <p class="text-primary">Ticket externo</p>
                    <hr>
                    <div class="form-group">
                      <label class="control-label">Código <span class="required">*</span></label>
                      <input class="form-control" id="txtCodigo" name="txtCodigo" type="text" placeholder="Código de barra" required="">
                      <br>
                      <div id="divBarCode" class="notblock textcenter">
                        <div id="printCode">
                          <svg id="barcode"></svg>
                        </div>
                        <button class="btn btn-success btn-sm" type="button" onClick="fntPrintBarcode('#printCode')"><i class="fas fa-print"></i> Imprimir</button>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                      </div>
                      <div class="form-group col-md-6">
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
<div class="modal fade" id="modalEditIdentificacion" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Reasignar Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="verpqr" class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Radicado:</td>
              <td id="celRadicador"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celStatusr"></td>
            </tr>
            <tr>
              <td>Fecha Solicitud:</td>
              <td id="celFechar"></td>
            </tr>            
          </tbody>
        </table>
      </div>
      <div class="modal-body">
            <form id="formAsignarPqrsd" name="formAsignarPqrsd" class="form-horizontal">
              <input type="hidden" id="idpqrsdR" name="idpqrsdR" value="">
              <input type="hidden" id="emailarea" name="emailarea" value="">
              <input type="hidden" id="nomarea" name="nomarea" value="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Comentario: <span class="required">*</span></label>
                      <textarea class="form-control" id="txtComentario" name="txtComentario"></textarea>
                    </div>
                      <div class="form-group">
                        <label class="control-label">Responsable: <span class="required">*</span></label>
                        <select class="form-control" data-live-search="true" id="listResponsable" name="listResponsable" required>
                        </select>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <button id="btnActionEdit" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Asignar</span></button>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
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

<!-- Modal -->
<div class="modal fade" id="modalAprobarIdentificacion" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Recibir y Radicar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="verpqr" class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Radicado:</td>
              <td id="celRadicadora"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celStatusra"></td>
            </tr>
            <tr>
              <td>Fecha Solicitud:</td>
              <td id="celFechara"></td>
            </tr>            
          </tbody>
        </table>
      </div>
      <div class="modal-body">
            <form id="formAprobarPqrsd" name="formAprobarPqrsd" class="form-horizontal">
              <input type="hidden" id="idpqrsdA" name="idpqrsdA" value="">
              <input type="hidden" id="emaila" name="emaila" value="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Comentario: <span class="required">*</span></label>
                      <textarea class="form-control" id="txtComentarioa" name="txtComentarioa"></textarea>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <button id="btnActionAprobar" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Radicar</span></button>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
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


<!-- Modal -->
<div class="modal fade" id="modalFinalizarIdentificacion" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-l" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Finalizar PQRSD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="verpqr" class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Radicado:</td>
              <td id="celRadicadorf"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celStatusrf"></td>
            </tr>
            <tr>
              <td>Fecha Solicitud:</td>
              <td id="celFecharf"></td>
            </tr>            
          </tbody>
        </table>
      </div>
      <div class="modal-body">
            <form id="formFinalizarPqrsd" name="formFinalizarPqrsd" class="form-horizontal">
              <input type="hidden" id="idpqrsdf" name="idpqrsdf" value="">
              <input type="hidden" id="emailf" name="emailf" value="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label">Comentario: <span class="required">*</span></label>
                      <textarea class="form-control" id="txtComentariof" name="txtComentariof"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><span class="required"></span>Adjunto:</label>
                         <input class="form-control" id="txtfileg" name="txtfileg" type="file">
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <button id="btnActionAprobar" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Finalizar</span></button>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
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


