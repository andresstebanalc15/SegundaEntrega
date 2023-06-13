<?php 
	class Especiales extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Especiales()
		{
			$pageContent = getPageRout('especiales');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Servicios Especiales';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"especiales",$data);  
			}

		}

	}
 ?>
