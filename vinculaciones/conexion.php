<?php



	$host = 'localhost';

	$user = 'candeaseogov_softservice';

	$password = 'Candeaseo2020$';

	$db = 'candeaseogov_vinculacion';



	$conection = @mysqli_connect($host, $user, $password, $db);





	//mysqli_close($conection);



	if(!$conection){

		echo "Error en la conexion";

	}



?>