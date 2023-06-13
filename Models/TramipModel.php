<?php 

	class TramipModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function cantIdentificacion(){
			$sql = "SELECT COUNT(*) AS total FROM tramites WHERE status != 0";
			$request = $this->select($sql);
			$total = $request['total'];
			return $total;
		}

		public function cantISG(){
			$sql = "SELECT COUNT(*) AS total FROM tramites WHERE status = 1";
			$request = $this->select($sql);
			$total = $request['total'];
			return $total;
		}

		public function cantIR(){
			$sql = "SELECT COUNT(*) AS total FROM tramites WHERE status = 2";
			$request = $this->select($sql);
			$total = $request['total'];
			return $total;
		}

		public function cantIF(){
			$sql = "SELECT COUNT(*) AS total FROM tramites WHERE status = 3";
			$request = $this->select($sql);
			$total = $request['total'];
			return $total;
		}

		public function selectTipoPQRIMes(int $anio, int $mes){

			$sql = "SELECT a.solicitud, s.tipo_pqr, COUNT(a.solicitud) as cantidad 
					FROM tramites a 
					INNER JOIN tipo_pqr s 
					ON a.solicitud = s.id 
					WHERE MONTH(a.fecha) = $mes AND YEAR(a.fecha) = $anio GROUP BY s.id";
			$pqri = $this->select_all($sql);
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'tipospqrsi' => $pqri );
			return $arrData;
		}

		public function selectIMes(int $anio, int $mes){
			$totalPQRIMes = 0;
			$arrPQRIDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaPQRI = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha) AS dia, COUNT(id) AS cantidad
						FROM tramites 
						WHERE DATE(fecha) = '$fechaPQRI' AND status != 0";
				$PQRIDia = $this->select($sql);
				$PQRIDia['dia'] = $n_dia;
				$PQRIDia['total'] = $PQRIDia['cantidad'] == "" ? 0 : $PQRIDia['cantidad'];
				$totalPQRIMes += $PQRIDia['total'];
				array_push($arrPQRIDias, $PQRIDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'total' => $totalPQRIMes, 'PQRI' => $arrPQRIDias );
			return $arrData;
		}

		public function selectVMes(int $anio, int $mes){
			$totalPQRIMes = 0;
			$arrPQRIDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaPQRI = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha) AS dia, COUNT(id) AS cantidad
						FROM tramites 
						WHERE (DATE(fecha) = '$fechaPQRI' AND status != 0) AND solicitud = 11";
				$PQRIDia = $this->select($sql);
				$PQRIDia['dia'] = $n_dia;
				$PQRIDia['total'] = $PQRIDia['cantidad'] == "" ? 0 : $PQRIDia['cantidad'];
				$totalPQRIMes += $PQRIDia['total'];
				array_push($arrPQRIDias, $PQRIDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'total' => $totalPQRIMes, 'PQRI' => $arrPQRIDias );
			return $arrData;
		}

		public function selectRMes(int $anio, int $mes){
			$totalPQRIMes = 0;
			$arrPQRIDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaPQRI = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha) AS dia, COUNT(id) AS cantidad
						FROM tramites 
						WHERE (DATE(fecha) = '$fechaPQRI' AND status != 0) AND solicitud = 12";
				$PQRIDia = $this->select($sql);
				$PQRIDia['dia'] = $n_dia;
				$PQRIDia['total'] = $PQRIDia['cantidad'] == "" ? 0 : $PQRIDia['cantidad'];
				$totalPQRIMes += $PQRIDia['total'];
				array_push($arrPQRIDias, $PQRIDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'total' => $totalPQRIMes, 'PQRI' => $arrPQRIDias );
			return $arrData;
		}

		public function selectRCDMes(int $anio, int $mes){
			$totalPQRIMes = 0;
			$arrPQRIDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaPQRI = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha) AS dia, COUNT(id) AS cantidad
						FROM tramites 
						WHERE (DATE(fecha) = '$fechaPQRI' AND status != 0) AND solicitud = 13";
				$PQRIDia = $this->select($sql);
				$PQRIDia['dia'] = $n_dia;
				$PQRIDia['total'] = $PQRIDia['cantidad'] == "" ? 0 : $PQRIDia['cantidad'];
				$totalPQRIMes += $PQRIDia['total'];
				array_push($arrPQRIDias, $PQRIDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'total' => $totalPQRIMes, 'PQRI' => $arrPQRIDias );
			return $arrData;
		}

		public function selectVDMes(int $anio, int $mes){
			$totalPQRIMes = 0;
			$arrPQRIDias = array();
			$dias = cal_days_in_month(CAL_GREGORIAN,$mes, $anio);
			$n_dia = 1;
			for ($i=0; $i < $dias ; $i++) { 
				$date = date_create($anio."-".$mes."-".$n_dia);
				$fechaPQRI = date_format($date,"Y-m-d");
				$sql = "SELECT DAY(fecha) AS dia, COUNT(id) AS cantidad
						FROM tramites 
						WHERE (DATE(fecha) = '$fechaPQRI' AND status != 0) AND solicitud = 14";
				$PQRIDia = $this->select($sql);
				$PQRIDia['dia'] = $n_dia;
				$PQRIDia['total'] = $PQRIDia['cantidad'] == "" ? 0 : $PQRIDia['cantidad'];
				$totalPQRIMes += $PQRIDia['total'];
				array_push($arrPQRIDias, $PQRIDia);
				$n_dia++;
			}
			$meses = Meses();
			$arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'total' => $totalPQRIMes, 'PQRI' => $arrPQRIDias );
			return $arrData;
		}
	}
 ?>