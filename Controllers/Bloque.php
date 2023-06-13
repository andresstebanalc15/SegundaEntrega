<?php 

class Bloque extends Controllers{
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

	public function Bloque()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Bloques";
		$data['page_title'] = "Bloques <small>Candeaseo</small>";
		$data['page_name'] = "bloques";
		$data['page_functions_js'] = "functions_bloque.js";
		$this->views->getView($this,"bloque",$data);
	}

	public function setBloque(){
		if($_POST){

			//dep($_POST);
			//die();

			if(empty($_POST['txtNombre']) || empty($_POST['txtURL']) || empty($_POST['listStatus']) || empty($_POST['txtIcono']))
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{ 
				$idBloque = intval($_POST['idBloque']);
				$strNombre = strClean($_POST['txtNombre']);
				$strURL = strClean($_POST['txtURL']);
				$intStatus = intval(strClean($_POST['listStatus']));
				$strIcono = strClean($_POST['txtIcono']);

				$request_user = "";
				if($idBloque == 0)
				{
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_user = $this->model->insertBloque($strNombre,
																	$strIcono,
																	$strURL, 
																	$intStatus);
					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_user = $this->model->updateBloque($idBloque,
																	$strNombre,
																	$strIcono,
																	$strURL, 
																	$intStatus);
					}
				}

				if($request_user > 0 )
					{
						if($option == 1){
							 $arrResponse = array('status' => true, 'msg' => 'Bloque creado correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Bloque actualizado correctamente.');
						}
					
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	public function getBloques()
	{
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectBloques();
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
					$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['iddiv'].')" title="Editar bloque"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){	
					$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['iddiv'].')" title="Eliminar bloque"><i class="far fa-trash-alt"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getBloque($idbloque){
		if($_SESSION['permisosMod']['r']){
			$idbloque = intval($idbloque);
			if($idbloque > 0)
			{
				$arrData = $this->model->selectBloque($idbloque);
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

	public function delBloque()
	{
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intIdbloque = intval($_POST['idbloque']);
				$requestDelete = $this->model->deleteBloque($intIdbloque);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el bloque');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al bloque.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}



}

?>