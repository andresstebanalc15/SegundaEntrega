<?php 

class Hojas extends Controllers{
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

		public function Hojas()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Hojas de Vida";
			$data['page_title'] = "Hojas de Vida";
			$data['page_name'] = "Hojas";
			$data['page_functions_js'] = "functions_hojas.js";
			$this->views->getView($this,"hojas",$data);
		}

		public function ver(int $idpqr)
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/hojas');
			}
			$data['page_tag'] = "HOJAS DE VIDA";
			$data['page_title'] = "HOJAS DE VIDA";
			$data['page_name'] = "HOJAS DE VIDA";
			$idrol = $_SESSION['idRol'];
			$idarea = $_SESSION['idArea'];
			//dep($idarea);
			//dep($idrol);
			//dep($idpqr);
			//die();
			$data['arrPedido'] = $this->model->selectVer($idarea,$idrol,$idpqr);

			$data['arrPedido']['ver']['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/pqri/'.$data['arrPedido']['ver']['archivo'].'"><i class="fas fa-file-contract"></i></a>';

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

		public function AprobarHoja()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdpersona = intval($_POST['id']);
					$requestDelete = $this->model->AprobarHojaModel($intIdpersona);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha aprobado la Hoja de Vida');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al aprobar la Hoja de Vida.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function RechazarHoja()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdpersona = intval($_POST['id']);
					$requestDelete = $this->model->RechazarHojaModel($intIdpersona);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha Reachazado la Hoja de Vida');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al Reachazado la Hoja de Vida.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
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
						$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/hojas/ver/'.$arrData[$i]['id'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a> ';
					}
					if($_SESSION['permisosMod']['u']){
						
						$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntAprobarHoja('.$arrData[$i]['id'].')" title="Aprobar Hoja de Vida" ><i class="far fa-edit"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){

						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntRechazarHoja('.$arrData[$i]['id'].')" title="Rechazar Hoja de Vida"><i class="far fa-trash-alt"></i></button>';
					}

					if( $arrData[$i]['archivo'] == 'vacio.png'){

						$arrData[$i]['descarga'] = '';

					}else{
						$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/pqri/'.$arrData[$i]['archivo'].'"><i class="fas fa-file-contract"></i></a>';
					}

					$arrData[$i]['nombres'] = $arrData[$i]['nombrea'].' '.$arrData[$i]['apellidoa'];

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-warning">Sin Iniciar</span>';
					}else if($arrData[$i]['status'] == 11){
						$arrData[$i]['status'] = '<span class="badge badge-primary">Abropado</span>';

					}else if($arrData[$i]['status'] == 10){
						$arrData[$i]['status'] = '<span class="badge badge-danger">Rechazado</span>';
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
							$arrResponse = array('status' => true, 'idpqr' => $$dataCorreo['codigo'], 'msg' => 'Hoja de Vida finalizada correctamente Ticket: '.$dataCorreo['codigo']);	
						}else
						{
							$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'No es posible enviar correo por tener servidor virtual, Ticket: '.$dataCorreo['codigo']);
						}
						
						if($nombrearchivo != 'vacio.png'){
							$uploadPQR = uploadPQRI($archivo,$nombrearchivo);
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
								$arrResponse = array('status' => true, 'idpqr' => $dataCorreo['codigo'], 'msg' => 'Hoja de Vida aprobada y radicada correctamente Ticket: '.$dataCorreo['codigo']);	
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
											 'asunto' => 'Reasignación de PQRSD con identificación');
							
							$sendEmail = sendEmail($dataUsuario,'email_asignacion');

						if($sendEmail)
							{
								$arrResponse = array('status' => true, 'idpqr' => $idpqrsdR, 'msg' => 'Hoja de Vida reasignada correctamente Ticket: '.$idpqrsdR);	
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


				if(empty($_POST['listTipoid']) || empty($_POST['txtIdentificacion']) || empty($_POST['listSolicitanteid']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['listPaisId']) || empty($_POST['listDepartamentoid']) || empty($_POST['listMunicipioid']) || empty($_POST['listCorregimientoid']) || empty($_POST['txtDireccion']) || empty($_POST['txtTelefono']) || empty($_POST['txtemail']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{

					$idIdentificacion = intval($_POST['idIdentificacion']);
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
										uploadPQRI($archivo,$nombrearchivo);
										if($archivo_ac != 'vacio.png'){
											deletePQRI($archivo_ac);
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