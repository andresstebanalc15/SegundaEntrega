<?php 

	class ReservaModel extends Mysql
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

		public function insertAnonimo(int $solicitud, int $canal, int $medio, string $descripcion, int $area, string $codigo, string $fecha, string $nombrearchivo){

			$this->listTipoSolicitudid = $solicitud;
			$this->listCanalId = $canal;
			$this->listMedioid = $medio;
			$this->txtDescripcion = $descripcion;
			$this->listAreaId = $area;
			$this->txtCodigo = $codigo;
			$this->txtFecha = $fecha;
			$this->nombrearchivo = $nombrearchivo;
			$this->intIdUsuario = 1;
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

		public function selectTipoSolicitud()
		{
			$sql = "SELECT * FROM tipo_pqr 
					WHERE estatus != 0 ";
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
	}
 ?>