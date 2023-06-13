<?php

	require_once("Models/TCategoria.php");

	class Equipo extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function equipo()
		{
			$pageContent = getPageRout('equipo');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['directores'] = $this->getDirectores();
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Nuestros Directores';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"equipo",$data);  
			}

		}

	}
 ?>
