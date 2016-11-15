<?php

	class VentaDiaria{

		private $codigoVenta;
		private $fechaVenta;
		private $codigoUsuario;
		private $codigoJuego;

		public function __construct($codigoVenta,
					$fechaVenta,
					$codigoUsuario,
					$codigoJuego){
			$this->codigoVenta = $codigoVenta;
			$this->fechaVenta = $fechaVenta;
			$this->codigoUsuario = $codigoUsuario;
			$this->codigoJuego = $codigoJuego;
		}
		public function getCodigoVenta(){
			return $this->codigoVenta;
		}
		public function setCodigoVenta($codigoVenta){
			$this->codigoVenta = $codigoVenta;
		}
		public function getFechaVenta(){
			return $this->fechaVenta;
		}
		public function setFechaVenta($fechaVenta){
			$this->fechaVenta = $fechaVenta;
		}
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		public function getCodigoJuego(){
			return $this->codigoJuego;
		}
		public function setCodigoJuego($codigoJuego){
			$this->codigoJuego = $codigoJuego;
		}

		public static function guardarRegistroVenta($conexion,$nombre_usuario,$codigo_juego){
			$fecha = $fecha = date("Y") . "-" . date("m") . "-" . date("d");
			echo "nombre usuario recibido en la funcion guardarRegistroVenta: " . $nombre_usuario . " codigo recibido : " . $codigo_juego;
			$sql = sprintf("SELECT codigo_usuario, nombre_usuario
								FROM tbl_usuarios
								WHERE nombre_usuario = '%s'",stripslashes($nombre_usuario));
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);


			$sql2 = sprintf("INSERT INTO tbl_venta_diaria
					(codigo_venta_diaria, fecha_venta,
					codigo_usuario, codigo_juego)
				 	VALUES
				    (NULL,'%s','%s','%s')",
				    stripslashes($fecha),
				    stripslashes($fila["codigo_usuario"]),
				    stripslashes($codigo_juego));
			$conexion->ejecutarInstruccion($sql2);
			$conexion->liberarResultado($resultado);
		}

	}
?>