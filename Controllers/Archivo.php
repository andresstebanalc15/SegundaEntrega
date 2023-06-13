<?php 

class Archivo extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(8);
		}

		public function Archivo()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Archivos";
			$data['page_title'] = "Archivos <small>".NOMBRE_EMPESA."</small>";
			$data['page_name'] = "Archivos";
			$data['page_functions_js'] = "functions_archivo.js";
			$this->views->getView($this,"archivo",$data);
		}

		public function getSelectPaginas(){
			$htmlOptions = "";
			$arrData = $this->model->selectPagina();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idpost'].'">'.$arrData[$i]['titulo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getArchivos()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectTarifas();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/tarifas/'.$arrData[$i]['archivo'].'"><i class="fas fa-file-contract"></i></a>';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['r']){
						
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo('.$arrData[$i]['id_archivo'].')" title="Editar tarifa"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id_archivo'].')" title="Eliminar tarifa"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setArchivo()
		{
			if($_POST)
			{

				if($_POST)
				{

					//dep($_POST);
					//dep($_FILES);
					//die();
				
					if(empty($_POST['txtNombre']) || empty($_POST['txtComentario']) || empty($_POST['txtDate']) || empty($_POST['listPagina']))
					{
						$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
					}else
					{	
						$idusuario = intval($_SESSION['idUser']);
						$idArchivo = intval($_POST['idTarifa']);
						$archivo_ac = strClean($_POST['archivo_ac']);
						$txtNombre = strClean($_POST['txtNombre']);
						$txtComentario = strClean($_POST['txtComentario']);
						$txtDate = strClean($_POST['txtDate']);
						$listPagina = strClean($_POST['listPagina']);
						
	
						$archivo = $_FILES['txtfileg'];
						$nombre = md5(date('d-m-Y H:m:s')).$archivo['name'];

						$request_tarifas = "";

						if($idArchivo == 0)
						{
							//Crear
							if($_SESSION['permisosMod']['w']){
								$option = 1;
								$request_tarifas = $this->model->insertArchivo($idusuario,$txtNombre,$txtComentario,$txtDate,$listPagina,$nombre);
							}
						}else
						{
							if($_SESSION['permisosMod']['u'])
							{
								$option = 2;
								$request_tarifas = $this->model->updateArchivos($idArchivo,$idusuario,$txtNombre,$txtComentario,$txtDate,$listPagina);
								
								if($archivo['name'] != '')
								{
									$request_archivo = $this->model->UpdateArchivo($idArchivo,
																	$nombre);
									if($request_archivo > 0)
									{
										uploadTarifas($archivo,$nombre);

										if($archivo_ac != '')
										{
											deleteFileTarifas($archivo_ac);
										}	
									}
								}
							}
						}

						if($request_tarifas > 0 )
						{
							if($option == 1)
							{
								$arrResponse = array('status' => true, 'id' => $request_tarifas, 'msg' => 'Archivo creado correctamente');
								if($archivo['name'] != '')
								{
									$uploadTarifa = uploadTarifas($archivo,$nombre);
								}

							}else
							{
								$arrResponse = array('status' => true, 'msg' => 'Archivo ctualizado correctamente.');
							}
			
						}else
						{
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}
					}
				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delTarifas(){
			if($_POST){
				//dep($_POST);
				//die();
				$idtarifa = intval($_POST['idtarifa']);
				$requestDelete = $this->model->deleteTarifa($idtarifa);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la tarifa');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la tarifa.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function geTarifa(int $idtarifa){
			
			$idtarifa = intval($idtarifa);
			if($idtarifa > 0)
			{
				$arrData = $this->model->selectTarifa($idtarifa);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);


				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}
 ?>