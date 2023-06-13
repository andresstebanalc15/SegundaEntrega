<?php 
	class Participa extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function participa()
		{
			$pageContent = getPageRout('participa');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = $pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"participa",$data);  
			}

		}

		public function pagina($params)
		{
			if(empty($params)){
				header("Location:".base_url());
			}else{
			$pagina = strClean($params);
			$data['page_tag'] = $pagina;
			$data['page_title'] = $pagina;
			$data['page_name'] = $pagina;
			$data['page_functions_js'] = "functions_participa.js";
			$data['arrPagina'] = $this->model->selectPagina($pagina);
			//dep($data);
			//die();
			$this->views->getView($this,"pagina",$data);
			}
		}

	}
 ?>
