<?php 
	class Frecuencia extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Frecuencia()
		{
			$pageContent = getPageRout('frecuencia');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Frecuencia y Horarios';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"frecuencia",$data);  
			}

		}

	}
 ?>
