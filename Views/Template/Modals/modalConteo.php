<!-- Modal -->
<div class="modal fade" id="modalFormConteo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Contador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formConteo" name="formConteo" class="form-horizontal">
              <input type="hidden" id="idConteo" name="idConteo" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="txtNumero">Numero: <span class="required">*</span></label>
                  <input type="number" class="form-control" id="txtNumero" name="txtNumero" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="txtStrong">Strong: <span class="required">*</span>*</label>
                  <input type="text" class="form-control" id="txtStrong" name="txtStrong" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="txtSmall">Small: <span class="required">*</span>*</label>
                  <input type="text" class="form-control" id="txtSmall" name="txtSmall" required="">
                </div>
              </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

