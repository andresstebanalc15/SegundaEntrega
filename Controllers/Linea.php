<?php 

class Linea extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(6);
		}

		public function Linea()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Tramites en Línea";
			$data['page_title'] = "TRAMITES EN LÍNEA ";
			$data['page_name'] = "tramites";
			$data['page_functions_js'] = "functions_linea.js";
			$this->views->getView($this,"linea",$data);
		}

		public function ver(int $idpqr)
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/linea');
			}
			$data['page_tag'] = "TRAMITES EN LÍNEA";
			$data['page_title'] = "TRAMITES EN LÍNEA";
			$data['page_name'] = "TRAMITES EN LÍNEA";
			$idrol = $_SESSION['idRol'];
			$idarea = $_SESSION['idArea'];
			$data['arrPedido'] = $this->model->selectVer($idarea,$idrol,$idpqr);

			$data['arrPedido']['ver']['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/tramites/'.$data['arrPedido']['ver']['archivo'].'"><i class="fas fa-file-contract"></i></a>';

			$data['arrPedido']['ver']['ciudadano'] = $data['arrPedido']['ver']['nombrea'].' '.$data['arrPedido']['ver']['nombreb'].' '.$data['arrPedido']['ver']['apellidoa'].''.$data['arrPedido']['ver']['apellidob'];

			//Fecha Vencimiento
					$fecha = new \DateTime(date("d-m-Y",strtotime($data['arrPedido']['ver']['fecha'])));
					$agregarDias =  $data['arrPedido']['ver']['tiempo'];
					$fecha->add(new \DateInterval("P{$agregarDias}D"));
					$data['arrPedido']['ver']['fecha_finc'] = $fecha->format('d-m-Y');

					$data['arrPedido']['ver']['inicio'] = $fecha;


				if($data['arrPedido']['ver']['status'] == 1)
					{
						$data['arrPedido']['ver']['status'] = '<span class="badge badge-warning">Sin Gestión</span>';
					}else if($data['arrPedido']['ver']['status'] == 2){
						$data['arrPedido']['ver']['status'] = '<span class="badge badge-primary">Radicado</span>';
					}else if($data['arrPedido']['ver']['status'] == 3){
						$data['arrPedido']['ver']['status'] = '<span class="badge badge-success">Finalizada</span>';
					}else{
						$data['arrPedido']['ver']['status'] = '<span class="badge badge-danger">Vencido</span>';
					}
			$this->views->getView($this,"ver",$data);
		}

		public function getIdentificaciones()
		{
			if($_SESSION['permisosMod']['r']){
				$idrol = $_SESSION['idRol'];
				$idarea = $_SESSION['idArea'];
				$arrData = $this->model->selectIdentificaciones($idarea,$idrol);
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnAsig = '';
					$btnDelete = '';

					if($_SESSION['permisosMod']['r']){
						$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/linea/ver/'.$arrData[$i]['id'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a> ';
					}
					if($_SESSION['permisosMod']['u']){
								
						if($arrData[$i]['status'] == 1){
							$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditarPqr('.$arrData[$i]['id'].')" title="Editar Tramite" ><i class="far fa-edit"></i></button>';
						}
					}
					

					if($_SESSION['permisosMod']['d']){

						if(($idrol == 1 || $idrol == 11) && $arrData[$i]['status'] == 1){
								$btnDelete = '<button class="btn btn-success btn-sm" onClick="fntAprobarPqr('.$arrData[$i]['id'].')" title="Aprobar PQRSD" ><i class="far fa-paper-plane"></i></button>';

						}

						if($arrData[$i]['status'] == 2){
							$btnDelete = '<button class="btn btn-success btn-sm" onClick="fntFinalizarPqr('.$arrData[$i]['id'].')" title="Finalizar PQRSD" ><i class="far fa-paper-plane"></i></button>';

							$btnAsig = '<button class="btn btn-warning  btn-sm btnAddNote" onClick="fntAsignarPqr('.$arrData[$i]['id'].')" title="Asignar PQRSD"><i class="fa fa-refresh"></i></button>';
						}
					}

					if( $arrData[$i]['archivo'] == 'vacio.png'){

						$arrData[$i]['descarga'] = '';

					}else{
						$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/tramites/'.$arrData[$i]['archivo'].'"><i class="fas fa-file-contract"></i></a>';
					}

					$arrData[$i]['nombres'] = $arrData[$i]['nombrea'].' '.$arrData[$i]['apellidoa'];

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-warning">Sin Iniciar</span>';
					}else if($arrData[$i]['status'] == 2){
						$arrData[$i]['status'] = '<span class="badge badge-primary">Radicado</span>';

					}else if($arrData[$i]['status'] == 3){
						$arrData[$i]['status'] = '<span class="badge badge-success">Finalizado</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Vencido</span>';
					}

					$dias =  $arrData[$i]['dias'];
					$tiempo =  $arrData[$i]['tiempo'];
					$medio = ($tiempo/2);
					$fecha = $arrData[$i]['fecha'];

					$time = $tiempo-$dias;


					if( $time >= $medio){
                       $arrData[$i]['ven'] = '<span class="badge badge-success">'.$time.'</span>';
                    }else if($time <= $medio && $time > 0){
                        $arrData[$i]['ven'] = '<span class="badge badge-warning">'.$time.'</span>';
                    }else{
                    	$arrData[$i]['ven'] = '<span class="badge badge-danger">'.$time.'</span>';
                    }

					//Formato Fechas ADD y REASIGNADO
					$arrData[$i]['fecha'] = date("d-m-Y",strtotime($arrData[$i]['fecha']));
					//$arrData[$i]['fecha_asignado'] = date("d-m-Y",strtotime($arrData[$i]['fecha_asignado']));

					//Fecha Vencimiento
					$fecha = new \DateTime(date("d-m-Y",strtotime($arrData[$i]['fecha'])));
					$agregarDias =  $arrData[$i]['tiempo'];
					$fecha->add(new \DateInterval("P{$agregarDias}D"));
					$arrData[$i]['fecha_finc'] = $fecha->format('d-m-Y');

					//Tiempo restante
					$fecha1= new DateTime(date('d-m-Y'));
					$fecha2= new DateTime(date("d-m-Y",strtotime($arrData[$i]['fecha_finc'])));
					$diff = $fecha1->diff($fecha2);
					$arrData[$i]['tiempo'] = $diff->days;

					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.' '.$btnAsig.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getIdentificacion($idpqr){
			$idpqr = intval($idpqr);
			if($idpqr > 0)
			{
				$arrData = $this->model->selectIdentificacion($idpqr);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else
				{
					if($arrData['status'] == 1)
					{
						$arrData['status'] = '<span class="badge badge-warning">Sin Gestión</span>';
					}else if($arrData['status'] == 2){
						$arrData['status'] = '<span class="badge badge-primary">Radicado</span>';
					}else if($arrData['status'] == 3){
						$arrData['status'] = '<span class="badge badge-success">Finalizado</span>';
					}else{
						$arrData['status'] = '<span class="badge badge-danger">Vencido</span>';
					}
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}

		public function setFinalizado(){
			if($_POST)

				//dep($_POST);
				//dep($_FILES);
				//die();
			{
				if(empty($_POST['idpqrsdf']) || empty($_POST['emailf']) || empty($_POST['txtComentariof']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{	
					$idpqrsdf = intval($_POST['idpqrsdf']);
					$emailf = strClean($_POST['emailf']);
					$txtComentariof = strClean($_POST['txtComentariof']);
					$intIdTipo = intval(3);

					if($_FILES['txtfileg']['error'] != 0)
					{	
						$nombrearchivo = 'vacio.png';
					}else{
						$archivo = $_FILES['txtfileg'];
						$nombrearchivo = md5(date('d-m-Y H:m:s')).$archivo['name'];
					}


					$request_anonimo = "";
					if($_SESSION['permisosMod']['d'])
						{
							$request_anonimo = $this->model->finalizarIdentificacion($idpqrsdf,$txtComentariof,$intIdTipo,$nombrearchivo);
						}

					if($request_anonimo > 0)
					{

						$dataCorreo = $this->model->selectIdentificacion($idpqrsdf);
						$dataUsuario = array('primer_nombre' => $dataCorreo['nombrea'],
											 'segundo_nombre' => $dataCorreo['nombreb'],
											 'primero_apellido' => $dataCorreo['apellidoa'],
											 'segundo_apellido' => $dataCorreo['apellidob'],
											 'email' =>  $dataCorreo['email'],
											 'radicado' => $dataCorreo['codigo'],
											 'contenido' => $txtComentariof,
											 'tipo_pqr' => $dataCorreo['tipo_pqr'],
											 'adjunto' => $nombrearchivo,
											 'medio' => $dataCorreo['medio'],
											 'asunto' => 'Solicitud Finalizada - '.NOMBRE_REMITENTE);
							
							$sendEmail = sendEmail($dataUsuario,'email_finalizada');
						
						if($sendEmail)
						{
							$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'Tramite finalizado correctamente Ticket: '.$dataCorreo['codigo']);	
						}else
						{
							$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$dataCorreo['codigo']);
						}
						
						if($nombrearchivo != 'vacio.png'){
							$uploadPQR = uploadTRAMITES($archivo,$nombrearchivo);
						}
												
					}else{
						$arrResponse = array('status' => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setRadicado(){
			if($_POST)

				//dep($_POST);
				//die();
			{
				if(empty($_POST['idpqrsdA']) || empty($_POST['emaila']) || empty($_POST['txtComentarioa']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{	
					$idpqrsdA = intval($_POST['idpqrsdA']);
					$emaila = strClean($_POST['emaila']);
					$txtComentarioa = strClean($_POST['txtComentarioa']);
					$intIdTipo = intval(1);
					$request_anonimo = "";
					if($_SESSION['permisosMod']['d'])
						{
							$request_anonimo = $this->model->aprobarIdentificacion($idpqrsdA,$txtComentarioa,$intIdTipo);
						}

					if($request_anonimo > 0)
					{
							$dataCorreo = $this->model->selectIdentificacion($idpqrsdA);
							$dataUsuario = array('email' =>  $emaila,
												 'radicado' => $dataCorreo['codigo'],
												 'contenido' => $txtComentarioa,
												 'asunto' => 'Solicitud Aprobada - '.$dataCorreo['codigo'].' - '.NOMBRE_REMITENTE);

							$sendEmail = sendEmail($dataUsuario,'email_aprobacion');


							if($sendEmail)
							{
								$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'Tramite aprobado y radicado correctamente Ticket: '.$dataCorreo['codigo']);	
							}else
							{
								$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$dataCorreo['codigo']);
							}
												
					}else{
						$arrResponse = array('status' => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setResponsable(){
			if($_POST)

				//dep($_POST);
				//die();
			{
				if(empty($_POST['idpqrsdR']) || empty($_POST['txtComentario']) || empty($_POST['listResponsable']) || empty($_POST['emailarea']) || empty($_POST['nomarea']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{	
					$idpqrsdR = intval($_POST['idpqrsdR']);
					$nomarea = strClean($_POST['nomarea']);
					$emailarea = strClean($_POST['emailarea']);
					$txtComentario = strClean($_POST['txtComentario']);
					$listResponsable = intval($_POST['listResponsable']);
					$intIdTipo = intval(2);
					$request_anonimo = "";
					if($_SESSION['permisosMod']['d'])
						{
							$request_anonimo = $this->model->asignarIdentificacion($idpqrsdR,$txtComentario,$listResponsable,$intIdTipo);
						}

					if($request_anonimo > 0)
					{

							$dataUsuario = array('idpqr' => $idpqrsdR,
											 'nombreArea' => $nomarea,
											 'email' => $emailarea,
											 'comentario' => $txtComentario,
											 'asunto' => 'Reasignación de Tramite');
							
							$sendEmail = sendEmail($dataUsuario,'email_asignacion');

						if($sendEmail)
							{
								$arrResponse = array('status' => true, 'idpqr' => $idpqrsdR, 'msg' => 'Tramite reasignado correctamente Ticket: '.$idpqrsdR);	
							}else
							{
								$arrResponse = array('status' => true, 'idpqr' => $idpqrsdR, 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$idpqrsdR);
							}	
												
					}else{
						$arrResponse = array('status' => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setIdentificacion(){
			if($_POST){
				
				//dep($_POST);
				//dep($_FILES);
				//die();


				if(empty($_POST['listTipoid']) || empty($_POST['txtIdentificacion']) || empty($_POST['listSolicitanteid']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['listPaisId']) || empty($_POST['listDepartamentoid']) || empty($_POST['listMunicipioid']) || empty($_POST['listCorregimientoid']) || empty($_POST['txtDireccion']) || empty($_POST['listAreaId']) || empty($_POST['txtTelefono']) || empty($_POST['txtCodigo']) || empty($_POST['txtFecha']) || empty($_POST['listCanalId']) || empty($_POST['listMedioid']) || empty($_POST['txtemail']) || empty($_POST['listTipoSolicitudid']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{

					$idIdentificacion = intval($_POST['idIdentificacion']);
					$archivo_ac = strClean($_POST['archivo_ac']);
					$listTipoSolicitudid = intval($_POST['listTipoSolicitudid']);
					$listCanalId = intval($_POST['listCanalId']);
					$listMedioid = intval($_POST['listMedioid']);
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
					$txtTelefono = strClean($_POST['txtTelefono']);
					$txtemail = strClean($_POST['txtemail']);
					$txtDescripcion = strClean($_POST['txtDescripcion']);
					$txtFecha = strClean($_POST['txtFecha']);
					$txtCodigo = strClean($_POST['txtCodigo']);
					$listAreaId = intval($_POST['listAreaId']);
					$txtFijo = strClean($_POST['txtFijo']);


					if($_FILES['FilePQR']['error'] != 0)
					{	
						$nombrearchivo = 'vacio.png';
					}else{
						$archivo = $_FILES['FilePQR'];
						$nombrearchivo = md5(date('d-m-Y H:m:s')).$archivo['name'];
					}


					if($idIdentificacion == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){
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
						}
					}else{
						if($_SESSION['permisosMod']['u']){
							$option = 2;
							$date = date('Y-m-d H:m:s');
							$request_pqr = $this->model->updateIdentificacion($idIdentificacion,
																					$listTipoSolicitudid,
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
																					$txtFecha);
							if($nombrearchivo != 'vacio.png'){
									$request_archivo = $this->model->UpdateArchivo($idIdentificacion,
																					$nombrearchivo);
									if($request_archivo > 0){
										uploadTRAMITES($archivo,$nombrearchivo);
										if($archivo_ac != 'vacio.png'){
											deleteTRAMITES($archivo_ac);
										}
									}
							}
						}
					}

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
								$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'Tramite radicado correctamente Ticket: '.$txtCodigo);	
							}else
							{
								$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$request_pqr);
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
					if($arrData[$i]['estatus'] == 3 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['tipo_pqr'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}
	}
 ?>