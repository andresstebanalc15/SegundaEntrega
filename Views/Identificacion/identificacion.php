<?php 
    headerAdmin($data); 
    getModal('modalIdentificacion',$data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fa fa-file-archive-o"></i> <?= $data['page_title'] ?>
              <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
              <?php } ?> 
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/identificacion"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableIdentificacion">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>PQRSD</th>
                          <th>Área</th>
                          <th>Respuesta</th>
                          <th>Fecha Solicitud</th>
                          <th>Fecha Vencimiento</th>
                          <th>Ingreso</th>                        
                          <th>Dias</th>
                          <th>Estado</th>
                          <th>Responsable</th>
                          <th>Acciones</th>
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
    </main>
<?php footerAdmin($data); ?>
    