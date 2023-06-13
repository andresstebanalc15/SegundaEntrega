<?php 

class Anonimo extends Controllers{
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

		public function Anonimo()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Anonimo";
			$data['page_title'] = "PQRSD ANONIMO ";
			$data['page_name'] = "identificacion";
			$data['page_functions_js'] = "functions_anonimo.js";
			$this->views->getView($this,"anonimo",$data);
		}

		public function ver(int $idpqr)
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/anonimo');
			}
			$data['page_tag'] = "PQRSD";
			$data['page_title'] = "PQRSD";
			$data['page_name'] = "PQRSD";
			$idrol = $_SESSION['idRol'];
			$idarea = $_SESSION['idArea'];
			$data['arrPedido'] = $this->model->selectVer($idarea,$idrol,$idpqr);

			$data['arrPedido']['ver']['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/pqra/'.$data['arrPedido']['ver']['archivo'].'"><i class="fas fa-file-contract"></i></a>';

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

		public function getAnonimos()
		{
			if($_SESSION['permisosMod']['r']){
				$idrol = $_SESSION['idRol'];
				$idarea = $_SESSION['idArea'];
				$arrData = $this->model->selectAnonimos($idarea,$idrol);
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnAsig = '';
					$btnDelete = '';

					if($_SESSION['permisosMod']['r']){
						$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/anonimo/ver/'.$arrData[$i]['id'].'" target="_blanck" class="btn btn-info btn-sm"> <i class="far fa-eye"></i> </a> ';
					}
					if($_SESSION['permisosMod']['u']){
								
						if($arrData[$i]['status'] == 1){
							$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditarPqr('.$arrData[$i]['id'].')" title="Editar PQRSD" ><i class="far fa-edit"></i></button>';
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
						$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/pqra/'.$arrData[$i]['archivo'].'"><i class="fas fa-file-contract"></i></a>';
					}

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

		public function getAnonimo($idpqr){
			$idpqr = intval($idpqr);
			if($idpqr > 0)
			{
				$arrData = $this->model->selectAnonimo($idpqr);
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
				if(empty($_POST['idpqrsdf']) || empty($_POST['txtComentariof']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{	
					$idpqrsdf = intval($_POST['idpqrsdf']);
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
							$request_anonimo = $this->model->finalizarAnonimo($idpqrsdf,$txtComentariof,$intIdTipo,$nombrearchivo);
						}

					if($request_anonimo > 0)
					{

						
							$arrResponse = array('status' => true, 'idpqr' => $idpqrsdf, 'msg' => 'PQRSD Anónima finalizada correctamente Ticket: '.$idpqrsdf);	
						
						
						if($nombrearchivo != 'vacio.png'){
							$uploadPQR = uploadPQRA($archivo,$nombrearchivo);
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
				if(empty($_POST['idpqrsdA']) || empty($_POST['txtComentarioa']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{	
					$idpqrsdA = intval($_POST['idpqrsdA']);
					$txtComentarioa = strClean($_POST['txtComentarioa']);
					$intIdTipo = intval(1);
					$request_anonimo = "";
					if($_SESSION['permisosMod']['d'])
						{
							$request_anonimo = $this->model->aprobarAnonimo($idpqrsdA,$txtComentarioa,$intIdTipo);
						}

					if($request_anonimo > 0)
					{
						$arrResponse = array('status' => true, 'idpqr' => $idpqrsdA, 'msg' => 'PQRSD Anónima aprobada y radicada correctamente Ticket: '.$idpqrsdA);	
									
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
							$request_anonimo = $this->model->asignarAnonimo($idpqrsdR,$txtComentario,$listResponsable,$intIdTipo);
						}

					if($request_anonimo > 0)
					{
						$dataUsuario = array('idpqr' => $idpqrsdR,
											 'nombreArea' => $nomarea,
											 'email' => $emailarea,
											 'comentario' => $txtComentario,
											 'asunto' => 'Reasignación de PQRSD con Anónima');
							
							$sendEmail = sendEmail($dataUsuario,'email_asignacion');

						$arrResponse = array('status' => true, 'idpqr' => $idpqrsdR, 'msg' => 'PQRSD anónima reasignada correctamente Ticket: '.$idpqrsdR);	
												
					}else{
						$arrResponse = array('status' => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setAnonimo(){
			if($_POST){
				
				//dep($_POST);
				//dep($_FILES);
				//die();


				if(empty($_POST['listAreaId']) || empty($_POST['txtCodigo']) || empty($_POST['txtFecha']) || empty($_POST['listCanalId']) || empty($_POST['listMedioid']) || empty($_POST['listTipoSolicitudid']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{

					$idIdentificacion = intval($_POST['idIdentificacion']);
					$archivo_ac = strClean($_POST['archivo_ac']);
					$listTipoSolicitudid = intval($_POST['listTipoSolicitudid']);
					$listCanalId = intval($_POST['listCanalId']);
					$listMedioid = intval($_POST['listMedioid']);
					$txtDescripcion = strClean($_POST['txtDescripcion']);
					$txtFecha = strClean($_POST['txtFecha']);
					$txtCodigo = strClean($_POST['txtCodigo']);
					$listAreaId = intval($_POST['listAreaId']);


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
							$request_pqr = $this->model->insertAnonimo($listTipoSolicitudid,
																			$listCanalId,
																			$listMedioid,
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
							$request_pqr = $this->model->updateAnonimo($idIdentificacion,
																			$listTipoSolicitudid,
																			$listCanalId,
																			$listMedioid,
																			$txtDescripcion,
																			$listAreaId,
																			$txtCodigo,
																			$txtFecha);
							if($nombrearchivo != 'vacio.png'){
									$request_archivo = $this->model->UpdateArchivo($idIdentificacion,
																					$nombrearchivo);
									if($request_archivo > 0){
										uploadPQRA($archivo,$nombrearchivo);
										if($archivo_ac != 'vacio.png'){
											deletePQRA($archivo_ac);
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
								$uploadPQR = uploadPQRA($archivo,$nombrearchivo);
							}

							$arrResponse = array('status' => true, 'idpqr' => $request_pqr, 'msg' => 'PQRSD Anónimo radicada correctamente Ticket: '.$request_pqr);	
							


						}else{
							$arrResponse = array('status' => true, 'idpqr' => $request_pqr, 'msg' => 'Datos Actualizados correctamente.');
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