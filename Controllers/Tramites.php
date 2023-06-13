<?php 
	class Tramites extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function tramites()
		{
			$pageContent = getPageRout('tramites');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Tramites en Línea';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"tramites",$data);  
			}

		}

		public function formulario(int $idSolicitud)
		{

			$pageContent = getPageRout('tramites');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{

				$data['page_tag'] = "Tramites en Línea";
				$data['page_title'] = "Tramites en Línea";
				$data['page_name'] = "Tramites";
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_tramites.js";

				if($idSolicitud == 11){

					$data['arrTramite'] = 'VINCULACIÓN';
					$data['arrIdTramite'] = $idSolicitud;

				}else if($idSolicitud == 12){
					$data['arrTramite'] = 'RECLAMOS POR FACTURACIÓN';
					$data['arrIdTramite'] = $idSolicitud;
				}else if($idSolicitud == 13){
					$data['arrTramite'] = 'RECOLECCIONES ESPECIALES';
					$data['arrIdTramite'] = $idSolicitud;
				}else if($idSolicitud == 14){
					$data['arrTramite'] = 'VIABILIDAD Y DISPONIBILIDAD';
					$data['arrIdTramite'] = $idSolicitud;
				}
				$this->views->getView($this,"formulario",$data);
				}
		}

		public function setIdentificacion(){
			if($_POST){
				
				//dep($_POST);
				//dep($_FILES);
				//die();


				if(empty($_POST['listTipoid']) || empty($_POST['txtIdentificacion']) || empty($_POST['listSolicitanteid']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['listPaisId']) || empty($_POST['listDepartamentoid']) || empty($_POST['listMunicipioid']) || empty($_POST['listCorregimientoid']) || empty($_POST['txtDireccion']) || empty($_POST['txtTelefono']) || empty($_POST['txtemail']) || empty($_POST['listTipoSolicitudid']))
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
					$listTipoSolicitudid = intval($_POST['listTipoSolicitudid']);
					$listAreaId = intval(3);
					$listMedioid = intval(2);
					$listCanalId = intval(3);
					$txtDescripcion = strClean($_POST['txtDescripcion']);
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
								$uploadPQR = uploadTRAMITES($archivo,$nombrearchivo);
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
								$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'Tramite en Línea radicado correctamente Ticket: '.$txtCodigo);	
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
	}
 ?>
