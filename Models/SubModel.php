<?php 

	class SubModel extends Mysql
	{
		public $intIdSub;
		public $strNombre;
		public $strPagina;
		public $intStatus;
		public $intIdcategoria;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectPagina()
		{
			$sql = "SELECT * FROM post 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function inserCategoria(string $nombre, int $status, int $categoria, string $pagina){

			$return = 0;
			$this->strNombre = $nombre;
			$this->strPagina = $pagina;
			$this->intStatus = $status;
			$this->intIdcategoria = $categoria;

			$sql = "SELECT * FROM sub WHERE nombre = '{$this->strNombre}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO sub(categoria,nombre,ruta,status) VALUES(?,?,?,?)";
	        	$arrData = array($this->intIdcategoria, 
								 $this->strNombre, 
								 $this->strPagina, 
								 $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectCategoriasC()
		{
			$sql = "SELECT s.id, s.categoria, c.nombre AS cat, s.nombre, s.ruta, s.status FROM sub s
					INNER JOIN categoria c
					ON c.idcategoria = s.categoria 
					WHERE s.status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCategorias()
		{
			$sql = "SELECT * FROM categoria 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCategoria(int $idcategoria){
			$this->intIdSub = $idcategoria;
			$sql = "SELECT s.id, s.categoria, c.nombre AS cat, s.nombre, s.ruta, s.status FROM sub s
					INNER JOIN categoria c
					ON c.idcategoria = s.categoria 
					WHERE s.status != 0 AND s.id = $this->intIdSub";
			$request = $this->select($sql);
			return $request;
		}

		public function updateCategoria(int $idsub, string $nombre, int $status, int $categoria, string $pagina){
			$this->intIdSub = $idsub;
			$this->strNombre = $nombre;
			$this->strPagina = $pagina;
			$this->intStatus = $status;
			$this->intIdcategoria = $categoria;

			$sql = "SELECT * FROM sub WHERE nombre = '{$this->strNombre}' AND id != $this->intIdSub";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE sub SET categoria = ?, nombre = ?, ruta = ?, status = ? WHERE id = $this->intIdSub ";
				$arrData = array($this->intIdcategoria, 
								 $this->strNombre, 
								 $this->strPagina, 
								 $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteCategoria(int $idcategoria)
		{
			$this->intIdSub = $idcategoria;
			
				$sql = "UPDATE sub SET status = ? WHERE id = $this->intIdSub ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			return $request;
		}	


	}
 ?>