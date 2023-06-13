<?php 

	require_once("Models/TCategoria.php");

	class Home extends Controllers{
		use TCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = NOMBRE_EMPESA;
			$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
			$data['div'] = $this->getCategoriasDIV(CAT_DIV);
			$data['conteo'] = $this->getCategoriasCON(CAT_DIV);
			$data['img'] = $this->getCategoriasIMG();
			$data['modal'] = $this->getCategoriasMODAL();
			$data['prensa'] = $this->getPrensa();
			$data['video'] = $this->getVideo();
			$data['entidades'] = $this->getEntidades();
			$data['page_name'] = "inicio";
			$data['page_functions_js'] = "functions_home.js";
			$this->views->getView($this,"home",$data);
		}

	}
 ?>