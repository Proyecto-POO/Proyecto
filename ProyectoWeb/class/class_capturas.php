<?php

	class capturas{

		private $codigoJuego;
		private $UrlCapturas;

		public function __construct($codigoJuego,
					$UrlCapturas){
			$this->codigoJuego = $codigoJuego;
			$this->UrlCapturas = $UrlCapturas;
		}
		public function getCodigoJuego(){
			return $this->codigoJuego;
		}
		public function setCodigoJuego($codigoJuego){
			$this->codigoJuego = $codigoJuego;
		}
		public function getUrlCapturas(){
			return $this->UrlCapturas;
		}
		public function setUrlCapturas($UrlCapturas){
			$this->UrlCapturas = $UrlCapturas;
		}
		public function toString(){
			return "CodigoJuego: " . $this->codigoJuego . 
				" UrlCapturas: " . $this->UrlCapturas;
		}

		public static function guardarCapturas($conexion){
			$sqlCapturas = sprintf("
									INSERT INTO tbl_capturas(
															codigo_capturas, 
															codigo_juego, 
															url_captura
															) VALUES (NULL,'%s','%s')",
										stripslashes($this->codigoJuego),
										stripslashes($this->UrlCapturas)										
								);
			$respuesta = $conexion->ejecutarInstruccion($sqlCapturas);
		}
	}
?>