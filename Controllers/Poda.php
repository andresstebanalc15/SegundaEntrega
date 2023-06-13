<?php 
	class Poda extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Poda()
		{
			$pageContent = getPageRout('poda');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Poda de Árboles';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"poda",$data);  
			}

		}

	}
 ?>
