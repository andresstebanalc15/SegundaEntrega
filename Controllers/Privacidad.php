<?php 
	class Privacidad extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function privacidad()
		{
			$pageContent = getPageRout('privacidad');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Política de Privacidad de Datos';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"privacidad",$data);  
			}

		}

	}
 ?>
