<?php 
	class Prensa extends Controllers{
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

		public function Prensa()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Prensa";
			$data['page_title'] = "Sala de Prensa <small>Candeaseo</small>";
			$data['page_name'] = "prensa";
			$data['page_functions_js'] = "functions_prensa.js";
			$this->views->getView($this,"prensa",$data);
		}

		public function getPrensas()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectPrensas();
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
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar noticia"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar noticia"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setPrensa(){
			if($_POST){

				//dep($_POST);
				//die();

				if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['txtComentario']) || empty($_POST['txtFecha']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$idPrensa = intval($_POST['idPrensa']);
					$strNombre = strClean($_POST['txtNombre']);
					$strDescripcion = strClean($_POST['txtDescripcion']);
					$strComentario = strClean($_POST['txtComentario']);
					$strFecha = strClean($_POST['txtFecha']);
					$intStatus = intval($_POST['listStatus']);
					$request_producto = "";

					if($idPrensa == 0)
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_producto = $this->model->insertPrensa($strNombre, 
																		$strDescripcion, 
																		$strComentario, 
																		$strFecha,
																		$intStatus);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_producto = $this->model->updateProducto($idPrensa,
																		$strNombre, 
																		$strDescripcion, 
																		$strComentario, 
																		$strFecha,
																		$intStatus);
						}
					}
					if($request_producto > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'id' => $request_producto, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'id' => $idPrensa, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_producto == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe una noticia con el Titulo Ingresado.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getPrensa($idprensa){
			if($_SESSION['permisosMod']['r']){
				$idprensa = intval($idprensa);
				if($idprensa > 0){
					$arrData = $this->model->selectPrensa($idprensa);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrImg = $this->model->selectImages($idprensa);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$arrData['images'] = $arrImg;
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function setImage(){
			if($_POST){
				if(empty($_POST['idprensa'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de dato.');
				}else{
					$idPrensa = intval($_POST['idprensa']);
					$foto      = $_FILES['foto'];
					$imgNombre = 'sal_'.md5(date('d-m-Y H:m:s')).'.jpg';
					$request_image = $this->model->insertImage($idPrensa,$imgNombre);
					if($request_image){
						$uploadImage = uploadImage($foto,$imgNombre);
						$arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Archivo cargado.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error de carga.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delFile(){
			if($_POST){
				if(empty($_POST['idprensa']) || empty($_POST['file'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//Eliminar de la DB
					$idPrensa = intval($_POST['idprensa']);
					$imgNombre  = strClean($_POST['file']);
					$request_image = $this->model->deleteImage($idPrensa,$imgNombre);

					if($request_image){
						$deleteFile =  deleteFile($imgNombre);
						$arrResponse = array('status' => true, 'msg' => 'Archivo eliminado');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delPrensa(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdprensa = intval($_POST['idPrensa']);
					$requestDelete = $this->model->deletePrensa($intIdprensa);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la noticia');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la noticia.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
	}

 ?>