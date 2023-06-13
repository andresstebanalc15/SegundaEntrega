<?php

	class Hv extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Hv()
		{
			$pageContent = getPageRout('hv');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Hojas de Vida';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_hv.js";
				$this->views->getView($this,"hv",$data);  
			}

		}

		public function setIdentificacion(){
			if($_POST){
				
				//dep($_POST);
				//dep($_FILES);
				//die();


				if(empty($_POST['listTipoid']) || empty($_POST['txtIdentificacion']) || empty($_POST['listSolicitanteid']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['listPaisId']) || empty($_POST['listDepartamentoid']) || empty($_POST['listMunicipioid']) || empty($_POST['listCorregimientoid']) || empty($_POST['txtDireccion']) || empty($_POST['txtTelefono']) || empty($_POST['txtemail']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{

					$listTipoid = intval($_POST['listTipoid']);
					$txtIdentificacion = strClean($_POST['txtIdentificacion']);
					$listSolicitanteid = intval($_POST['listSolicitanteid']);
					$txtNombrea = ucwords(strClean($_POST['txtNombrea']));
					$txtNombreb = ucwords(strClean($_POST['txtNombreb']));					
					$txtApellidoa = ucwords(strClean($_POST['txtApellidoa']));
					$txtApellidob = ucwords(strClean($_POST['txtApellidob']));
					$listPaisId = intval($_POST['listPaisId']);
					$listDepartamentoid = intval($_POST['listDepartamentoid']);
					$listMunicipioid = intval($_POST['listMunicipioid']);
					$listCorregimientoid = intval($_POST['listCorregimientoid']);
					$txtDireccion = strClean($_POST['txtDireccion']);
					$txtFijo = strClean($_POST['txtFijo']);
					$txtTelefono = strClean($_POST['txtTelefono']);
					$txtemail = strClean($_POST['txtemail']);
					$listTipoSolicitudid = intval(15);
					$listAreaId = intval(2);
					$listMedioid = intval(1);
					$listCanalId = intval(3);
					$txtDescripcion = strClean('HOJA DE VIDA');
					$txtFecha = date("Y-m-d");
					$txtCodigo = date("YmdHis");
					


					if($_FILES['FilePQR']['error'] != 0)
					{	
						$nombrearchivo = 'vacio.png';
					}else{
						$archivo = $_FILES['FilePQR'];
						$nombrearchivo = md5(date('d-m-Y H:m:s')).$archivo['name'];
					}
						//Crear
							$option = 1;
							$request_pqr = $this->model->insertIdentificacion($listTipoSolicitudid,
																			$listCanalId,
																			$listMedioid,
																			$listTipoid,
																			$txtIdentificacion,
																			$listSolicitanteid,
																			$txtNombrea,
																			$txtNombreb,
																			$txtApellidoa,
																			$txtApellidob,
																			$listPaisId,
																			$listDepartamentoid,
																			$listMunicipioid,
																			$listCorregimientoid,
																			$txtDireccion,
																			$txtFijo,
																			$txtTelefono,
																			$txtemail,
																			$txtDescripcion,
																			$listAreaId,
																			$txtCodigo,
																			$txtFecha,
																			$nombrearchivo);

					//dep($request_pqr);
					//die();


					if(intval($request_pqr) > 0 )
					{

						if($option == 1){

							if($nombrearchivo != 'vacio.png')
							{
								$uploadPQR = uploadPQRI($archivo,$nombrearchivo);
							}

								$dataUsuario = array('primer_nombre' => $txtNombrea,
													 'segundo_nombre' => $txtNombreb,
													 'primero_apellido' => $txtApellidoa,
													 'segundo_apellido' => $txtApellidob,
													 'email' =>  $txtemail,
													 'radicado' => $txtCodigo,
													 'contenido' => $txtDescripcion,
													 'asunto' => 'Solicitud Radicada - '.$request_pqr.' - '.NOMBRE_REMITENTE);

								$sendEmail = sendEmail($dataUsuario,'email-radicado');


							if($sendEmail)
							{
								$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'Hoja de Vida radicada correctamente Ticket: '.$txtCodigo);	
							}else
							{
								$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$txtCodigo);
							}


						}else{
							$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_pqr == 'exist'){

						$arrResponse = array('status' => false, 'msg' => '¡Atención! La persona el código registrado ya existe.');	
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}	
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSelectTipoSolicitud(){
			$htmlOptions = "";
			$arrData = $this->model->selectTipoSolicitud();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['tipo_pqr'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectArea(){
			$htmlOptions = "";
			$arrData = $this->model->selectArea();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectCanal(){
			$htmlOptions = "";
			$arrData = $this->model->selectTipoCanal();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['canal'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectMedio(){
			$htmlOptions = "";
			$arrData = $this->model->SelectMedio();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['medio'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectTipodocumento(){
			$htmlOptions = "";
			$arrData = $this->model->selectTipo();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['identificacion'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectTiposolicitante(){
			$htmlOptions = "";
			$arrData = $this->model->selectTipoSolicitante();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['tipo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectPais(){
			$htmlOptions = "";
			$arrData = $this->model->selectPais();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectDepartamento(){
			$htmlOptions = "";
			$arrData = $this->model->selectDepartamento();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_departamento'].'">'.$arrData[$i]['departamento'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		public function getSelectMunicipio($departamento){
				$departamento = intval($departamento);
				$htmlOptions = "";
				$arrData = $this->model->selectMunicipio($departamento);
				if(count($arrData) > 0 ){
					for ($i=0; $i < count($arrData); $i++) { 
						if($arrData[$i]['estatus'] == 1 ){
						$htmlOptions .= '<option value="'.$arrData[$i]['id_municipio'].'">'.$arrData[$i]['municipio'].'</option>';
						}
					}
				}
				echo $htmlOptions;
				die();	
		}

		public function getSelectCorregimiento(){
			$htmlOptions = "";
			$arrData = $this->model->selectCorregimiento();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['estatus'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_corregimiento'].'">'.$arrData[$i]['corregimiento'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

	}
 ?>
