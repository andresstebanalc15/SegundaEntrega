<?php 

	class BancoModel extends Mysql
	{
		public $intIdcategoria;
		public $strImagen;
		public $strDescipcion;
		public $intStatus;
		public $strUrl;
		public $intTipo;
		public $strPortada;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectBanco()
		{
			
			$sql = "SELECT * FROM tipo_imagen WHERE status != 0 AND id !=1";
			$request = $this->select_all($sql);
			return $request;
		}

		public function inserCategoria(string $nombre, string $descripcion, int $status, string $url, int $tipo, string $portada){

			$return = 0;
			$this->strImagen = $nombre;
			$this->strDescipcion = $descripcion;
			$this->intStatus = $status;
			$this->strUrl = $url;
			$this->intTipo = $tipo;
			$this->strPortada = $portada;

			$sql = "SELECT * FROM imagenes WHERE nombre = '{$this->strImagen}' AND enlace_url = '{$this->strUrl}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO imagenes(tipo_imagen,nombre,descripcion,portada,enlace_url,status) VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->intTipo, 
								 $this->strImagen, 
								 $this->strDescipcion,
								 $this->strPortada, 
								 $this->strUrl,
								 $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectCategorias()
		{
			$sql = "SELECT i.idimg, i.tipo_imagen, t.tipo_imagen AS tipo, i.nombre, i.descripcion, i.portada, i.enlace, i.enlace_url, i.video, i.video_url, i.dateadd, i.status
					FROM imagenes i
					INNER JOIN tipo_imagen t
					ON t.id = i.tipo_imagen 
					WHERE i.status != 0 AND i.tipo_imagen != 1";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCategoria(int $idcategoria){
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT i.idimg, i.tipo_imagen, t.tipo_imagen AS tipo, i.nombre, i.descripcion, i.portada, i.enlace, i.enlace_url, i.video, i.video_url, i.dateadd, i.status
					FROM imagenes i
					INNER JOIN tipo_imagen t
					ON t.id = i.tipo_imagen 
					WHERE (i.status != 0 AND i.tipo_imagen != 1) AND i.idimg = $this->intIdcategoria";
			$request = $this->select($sql);
			return $request;
		}

		public function updateCategoria(int $idcategoria, string $nombre, string $descripcion, int $status, string $url, int $tipo, string $portada){
			$this->intIdcategoria = $idcategoria;
			$this->strImagen = $nombre;
			$this->strDescipcion = $descripcion;
			$this->intStatus = $status;
			$this->strUrl = $url;
			$this->intTipo = $tipo;
			$this->strPortada = $portada;

			$sql = "SELECT * FROM imagenes WHERE (nombre = '{$this->strImagen}' AND enlace_url = '{$this->strUrl}') AND idimg != $this->intIdcategoria";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE imagenes SET tipo_imagen=?, nombre = ?, descripcion = ?, portada = ?, enlace_url = ?, status = ? WHERE idimg = $this->intIdcategoria ";
				$arrData = array($this->intTipo, 
								 $this->strImagen, 
								 $this->strDescipcion,
								 $this->strPortada, 
								 $this->strUrl,
								 $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteCategoria(int $idcategoria)
		{
			$this->intIdcategoria = $idcategoria;
			$sql = "SELECT COUNT(tipo_imagen) FROM imagenes WHERE idimg = $this->intIdcategoria AND status = 1";
			$request = $this->select_all($sql);
			if($request>1)
			{
				$sql = "UPDATE imagenes SET status = ? WHERE idimg = $this->intIdcategoria ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}
	}
 ?>