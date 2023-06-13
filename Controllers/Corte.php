<?php 
	class Corte extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Corte()
		{
			$pageContent = getPageRout('corte');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Corte de Césped';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"corte",$data);  
			}

		}

	}
 ?>
