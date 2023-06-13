<?php 

	require_once("Models/TCategoria.php");

	class Tarifas extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function Tarifas()
		{
			$pageContent = getPageRout('tarifas');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Tarifas del Servicio';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_tarifas.js";
				$this->views->getView($this,"tarifas",$data);  
			}

		}

		public function getTarifas()
		{
				$arrData = $this->model->selectTarifas();
				for ($i=0; $i < count($arrData); $i++) {

					$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/tarifas/'.$arrData[$i]['archivo'].'"><i class="bi bi-filetype-pdf"></i></a>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	}
 ?>
