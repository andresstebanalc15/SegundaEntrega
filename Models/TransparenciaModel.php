<?php 

	class TransparenciaModel extends Mysql
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

		public function selectArchivo(string $pagina)
		{
			$this->txtPagina = $pagina;
			$sql = "SELECT COUNT(*) AS total 
					FROM archivos a 
					INNER JOIN post p ON a.sub = p.idpost
					WHERE a.status != 0 AND p.ruta = '{$this->txtPagina}'";
			$request = $this->select($sql);
			return $request;
		}

		public function selectArchivoTabla(string $pagina)
		{
			$this->txtPagina = $pagina;
			$sql = "SELECT a.id_archivo,a.sub,p.idpost,p.titulo,p.ruta,a.doc,a.descripcion,a.archivo,a.fecha,a.dateadd,a.user,a.status 
					FROM archivos a 
					INNER JOIN post p ON a.sub = p.idpost
					WHERE a.status != 0 AND p.ruta = '{$this->txtPagina}'";
			$request = $this->select_all($sql);
			if(count($request) > 0){
				for ($c=0; $c < count($request) ; $c++) { 
					$request[$c]['descarga'] = BASE_URL.'/Assets/images/tarifas/'.$request[$c]['archivo'];		
				}
			}
			return $request;
		}

		public function selectArchivoTablas(int $idpagina)
		{
			$this->txtPagina = $idpagina;
			$sql = "SELECT a.id_archivo,a.sub,p.idpost,p.titulo,p.ruta,a.doc,a.descripcion,a.archivo,a.fecha,a.dateadd,a.user,a.status 
					FROM archivos a 
					INNER JOIN post p ON a.sub = p.idpost
					WHERE a.status != 0 AND p.idpost = '{$this->txtPagina}'";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>