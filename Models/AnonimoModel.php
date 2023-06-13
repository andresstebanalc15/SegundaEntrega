<?php 

	class AnonimoModel extends Mysql
	{
		
		private $idpqr;
		private $listTipoSolicitudid;
		private $listCanalId;
		private $listMedioid;
		private $txtDescripcion;
		private $txtCodigo;
		private $nombrearchivo;
		private $txtFecha;
		private $listAreaId;
		private $intIdUsuario;
		private $datemod;
		private $intResponsable;
		private $txtMomento;
		private $txtAdjunto;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectAnonimos(int $idarea, int $idrol)
		{
			$this->intAreaId = $idarea;
			$this->intRolId = $idrol;

			if($this->intRolId == 1 || $this->intRolId == 11){
				$where = "a.status != 0";
			}else{
				$where = "a.status != 1 AND a.responsable = '{$this->intAreaId}'";
			}
			$sql = "SELECT a.id,
							a.solicitud,
							tp.tipo_pqr,
							tp.tiempo,
							a.descripcion,
							a.area,
							ar.nombre AS nomarea,
							ar.emailarea,
							a.archivo,
							a.respuesta,
							r.medio,
							TIMESTAMPDIFF(DAY,a.fecha,NOW()) AS dias,
							a.fecha,
							a.status,
							a.codigo,
							a.dateadd,
							a.canal,
							cp.canal as canalingreso,
							a.responsable,
							res.nombre as nomresponsable

							FROM pqr_a a
							INNER JOIN tipo_pqr tp
							ON a.solicitud = tp.id
							INNER JOIN areas ar
							ON a.area = ar.id
							INNER JOIN medio_respuesta r
							ON a.respuesta = r.id
							INNER JOIN canal_pqr cp
							ON a.canal = cp.id
							INNER JOIN areas res
							ON a.responsable = res.id
							WHERE $where";

			$request = $this->select_all($sql);
			return $request;
		}

		public function selectAnonimo(int $idpqr)
		{
			$this->idpqr = $idpqr;
			$sql = "SELECT a.id,
							a.solicitud,
							tp.tipo_pqr,
							tp.tiempo,
							a.descripcion,
							a.area,
							ar.nombre AS nomarea,
							ar.emailarea,
							a.archivo,
							a.respuesta,
							r.medio,
							TIMESTAMPDIFF(DAY,a.fecha,NOW()) AS dias,
							a.fecha,
							a.status,
							a.codigo,
							a.dateadd,
							a.canal,
							cp.canal as canalingreso,
							a.responsable,
							res.nombre as nomresponsable

							FROM pqr_a a
							INNER JOIN tipo_pqr tp
							ON a.solicitud = tp.id
							INNER JOIN areas ar
							ON a.area = ar.id
							INNER JOIN medio_respuesta r
							ON a.respuesta = r.id
							INNER JOIN canal_pqr cp
							ON a.canal = cp.id
							INNER JOIN areas res
							ON a.responsable = res.id
							WHERE a.status != 0 AND a.id = '{$this->idpqr}'";

			$request = $this->select($sql);
			return $request;
		}

		public function selectVer(int $idarea, int $idrol, int $idpqr)
		{
			$this->intAreaId = $idarea;
			$this->intRolId = $idrol;
			$this->idpqr = $idpqr;
			if($this->intRolId == 1 || $this->intRolId == 11){
				$where = "a.status != 0 AND a.id = '{$this->idpqr}'";
			}else{
				$where = "(a.status != 0 AND a.responsable = '{$this->intAreaId}') AND a.id = '{$this->idpqr}'";
			}
			$sql = "SELECT a.id,
							a.solicitud,
							tp.tipo_pqr,
							tp.tiempo,
							a.descripcion,
							a.area,
							ar.nombre AS nomarea,
							ar.emailarea,
							a.archivo,
							a.respuesta,
							r.medio,
							TIMESTAMPDIFF(DAY,a.fecha,NOW()) AS dias,
							a.fecha,
							a.status,
							a.codigo,
							a.dateadd,
							a.canal,
							cp.canal as canalingreso,
							a.responsable,
							res.nombre as nomresponsable

							FROM pqr_a a
							INNER JOIN tipo_pqr tp
							ON a.solicitud = tp.id
							INNER JOIN areas ar
							ON a.area = ar.id
							INNER JOIN medio_respuesta r
							ON a.respuesta = r.id
							INNER JOIN canal_pqr cp
							ON a.canal = cp.id
							INNER JOIN areas res
							ON a.responsable = res.id
							WHERE $where";
			$request_pedido = $this->select($sql);
			$sql_trazabilidad = "SELECT tr.id,tr.pqr_i,tr.fecha,tr.estatus,tr.adjunto,tr.texto,pe.nombres AS nomtra,pe.apellidos, tr.usuario, tr.tipo_t , ttr.accion 
					FROM trazabilidad_a tr 
					INNER JOIN persona pe 
					ON tr.usuario = pe.idpersona
					INNER JOIN tipo_trazabilidad ttr 
					ON tr.tipo_t = ttr.id
					WHERE tr.pqr_i = $this->idpqr";
			$request_trazabilidad = $this->select_all($sql_trazabilidad);
			$request = array('ver' => $request_pedido,
							 'trazabilidad' => $request_trazabilidad);
			return $request;
		}

		public function asignarAnonimo(int $idpqr, string $descripcion, int $responsable, int $tipo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->intResponsable = $responsable;
			$this->txtAdjunto = 'vacio.png';
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE pqr_a SET responsable=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array($this->intResponsable);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_a(pqr_i,																																													texto,
														usuario,
														adjunto,
														tipo_t)
								VALUES(?,?,?,?,?)";
				$arrData = array($this->idpqr,
								$this->txtDescripcion,
								$this->intIdUsuario,
								$this->txtAdjunto,
								$this->txtMomento);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function aprobarAnonimo(int $idpqr, string $descripcion, int $tipo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->txtAdjunto = 'vacio.png';
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE pqr_a SET status=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array(2);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_a(pqr_i,																																													texto,
														usuario,
														adjunto,
														tipo_t)
								VALUES(?,?,?,?,?)";
				$arrData = array($this->idpqr,
								$this->txtDescripcion,
								$this->intIdUsuario,
								$this->txtAdjunto,
								$this->txtMomento);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function finalizarAnonimo(int $idpqr, string $descripcion, int $tipo, string $archivo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->txtAdjunto = $archivo;
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE pqr_a SET status=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array(3);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_a(pqr_i,																																													texto,
														usuario,
														adjunto,
														tipo_t)
								VALUES(?,?,?,?,?)";
				$arrData = array($this->idpqr,
								$this->txtDescripcion,
								$this->intIdUsuario,
								$this->txtAdjunto,
								$this->txtMomento);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function insertAnonimo(int $solicitud, int $canal, int $medio, string $descripcion, int $area, string $codigo, string $fecha, string $nombrearchivo){

			$this->listTipoSolicitudid = $solicitud;
			$this->listCanalId = $canal;
			$this->listMedioid = $medio;
			$this->txtDescripcion = $descripcion;
			$this->listAreaId = $area;
			$this->txtCodigo = $codigo;
			$this->txtFecha = $fecha;
			$this->nombrearchivo = $nombrearchivo;
			$this->intIdUsuario = $_SESSION['idUser'];
			$return = 0;
			$sql = "SELECT * FROM pqr_a WHERE codigo = '{$this->txtCodigo}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert = "INSERT INTO pqr_a(solicitud,
														descripcion,
														area,
														archivo,
														respuesta,
														codigo,
														fecha,
														canal,
														user)
								VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->listTipoSolicitudid,
								$this->txtDescripcion,
								$this->listAreaId,
								$this->nombrearchivo,
								$this->listMedioid,
								$this->txtCodigo,
								$this->txtFecha,
								$this->listCanalId,
								$this->intIdUsuario);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function updateAnonimo(int $idpqr,int $solicitud, int $canal, int $medio, string $descripcion, int $area, string $codigo, string $fecha){

			$this->idpqr = $idpqr;
			$this->listTipoSolicitudid = $solicitud;
			$this->listCanalId = $canal;
			$this->listMedioid = $medio;
			$this->txtDescripcion = $descripcion;
			$this->listAreaId = $area;
			$this->txtCodigo = $codigo;
			$this->txtFecha = $fecha;
			$this->intIdUsuario = $_SESSION['idUser'];


			$sql = "SELECT * FROM pqr_a WHERE (codigo = '{$this->txtCodigo}' AND id != '{$this->idpqr}') ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE pqr_a SET solicitud = ?,
											descripcion = ?,
											area = ?,
											respuesta = ?,
											codigo = ?,
											fecha = ?,
											canal = ?,
											user = ?
							WHERE id = $this->idpqr ";
					$arrData = array($this->listTipoSolicitudid,
										$this->txtDescripcion,
										$this->listAreaId,
										$this->listMedioid,
										$this->txtCodigo,
										$this->txtFecha,
										$this->listCanalId,
										$this->intIdUsuario);
				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}

		public function UpdateArchivo(int $idpqr, string $archivo){
			$this->idpqr = $idpqr;
			$this->nombrearchivo = $archivo;

			$sql = "UPDATE pqr_a SET archivo=? 
							WHERE id = $this->idpqr ";
					$arrData = array($this->nombrearchivo);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function selectTipoSolicitud()
		{
			$sql = "SELECT * FROM tipo_pqr 
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTipoCanal()
		{
			$sql = "SELECT * FROM canal_pqr 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectcorreo(int $rol)
		{
			$this->intResponsable = $rol;
			$sql = "SELECT p.email_user, r.nombrerol FROM persona p
					INNER JOIN rol r ON p.rolid = r.idrol 
					WHERE p.status != 0 AND p.rolid = '{$this->intResponsable}'";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectResponsable()
		{
			$sql = "SELECT * FROM rol 
					WHERE status != 0 AND
					idrol != 1";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectArea()
		{
			$sql = "SELECT * FROM areas 
					WHERE status != 0 AND id != 10";
			$request = $this->select_all($sql);
			return $request;
		}

		
		public function selectTipo()
		{
			$sql = "SELECT * FROM tipo_identificacion 
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTipoSolicitante()
		{
			$sql = "SELECT * FROM tipo_solicitante
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectPais()
		{
			$sql = "SELECT * FROM paises
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectDepartamento()
		{
			$sql = "SELECT * FROM departamentos
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectMunicipio(int $departamento)
		{
			$this->intdepartamento = $departamento;
			$sql = "SELECT * FROM municipios
					WHERE estatus != 0 AND departamento_id = '{$this->intdepartamento}'";
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

		public function SelectMedio()
		{
			$sql = "SELECT * FROM medio_respuesta
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>