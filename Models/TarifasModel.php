<?php 

	class TarifasModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTarifas()
		{
			$sql = "SELECT * FROM tarifas 
					WHERE status != 0 ORDER BY id DESC";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>