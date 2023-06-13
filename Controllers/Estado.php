<?php 

	class Estado extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Estado()
		{
			$pageContent = getPageRout('estado');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Estado de PQRSD';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_estado.js";
				$this->views->getView($this,"estado",$data);  
			}

		}

		public function getPQRSD($id){
			$id = intval($id);
			if($id > 0)
			{

				$arrData = $this->model->selectPQRSD($id);
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getPQRSDI($id){
			$id = intval($id);
			if($id > 0)
			{

				$arrData = $this->model->selectPQRSDI($id);

				//dep($arrData);
				//die();

				for ($i=0; $i < count($arrData); $i++) {
					
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
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
				die();
			}			
		}
	}
 ?>
