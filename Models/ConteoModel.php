<?php 
class ConteoModel extends Mysql
{
	private $intIdConteo;
	private $txtNumero;
	private $txtStrong;
	private $txtSmall;

	public function __construct()
	{
		parent::__construct();
	}	

	public function insertConteo(int $numero, string $strong, string $small){

		$this->txtNumero = $numero;
		$this->txtStrong = $strong;
		$this->txtSmall = $small;

		$return = 0;
		$query_insert  = "INSERT INTO contador(numero,strong,small) 
							  VALUES(?,?,?)";
    	$arrData = array($this->txtNumero,
    					$this->txtStrong,
						$this->txtSmall);
    	$request_insert = $this->insert($query_insert,$arrData);
    	$return = $request_insert;
    	return $return;
	}

	public function selectConteos()
	{
		$sql = "SELECT * 
				FROM contador
				WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectConteo(int $idconteo){
		$this->intIdConteo = $idconteo;
		$sql = "SELECT * 
				FROM contador
				WHERE status = 1 AND id = $this->intIdConteo";
		$request = $this->select($sql);
		return $request;
	}

	public function updateConteo(int $idconteo, int $numero, string $strong, string $small){

		$this->intIdConteo = $idconteo;
		$this->txtNumero = $numero;
		$this->txtStrong = $strong;
		$this->txtSmall = $small;;

			$sql = "UPDATE contador SET numero=?, strong=?, small=? 
					WHERE id = $this->intIdConteo ";
			$arrData = array($this->txtNumero,
		    					$this->txtStrong,
								$this->txtSmall);

		$request = $this->update($sql,$arrData);
		
		return $request;
	}

	public function deleteConteo(int $idconteo)
	{
		$this->intIdConteo = $idconteo;
		$sql = "UPDATE contador SET status = ? WHERE id = $this->intIdConteo ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}

 ?>