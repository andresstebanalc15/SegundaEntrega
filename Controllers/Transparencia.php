<?php 

	require_once("Models/TCategoria.php");

	class Transparencia extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function Transparencia()
		{
			$pageContent = getPageRout('transparencia');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Transparencia y Acceso a la Información Pública';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['page_functions_js'] = "functions_transparencia.js";
				$data['transparencia'] = $this->getTransparencia();

				//dep($data);
				//die();

				$this->views->getView($this,"transparencia",$data);  
			}

		}

		public function pagina($params)
		{
			if(empty($params)){
				header("Location:".base_url());
			}else{
			$pagina = strClean($params);
			$data['arrPagina'] = $this->model->selectPagina($pagina);
			$titulo = $data['arrPagina']['titulo'];
			$data['page_tag'] = $titulo;
			$data['page_title'] = $titulo;
			$data['page_name'] = $titulo;
			$data['arrArchivo'] = $this->model->selectArchivo($pagina);
			$data['arrTabla'] = $this->model->selectArchivoTabla($pagina);
			$data['page_functions_js'] = "functions_transparencia.js";
			//dep($data);
			//die();
			$this->views->getView($this,"pagina",$data);
			}
		}

		public function getArchivos(int $idpagina)
		{
			$idpagina = intval($idpagina);
			if($idpagina > 0)
			{
				$arrData = $this->model->selectArchivoTablas($idpagina);
				for ($i=0; $i < count($arrData); $i++) {
					
					$arrData[$i]['descarga'] = '<a style="font-size: 25pt;" href="'.base_url().'/Assets/images/tarifas/'.$arrData[$i]['archivo'].'"><i class="bi bi-filetype-pdf"></i></a>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}
 ?>
