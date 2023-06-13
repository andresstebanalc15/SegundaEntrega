<?php 

	class EstadoModel extends Mysql
	{

		public  $ticket;


		public function __construct()
		{
			parent::__construct();
		}

		public function selectPQRSD(int $ticket){
			
			$this->ticket = $ticket;
			$requesti = '';
			$requesta = '';
			$requestt = '';

			$sql = "SELECT a.id,
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

							FROM pqr_i a
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
							WHERE a.status != 0 AND (a.codigo = '{$this->ticket}' OR a.numero = '{$this->ticket}')";
			
							$requesti = $this->select($sql);
							$request = $requesti;

			if(empty($requesti))
			{
				$sql = "SELECT a.id,
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

							FROM pqr_a a
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
							WHERE a.status != 0 AND a.codigo = '{$this->ticket}'";
				
							$requesta = $this->select($sql);
							$request = $requesta;

			}

			if(empty($requesti) && empty($requesta))
			{
				$sql = "SELECT a.id,
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

							FROM tramites a
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
							WHERE a.status != 0 AND (a.codigo = '{$this->ticket}' OR a.numero = '{$this->ticket}')";
				
							$requestt = $this->select($sql);
							$request = $requestt;

			}
			return $request;
		}

		public function selectPQRSDI(int $ticket){
			$this->ticket = $ticket;
			$requesti = '';
			$requesta = '';
			$requestt = '';

			$sql = "SELECT a.id,
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

							FROM pqr_i a
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
							WHERE a.status != 0 AND (a.codigo = '{$this->ticket}' OR a.numero = '{$this->ticket}')";
			
							$requesti = $this->select_all($sql);
							$request = $requesti;

			if(empty($requesti))
			{
				$sql = "SELECT a.id,
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

							FROM pqr_a a
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
							WHERE a.status != 0 AND a.codigo = '{$this->ticket}'";
				
							$requesta = $this->select_all($sql);
							$request = $requesta;

			}

			if(empty($requesti) && empty($requesta))
			{
				$sql = "SELECT a.id,
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

							FROM tramites a
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
							WHERE a.status != 0 AND (a.codigo = '{$this->ticket}' OR a.numero = '{$this->ticket}')";
				
							$requestt = $this->select_all($sql);
							$request = $requestt;

			}
			return $request;
		}
	}
 ?>