<?php 

	class LineaModel extends Mysql
	{
		
		private $idpqr;
		private $listTipoSolicitudid;
		private $listCanalId;
		private $listMedioid;
		private $listTipoid;
		private $txtIdentificacion;
		private $listSolicitanteid;
		private $txtNombrea;
		private $txtNombreb;
		private $txtApellidoa;
		private $txtApellidob;
		private $listPaisId;
		private $listDepartamentoid;
		private $listMunicipioid;
		private $listCorregimientoid;
		private $txtDireccion;
		private $txtFijo;
		private $txtTelefono;
		private $txtemail;
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

		public function selectIdentificaciones(int $idarea, int $idrol)
		{
			$this->intAreaId = $idarea;
			$this->intRolId = $idrol;

			if($this->intRolId == 1 || $this->intRolId == 11){
				$where = "a.status != 0";
			}else{
				$where = "a.status != 1 AND a.responsable = '{$this->intAreaId}'";
			}
			$sql = "SELECT a.id,
							a.solicitante,
							t.tipo,
							a.nombrea,
							a.nombreb,
							a.apellidoa,
							a.apellidob,
							a.tipo_doc,
							td.identificacion,
							td.abr,
							a.numero,
							a.direccion,
							a.email,
							a.fijo,
							a.movil,
							a.pais,
							p.nombre,
							p.iso,
							a.dep,
							d.departamento,
							a.mun,
							m.municipio,
							a.corr,
							c.corregimiento,
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

							FROM tramites a INNER JOIN
							tipo_solicitante t
							ON a.solicitante = t.id
							INNER JOIN tipo_identificacion td
							ON a.tipo_doc = td.id
							INNER JOIN paises p
							ON a.pais = p.id
							INNER JOIN departamentos d
							ON a.dep = d.id_departamento
							INNER JOIN municipios m
							ON a.mun = m.id_municipio
							INNER JOIN corregimiento c
							ON a.corr = c.id_corregimiento
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

		public function selectIdentificacion(int $idpqr)
		{
			$this->idpqr = $idpqr;
			$sql = "SELECT a.id,
							a.solicitante,
							t.tipo,
							a.nombrea,
							a.nombreb,
							a.apellidoa,
							a.apellidob,
							a.tipo_doc,
							td.identificacion,
							td.abr,
							a.numero,
							a.direccion,
							a.email,
							a.fijo,
							a.movil,
							a.pais,
							p.nombre,
							p.iso,
							a.dep,
							d.departamento,
							a.mun,
							m.municipio,
							a.corr,
							c.corregimiento,
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
							a.fecha,
							a.status,
							a.codigo,
							a.dateadd,
							a.canal,
							a.codigo,
							cp.canal as canalingreso,
							a.responsable,
							res.nombre as nomresponsable

							FROM tramites a INNER JOIN
							tipo_solicitante t
							ON a.solicitante = t.id
							INNER JOIN tipo_identificacion td
							ON a.tipo_doc = td.id
							INNER JOIN paises p
							ON a.pais = p.id
							INNER JOIN departamentos d
							ON a.dep = d.id_departamento
							INNER JOIN municipios m
							ON a.mun = m.id_municipio
							INNER JOIN corregimiento c
							ON a.corr = c.id_corregimiento
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
							a.solicitante,
							t.tipo,
							a.nombrea,
							a.nombreb,
							a.apellidoa,
							a.apellidob,
							a.tipo_doc,
							td.identificacion,
							td.abr,
							a.numero,
							a.direccion,
							a.email,
							a.fijo,
							a.movil,
							a.pais,
							p.nombre,
							p.iso,
							a.dep,
							d.departamento,
							a.mun,
							m.municipio,
							a.corr,
							c.corregimiento,
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
							a.fecha,
							a.status,
							a.codigo,
							a.dateadd,
							a.canal,
							cp.canal as canalingreso,
							a.responsable,
							res.nombre as nomresponsable

							FROM tramites a INNER JOIN
							tipo_solicitante t
							ON a.solicitante = t.id
							INNER JOIN tipo_identificacion td
							ON a.tipo_doc = td.id
							INNER JOIN paises p
							ON a.pais = p.id
							INNER JOIN departamentos d
							ON a.dep = d.id_departamento
							INNER JOIN municipios m
							ON a.mun = m.id_municipio
							INNER JOIN corregimiento c
							ON a.corr = c.id_corregimiento
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
					FROM trazabilidad_tramite tr 
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

		public function asignarIdentificacion(int $idpqr, string $descripcion, int $responsable, int $tipo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->intResponsable = $responsable;
			$this->txtAdjunto = 'vacio.png';
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE tramites SET responsable=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array($this->intResponsable);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_tramite(pqr_i,																																						texto,
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

		public function aprobarIdentificacion(int $idpqr, string $descripcion, int $tipo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->txtAdjunto = 'vacio.png';
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE tramites SET status=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array(2);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_tramite(pqr_i,																																						texto,
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

		public function finalizarIdentificacion(int $idpqr, string $descripcion, int $tipo, string $archivo){
			
			$this->idpqr = $idpqr;
			$this->txtDescripcion = $descripcion;
			$this->intIdUsuario = $_SESSION['idUser'];
			$this->txtAdjunto = $archivo;
			$this->txtMomento = $tipo;
			$return = 0;
			$sql = "UPDATE tramites SET status=?
							WHERE id = '{$this->idpqr}' ";
			$arrDate = array(3);
			$request = $this->update($sql,$arrDate);

			if($request)
			{
				$query_insert = "INSERT INTO trazabilidad_tramite(pqr_i,																																						texto,
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

		public function insertIdentificacion(int $solicitud, int $canal, int $medio, int $documento, string $numero, int $solicitante, string $nombrea, string $nombreb, string $apellidoa, string $apellidob, int $pais, int $departamento, int $municipio, int $corregimiento, string $direccion, string $fijo, string $telefono, string $email, string $descripcion, int $area, string $codigo, string $fecha, string $nombrearchivo){

			$this->listTipoSolicitudid = $solicitud;
			$this->listCanalId = $canal;
			$this->listMedioid = $medio;
			$this->listTipoid = $documento;
			$this->txtIdentificacion = $numero;
			$this->listSolicitanteid = $solicitante;
			$this->txtNombrea = $nombrea;
			$this->txtNombreb = $nombreb;
			$this->txtApellidoa = $apellidoa;
			$this->txtApellidob = $apellidob;
			$this->listPaisId = $pais;
			$this->listDepartamentoid = $departamento;
			$this->listMunicipioid = $municipio;
			$this->listCorregimientoid = $corregimiento;
			$this->txtDireccion = $direccion;
			$this->txtFijo = $fijo;
			$this->txtTelefono = $telefono;
			$this->txtemail = $email;
			$this->txtDescripcion = $descripcion;
			$this->listAreaId = $area;
			$this->txtCodigo = $codigo;
			$this->txtFecha = $fecha;
			$this->nombrearchivo = $nombrearchivo;
			$this->intIdUsuario = $_SESSION['idUser'];
			$return = 0;
			$sql = "SELECT * FROM tramites WHERE codigo = '{$this->txtCodigo}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert = "INSERT INTO tramites(solicitante,
														nombrea,
														nombreb,
														apellidoa,
														apellidob,
														tipo_doc,
														numero,
														direccion,
														email,
														fijo,
														movil,
														pais,
														dep,
														mun,
														corr,
														solicitud,
														descripcion,
														area,
														archivo,
														respuesta,
														codigo,
														fecha,
														canal,
														user)
								VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->listSolicitanteid,
								$this->txtNombrea,
								$this->txtNombreb,
								$this->txtApellidoa,
								$this->txtApellidob,
								$this->listTipoid,
								$this->txtIdentificacion,
								$this->txtDireccion,
								$this->txtemail,
								$this->txtFijo,
								$this->txtTelefono,
								$this->listPaisId,
								$this->listDepartamentoid,
								$this->listMunicipioid,
								$this->listCorregimientoid,
								$this->listTipoSolicitudid,
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

		public function updateIdentificacion(int $idpqr,int $solicitud, int $canal, int $medio, int $documento, string $numero, int $solicitante, string $nombrea, string $nombreb, string $apellidoa, string $apellidob, int $pais, int $departamento, int $municipio, int $corregimiento, string $direccion, string $fijo, string $telefono, string $email, string $descripcion, int $area, string $codigo, string $fecha){

			$this->idpqr = $idpqr;
			$this->listTipoSolicitudid = $solicitud;
			$this->listCanalId = $canal;
			$this->listMedioid = $medio;
			$this->listTipoid = $documento;
			$this->txtIdentificacion = $numero;
			$this->listSolicitanteid = $solicitante;
			$this->txtNombrea = $nombrea;
			$this->txtNombreb = $nombreb;
			$this->txtApellidoa = $apellidoa;
			$this->txtApellidob = $apellidob;
			$this->listPaisId = $pais;
			$this->listDepartamentoid = $departamento;
			$this->listMunicipioid = $municipio;
			$this->listCorregimientoid = $corregimiento;
			$this->txtDireccion = $direccion;
			$this->txtFijo = $fijo;
			$this->txtTelefono = $telefono;
			$this->txtemail = $email;
			$this->txtDescripcion = $descripcion;
			$this->listAreaId = $area;
			$this->txtCodigo = $codigo;
			$this->txtFecha = $fecha;
			$this->intIdUsuario = $_SESSION['idUser'];


			$sql = "SELECT * FROM tramites WHERE (codigo = '{$this->txtCodigo}' AND id != '{$this->idpqr}') ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tramites SET solicitante = ?,
											nombrea = ?,
											nombreb = ?,
											apellidoa = ?,
											apellidob = ?,
											tipo_doc = ?,
											numero = ?,
											direccion = ?,
											email = ?,
											fijo = ?,
											movil = ?,
											pais = ?,
											dep = ?,
											mun = ?,
											corr = ?,
											solicitud = ?,
											descripcion = ?,
											area = ?,
											respuesta = ?,
											codigo = ?,
											fecha = ?,
											canal = ?,
											user = ?
							WHERE id = $this->idpqr ";
					$arrData = array($this->listSolicitanteid,
										$this->txtNombrea,
										$this->txtNombreb,
										$this->txtApellidoa,
										$this->txtApellidob,
										$this->listTipoid,
										$this->txtIdentificacion,
										$this->txtDireccion,
										$this->txtemail,
										$this->txtFijo,
										$this->txtTelefono,
										$this->listPaisId,
										$this->listDepartamentoid,
										$this->listMunicipioid,
										$this->listCorregimientoid,
										$this->listTipoSolicitudid,
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

			$sql = "UPDATE tramites SET archivo=? 
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

		public function selectcorreo(int $rol)
		{
			$this->intResponsable = $rol;
			$sql = "SELECT p.email_user, r.nombrerol FROM persona p
					INNER JOIN rol r ON p.rolid = r.idrol 
					WHERE p.status != 0 AND p.rolid = '{$this->intResponsable}'";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>