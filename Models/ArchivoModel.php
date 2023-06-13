<?php 

	class ArchivoModel extends Mysql
	{
		private $idArchivo;
		private $idusuario;
		private $txtNombre;
		private $txtDescripcion;
		private $txtFecha;
		private $intPagina;
		private $Archivo;

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

		public function selectTarifas()
		{
			$sql = "SELECT a.id_archivo,a.sub,p.idpost,p.titulo,p.ruta,a.doc,a.descripcion,a.archivo,a.fecha,a.dateadd,a.user,a.status 
					FROM archivos a 
					INNER JOIN post p ON a.sub = p.idpost
					WHERE a.status != 0";
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
			$this->idArchivo = $idtarifa;
			$sql = "SELECT a.id_archivo,a.sub,p.idpost,p.titulo,p.ruta,a.doc,a.descripcion,a.archivo,a.fecha,a.dateadd,a.user,a.status 
					FROM archivos a 
					INNER JOIN post p ON a.sub = p.idpost
					WHERE a.status != 0 AND a.id_archivo = '{$this->idArchivo}'";
			$request = $this->select($sql);
			return $request;
		}

		public function insertArchivo(int $usuario, string $nombre, string $descripcion, string $fecha, int $pagina, string $archivo){
			$this->idusuario = $usuario;
			$this->txtNombre = $nombre;
			$this->txtDescripcion = $descripcion;			
			$this->txtFecha = $fecha;
			$this->intPagina = $pagina;
			$this->Archivo = $archivo;

			$return = 0;
			$query_insert = "INSERT INTO archivos(sub,
													doc,
													descripcion,
													archivo,
													fecha,
													user)
							VALUES(?,?,?,?,?,?)";
			$arrData = array($this->intPagina,
							$this->txtNombre,
							$this->txtDescripcion,
							$this->Archivo,
							$this->txtFecha,			
							$this->idusuario);
			$request_insert = $this->insert($query_insert,$arrData);
			
			return $request_insert;
		}

		public function updateArchivos(int $idarchivo, int $usuario, string $nombre, string $descripcion, string $fecha, int $pagina){
			$this->idArchivo = $idarchivo;
			$this->idusuario = $usuario;
			$this->txtNombre = $nombre;
			$this->txtDescripcion = $descripcion;			
			$this->txtFecha = $fecha;
			$this->intPagina = $pagina;

			$sql = "SELECT * FROM archivos WHERE doc = '{$this->txtNombre}' AND  id_archivo != $this->idArchivo";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE archivos SET sub = ?, doc = ?, descripcion = ?, fecha = ?, user = ? WHERE id_archivo = $this->idArchivo ";
				$arrData = array($this->intPagina,
									$this->txtNombre,
									$this->txtDescripcion,
									$this->txtFecha,			
									$this->idusuario);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function UpdateArchivo(int $idtarifa, string $archivo){
			$this->idArchivo = $idtarifa;
			$this->Archivo = $archivo;

			$sql = "UPDATE archivos SET archivo=? 
							WHERE id_archivo = $this->idArchivo";
					$arrData = array($this->Archivo);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function deleteTarifa(int $idtarifa)
		{
			$this->idTarifa = $idtarifa;
		
			$sql = "UPDATE archivos SET status = ? WHERE id_archivo = $this->idTarifa ";
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