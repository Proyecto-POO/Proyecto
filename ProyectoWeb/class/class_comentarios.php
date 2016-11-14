<?php
	class Comentario{
		private $tituloComentario;
		private $usuario;
		private $descripcionComentario;
		private $fechaComentario;

		public static function eliminarComentario($conexion, $codigoComentario){
			$sql = sprintf("
							DELETE FROM tbl_comentarios
							WHERE codigo_comentarios = '%s'
						   ",

			stripcslashes($codigoComentario));

			$resultado=$conexion->ejecutarInstruccion($sql);
			echo "esta es la instruccion sql: " + $sql;
			$conexion->liberarResultado($resultado);
		}
		
		public static function guardar_comentarios($conexion, $codigo_juego,$nombre_usuario,$comentario){
			$fecha = $fecha = date("Y") . "-" . date("m") . "-" . date("d");
			
			$sql2 = sprintf("SELECT codigo_usuario, nombre_usuario
							 FROM tbl_usuarios
							  WHERE nombre_usuario = '%s'",
							  stripslashes($nombre_usuario));

			$resultado2 = $conexion->ejecutarInstruccion($sql2);
			$filaNombre = $conexion->obtenerFila($resultado2);


			$sql=sprintf("INSERT INTO tbl_comentarios 
									( 
									codigo_comentarios , 
									codigo_usuario , 
									codigo_juego , 
									comentario , 
									fecha_comentario 
									) VALUES (NULL,'%s','%s','%s','%s')
									",
				
			 stripcslashes($filaNombre["codigo_usuario"]),
			 stripcslashes($codigo_juego),
			 stripcslashes($comentario),
			 stripcslashes($fecha)
			 );
			
			$resultado=$conexion->ejecutarInstruccion($sql);
			
			$conexion->liberarResultado($sql);
		}

		public static function generar_comentarios($conexion, $codigo_juego, $nombre_usuario){
			$sql = sprintf("SELECT 
						a.codigo_comentarios, 
						a.codigo_usuario,
						 a.codigo_juego,
						 a.comentario,
						 a.fecha_comentario,
						  b.nombre,
						  b.codigo_usuario,
						  b.nombre_usuario
				FROM tbl_comentarios a
				INNER JOIN tbl_usuarios b 
				ON (a.codigo_usuario=b.codigo_usuario)
				WHERE a.codigo_juego='%s'",stripslashes($codigo_juego));
			$resultado = $conexion->ejecutarInstruccion($sql);
			
			while ($fila = $conexion->obtenerFila($resultado)) {
				?>
				<li>
					<div class="comment-main-level">
					<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head" style="width: 70%;">
								<h6 class="comment-name by-author"><a href="#"><?php echo $fila["nombre_usuario"]; ?></a></h6>
								<span>hace 1000000 minutos</span>
								<?php if ($fila["nombre_usuario"]==$nombre_usuario) {?>
									<button onclick="eliminarComentario(<?php echo $fila["codigo_comentarios"]; ?>, <?php echo $fila["codigo_juego"]; ?>,'<?php echo $nombre_usuario; ?>');" data-toggle="tooltip" data-placement="top" title="Eliminar comentario" class="btn btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
								<?php } ?> 
								<span style="float: right;"><?php echo $fila['fecha_comentario'];?></span>
							</div>
							<div class="comment-content" style="width: 70%;">
							<?php 
								echo $fila["comentario"];
							?>
							</div>
						</div>
					</div>
						<!-- Respuestas de los comentarios -->
				</li>
			<?php
			}
			$conexion->liberarResultado($resultado);
		}

		public function __construct($tituloComentario,
					$usuario,
					$descripcionComentario,
					$fechaComentario){
			$this->tituloComentario = $tituloComentario;
			$this->usuario = $usuario;
			$this->descripcionComentario = $descripcionComentario;
			$this->fechaComentario = $fechaComentario;
		}
		public function getTituloComentario(){
			return $this->tituloComentario;
		}
		public function setTituloComentario($tituloComentario){
			$this->tituloComentario = $tituloComentario;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getDescripcionComentario(){
			return $this->descripcionComentario;
		}
		public function setDescripcionComentario($descripcionComentario){
			$this->descripcionComentario = $descripcionComentario;
		}
		public function getFechaComentario(){
			return $this->fechaComentario;
		}
		public function setFechaComentario($fechaComentario){
			$this->fechaComentario = $fechaComentario;
		}
		public function toString(){
			return "TituloComentario: " . $this->tituloComentario . 
				" Usuario: " . $this->usuario . 
				" DescripcionComentario: " . $this->descripcionComentario . 
				" FechaComentario: " . $this->fechaComentario;
		}
	}
?>