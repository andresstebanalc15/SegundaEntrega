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
	
	if($grafica = "tipoAnonimonMes"){
		$TipoAMes = $data;
 ?>
<script>
	Highcharts.chart('tiposAnonimo', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Tipos de Solicitudes, <?= $TipoAMes['mes'].' '.$TipoAMes['anio'] ?>'
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
            foreach ($TipoAMes['tipospqrsa'] as $pagos) {
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
          text: 'PQRSD de <?= $SolicitudesMes['id']['mes'].' del '.$SolicitudesMes['id']['anio'] ?>'
      },
      subtitle: {
          text: 'Total de PQRSD Identificación: <?= $SolicitudesMes['id']['total'].' - Total de PQRSD Anónimo '.$SolicitudesMes['an']['total'] ?>'
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
          name: 'PQRS Identificación',
          data: [
            <?php 
                foreach ($SolicitudesMes['id']['PQRI'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      },
      {
          name: 'PQRS Anónimo',
          data: [
            <?php 
                foreach ($SolicitudesMes['an']['PQRA'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      }]
  });
</script>
 <?php } ?>