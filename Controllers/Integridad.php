<?php 
	class Integridad extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Integridad()
		{
			$pageContent = getPageRout('integridad');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = $pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"integridad",$data);  
			}

		}

	}
 ?>
