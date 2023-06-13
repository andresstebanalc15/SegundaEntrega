<?php
	class Slider extends Controllers{
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

		public function Slider()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Slider";
			$data['page_title'] = "Slider <small>Candeaseo</small>";
			$data['page_name'] = "slider";
			$data['page_functions_js'] = "functions_slider.js";
			$this->views->getView($this,"slider",$data);
		}

		public function setSlider(){
			if($_POST){

				if(empty($_POST['txtNombre']) || empty($_POST['txtDescripcion']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$intIdslider = intval($_POST['idSlider']);
					$strSlider =  strClean($_POST['txtNombre']);
					$strDescipcion = strClean($_POST['txtDescripcion']);
					$strNombreUrl = strClean($_POST['txtNombreUrl']);
					$strUrl = strClean($_POST['txtUrl']);
					$intStatus = intval($_POST['listStatus']);
					$strVideo = strClean($_POST['txtNombreVideo']);
					$strUrlVideo = strClean($_POST['txtEWnlaceVideo']);

					$foto   	 	= $_FILES['foto'];
					$nombre_foto 	= $foto['name'];
					$type 		 	= $foto['type'];
					$url_temp    	= $foto['tmp_name'];
					$imgPortada 	= 'portada_categoria.png';
					$request_cateria = "";
					if($nombre_foto != ''){
						$imgPortada = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
					}

					if($intIdslider == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
							$request_cateria = $this->model->inserslider($strSlider,$strDescipcion,$strNombreUrl,$strUrl,$intStatus,$strVideo,$strUrlVideo,$imgPortada);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							if($nombre_foto == ''){
								if($_POST['foto_actual'] != 'portada_categoria.png' && $_POST['foto_remove'] == 0 ){
									$imgPortada = $_POST['foto_actual'];
								}
							}
							$request_cateria = $this->model->updateSlider($intIdslider,$strSlider,$strDescipcion,$strNombreUrl,$strUrl,$intStatus,$strVideo,$strUrlVideo,$imgPortada);
							$option = 2;
						}
					}
					if($request_cateria > 0 )
					{
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

							if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
								|| ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
								deleteFile($_POST['foto_actual']);
							}
						}
					}else if($request_cateria == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! La categoría ya existe.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSliders()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectSlider();
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
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idimg'].')" title="Ver slider"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idimg'].')" title="Editar slider"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idimg'].')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSlider($idslider)
		{
			if($_SESSION['permisosMod']['r']){
				$intIdslider = intval($idslider);
				if($intIdslider > 0)
				{
					$arrData = $this->model->selectSliders($intIdslider);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrData['url_portada'] = media().'/images/uploads/'.$arrData['portada'];
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function delSlider()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdslider = intval($_POST['idslider']);
					$requestDelete = $this->model->deleteSlider($intIdslider);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Slider');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Slider Principal.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Slider.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function getSelectCategorias(){
			$htmlOptions = "";
			$arrData = $this->model->selectCategorias();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idcategoria'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

	}


 ?>