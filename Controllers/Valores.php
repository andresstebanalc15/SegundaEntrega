<?php 
	class Valores extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Valores()
		{
			$pageContent = getPageRout('valores');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Valores Corporativos';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"valores",$data);  
			}

		}

	}
 ?>
