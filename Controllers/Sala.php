<?php 

	require_once("Models/TCategoria.php");

	class Sala extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function Sala()
		{
			$pageContent = getPageRout('sala');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = $pageContent['titulo']." - ".NOMBRE_EMPESA;
				$data['page_title'] = 'Sala de Prensa';
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$data['prensa'] = $this->getSala();
				$data['page_functions_js'] = "functions_sala.js";
				$this->views->getView($this,"sala",$data);  
			}
		}

		public function noticia(int $id)
		{
			$pageContent = getPageRout('sala');
			$data['page_tag'] = "Noticias";
			$data['page_title'] = "Noticias";
			$data['page_name'] = "Noticias";
			$data['page'] = $pageContent;
			$data['prensa'] = $this->getSala();
			$data['arrPrensa'] = $this->model->selectNoticia($id);

			//dep($data['arrPrensa']);
			//die();			
			$this->views->getView($this,"noticia",$data);
		}
	}
 ?>
