<?php
$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
	header('location: sistema/internos.php');

}else
{
		if(!empty($_POST))
		{
			if (empty($_POST['usuario']) || empty($_POST['clave']))
			{
				$alert = "Ingrese su usuario y su contraseña";
			}else
			{
			
				require_once "conexion.php";
			
				$user = mysqli_real_escape_string($conection, $_POST['usuario']);
				$pass = md5(mysqli_real_escape_string($conection, $_POST['clave']));

				mysqli_set_charset($conection,'utf8');
				$query = mysqli_query($conection, "SELECT u.id_usuario, u.usuario_usuario, u.nombre_usuario, u.correo_usuario, d.id_dependencia, d.dependencia
														FROM usuario u 
														INNER JOIN dependencia d 
														ON u.rol_usuario = d.id_dependencia
														WHERE u.usuario_usuario= '$user' AND u.clave_usuario= '$pass'");
				mysqli_close($conection);

				$result = mysqli_num_rows($query);

				if ($result>0) 
				{
					$data = mysqli_fetch_array($query);
					
					$_SESSION['active']  = true;
					$_SESSION['Iduser']  = $data['id_usuario'];
					$_SESSION['nombre']  = $data['nombre_usuario'];
					$_SESSION['email']   = $data['correo_usuario'];
					$_SESSION['usuario'] = $data['usuario_usuario'];
					$_SESSION['rol']     = $data['id_dependencia'];
					$_SESSION['rol_name']     = $data['dependencia'];

					header('location: sistema/internos.php');

				}else
				{
					$alert = "El usuario o la clave son incorrecos";
					session_destroy();
				}

			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<title> Login | SoftService.net</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel=icon href='../images/icono.png' sizes="42x42" type="image/png">
</head>
<body>
	<section id="container">
		<form action="" method="post">
			<img src="img/login.png" alt="Login">

			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Constraseña">
			<div class="alert" style="color: #ff7f27; text-align: center;"> <?php echo isset($alert) ? $alert :''; ?> </div>
			<input type="submit" value="INGRESAR">
			<a href="../">REGRESAR</a>
		</form>


</body>
</html>
