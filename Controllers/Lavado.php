<?php 
	class Lavado extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Lavado()
		{
			$pageContent = getPageRout('lavado');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Lavado de Áreas Públicas';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"lavado",$data);  
			}

		}

	}
 ?>
