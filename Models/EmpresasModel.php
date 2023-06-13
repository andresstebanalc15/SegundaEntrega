<?php 

	class EmpresasModel extends Mysql
	{
		private $intIdProducto;
		private $strNombre;
		private $strDescripcion;
		private $intCodigo;
		private $intCategoriaId;
		private $intStatus;
		private $strImagen;
		private $intCorregimiento;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectProductos(){
			$sql = "SELECT p.idproducto,
							p.codigo,
							p.nombre,
							p.descripcion,
							p.categoriaid,
							c.nombre as categoria,
							p.status,
							co.corregimiento,
							p.corregimientoid
					FROM empresa p
					INNER JOIN categoria_dir c
					ON p.categoriaid = c.idcategoria
					INNER JOIN corregimiento co
					ON p.corregimientoid = co.id_corregimiento
					WHERE p.status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}	

		public function insertProducto(string $nombre, string $descripcion, int $codigo, int $categoriaid, int $status, int $corregimiento){
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->intCodigo = $codigo;
			$this->intCategoriaId = $categoriaid;
			$this->intStatus = $status;
			$this->intCorregimiento = $corregimiento;
			$return = 0;
			$sql = "SELECT * FROM empresa WHERE codigo = '{$this->intCodigo}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO empresa(categoriaid,
														codigo,
														nombre,
														descripcion,
														status,
														corregimientoid) 
								  VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->intCategoriaId,
        						$this->intCodigo,
        						$this->strNombre,
        						$this->strDescripcion,
        						$this->intStatus,
        						$this->intCorregimiento);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateProducto(int $idproducto, string $nombre, string $descripcion, int $codigo, int $categoriaid, int $status, int $corregimiento){
			$this->intIdProducto = $idproducto;
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->intCodigo = $codigo;
			$this->intCategoriaId = $categoriaid;
			$this->intStatus = $status;
			$this->intCorregimiento = $corregimiento;

			$return = 0;
			$sql = "SELECT * FROM empresa WHERE codigo = '{$this->intCodigo}' AND idproducto != $this->intIdProducto ";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE empresa 
						SET categoriaid=?,
							codigo=?,
							nombre=?,
							descripcion=?,
							status=?,
							corregimientoid=? 
						WHERE idproducto = $this->intIdProducto ";
				$arrData = array($this->intCategoriaId,
        						$this->intCodigo,
        						$this->strNombre,
        						$this->strDescripcion,
        						$this->intStatus,
        						$this->intCorregimiento);

	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectProducto(int $idproducto){
			$this->intIdProducto = $idproducto;
			$sql = "SELECT p.idproducto,
							p.codigo,
							p.nombre,
							p.descripcion,
							p.categoriaid,
							c.nombre as categoria,
							p.status,
							co.corregimiento,
							p.corregimientoid
					FROM empresa p
					INNER JOIN categoria_dir c
					ON p.categoriaid = c.idcategoria
					INNER JOIN corregimiento co
					ON p.corregimientoid = co.id_corregimiento
					WHERE idproducto = $this->intIdProducto";
			$request = $this->select($sql);
			return $request;

		}

		public function selectCategorias()
		{
			$sql = "SELECT * FROM categoria_dir 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCorregimiento()
		{
			$sql = "SELECT * FROM corregimiento
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function insertImage(int $idproducto, string $imagen){
			$this->intIdProducto = $idproducto;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen_dir(productoid,img) VALUES(?,?)";
	        $arrData = array($this->intIdProducto,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
		}

		public function selectImages(int $idproducto){
			$this->intIdProducto = $idproducto;
			$sql = "SELECT productoid,img
					FROM imagen_dir
					WHERE productoid = $this->intIdProducto";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deleteImage(int $idproducto, string $imagen){
			$this->intIdProducto = $idproducto;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagen_dir 
						WHERE productoid = $this->intIdProducto 
						AND img = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}

		public function deleteProducto(int $idproducto){
			$this->intIdProducto = $idproducto;
			$sql = "UPDATE empresa SET status = ? WHERE idproducto = $this->intIdProducto ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>