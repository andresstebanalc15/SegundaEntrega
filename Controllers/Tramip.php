<?php 

	class Tramip extends Controllers{
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

		public function Tramip()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}

			$data['page_tag'] = " TRAMITES EN LÍNEA - Candeaseo";
			$data['page_title'] = " TRAMITES EN LÍNEA - Candeaseo";
			$data['page_name'] = " TRAMITES EN LÍNEA - Candeaseo";
			$data['page_functions_js'] = "functions_tramip.js";
			$data['identificacion'] = $this->model->cantIdentificacion();
			$data['isg'] = $this->model->cantISG();
			$data['ir'] = $this->model->cantIR();
			$data['if'] = $this->model->cantIF();

			$anio = date('Y');
			$mes = date('m');
			$data['TipoIMes'] = $this->model->selectTipoPQRIMes($anio,$mes);
			//dep($data['TipoIMes']);
			//dep($data['TipoAMes']);exit;
			$data['pqrIDia'] = $this->model->selectIMes($anio,$mes);
			$data['pqrVDia'] = $this->model->selectVMes($anio,$mes);
			$data['pqrRDia'] = $this->model->selectRMes($anio,$mes);
			$data['pqrRCDDia'] = $this->model->selectRCDMes($anio,$mes);
			$data['pqrVDDia'] = $this->model->selectVDMes($anio,$mes);
			//dep($data['pqrIDia']);
			//dep($data['pqrADia']);exit;

			$this->views->getView($this,"tramip",$data);
		}

		public function tipoIdentificacionMes(){
			if($_POST){


				$grafica = "tipoIdentificacionMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$identificaciones = $this->model->selectTipoPQRIMes($anio,$mes);
				$script = getFile("Template/Modals/tramites",$identificaciones);
				echo $script;
				//die();

				//dep($identificaciones);
				die();
			}
		}

		public function SolicitudesMes(){
			if($_POST){
				$grafica = "SolicitudesMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$identificacionS = $this->model->selectIMes($anio,$mes);
				$identificacionV = $this->model->selectVMes($anio,$mes);
				$identificacionR = $this->model->selectRMes($anio,$mes);
				$identificacionRCD = $this->model->selectRCDMes($anio,$mes);
				$identificacionVD = $this->model->selectVDMes($anio,$mes);

				$solicitudes = array('id' => $identificacionS, 'v' => $identificacionV, 'r' => $identificacionR, 'rcd' => $identificacionRCD, 'vd' => $identificacionVD);


				$script = getFile("Template/Modals/tramites",$solicitudes);
				echo $script;
				die();
			}
		}

	}
 ?>