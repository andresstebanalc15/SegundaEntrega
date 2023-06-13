<?php 
class BloqueModel extends Mysql
{
	private $intIdBloque;
	private $strNombre;
	private $txtIcono;
	private $strURL;
	private $intStatus;

	public function __construct()
	{
		parent::__construct();
	}	

	public function insertBloque(string $nombre, string $icono, string $URL, int $status){

		$this->strNombre = $nombre;
		$this->strURL = $URL;
		$this->intStatus = $status;
		$this->strIcono = $icono;

		$return = 0;
		$query_insert  = "INSERT INTO bloques(nombre,icon,url,status) 
							  VALUES(?,?,?,?)";
    	$arrData = array($this->strNombre,
    					$this->strIcono,
						$this->strURL,
						$this->intStatus);
    	$request_insert = $this->insert($query_insert,$arrData);
    	$return = $request_insert;
    	return $return;
	}

	public function selectBloques()
	{
		$sql = "SELECT iddiv,nombre,icon,url,status 
				FROM bloques
				WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectBloque(int $idbloque){
		$this->intIdBloque = $idbloque;
		$sql = "SELECT * 
				FROM bloques
				WHERE status = 1 AND iddiv = $this->intIdBloque";
		$request = $this->select($sql);
		return $request;
	}

	public function updateBloque(int $idbloque, string $nombre, string $icono, string $URL, int $status){

		$this->intIdBloque = $idbloque;
		$this->strNombre = $nombre;
		$this->strURL = $URL;
		$this->intStatus = $status;
		$this->strIcono = $icono;

			$sql = "UPDATE bloques SET nombre=?, icon=?, url=?, status=? 
					WHERE iddiv = $this->intIdBloque ";
			$arrData = array($this->strNombre,
		    					$this->strIcono,
								$this->strURL,
								$this->intStatus);

		$request = $this->update($sql,$arrData);
		
		return $request;
	}

	public function deleteBloque(int $idbloque)
	{
		$this->intIdBloque = $idbloque;
		$sql = "UPDATE bloques SET status = ? WHERE iddiv = $this->intIdBloque ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}

 ?>