<!-- Modal -->
<div class="modal fade" id="modalFormTarifas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Tarifa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formTarifas" name="formTarifas" class="form-horizontal">
              <input type="hidden" id="idTarifa" name="idTarifa" value="">
               <input type="hidden" id="archivo_ac" name="archivo_ac" value="">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label  for="txtAnio" class="control-label"><span class="required">*</span>Año: </label>
                        <input type="text" class="form-control" id="txtAnio" name="txtAnio" required="">
                      </div>
                      <div class="form-group col-md-12">
                        <label  for="txtMes" class="control-label"><span class="required">*</span>Mes: </label>
                        <input type="text" class="form-control" id="txtMes" name="txtMes" required="">
                      </div>
                      <div class="form-group col-md-12">
                        <label class="control-label">Descripción: <span class="required">*</span></label>
                      <textarea class="form-control" id="txtComentario" name="txtComentario"></textarea>
                    </div>
                      <div class="form-group col-md-12">
                        <label class="control-label"><span class="required"></span>Adjunto:</label>
                         <input class="form-control" id="txtfileg" name="txtfileg" type="file">
                      </div>
                   
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