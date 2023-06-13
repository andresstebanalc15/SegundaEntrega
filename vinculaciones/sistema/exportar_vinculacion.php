<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "listadodvinculacion.xls";
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
session_start();
include "../conexion.php";
?>
<head>
	<meta charset="UTF-8">
</head>
<table style="font-size: 11pt;">
			<tr>
				<th  style="text-transform: uppercase; border:1px solid #000">Radicado</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Fecha</th>
				<th  style="text-transform: uppercase; border:1px solid #000">ID</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Servicio</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Tipo</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Documento</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Razón</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Nombres</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Teléfono</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Correo</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Dirección</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Barrio</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Corregimiento</th>
				<th  style="text-transform: uppercase; border:1px solid #000">Ejecutivo</th>
			</tr>
			
		<?php

			mysqli_set_charset($conection,'utf8');
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 10){
				$query = mysqli_query($conection,"SELECT v.id,v.nit,v.razon,v.fecha,v.nombre,v.telefono,v.direccion,v.barrio,c.corregimiento,v.tipo,t.documento,v.user,u.nombre_usuario,v.status,v.dateadd,v.archivo,v.servicio,v.predio,v.email FROM vinculacion v 
					INNER JOIN documento t ON v.tipo = t.id_documento
					INNER JOIN usuario u ON v.user = u.id_usuario
					INNER JOIN corregimiento c ON v.corregimiento = c.id_corregimiento
					WHERE v.status = 1 ORDER BY v.id DESC");
			}else{

				$user = $_SESSION['Iduser'];
				$query = mysqli_query($conection,"SELECT v.id,v.nit,v.razon,v.fecha,v.nombre,v.telefono,v.direccion,v.barrio,c.corregimiento,v.tipo,t.documento,v.user,u.nombre_usuario,v.status,v.dateadd,v.archivo,v.servicio,v.predio,v.email FROM vinculacion v 
					INNER JOIN documento t ON v.tipo = t.id_documento
					INNER JOIN usuario u ON v.user = u.id_usuario
					INNER JOIN corregimiento c ON v.corregimiento = c.id_corregimiento
					WHERE v.status = 1 AND v.user = '$user' ORDER BY v.id DESC");
			}

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if ($result > 0) 
			{
				
				while ($data = mysqli_fetch_array($query)) 
				{
				
		?>
				<tr>
				<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["id"]; ?></td>
				<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["fecha"]; ?></td>
				<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["predio"]; ?></td>
				<td style="text-transform: uppercase; border:1px solid #000">
					<?php
						if( $data["servicio"] == 1)
						{
					?>
							<span class="recibido"> Residencial</span>
					<?php	
						}
						else if($data["servicio"] == 2)
						{
					?>
							<span class="aprobado"> Comercial</span>
					<?php
						}
						else
						{
						?>
						<span class="rechazado"> Gran Productor</span>
						<?php
						}
						?>
					</td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["documento"];   ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["nit"];   ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["razon"];   ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["nombre"]; ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["telefono"]; ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["email"]; ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["direccion"];   ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["barrio"];   ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["corregimiento"]; ?></td>
					<td style="text-transform: uppercase; border:1px solid #000"><?php  echo $data["nombre_usuario"]; ?></td>
				</tr>
		<?php
				}
			}
		?>

		</table>