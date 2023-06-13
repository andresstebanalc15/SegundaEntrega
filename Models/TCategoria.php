<?php 
require_once("Libraries/Core/Mysql.php");
trait TCategoria{
	private $con;

	public function getCategoriasT(string $categorias){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada,enlace,enlace_url,video,video_url
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 1)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getCateDirectorio(){
		$this->con = new Mysql();
		$sql = "SELECT * FROM categoria_dir 
					WHERE status != 0";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getEmpresas(){
		$this->con = new Mysql();
		$sql = "SELECT p.idproducto,
							p.codigo,
							p.nombre,
							p.descripcion,
							p.categoriaid,
							c.nombre as categoria,
							p.status,
							p.corregimientoid,
							co.corregimiento 
					FROM empresa p 
					INNER JOIN categoria_dir c
					ON p.categoriaid = c.idcategoria
					INNER JOIN corregimiento co
					ON p.corregimientoid = co.id_corregimiento
					WHERE p.status != 0";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdEmpresa = $request[$c]['idproducto'];
						$sqlSub = "SELECT productoid,img
									FROM imagen_dir
									WHERE productoid = $intIdEmpresa ORDER BY productoid ASC";
						$arrSub = $this->con->select_all($sqlSub);

						if(count($arrSub) > 0){
							for ($i=0; $i < count($arrSub); $i++) { 
								$arrSub[$i]['img'] = BASE_URL.'/Assets/images/uploads/'.$arrSub[$i]['img'];		
							}
						}
						$request[$c]['imagenes'] = $arrSub;
					}
				}
		return $request;
	}

	public function getTransparencia(){
		$this->con = new Mysql();
		$sql = "SELECT *
				FROM categoria 
				WHERE status = 1 ORDER BY nombre ASC";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdCategoria = $request[$c]['idcategoria'];
						$sqlSub = "SELECT s.id, s.categoria, c.nombre AS cat, s.nombre, s.ruta, s.status FROM sub s
									INNER JOIN categoria c
									ON c.idcategoria = s.categoria 
									WHERE categoria = $intIdCategoria ORDER BY nombre ASC";
						$arrSub = $this->con->select_all($sqlSub);
						if(count($arrSub) > 0){
							for ($i=0; $i < count($arrSub); $i++) { 
								
							}
						}
						$request[$c]['subcategorias'] = $arrSub;
					}
				}
		return $request;
	}

	public function getEntidades(){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada,enlace,enlace_url,video,video_url
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 4)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getDirectores(){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada,enlace,enlace_url,video,video_url
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 6)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getVideo(){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada,enlace,enlace_url,video,video_url
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 2)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getCategoriasIMG(){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 3)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getCategoriasMODAL(){
		$this->con = new Mysql();
		$sql = "SELECT idimg, nombre, descripcion, portada, enlace_url
				 FROM imagenes WHERE (status = 1 AND tipo_imagen = 7)";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}

	public function getPrensa(){
		$this->con = new Mysql();
		$sql = "SELECT p.id, p.titulo, p.descripcion, p.cuerpo, pe.nombres, pe.apellidos, p.fecha, p.status, i.img
				FROM prensa p
				INNER JOIN persona pe
				ON pe.idpersona = p.user
				INNER JOIN imagen i
				ON i.productoid = p.id
				  WHERE p.status = 1 ORDER BY p.id DESC LIMIT 3";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['img'];

				$request[$c]['autor'] = $request[$c]['nombres'].' '.$request[$c]['apellidos'];		
			}
		}
		return $request;
	}

	public function getSala(){
			$this->con = new Mysql();
			$sql = "SELECT p.id, p.titulo, p.descripcion, p.cuerpo, pe.nombres, pe.apellidos, p.fecha, p.status, i.img
					FROM prensa p
					INNER JOIN persona pe
					ON pe.idpersona = p.user
					INNER JOIN imagen i
					ON i.productoid = p.id
					  WHERE p.status = 1 ORDER BY p.id DESC";
			$request = $this->con->select_all($sql);
			if(count($request) > 0){
				for ($c=0; $c < count($request) ; $c++) { 
					$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['img'];

					$request[$c]['autor'] = $request[$c]['nombres'].' '.$request[$c]['apellidos'];		
				}
			}
			return $request;
		}

	public function getCategoriasDIV(string $categorias){
		$this->con = new Mysql();
		$sql = "SELECT iddiv,nombre,icon,url
				 FROM bloques WHERE status != 0 AND iddiv IN ($categorias)";
		$request = $this->con->select_all($sql);
		return $request;
	}

	public function getCategoriasCON(string $categorias){
		$this->con = new Mysql();
		$sql = "SELECT *
				 FROM contador WHERE status = 1 AND id IN ($categorias)";
		$request = $this->con->select_all($sql);
		return $request;
	}

	public function getCategorias(){
		$this->con = new Mysql();
		$sql = "SELECT c.idcategoria, c.nombre, c.portada, c.ruta, count(p.categoriaid) AS cantidad
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE c.status = 1
				GROUP BY p.categoriaid, c.idcategoria";
		$request = $this->con->select_all($sql);
		if(count($request) > 0){
			for ($c=0; $c < count($request) ; $c++) { 
				$request[$c]['portada'] = BASE_URL.'/Assets/images/uploads/'.$request[$c]['portada'];		
			}
		}
		return $request;
	}
}

 ?>