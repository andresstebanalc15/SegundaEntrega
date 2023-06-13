<?php 

	class Pqrsd extends Controllers{
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

		public function Pqrsd()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}

			$data['page_tag'] = " PQRSD - Candeaseo";
			$data['page_title'] = " PQRSD - Candeaseo";
			$data['page_name'] = " PQRSD - Candeaseo";
			$data['page_functions_js'] = "functions_pqrsd.js";
			$data['identificacion'] = $this->model->cantIdentificacion();
			$data['anonimo'] = $this->model->cantAnonimo();
			$data['isg'] = $this->model->cantISG();
			$data['asg'] = $this->model->cantASG();
			$data['ir'] = $this->model->cantIR();
			$data['ar'] = $this->model->cantAR();
			$data['if'] = $this->model->cantIF();
			$data['af'] = $this->model->cantAF();

			$anio = date('Y');
			$mes = date('m');
			$data['TipoIMes'] = $this->model->selectTipoPQRIMes($anio,$mes);
			$data['TipoAMes'] = $this->model->selectTipoPQRAMes($anio,$mes);
			//dep($data['TipoIMes']);
			//dep($data['TipoAMes']);exit;
			$data['pqrIDia'] = $this->model->selectIMes($anio,$mes);
			$data['pqrADia'] = $this->model->selectAMes($anio,$mes);
			//dep($data['pqrIDia']);
			//dep($data['pqrADia']);exit;

			$this->views->getView($this,"pqrsd",$data);
		}

		public function tipoIdentificacionMes(){
			if($_POST){


				$grafica = "tipoIdentificacionMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$identificaciones = $this->model->selectTipoPQRIMes($anio,$mes);
				$script = getFile("Template/Modals/graficas",$identificaciones);
				echo $script;
				//die();

				//dep($identificaciones);
				die();
			}
		}

		public function tipoAnonimoMes(){
			if($_POST){


				$grafica = "tipoAnonimoMes";
				$nFecha = str_replace(" ","",$_POST['fecha']);
				$arrFecha = explode('-',$nFecha);
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$anonimo = $this->model->selectTipoPQRAMes($anio,$mes);
				$script = getFile("Template/Modals/graficas",$anonimo);
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
				$anonimoS = $this->model->selectAMes($anio,$mes);

				$solicitudes = array('id' => $identificacionS,
							 'an' => $anonimoS);


				$script = getFile("Template/Modals/graficas",$solicitudes);
				echo $script;
				die();
			}
		}

	}
 ?>