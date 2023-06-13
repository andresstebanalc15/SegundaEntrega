<?php 

class Conteo extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
			die();
		}
		getPermisos(4);
	}

	public function Conteo()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Contador";
		$data['page_title'] = "Contador <small>Candeaseo</small>";
		$data['page_name'] = "conteo";
		$data['page_functions_js'] = "functions_conteo.js";
		$this->views->getView($this,"conteo",$data);
	}

	public function setConteo(){
		if($_POST){

			//dep($_POST);
			//die();

			if(empty($_POST['txtNumero']) || empty($_POST['txtStrong']) || empty($_POST['txtSmall']))
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{ 
				$idConteo = intval($_POST['idConteo']);
				$txtNumero = intval($_POST['txtNumero']);
				$txtStrong = strClean($_POST['txtStrong']);
				$txtSmall = strClean($_POST['txtSmall']);

				$request_user = "";
				if($idConteo == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertConteo($txtNumero,
																	$txtStrong,
																	$txtSmall);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateConteo($idConteo,
																	$txtNumero,
																	$txtStrong,
																	$txtSmall);
					}
				}

				if($request_user > 0 )
					{
						if($option == 1){
							 $arrResponse = array('status' => true, 'msg' => 'Contador creado correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Contador actualizado correctamente.');
						}
					
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	public function getConteos()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectConteos();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if($_SESSION['permisosMod']['r']){
					
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar contador"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){	
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar contador"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getConteo($idconteo){
		if($_SESSION['permisosMod']['r']){
			$idconteo = intval($idconteo);
			if($idconteo > 0)
			{
				$arrData = $this->model->selectConteo($idconteo);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function delConteo()
	{
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intIdConteo = intval($_POST['idconteo']);
				$requestDelete = $this->model->deleteConteo($intIdConteo);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el contador');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al contador.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}



}

?>