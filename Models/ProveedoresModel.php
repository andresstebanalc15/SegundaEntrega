<?php 

	class ProveedoresModel extends Mysql
	{
		private $intidusuario;
		private $intidproveedor;
		private $strNit;
		private $strRazon;
		private $strNombrea;
		private $strNombreb;
		private $strApellidoa; 
		private $strApellidob; 
		private $intDepartamento; 
		private $intMunicipio;
		private $intCorregimiento; 
		private $strDireccion;
		private $strBarrio;
		private $intTelefono;
		private $strEmail;
		private $strnombredocumento;
		private $strdateadd;
		private $strhv;
		private $strce;
		private $strcedula;
		private $strrut;
		private $straportes;
		private $strafiliacion;
		private $strantecedentes;
		private $strestudios;
		private $strTipoDocumento;
		private $strTipoPersona;


		public function __construct()
		{
			parent::__construct();
		}

		public function insertProveedor(int $usuario, int $tipodocumento, int $nit, int $tipoPersona, string $razon, string $nombrea, string $nombreb, string $apellidoa, string $apellidob, int $departamento, int $municipio, int $corregimiento, string $direccion, string $barrio, string $telefono, string $email, string $hv, string $ce, string $cedula, string $rut, string $antecedentes){

			
			$this->intidusuario = $usuario;
			$this->strTipoDocumento = $tipodocumento;
			$this->strNit = $nit;
			$this->strTipoPersona = $tipoPersona;
			$this->strRazon = $razon;
			$this->strNombrea = $nombrea; 
			$this->strNombreb = $nombreb;
			$this->strApellidoa = $apellidoa;
			$this->strApellidob = $apellidob; 
			$this->intDepartamento = $departamento; 
			$this->intMunicipio = $municipio;
			$this->intCorregimiento = $corregimiento; 
			$this->strDireccion = $direccion;
			$this->strBarrio = $barrio; 
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strhv = $hv;
			$this->strce = $ce;
			$this->strcedula = $cedula;
			$this->strrut = $rut;
			$this->strantecedentes = $antecedentes;
			$this->intStatus = 1;

			$query_insert = "INSERT INTO proveedor(tipodoc,
														nit,
														tipo,
														razon,
														primer,
														segundo,
														apellidoa,
														apellidob,
														departamento,
														municipio,
														corregimiento,
														direccion,
														telefono,
														email,
														barrio,
														hv,
														ce,
														cedula,
														rut,
														antecedentes,
														status,
														user)
								VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->strTipoDocumento,
								$this->strNit,
								$this->strTipoPersona,
								$this->strRazon,
								$this->strNombrea, 
								$this->strNombreb,
								$this->strApellidoa, 
								$this->strApellidob,
								$this->intDepartamento,
								$this->intMunicipio,
								$this->intCorregimiento, 
								$this->strDireccion, 
								$this->intTelefono,
								$this->strEmail,
								$this->strBarrio,
								$this->strhv,
								$this->strce,
								$this->strcedula,
								$this->strrut,
								$this->strantecedentes,
								$this->intStatus,
								$this->intidusuario);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
				return $return;
		}

		public function selectTipoSolicitud()
		{
			$sql = "SELECT * FROM tipo_pqr 
					WHERE estatus != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTipoSolicitante()
		{
			$sql = "SELECT * FROM tipo_solicitante
					WHERE status != 0  AND (id = 1 OR id = 2)";
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
	}
 ?>