<?php
	session_start();
	include "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Tramites | SoftService.net</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<?php 

		$busqueda = '';
		$search_usuario = '';
		if(empty($_REQUEST['busqueda']) && empty($_REQUEST['usuario']))
		{
			header("location: internos.php");
		}
		if(!empty($_REQUEST['busqueda'])){
			$busqueda = strtolower($_REQUEST['busqueda']);
			$where = " (v.id = '$busqueda' OR v.nit = '$busqueda') AND v.status = 1";
			$buscar = 'busqueda='.$busqueda;
			$href = 'exportar_bus_vinculacion.php?busqueda='.$busqueda;
		}
		if(!empty($_REQUEST['usuario'])){
			$search_usuario = strtolower($_REQUEST['usuario']);
			$where = "v.user LIKE '%$search_usuario%' AND v.status = 1";
			$buscar = 'usuario='.$search_usuario;
			$href = 'exportar_bus_vinculacion.php?usuario='.$search_usuario;
		}

		?>

		<h1> Ejecutivos</h1>

		<form action="buscar_vinculacion.php" method="get" class="form_search">
			
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar radicado o documento" value="<?php echo $busqueda; ?>">
			<input type="submit" value="Buscar" class="btn_search">
			<a href="<?php echo $href; ?>" ><img src="img/logo_excel.png"> </a>

		</form>

<div class="containerTable">
	<table style="font-size: 9pt;">
		<tr>
			<th>Radicado</th>
			<th>Fecha</th>
			<th>Servicio</th>
			<th>Tipo</th>
			<th>Documento</th>
			<th>Razon</th>
			<th>Nombres</th>
			<th>Teléfono</th>
			<th>Dirección</th>
			<th>Barrio</th>
			<th>Corregimiento</th>
			<th>Adjunto</th><?php
				if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 10){
				?>
					<th>
					
					<?php 
					mysqli_set_charset($conection,'utf8');
					$query_rol = mysqli_query($conection, "SELECT id_usuario, nombre_usuario FROM usuario WHERE estatus_usuario = 1 AND rol_usuario = 12 ORDER BY id_usuario ASC");
					$result_rol = mysqli_num_rows($query_rol);

					?>
					<select name="usuario" id="search_rol">
						<option value="" selected="">Ejecutivo</option>
					<?php 

					if($result_rol > 0)
					{
						while ($usuario = mysqli_fetch_array($query_rol)) 
						{
					?>

					<option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_usuario']; ?></option>

					<?php										
						}
					}

					?>
					</select>

					</th>
					<?php
					}else{
					?>
						<th>Adjunto</th>
					<?php
					}
				?>
				<th>Acciones</th>
			</tr>
			
		<?php 

			mysqli_set_charset($conection,'utf8');
			$query = mysqli_query($conection,"SELECT v.id,v.nit,v.razon,v.fecha,v.nombre,v.telefono,v.direccion,v.barrio,c.corregimiento,v.tipo,t.documento,v.user,u.nombre_usuario,v.status,v.dateadd,v.archivo,v.servicio FROM vinculacion v 
				INNER JOIN documento t ON v.tipo = t.id_documento
				INNER JOIN usuario u ON v.user = u.id_usuario
				INNER JOIN corregimiento c ON v.corregimiento = c.id_corregimiento
				WHERE $where ORDER BY v.id DESC");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if ($result > 0) 
			{
				
				while ($data = mysqli_fetch_array($query)) 
				{
					$documento = $data["archivo"]	;	
		?>
				<tr>
				<td><?php  echo $data["id"]; ?></td>
				<td><?php  echo $data["fecha"]; ?></td>
				<td>
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
				<td><?php  echo $data["documento"];   ?></td>
				<td><?php  echo $data["nit"];   ?></td>
				<td><?php  echo $data["razon"];   ?></td>
				<td><?php  echo $data["nombre"]; ?></td>
				<td><?php  echo $data["telefono"]; ?></td>
				<td><?php  echo $data["direccion"];   ?></td>
				<td><?php  echo $data["barrio"];   ?></td>
				<td><?php  echo $data["corregimiento"]; ?></td>
				<td>
					<?php
					if( $documento == 'Sin Adjuntos')
					{
						?> N/A <?php
					} else{
						?> <a class="link_edit" href="document/vinculacion/<?php echo $data["archivo"]?>"><span class="icon-documents"></span></a> <?php
					}
					?>
				</td>
				<td><?php  echo $data["nombre_usuario"]; ?></td>
				<td>
					

					<a class="link_edit" href="editar_vinculacion.php?id=<?php echo $data["id"]?>" style="font-size:15pt;"><i class="icon-new-message"></i></a>
					|
					<a class="link_edit" target="_blank" href="https://api.whatsapp.com/send?phone=57<?php echo $data["telefono"]; ?>&text=Hola, CANDEASEO S.A. E.S.P. te agradece por querer ser parte de nosotros."><img class="icono_img" src="img/whatsapp.png" alt="Whatsapp"></a>
				</td>
				</tr>
				
		<?php
				}
			}
		?>

		</table>
</div>

	</section>

	<?php include "includes/footer.php"; ?>
</body>
</html>