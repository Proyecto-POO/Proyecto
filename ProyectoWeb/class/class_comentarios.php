<?php
	class Comentario{
		private $tituloComentario;
		private $usuario;
		private $descripcionComentario;
		private $fechaComentario;
		
		public static function guardar_comentarios($conexion, $codigo_juego,$codigo_usuario,$comentario){
			$fecha = $fecha = date("Y") . "-" . date("m") . "-" . date("d");
			/*echo $fecha;
			echo $codigo_usuario;
			echo $codigo_juego;
			echo $comentario;*/
			$sql=sprintf("INSERT INTO tbl_comentarios
				(codigo_comentario, comentario,
				 fecha_publicacion, calificacion,
				  codigo_usuario, codigo_aplicacion)
				   VALUES (NULL,'%s','%s',NULL,'%s','%s')",
			 stripcslashes($comentario),
			 stripcslashes($fecha),
			 stripcslashes($codigo_usuario),
			 stripcslashes($codigo_juego));
			echo "intruccion a ejecutar: " . $sql;
			$resultado=$conexion->ejecutarInstruccion($sql);
			if ($resultado) {
				echo "guardado con exito";
			}else{
				echo "fallo guardar";
			}
			$conexion->liberarResultado($resultado);
		}

		public static function generar_comentarios($conexion, $codigo_juego){
			$resultado = $conexion->ejecutarInstruccion('SELECT a.codigo_comentario, a.comentario,
			 a.fecha_publicacion, a.calificacion,
			  a.codigo_usuario, a.codigo_aplicacion,
			  b.nombre,b.codigo_usuario
				FROM tbl_comentarios a
				INNER JOIN tbl_usuarios b 
				ON (a.codigo_usuario=b.codigo_usuario)
				WHERE a.codigo_aplicacion='.$codigo_juego.'');
			
			while ($fila = $conexion->obtenerFila($resultado)) {
				?>
				<li>
					<div class="comment-main-level">
					<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head" style="width: 70%;">
								<h6 class="comment-name by-author"><a href="#"><?php echo $fila["nombre"]; ?></a></h6>
								<span>hace x minutos</span><br>
								<button data-toggle="tooltip" data-placement="top" title="Modificar comentario" class="btn btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
								<button data-toggle="tooltip" data-placement="top" title="Eliminar comentario" class="btn btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
								<button data-toggle="tooltip" data-placement="top" title="Te gusta este comentario" class="btn btn-sm"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
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