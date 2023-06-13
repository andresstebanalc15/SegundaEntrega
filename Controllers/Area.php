<?php 
	class Area extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Area()
		{
			$pageContent = getPageRout('area');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Área de Servicio';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"area",$data);  
			}

		}

	}
 ?>
