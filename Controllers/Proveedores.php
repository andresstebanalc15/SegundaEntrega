<?php

	class Proveedores extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Proveedores()
		{
			$pageContent = getPageRout('proveedores');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Trabaja con Nosotros';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_proveedores.js";
				$this->views->getView($this,"proveedores",$data);  
			}

		}

		public function setProveedor(){
			if($_POST){
				//dep($_POST);
				//dep($_FILES);
				//die();
				if(empty($_POST['listSolicitanteid']) || empty($_POST['listTipoid']) || empty($_POST['txtNit']) || empty($_POST['txtNombrea']) || empty($_POST['txtApellidoa']) || empty($_POST['txtTelefono']) || empty($_POST['txtemail']) || empty($_POST['txtBarrio']) || empty($_POST['txtemail']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else
				{
					
					$tipoPersona = intval($_POST['listSolicitanteid']);
					$tipoDocumento = intval($_POST['listTipoid']);
					$intidusuario = intval(1);
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
					$dateadd = date('Y-m-d H:m:s');

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
							$nombrecedula = 'vacio.png';
						}else{
							$cedula       	= $_FILES['FileCedula'];
							$nombrecedula = md5(date('d-m-Y H:m:s')).$cedula['name'];	
						}

						if($_FILES['FileRUT']['error'] == 4){
							$rut       	= $_FILES['FileRUT'];
							$nombrerut = 'vacio.png';
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
																			$nombreantecedentes);
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
					}
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}		
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
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