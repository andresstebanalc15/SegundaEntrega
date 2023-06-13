<?php
	session_start();
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if (empty($_POST['tipo']) || empty($_POST['nit']) || empty($_POST['telefono']) || empty($_POST['nombre']) || empty($_POST['direccion']) || empty($_POST['barrio']) || empty($_POST['corregimiento']) || empty($_POST['servicio']) || empty($_POST['fecha']) || empty($_POST['correo'])) 
		{
			$alert = '<p class="msg_error">Los campos con marcados con * son Obligatorios.</p>';
		}else
		{
			
			$nit            = $_POST['nit'];
			$razon          = $_POST['razon'];
			$fecha          = $_POST['fecha'];
			$nombre         = $_POST['nombre'];
			$telefono       = $_POST['telefono'];
			$direccion      = $_POST['direccion'];
			$barrio         = $_POST['barrio'];
			$corregimiento  = $_POST['corregimiento'];
			$tipo      		= $_POST['tipo'];
			$servicio       = $_POST['servicio'];
			$predio			= $_POST['id'];
			$correo			= $_POST['correo'];
			$user      		= $_SESSION['Iduser'];
			$documento 		  = $_FILES['documento'];
			$nombre_documento = $documento['name'];
			$type 		      = $documento['type'];
			$url_temp 	      = $documento['tmp_name'];

			$docpqrsd = 'Sin Adjuntos';

			if($nombre_documento != '')
			{
				$destino      = 'document/';
				$doc_nombre   = md5(date('d-m-Y H:m:s'));
				$docpqrsd     = $doc_nombre.$nombre_documento;
				$src          = $destino.$docpqrsd;
			}

			$result = 0;
				mysqli_set_charset($conection,'utf8');
				$query_insert = mysqli_query($conection, "INSERT INTO vinculacion(nit,razon,fecha,nombre,telefono,direccion,barrio,corregimiento,tipo,user,archivo,servicio,predio,email) VALUES ('$nit','$razon','$fecha','$nombre','$telefono','$direccion','$barrio','$corregimiento','$tipo','$user','$docpqrsd','$servicio','$predio','$correo')");
				if($query_insert)
				{
					if($nombre_documento != '')
					{
						move_uploaded_file($url_temp, $src);
					}

					$alert = '<p class="msg_save">Solicitud cargada correctamente</p>';
				}else
				{
					$alert = '<p class="msg_error">Error al cargar solicitud</p>';
				}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Vinculaciones | Candeaseo S.A. E.S.P.</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_register">
			<form action="" method="post" enctype="multipart/form-data">
				<h1>Vinculaciones</h1>

				<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

				<div id="responsive-form" class="clearfix">
					<div class="form-row">
						<div class="column-half">
							<label for="tipo">Tipo Documento: *</label>
									<?php 
										mysqli_set_charset($conection,'utf8');
										$query_d = mysqli_query($conection, "SELECT id_documento,documento FROM documento ORDER BY id_documento ASC");
										$result_d = mysqli_num_rows($query_d);

									?>
							<select name="tipo" id="tipo">
									<?php 
									if($result_d > 0)
									{
										while ($tipo = mysqli_fetch_array($query_d)) 
										{
									?>
									<option value="<?php echo $tipo['id_documento']; ?>"><?php echo $tipo['documento']; ?></option>

									<?php										
										}
									}
									?>
							</select>
						</div>
						<div class="column-half">
							<label for="nit">Numero: *</label>
							<input type="text" name="nit" id="nit" placeholder="Numero de Documento" required>
						</div>
					</div>
				</div>
				<div id="responsive-form" class="clearfix">
					<div class="form-row">
						<div class="column-half">
							<label for="razon">Razón Social:</label>
							<input type="text" name="razon" id="razon" placeholder="Razón Social">
						</div>
					
						<div class="column-half">
							<label for="fecha">Fecha: *</label>
							<input type="date" name="fecha" id="fecha" required>
						</div>
					</div>
					<div class="form-row">
						<div class="column-full">
							<label for="nombre">Nombre Completo: *</label>
							<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo Usuario o Representante Legal" required>
						</div>
					</div>
				</div>
				<div id="responsive-form" class="clearfix">
					<div class="form-row">
						<div class="column-half">
							<label for="direccion">Dirección Predio: *</label>
							<input type="text" name="direccion" id="direccion" placeholder="Dirección del predio a vincular" required>
						</div>
						<div class="column-half">
							<label for="barrio">Barrio Predio: *</label>
							<input type="text" name="barrio" id="barrio" placeholder="Barrio del predio a vincular" required>
						</div>
						<div class="column-half">
							<label for="telefono">Teléfono: *</label>
							<input type="text" name="telefono" id="telefono" placeholder="Teléfono del solicitante" required>
						</div>

						<div class="column-half">
							<label for="id">ID o Código: </label>
							<input type="text" name="id" id="id" placeholder="Identificación del predio">
						</div>
						<div class="column-half">
							<label for="correo">Email: *</label>
							<input type="email" name="correo" id="correo" placeholder="Correo del solicitante" required>
						</div>


						<div class="column-half">
							<label for="servicio">Tipo de Servicio: *</label>
							<select id="servicio" name="servicio">
								<option value="1"> Residencial</option>
								<option value="2"> Comercial</option>
								<option value="3"> Gran Productor</option>
							</select>
						</div>
						<div class="column-half">
							<label for="corregimiento">Corregimiento: *</label>
									<?php 
										mysqli_set_charset($conection,'utf8');
										$query_c = mysqli_query($conection, "SELECT id_corregimiento,corregimiento FROM corregimiento ORDER BY id_corregimiento ASC");
										$result_c = mysqli_num_rows($query_c);

									?>
							<select name="corregimiento" id="corregimiento">
									<?php 
									if($result_c > 0)
									{
										while ($corregimiento = mysqli_fetch_array($query_c)) 
										{
									?>
									<option value="<?php echo $corregimiento['id_corregimiento']; ?>"><?php echo $corregimiento['corregimiento']; ?></option>

									<?php										
										}
									}
									?>
							</select>
						</div>
						<div class="column-half">
							<label for="documento">Documentos:</label>
							<input type="file" name="documento" id="documento">
						</div>
					</div>
				</div>
				<button type="submit" class="btn_save btn_pqrsd"><i class="icon-save"></i> Cargar Vinculación</button>
 
			</div><!--end responsive-form-->

			</form>

		</div>

	</section>

	<?php include "includes/footer.php"; ?>
</body>
</html>