<?php 

	class PrensaModel extends Mysql
	{
		private $intIdUsuario;
		private $idPrensa;
		private $strNombre;
		private $strDescripcion;
		private $strComentario;
		private $strFecha;
		private $intStatus;
		private $strImagen;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectPrensas(){
			$sql = "SELECT * 
					FROM prensa
					WHERE status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}	

		public function insertPrensa(string $nombre, string $descripcion, string $comentario, string $fecha, int $status){

			$this->intIdUsuario = $_SESSION['idUser'];
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strComentario = $comentario;
			$this->strFecha = $fecha;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM prensa WHERE titulo = '{$this->strNombre}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO prensa(titulo,
														descripcion,
														cuerpo,
														user,
														fecha,
														status) 
								  VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->strNombre,
        						$this->strComentario,
        						$this->strDescripcion,
        						$this->intIdUsuario,
        						$this->strFecha,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateProducto(int $idprensa, string $nombre, string $descripcion, string $comentario, string $fecha, int $status){
			
			$this->idPrensa = $idprensa;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->strNombre = $nombre;
			$this->strDescripcion = $descripcion;
			$this->strComentario = $comentario;
			$this->strFecha = $fecha;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM prensa WHERE titulo = '{$this->strNombre}' AND id != $this->idPrensa ";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE prensa 
						SET titulo=?,
							descripcion=?,
							cuerpo=?,
							user=?,
							fecha=?,
							status=?
						WHERE id = $this->idPrensa ";
				$arrData = array($this->strNombre,
        						$this->strComentario,
        						$this->strDescripcion,
        						$this->intIdUsuario,
        						$this->strFecha,
        						$this->intStatus);

	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectPrensa(int $idprensa){
			$this->idPrensa = $idprensa;
			$sql = "SELECT *
					FROM prensa
					WHERE id = $this->idPrensa";
			$request = $this->select($sql);
			return $request;

		}

		public function insertImage(int $idprensa, string $imagen){
			$this->idPrensa = $idprensa;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen(productoid,img) VALUES(?,?)";
	        $arrData = array($this->idPrensa,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
		}

		public function selectImages(int $idprensa){
			$this->idPrensa = $idprensa;
			$sql = "SELECT productoid,img
					FROM imagen
					WHERE productoid = $this->idPrensa";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deleteImage(int $idprensa, string $imagen){
			$this->idPrensa = $idprensa;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagen 
						WHERE productoid = $this->idPrensa 
						AND img = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}

		public function deletePrensa(int $idprensa){
			$this->idPrensa = $idprensa;
			$sql = "UPDATE prensa SET status = ? WHERE id = $this->idPrensa ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>