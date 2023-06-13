<?php 

	class TercerosModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectTarifas()
		{
			$sql = "SELECT t.id,
							t.fecha,
							t.pqr_i,
							t.texto,
							t.adjunto,
							a.codigo,
							TIMESTAMPDIFF(DAY,t.fecha,NOW()) AS dias
				FROM trazabilidad_a t
				INNER JOIN pqr_a a
				ON t.pqr_i = a.id 
				WHERE (t.estatus = 1 AND t.tipo_t = 3) AND TIMESTAMPDIFF(DAY,t.fecha,NOW()) < 5";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>