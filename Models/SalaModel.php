<?php 

	class SalaModel extends Mysql
	{

		private $noticia;
		public function __construct()
		{
			parent::__construct();
		}

		public function selectNoticia(int $noticia)
		{
			$this->noticia = $noticia;
			
			$sql = "SELECT p.id, p.titulo, p.descripcion, p.cuerpo, pe.nombres, pe.apellidos, p.fecha, p.status, i.img
				FROM prensa p
				INNER JOIN persona pe
				ON pe.idpersona = p.user
				INNER JOIN imagen i
				ON i.productoid = p.id
				WHERE p.id = $this->noticia ORDER BY p.id DESC";
			$request = $this->select($sql);
			return $request;
		}
	}
 ?>