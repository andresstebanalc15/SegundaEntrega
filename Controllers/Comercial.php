<?php

	require_once("Models/TCategoria.php");

	class Comercial extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function Comercial()
		{
			$pageContent = getPageRout('comercial');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['categoria_dir'] = $this->getCateDirectorio();
				$data['empresas'] = $this->getEmpresas();
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Directorio Comercial';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"comercial",$data);  
			}

		}

	}
 ?>
