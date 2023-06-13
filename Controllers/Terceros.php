<?php 

	class Terceros extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Terceros()
		{
			$pageContent = getPageRout('terceros');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Notificaciones Por Aviso';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_terceros.js";
				$this->views->getView($this,"terceros",$data);  
			}

		}

		public function getTarifas()
		{
				$arrData = $this->model->selectTarifas();
				for ($i=0; $i < count($arrData); $i++) {

					$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/pqra/'.$arrData[$i]['adjunto'].'"><i class="bi bi-filetype-pdf"></i></a>';

					$arrData[$i]['fecha'] = date("Y-m-d", strtotime($arrData[$i]['fecha']));
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	}
 ?>
