<?php 

	class ProveedorModel extends Mysql
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
		private $intCalidad;
		private $intCantidad;
		private $intPlazo;
		private $intPrecios;
		private $intAdministrativo;
		private $intPostventa;
		private $intIdNote;
		private $intCritico;


		public function __construct()
		{
			parent::__construct();
		}

		public function insertProveedor(int $usuario, int $tipodocumento, int $nit, int $tipoPersona, string $razon, string $nombrea, string $nombreb, string $apellidoa, string $apellidob, int $departamento, int $municipio, int $corregimiento, string $direccion, string $barrio, string $telefono, string $email, string $hv, string $ce, string $cedula, string $rut, string $antecedentes, int $status, int $critico){

			
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
			$this->intStatus = $status;
			$this->intCritico = $critico;

			$return = 0;
			$sql = "SELECT * FROM proveedor WHERE nit = '{$this->strNit}' AND estado != 0";
			$request = $this->select_all($sql);

			if(empty($request))
			{
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
														critico,
														user)
								VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
								$this->intCritico,
								$this->intidusuario);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectProveedor()
		{
			$sql = "SELECT p.id,p.tipodoc,do.identificacion,p.nit,p.tipo, ts.tipo AS solicitante,p.razon,p.primer,p.segundo,p.apellidoa,p.apellidob,p.estado,p.status,p.departamento,d.departamento AS nomdep, p.municipio AS idmunicipio, m.municipio, p.corregimiento AS idcorregimiento, c.corregimiento,p.direccion,p.telefono,p.email, p.barrio, p.hv, p.ce, p.cedula, p.rut, p.antecedentes,p.critico, p.dateadd, u.nombres
					FROM proveedor p INNER JOIN departamentos d ON p.departamento = d.id_departamento INNER JOIN municipios m ON p.municipio = m.id_municipio INNER JOIN corregimiento c ON c.id_corregimiento = p.corregimiento INNER JOIN persona u ON p.user = u.idpersona INNER JOIN tipo_identificacion do ON p.tipodoc = do.id INNER JOIN tipo_solicitante ts ON p.tipo = ts.id
					WHERE p.estado != 0 ORDER BY p.dateadd ASC";
					$request = $this->select_all($sql);
					return $request;
		}

		public function selectProveedores(int $idproveedor){
			$this->intidproveedor = $idproveedor;
			$sql = "SELECT p.id,p.tipodoc,do.identificacion,p.nit,p.tipo, ts.tipo AS solicitante,p.razon,p.primer,p.segundo,p.apellidoa,p.apellidob,p.estado,p.status,p.departamento,d.departamento AS nomdep, p.municipio AS idmunicipio, m.municipio, p.corregimiento AS idcorregimiento, c.corregimiento,p.direccion,p.telefono,p.email, p.barrio, p.hv, p.ce, p.cedula, p.rut, p.antecedentes,p.critico, p.dateadd, u.nombres
					FROM proveedor p INNER JOIN departamentos d ON p.departamento = d.id_departamento INNER JOIN municipios m ON p.municipio = m.id_municipio INNER JOIN corregimiento c ON c.id_corregimiento = p.corregimiento INNER JOIN persona u ON p.user = u.idpersona INNER JOIN tipo_identificacion do ON p.tipodoc = do.id INNER JOIN tipo_solicitante ts ON p.tipo = ts.id
					WHERE p.estado != 0
					AND p.id = $this->intidproveedor ORDER BY p.dateadd ASC";
			$request = $this->select($sql);
			return $request;
		}

		public function updateProveedor(int $idproveedor, int $usuario, int $tipodocumento, int $nit, int $tipoPersona, string $razon, string $nombrea, string $nombreb, string $apellidoa, string $apellidob, int $departamento, int $municipio, int $corregimiento, string $direccion, string $barrio, string $telefono, string $email, int $status, int $critico, string $date){

			$this->intidproveedor = $idproveedor;
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
			$this->intStatus = $status;
			$this->intCritico = $critico;
			$this->strdateadd = $date;

			$sql = "SELECT * FROM proveedor WHERE (nit = '{$this->strNit}' AND id != $this->intidproveedor)";
			$request = $this->select_all($sql);

			if(empty($request))
			{

					$sql = "UPDATE proveedor SET tipodoc=?, nit=?, tipo=?, razon=?, primer=?, segundo=?, apellidoa=?, apellidob=?, departamento=?, municipio=?, corregimiento=?, direccion=?, telefono=?, email=?, barrio=?, status=?, critico=?, dateadd=?, user=?   
							WHERE id = $this->intidproveedor ";
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
										$this->intStatus,
										$this->intCritico,
										$this->strdateadd,
										$this->intidusuario);
				
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;		
		}

		public function UpdateHV(int $idproveedor, string $hv){
			$this->intidproveedor = $idproveedor;
			$this->strhv = $hv;

			$sql = "UPDATE proveedor SET hv=? 
							WHERE id = $this->intidproveedor ";
					$arrData = array($this->strhv);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function UpdateCE(int $idproveedor, string $ce){
			$this->intidproveedor = $idproveedor;
			$this->strce = $ce;

			$sql = "UPDATE proveedor SET ce=? 
							WHERE id = $this->intidproveedor ";
					$arrData = array($this->strce);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function UpdateCedula(int $idproveedor, string $cedula){
			$this->intidproveedor = $idproveedor;
			$this->strcedula = $cedula;

			$sql = "UPDATE proveedor SET cedula=? 
							WHERE id = $this->intidproveedor ";
					$arrData = array($this->strcedula);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function UpdateRut(int $idproveedor, string $rut){
			$this->intidproveedor = $idproveedor;
			$this->strrut = $rut;

			$sql = "UPDATE proveedor SET rut=? 
							WHERE id = $this->intidproveedor ";
					$arrData = array($this->strrut);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function UpdateAntecedentes(int $idproveedor, string $antecedentes){
			$this->intidproveedor = $idproveedor;
			$this->strantecedentes = $antecedentes;

			$sql = "UPDATE proveedor SET antecedentes=? 
							WHERE id = $this->intidproveedor ";
					$arrData = array($this->strantecedentes);
				
				$request = $this->update($sql,$arrData);
				return $request;
		}

		public function deleteProveedor(int $proveedor)
		{
			$this->intidproveedor = $proveedor;
			$sql = "UPDATE proveedor SET estado = ? WHERE id = $this->intidproveedor ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>