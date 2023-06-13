<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-archive-o"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/tramip">Tramites</a></li>
        </ul>
      </div>
      <div class="row">
        <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
        <div class="col-md-12">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title"></h3>
              <div class="dflex">
                <input class="date-picker PQRSMes" name="PQRSMes" placeholder="Mes y Año">
                <button type="button" class="btnPQRSMes btn btn-info btn-sm" onclick="fntSearchVMes()"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="graficaMes"></div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6">
          <a href="<?= base_url(); ?>/linea" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-file-archive-o fa-3x"></i>
              <div class="info">
                <table class="col-md-10 col-lg-10">
                  <tr>
                    <th colspan="2"><h4>Tramites en Línea</h4></th>
                  </tr>
                  <tr>
                    <td>Sin Gestión:</td>
                    <td><strong><?= $data['isg'] ?></strong> </td>
                  </tr>
                  <tr>
                    <td>Recibidas:</td>
                    <td><strong><?= $data['ir'] ?></strong> </td>
                  </tr>
                  <tr>
                    <td>Finalizadas:</td>
                    <td><strong><?= $data['if'] ?></strong> </td>
                  </tr>
                   <tr>
                    <td>Total:</td>
                    <td><strong><?= $data['identificacion'] ?></strong> </td>
                  </tr>
                </table>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-6">
            <div class="tile">
              <div class="container-title">
                <h3 class="tile-title">Tipo de Solicitud por mes:</h3>
                <div class="dflex">
                  <input class="date-picker tipoID" name="tipoID" placeholder="Mes y Año">
                  <button type="button" class="btnTipoIdentificacion btn btn-info btn-sm" onclick="fntSearchIdentificacion()"> <i class="fas fa-search"></i> </button>
                </div>
              </div>
              <div id="tiposIdentificacion"></div>
            </div>
        </div>
           <?php } ?>
      </div>
    </main>
<?php footerAdmin($data); ?>

<script>
  
  Highcharts.chart('tiposIdentificacion', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Tipos de Solicitudes, <?= $data['TipoIMes']['mes'].' '.$data['TipoIMes']['anio'] ?>'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
          <?php 
            foreach ($data['TipoIMes']['tipospqrsi'] as $pagos) {
              echo "{name:'".$pagos['cantidad'].'. '.$pagos['tipo_pqr']."',y:".$pagos['cantidad']."},";
            }
           ?>
          ]
      }]
  });

  Highcharts.chart('graficaMes', {
      chart: {
          type: 'line'
      },
      title: {
          text: 'Tramites en Línea de <?= $data['pqrIDia']['mes'].' del '.$data['pqrIDia']['anio'] ?>'
      },
      subtitle: {
          text: 'Total de Tramites en Línea: <?= $data['pqrIDia']['total'] ?>'
      },
      xAxis: {
          categories: [
            <?php 
                foreach ($data['pqrIDia']['PQRI'] as $dia) {
                  echo $dia['dia'].",";
                }
            ?>
          ]
      },
      yAxis: {
          title: {
              text: ''
          }
      },
      plotOptions: {
          line: {
              dataLabels: {
                  enabled: true
              },
              enableMouseTracking: false
          }
      },
      series: [{
          name: 'Reclamo por Facturación',
          data: [
            <?php 
                foreach ($data['pqrRDia']['PQRI'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      },
      {
          name: 'Vinculaciones',
          data: [
            <?php 
                foreach ($data['pqrVDia']['PQRI'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      },
      {
          name: 'Recolecciones Especiales',
          data: [
            <?php 
                foreach ($data['pqrRCDDia']['PQRI'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      },
      {
          name: 'Viabilidad y Disponibilidad',
          data: [
            <?php 
                foreach ($data['pqrVDDia']['PQRI'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      }]
  });

</script>
    
    