<?php 
	class Barrido extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function Barrido()
		{
			$pageContent = getPageRout('barrido');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Barrido';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"barrido",$data);  
			}

		}

	}
 ?>
