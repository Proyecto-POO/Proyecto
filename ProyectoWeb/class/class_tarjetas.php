<?php

	class TarjetaCredito{

		private $codigoTarjeta;
		private $numeroTarjeta;
		private $codigo_usuario;

		public function __construct($codigoTarjeta,
					$numeroTarjeta,
					$codigo_usuario){
			$this->codigoTarjeta = $codigoTarjeta;
			$this->numeroTarjeta = $numeroTarjeta;
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getCodigoTarjeta(){
			return $this->codigoTarjeta;
		}
		public function setCodigoTarjeta($codigoTarjeta){
			$this->codigoTarjeta = $codigoTarjeta;
		}
		public function getNumeroTarjeta(){
			return $this->numeroTarjeta;
		}
		public function setNumeroTarjeta($numeroTarjeta){
			$this->numeroTarjeta = $numeroTarjeta;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}

		public static function guardarRegistroTarjeta($conexion, $nombre_usuario,$numero_tarjeta,$numero_identidad){
			$sql = sprintf("SELECT codigo_usuario, nombre_usuario
								FROM tbl_usuarios
								WHERE nombre_usuario = '%s'",
								stripslashes($nombre_usuario));
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			$sql2 = sprintf("INSERT INTO tbl_tarjeta_credito(codigo_tarjeta_credito, numero_tarjeta, codigo_usuario,numero_identidad_usuario)
			 VALUES (NULL,'%s','%s','%s')",
				    stripslashes($numero_tarjeta),
				    stripslashes($fila["codigo_usuario"]),
				    stripslashes($numero_identidad));
			$conexion->ejecutarInstruccion($sql2);
			$conexion->liberarResultado($resultado);
		}
	}
?>