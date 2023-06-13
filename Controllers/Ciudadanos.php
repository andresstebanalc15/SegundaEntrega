<?php 
	class Ciudadanos extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function ciudadanos()
		{
			$pageContent = getPageRout('ciudadano');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'PQRSD';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"ciudadanos",$data);  
			}

		}

	}
 ?>
