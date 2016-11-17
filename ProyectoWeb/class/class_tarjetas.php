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

		public static function guardarTarjeta($conexion, $nombreUsuario,$numeroTarjeta,$vencimiento, $codSeguridad){
			$sql = sprintf("SELECT codigo_usuario, nombre_usuario
								FROM tbl_usuarios
								WHERE nombre_usuario = '%s'",
								stripslashes($nombreUsuario));
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			$sql2 = sprintf("INSERT INTO tbl_tarjeta_credito(codigo_tarjeta_credito, codigo_usuario, numero_tarjeta, seguridad_tarjeta, fecha_vencimiento)
			 VALUES (NULL,'%s','%s','%s','%s')",
			 		 stripslashes($fila["codigo_usuario"]),
				     stripslashes($numeroTarjeta),
				     stripslashes($codSeguridad),
				     stripslashes($vencimiento));
			$conexion->ejecutarInstruccion($sql2);
			$conexion->liberarResultado($resultado);
		}

		public static function guardarTransaccion($conexion, $fecha, $monto){
			$sql = sprintf("INSERT INTO tbl_venta_diaria
										(
										codigo_venta_diaria, 
										fecha_venta, 
										monto
										) 
							VALUES (NULL,'%s','%s')",
							stripslashes($fecha),
							stripslashes($monto));

			$resultado = $conexion->ejecutarInstruccion($sql);
			$conexion->liberarResultado($resultado);
		}

		public static function claveProducto($conexion, $codigoJuego){
			$sql = sprintf("
				           SELECT 
				           		codigo_juego, 
				           		codigo_desarrollador, 
				           		codigo_esrb, 
				           		nombre_juego, 
				           		descripcion, 
				           		fecha_publicacion, 
				           		url, 
				           		portada, 
				           		calificacion, 
				           		precio, 
				           		clave_producto 

			           		FROM tbl_juegos 
			           		WHERE codigo_juego = '%s'",

			           		stripslashes($codigoJuego)
						);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			?>
				<div><br><br><br><br>
					<?php echo $fila['clave_producto']; ?>
					<br><br><br><br><br>
				</div>
			<?php

		
			$conexion->liberarResultado($resultado);

		}

		public static function descarga($conexion, $codigoJuego){
			$sql = sprintf("
				           SELECT 
				           		codigo_juego, 
				           		codigo_desarrollador, 
				           		codigo_esrb, 
				           		nombre_juego, 
				           		descripcion, 
				           		fecha_publicacion, 
				           		url, 
				           		portada, 
				           		calificacion, 
				           		precio, 
				           		clave_producto 

			           		FROM tbl_juegos 
			           		WHERE codigo_juego = '%s'",

			           		stripslashes($codigoJuego)
						);
			$resultado = $conexion->ejecutarInstruccion($sql);
			$fila = $conexion->obtenerFila($resultado);

			?>
				<div><br><br><br><br>
					<a class="btn btn-success" href="<?php echo $fila['url']; ?>" download style="padding: 10px 30px;"><h3>Descargar <?php echo " ".$fila['nombre_juego']; ?></h3></a>
					<br><br><br><br><br>
				</div>
			<?php

		
			$conexion->liberarResultado($resultado);

		}
	}
?>