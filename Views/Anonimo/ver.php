<?php 
    headerAdmin($data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-file-text-o"></i> <?= $data['page_title'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/identificacion"> PQRSD Anónimo</a></li>
    </ul>
  </div>
  <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <?php
          if(empty($data['arrPedido'])){
          ?>  
          <p>Datos no encontrados</p>
          <?php
          }else{
          ?>
          <section id="sOrden" class="invoice">
            <div class="row mb-4">
              <div class="col-4">
                <h2 class="page-header"><img src="<?= media(); ?>/candeaseo/img/logo_01.png"></h2>
              </div>
              <div class="col-8">
                <h5 class="text-right"><?= $data['arrPedido']['ver']['status']; ?></h5>
                <h5 class="text-right"><?= $data['arrPedido']['ver']['nomresponsable']; ?></h5>
                <h5 class="text-right">Ticket: <?= $data['arrPedido']['ver']['codigo']; ?></h5>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-12">
                <address><br>
                  <table class="col-12">
                    <tr>
                      <th class="text-center">INFORMACIÓN DE SOLICITUD</th>
                    </tr>
                  </table>
                </address>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-7">
                <address><br>
                 <table class="col-12">
                  <tr>
                    <th colspan="2" class="text-center"></th>
                  </tr>
                  <tr>
                    <td><strong>Ingreso: </strong></td>
                    <td><?= $data['arrPedido']['ver']['canalingreso']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Área: </strong></td>
                    <td><?= $data['arrPedido']['ver']['nomarea']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Respuesta: </strong></td>
                    <td><?= $data['arrPedido']['ver']['medio']; ?></td>
                  </tr>
                   <tr>
                    <td><strong>Solicitud: </strong></td>
                    <td><?= $data['arrPedido']['ver']['tipo_pqr']; ?></td>
                  </tr>
                 </table>
                </address>
              </div>
              <div class="col-5">
                <address><br>
                 <table class="col-12">
                  <tr>
                    <th colspan="2"></th>
                  </tr>
                  <tr>
                    <td><strong>Fecha: </strong></td>
                    <td><?= $data['arrPedido']['ver']['fecha']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Días: </strong></td>
                    <td><?= $data['arrPedido']['ver']['tiempo']; ?></td>
                  </tr>
                  <tr>
                    <td rowspan="2"><strong>Documento Adjunto: </strong></td>
                    <td rowspan="2"><?= $data['arrPedido']['ver']['descarga']; ?></td>
                  </tr>
                 </table>
                </address>
              </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="col-12">
                  <tr>
                    <th>Descripción:</th>
                  </tr>
                  <tr>
                    <td><?= $data['arrPedido']['ver']['descripcion']; ?></td>
                  </tr>
                </table>
              </div> 
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Acción</th>
                      <th>Descripción</th>
                      <th>Usuario</th>
                      <th>Adjunto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                      if(count($data['arrPedido']['trazabilidad'])){
                          foreach ($data['arrPedido']['trazabilidad'] as $trazabilidad) {
                    ?>
                    <tr>
                      <td><?= $trazabilidad['fecha']; ?></td>
                      <td><?= $trazabilidad['accion']; ?></td>
                      <td><?= $trazabilidad['texto']; ?></td>
                      <td><?= $trazabilidad['nomtra'].' '.$trazabilidad['apellidos']; ?></td>
                      <?php  
                        if($trazabilidad['adjunto'] == 'vacio.png'){
                      ?>
                        <td>Sin archivo</td>
                      <?php  
                        }else{
                      ?>
                        <td><a href="<?= media(); ?>/images/pqra/<?= $trazabilidad['adjunto']; ?>" target="_blanck"><i class="fas fa-file-pdf"></i></a></td>
                      <?php  
                        }
                      ?>
                    </tr>
                     <?php        
                          }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row d-print-none mt-2">
              <div class="col-12 text-right">
                <a class="btn btn-primary" href="javascript:window.print('#sOrden');"><i class="fa fa-print"></i> Imprimir</a>
              </div>

            </div>
          </section>
           <?php  
              }
            ?>
        </div>
      </div>
  </div>
</main>

<?php footerAdmin($data); ?>