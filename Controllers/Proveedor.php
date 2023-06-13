<?php 

	class Proveedor extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(7);
		}

		public function Proveedor()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Proveedor";
			$data['page_title'] = "PROVEEDOR";
			$data['page_name'] = "proveedor";
			$data['page_functions_js'] = "functions_proveedor.js";
			$this->views->getView($this,"proveedor",$data);
		}


		public function setProveedor(){
			if($_POST){
				//dep($_POST);
				//dep($_FILES);
				//die();
				if(empty($_POST['listSolicitanteid']) || empty($_POST['listTipoid']) || empty($_POST['txtNit']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['txtTelefono']) || empty($_POST['txtemail']) || empty($_POST['txtBarrio']) || empty($_POST['txtemail']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					$hvac = $_POST['hvac'];
					$ceac = $_POST['ceac'];
					$cedulaac = $_POST['cedulaac'];
					$rutac =  $_POST['rutac'];
					$antecedentesac = $_POST['antecedentesac'];
					$idProveedor = intval($_POST['idProveedor']);
					$tipoPersona = intval($_POST['listSolicitanteid']);
					$tipoDocumento = intval($_POST['listTipoid']);
					$intidusuario = intval($_SESSION['idUser']);
					$strNit = strClean($_POST['txtNit']);
					$strRazon = strClean($_POST['txtRazon']);
					$strNombrea = ucwords(strClean($_POST['txtNombrea']));
					$strNombreb = ucwords(strClean($_POST['txtNombreb']));
					$strApellidoa = ucwords(strClean($_POST['txtApellidoa']));
					$strApellidob = ucwords(strClean($_POST['txtApellidob']));
					$intDepartamento = intval($_POST['listDepartamentoid']);
					$intMunicipio = intval($_POST['listMunicipioid']);
					$intCorregimiento = intval($_POST['listCorregimientoid']);
					$strDireccion = strClean($_POST['txtDireccion']);
					$strBarrio = strClean($_POST['txtBarrio']);
					$intTelefono = strClean($_POST['txtTelefono']);
					$strEmail = strtolower(strClean($_POST['txtemail']));
					$intStatus = intval(strClean($_POST['listStatus']));
					$intCritico = intval(strClean($_POST['listCritico']));
					$dateadd = date('Y-m-d H:m:s');

					if($idProveedor == 0)
					{
						//Archivos
					if($_FILES['FileHV']['error'] == 4){
						$hv       	= $_FILES['FileHV'];
						$nombrehv = 'vacio.png';
					}else{
						$hv       	= $_FILES['FileHV'];
						$nombrehv = md5(date('d-m-Y H:m:s')).$hv['name'];	
					}

					if($_FILES['txtCE']['error'] == 4){
						$ce       	= $_FILES['txtCE'];
						$nombrece = 'vacio.png';
					}else{
						$ce       	= $_FILES['txtCE'];
						$nombrece = md5(date('d-m-Y H:m:s')).$ce['name'];	
					}

					if($_FILES['FileCedula']['error'] == 4){
						$cedula       	= $_FILES['FileCedula'];
						$nombrece = 'vacio.png';
					}else{
						$cedula       	= $_FILES['FileCedula'];
						$nombrecedula = md5(date('d-m-Y H:m:s')).$cedula['name'];	
					}

					if($_FILES['FileRUT']['error'] == 4){
						$rut       	= $_FILES['FileRUT'];
						$nombrece = 'vacio.png';
					}else{
						$rut       	= $_FILES['FileRUT'];
						$nombrerut = md5(date('d-m-Y H:m:s')).$rut['name'];	
					}
					
					if($_FILES['FileAntecedentes']['error'] == 4){
						$antecedentes       	= $_FILES['FileAntecedentes'];
						$nombreantecedentes = 'vacio.png';
					}else{
						$antecedentes       	= $_FILES['FileAntecedentes'];
						$nombreantecedentes = md5(date('d-m-Y H:m:s')).$antecedentes['name'];	
					}

						if($_FILES['FileHV']['error'] == 4  || $_FILES['FileCedula']['error'] == 4 || $_FILES['FileRUT']['error'] == 4  || $_FILES['FileAntecedentes']['error'] == 4)
						{
							$request_personal = 'adjuntos';
						}//Crear
						else{
							if($_SESSION['permisosMod']['w']){
							$option = 1;
							$request_personal = $this->model->insertProveedor($intidusuario,
																			$tipoDocumento,
																			$strNit,
																			$tipoPersona,
																			$strRazon,
																			$strNombrea, 
																			$strNombreb,
																			$strApellidoa, 
																			$strApellidob, 
																			$intDepartamento, 
																			$intMunicipio,
																			$intCorregimiento, 
																			$strDireccion,
																			$strBarrio, 
																			$intTelefono,
																			$strEmail,
																			$nombrehv,
																			$nombrece,
																			$nombrecedula,
																			$nombrerut,
																			$nombreantecedentes,
																			$intStatus,
																			$intCritico);
							}
						}
					}else{

					//Archivos
					$hv       	= $_FILES['FileHV'];
					$nombrehv = md5(date('d-m-Y H:m:s')).$hv['name'];

					$ce       	= $_FILES['txtCE'];
					$nombrece = md5(date('d-m-Y H:m:s')).$ce['name'];

					$cedula       	= $_FILES['FileCedula'];
					$nombrecedula = md5(date('d-m-Y H:m:s')).$cedula['name'];

					$rut       	= $_FILES['FileRUT'];
					$nombrerut = md5(date('d-m-Y H:m:s')).$rut['name'];
					
					$antecedentes       	= $_FILES['FileAntecedentes'];
					$nombreantecedentes = md5(date('d-m-Y H:m:s')).$antecedentes['name'];

						//Actualizar
						if($_SESSION['permisosMod']['u']){
								$option = 2;
								$request_personal = $this->model->updateProveedor($idProveedor,
																					$intidusuario,
																					$tipoDocumento,
																					$strNit,
																					$tipoPersona,
																					$strRazon,
																					$strNombrea, 
																					$strNombreb,
																					$strApellidoa, 
																					$strApellidob, 
																					$intDepartamento, 
																					$intMunicipio,
																					$intCorregimiento, 
																					$strDireccion,
																					$strBarrio, 
																					$intTelefono,
																					$strEmail,
																					$intStatus,
																					$intCritico,
																				    $dateadd);

							if($hv['name'] != ''){
								$request_hv = $this->model->UpdateHV($idProveedor,
																		$nombrehv);
								if($request_hv > 0){
									uploadProveedor($hv,$nombrehv);
									if($hvac != 'vacio.png'){
										deleteFileProveedor($hvac);
									}
								}
							}

							if($ce['name'] != ''){
								$request_ce = $this->model->UpdateCE($idProveedor,
																		$nombrece);
								if($request_ce > 0){
									uploadProveedor($ce,$nombrece);
									if($ceac != 'vacio.png'){
										deleteFileProveedor($ceac);
									}
								}
							}

							if($cedula['name'] != ''){
								$request_cedula = $this->model->UpdateCedula($idProveedor,
																		$nombrecedula);
								if($request_cedula > 0){
									uploadProveedor($cedula,$nombrecedula);
									if($cedulaac != 'vacio.png'){
										deleteFileProveedor($cedulaac);
									}
								}
							}

							if($rut['name'] != ''){
								$request_rut = $this->model->UpdateRut($idProveedor,
																		$nombrerut);
								if($request_rut > 0){
									uploadProveedor($rut,$nombrerut);
									if($rutac != 'vacio.png'){
										deleteFileProveedor($rutac);
									}
								}
							}

							if($antecedentes['name'] != ''){
								$request_antecedentes = $this->model->UpdateAntecedentes($idProveedor,
																		$nombreantecedentes);
								if($request_antecedentes > 0){
									uploadProveedor($antecedentes,$nombreantecedentes);
									if($antecedentesac != 'vacio.png'){
										deleteFileProveedor($antecedentesac);
									}
								}
							}
						}
					}
					if(intval($request_personal) > 0 )
						{
							if($option == 1){

							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');

								if($nombrehv != '' || $nombrece != '' || $nombrecedula != '' || $nombrerut != '' || $nombreantecedentes != '')
								{
									$nombrehv = uploadProveedor($hv,$nombrehv);
									$nombrece = uploadProveedor($ce,$nombrece);
									$nombrecedula = uploadProveedor($cedula,$nombrecedula);
									$nombrerut = uploadProveedor($rut,$nombrerut);
									$nombreantecedentes = uploadProveedor($antecedentes,$nombreantecedentes);
								}

							}else{
								$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
							}
						}else if($request_personal == 'exist'){
							$arrResponse = array('status' => false, 'msg' => '¡Atención! el NIT ya existe, ingrese otro.');		
						}else if($request_personal == 'adjuntos'){
							$arrResponse = array("status" => false, "msg" => 'Los archivos marcados con * son obligatorios.');
						}else{
							$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
						}		
					}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getProveedor()
		{
			$arrData = $this->model->selectProveedor();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['nombres'] = $arrData[$i]['primer'].' '.$arrData[$i]['segundo'].' '.$arrData[$i]['apellidoa'].' '.$arrData[$i]['apellidob'];

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if($arrData[$i]['critico'] == 1)
				{
					$arrData[$i]['critico'] = '<span class="badge badge-warning">General</span>';

				}else if($arrData[$i]['critico'] == 2){

					$arrData[$i]['critico'] = '<span class="badge badge-success">Ninguno</span>';
				}else{
					$arrData[$i]['critico'] = '<span class="badge badge-danger">Ambiental</span>';
				}

				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm btnViewPersonal" onClick="fntViewProveedor('.$arrData[$i]['id'].')" title="Ver proveedor"><i class="far fa-eye"></i></button>';
				}
				if($_SESSION['permisosMod']['u']){
					$btnEdit = '<button class="btn btn-primary  btn-sm btnEditPersonal" onClick="fntEditProveedor('.$arrData[$i]['id'].')" title="Editar proveedor"><i class="fas fa-pencil-alt"></i></button>';
				}

				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm btnDelProveedor" onClick="fntDelProveedor('.$arrData[$i]['id'].')" title="Eliminar Proveedor"><i class="far fa-trash-alt"></i></button>';
					
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getProveedores(int $id){
			
			$idproveedor = intval($id);

			if($idproveedor > 0)
			{
				$arrData = $this->model->selectProveedores($idproveedor);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{

					
						$arrData['hvs'] = media().'/images/proveedor/'.$arrData['hv'];
						$arrData['ces'] = media().'/images/proveedor/'.$arrData['ce'];
						$arrData['cedulas'] = media().'/images/proveedor/'.$arrData['cedula'];
						$arrData['ruts'] = media().'/images/proveedor/'.$arrData['rut'];
						$arrData['antecedentess'] = media().'/images/proveedor/'.$arrData['antecedentes'];

					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delProveedor()
		{
			if($_POST){
				$intIdproveedor = intval($_POST['idProveedor']);
				$requestDelete = $this->model->deleteProveedor($intIdproveedor);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el proveedor');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar proveedor.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}
 ?>