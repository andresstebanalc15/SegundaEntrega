<?php 
	
	if($grafica = "tipoIdentificacionMes"){
		$TipoIMes = $data;
 ?>
<script>
	Highcharts.chart('tiposIdentificacion', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Tipos de Solicitudes, <?= $TipoIMes['mes'].' '.$TipoIMes['anio'] ?>'
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
            foreach ($TipoIMes['tipospqrsi'] as $pagos) {
              echo "{name:'".$pagos['cantidad'].'. '.$pagos['tipo_pqr']."',y:".$pagos['cantidad']."},";
            }
           ?>
          ]
      }]
  });

</script>
<?php } ?>
<?php 
	if($grafica = "SolicitudesMes"){
		$SolicitudesMes = $data;
 ?>
<script>
	  Highcharts.chart('graficaMes', {
      chart: {
          type: 'line'
      },
      title: {
          text: 'Tramites de <?= $SolicitudesMes['id']['mes'].' del '.$SolicitudesMes['id']['anio'] ?>'
      },
      subtitle: {
          text: 'Total de Tramites en Línea: <?= $SolicitudesMes['id']['total'] ?>'
      },
      xAxis: {
          categories: [
            <?php 
                foreach ($SolicitudesMes['id']['PQRI'] as $dia) {
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
                  foreach ($SolicitudesMes['r']['PQRI'] as $dia) {
                    echo $dia['total'].",";
                  }
              ?>
            ]
        },
        {
            name: 'Vinculaciones',
            data: [
              <?php 
                  foreach ($SolicitudesMes['v']['PQRI'] as $dia) {
                    echo $dia['total'].",";
                  }
              ?>
            ]
        },
        {
            name: 'Recolecciones Especiales',
            data: [
              <?php 
                  foreach ($SolicitudesMes['rcd']['PQRI'] as $dia) {
                    echo $dia['total'].",";
                  }
              ?>
            ]
        },
        {
            name: 'Viabilidad y Disponibilidad',
            data: [
              <?php 
                  foreach ($SolicitudesMes['vd']['PQRI'] as $dia) {
                    echo $dia['total'].",";
                  }
              ?>
            ]
        }]
    });
</script>
 <?php } ?>