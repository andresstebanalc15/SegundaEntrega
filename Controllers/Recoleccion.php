<?php 
	class Recoleccion extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Recoleccion()
		{
			$pageContent = getPageRout('recoleccion');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Recolección Domiciliaria';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"recoleccion",$data);  
			}

		}

	}
 ?>
