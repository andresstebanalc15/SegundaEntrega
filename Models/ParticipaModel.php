<?php 

	class ParticipaModel extends Mysql
	{
		private $txtPagina;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectPagina(string $pagina)
		{
			$this->txtPagina = $pagina;
			$sql = "SELECT * FROM post
							WHERE status != 0 AND ruta = '{$this->txtPagina}'";
			$request = $this->select($sql);
			return $request;
		}
	}
 ?>