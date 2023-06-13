<?php
	class Sub extends Controllers{
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
			getPermisos(8);
		}

		public function Sub()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "SubCategorias";
			$data['page_title'] = "SUBCATEGORIAS TRANSPARENCIA <small>".NOMBRE_EMPESA."</small>";
			$data['page_name'] = "Subcategorias";
			$data['page_functions_js'] = "functions_sub.js";
			$this->views->getView($this,"sub",$data);
		}

		public function getSelectPaginas(){
			$htmlOptions = "";
			$arrData = $this->model->selectPagina();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['ruta'].'">'.$arrData[$i]['titulo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function setCategoria(){
			if($_POST){

				//dep($_POST);
				//die();

				if(empty($_POST['txtNombre']) || empty($_POST['listStatus']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{
					
					$intIdcategoria = intval($_POST['idCategoria']);
					$strNombre =  strClean($_POST['txtNombre']);
					$intStatus = strClean($_POST['listStatus']);
					$intCategoria = intval($_POST['listCategoria']);
					$intPagina = strClean($_POST['listPagina']);


					if($intIdcategoria == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
							$request_cateria = $this->model->inserCategoria($strNombre, $intStatus,$intCategoria,$intPagina);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							
							$request_cateria = $this->model->updateCategoria($intIdcategoria,$strNombre, $intStatus,$intCategoria,$intPagina);
							$option = 2;
						}
					}
					if($request_cateria > 0 )
					{
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							
						}
					}else if($request_cateria == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! La subcategoría ya existe.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}



		public function getCategorias()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectCategoriasC();
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

					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar subcategoría"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar subcategoría"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getCategoria($idcategoria)
		{
			if($_SESSION['permisosMod']['r']){
				$intIdcategoria = intval($idcategoria);
				if($intIdcategoria > 0)
				{
					$arrData = $this->model->selectCategoria($intIdcategoria);
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

		public function delCategoria()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdcategoria = intval($_POST['idCategoria']);
					$requestDelete = $this->model->deleteCategoria($intIdcategoria);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la subcategoría');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la subcategoría.');
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