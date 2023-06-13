<?php 

	class SliderModel extends Mysql
	{
		
		public $intIdslider;
		public $strPortada;
		public $intTipo;
		public $strSlider;
		public $strDescipcion;
		public $strNombreUrl;
		public $strUrl;
		public $intStatus;
		public $strVideo;
		public $strUrlVideo;

		public function __construct()
		{
			parent::__construct();
		}

		public function inserslider(string $nombre, string $descripcion, string $enlace, string $url, int $status, string $video, string $urlvideo, string $portada){

			$return = 0;
			$this->intTipo = 1;
			$this->strSlider = $nombre;
			$this->strDescipcion = $descripcion;
			$this->strNombreUrl = $enlace;
			$this->strUrl = $url;
			$this->intStatus = $status;
			$this->strVideo = $video;
			$this->strUrlVideo = $urlvideo;
			$this->strPortada = $portada;

			$sql = "SELECT * FROM imagenes WHERE nombre = '{$this->strSlider}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO imagenes(tipo_imagen,nombre,descripcion,portada,enlace,enlace_url,video,video_url,status) VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->intTipo, 
								 $this->strSlider, 
								 $this->strDescipcion, 
								 $this->strPortada,
								 $this->strNombreUrl,
								 $this->strUrl,
								 $this->strVideo,
								 $this->strUrlVideo,
								 $this->intStatus);

	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectSlider()
		{
			$sql = "SELECT * FROM imagenes 
					WHERE status != 0 AND tipo_imagen = 1";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectSliders(int $idslider){
			$this->intIdslider = $idslider;
			$sql = "SELECT * FROM imagenes
					WHERE idimg = $this->intIdslider";
			$request = $this->select($sql);
			return $request;
		}

		public function updateSlider(int $idslider, string $nombre, string $descripcion, string $enlace, string $url, int $status, string $video, string $urlvideo, string $portada){
			$this->intIdslider = $idslider;
			$this->strSlider = $nombre;
			$this->strDescipcion = $descripcion;
			$this->strNombreUrl = $enlace;
			$this->strUrl = $url;
			$this->intStatus = $status;
			$this->strVideo = $video;
			$this->strUrlVideo = $urlvideo;
			$this->strPortada = $portada;

			$sql = "SELECT * FROM imagenes WHERE nombre = '{$this->strSlider}' AND idimg != $this->intIdslider";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE imagenes SET nombre = ?, descripcion = ?, portada = ?, enlace=?, enlace_url = ?, video = ?, video_url = ?, status = ? WHERE idimg = $this->intIdslider ";
				$arrData = array($this->strSlider, 
								 $this->strDescipcion, 
								 $this->strPortada,
								 $this->strNombreUrl,
								 $this->strUrl,
								 $this->strVideo,
								 $this->strUrlVideo,
								 $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteSlider(int $idslider)
		{
			$this->intIdslider = $idslider;
			$sql = "SELECT * FROM imagenes WHERE idimg = 3 AND idimg = $this->intIdslider";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE imagenes SET status = ? WHERE idimg = $this->intIdslider ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}	


	}
 ?>