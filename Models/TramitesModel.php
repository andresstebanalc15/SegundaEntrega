<?php 

	class TramitesModel extends Mysql
	{
		
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
			$this->intIdUsuario = 10;
			$return = 0;
			$sql = "SELECT * FROM pqr_i WHERE codigo = '{$this->txtCodigo}'";
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
	}
 ?>