<?php 

class Reserva extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Reserva()
		{
			$pageContent = getPageRout('reserva');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'PQRS Anónimo';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_reserva.js";
				$this->views->getView($this,"reserva",$data);  
			}

		}

		public function setAnonimo(){
			if($_POST){
				
				//dep($_POST);
				//dep($_FILES);
				//die();


				if(empty($_POST['listAreaId']) || empty($_POST['listTipoSolicitudid']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{

					$listTipoSolicitudid = intval($_POST['listTipoSolicitudid']);
					$listCanalId = intval(3);
					$listMedioid = intval(4);
					$txtDescripcion = strClean($_POST['txtDescripcion']);
					$txtFecha = date("Y-m-d");
					$txtCodigo = date("YmdHis");
					$listAreaId = intval($_POST['listAreaId']);


					if($_FILES['FilePQR']['error'] != 0)
					{	
						$nombrearchivo = 'vacio.png';
					}else{
						$archivo = $_FILES['FilePQR'];
						$nombrearchivo = md5(date('d-m-Y H:m:s')).$archivo['name'];
					}
						$option = 1;
						$request_pqr = $this->model->insertAnonimo($listTipoSolicitudid,
																		$listCanalId,
																		$listMedioid,
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
								$uploadPQR = uploadPQRA($archivo,$nombrearchivo);
							}

							$arrResponse = array('status' => true, 'idpqr' => $txtCodigo, 'msg' => 'PQRSD Anónimo radicada correctamente Ticket: '.$txtCodigo);	
							


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
	}
 ?>