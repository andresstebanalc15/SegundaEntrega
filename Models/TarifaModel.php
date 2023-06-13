<?php 

	class TarifaModel extends Mysql
	{
		private $idTarifa;
		private $idusuario;
		private $txtAnio;
		private $txtMes;
		private $txtComentario;
		private $nombre;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectTarifas()
		{
			$sql = "SELECT * FROM tarifas 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectSolicitud(int $idsolicitud)
		{
			$this->intIdSolicitud = $idsolicitud;
			$sql = "SELECT a.id,
							b.nombre,
							a.texto,
							a.idcon,
							a.clavecon,
							a.contacto,
							a.dateadd,
							a.status,
							c.nombres,
							c.apellidos,
							c.email_user,
							a.nivel,
							a.adjunto,
							d.nombrerol

							FROM servicios a INNER JOIN
							tipo_servicio b ON a.tipo = b.id INNER JOIN
							persona c ON c.idpersona = a.usuario INNER JOIN
							rol d ON c.rolid = d.idrol
							WHERE a.id = '{$this->intIdSolicitud}'";
			$request = $this->select($sql);
			return $request;
		}

		public function selectTarifa(int $idtarifa)
		{
			$this->idTarifa = $idtarifa;
			$sql = "SELECT * FROM tarifas
					WHERE status != 0 AND id = '{$this->idTarifa}'";
			$request = $this->select($sql);
			return $request;
		}

		public function insertTarifa(int $usuario, int $anio, string $mes, string $descripcion, string $archivo){
			$this->idusuario = $usuario;
			$this->txtAnio = $anio;
			$this->txtMes = $mes;			
			$this->txtComentario = $descripcion;
			$this->nombre = $archivo;

			$return = 0;
			$query_insert = "INSERT INTO tarifas(anio,
													mes,
													descripcion,
													archivo,
													user)
							VALUES(?,?,?,?,?)";
			$arrData = array($this->txtAnio,
							$this->txtMes,
							$this->txtComentario,
							$this->nombre,			
							$this->idusuario);
			$request_insert = $this->insert($query_insert,$arrData);
			
			return $request_insert;
		}

		public function updateTarifa(int $idtarifa, int $usuario, int $anio, string $mes, string $descripcion, string $archivo){
			$this->idTarifa = $idtarifa;
			$this->idusuario = $usuario;
			$this->txtAnio = $anio;
			$this->txtMes = $mes;			
			$this->txtComentario = $descripcion;
			$this->nombre = $archivo;

			$sql = "SELECT * FROM tarifas WHERE ( anio = '{$this->txtAnio}' AND  mes = '{$this->txtMes}') AND id != $this->idTarifa";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tarifas SET anio = ?, mes = ?, descripcion = ?, archivo = ?, user = ? WHERE id = $this->idTarifa ";
				$arrData = array($this->txtAnio,
									$this->txtMes,
									$this->txtComentario,
									$this->nombre,			
									$this->idusuario);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function UpdateArchivo(int $idtarifa, string $archivo){
			$this->idTarifa = $idtarifa;
			$this->nombre = $archivo;

			$sql = "UPDATE tarifas SET archivo=? 
							WHERE id = $this->idTarifa";
					$arrData = array($this->nombre);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function deleteTarifa(int $idtarifa)
		{
			$this->idTarifa = $idtarifa;
		
			$sql = "UPDATE tarifas SET status = ? WHERE id = $this->idTarifa ";
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