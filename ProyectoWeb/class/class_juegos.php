<?php

	class Juegos{

		private $desarrollador;
		private $esrb;
		private $nombreJuego;
		private $descripcion;
		private $fechaPublicacion;
		private $url_iso;
		private $portada;
		private $calificacion;
		private $precio;
		private $categoria;

		public function __construct($desarrollador,
					$esrb,
					$nombreJuego,
					$descripcion,
					$fechaPublicacion,
					$url_iso,
					$portada,
					$calificacion,
					$precio,
					$categoria){
			$this->desarrollador = $desarrollador;
			$this->esrb = $esrb;
			$this->nombreJuego = $nombreJuego;
			$this->descripcion = $descripcion;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->url_iso = $url_iso;
			$this->portada = $portada;
			$this->calificacion = $calificacion;
			$this->precio = $precio;
			$this->categoria = $categoria;
		}
		public function getDesarrollador(){
			return $this->desarrollador;
		}
		public function setDesarrollador($desarrollador){
			$this->desarrollador = $desarrollador;
		}
		public function getEsrb(){
			return $this->esrb;
		}
		public function setEsrb($esrb){
			$this->esrb = $esrb;
		}
		public function getNombreJuego(){
			return $this->nombreJuego;
		}
		public function setNombreJuego($nombreJuego){
			$this->nombreJuego = $nombreJuego;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getFechaPublicacion(){
			return $this->fechaPublicacion;
		}
		public function setFechaPublicacion($fechaPublicacion){
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function getUrl_iso(){
			return $this->url_iso;
		}
		public function setUrl_iso($url_iso){
			$this->url_iso = $url_iso;
		}
		public function getPortada(){
			return $this->portada;
		}
		public function setPortada($portada){
			$this->portada = $portada;
		}
		public function getCalificacion(){
			return $this->calificacion;
		}
		public function setCalificacion($calificacion){
			$this->calificacion = $calificacion;
		}
		public function getPrecio(){
			return $this->precio;
		}
		public function setPrecio($precio){
			$this->precio = $precio;
		}
		public function toString(){
			return "Desarrollador: " . $this->desarrollador . 
				" Especificaciones: " . $this->especificaciones . 
				" Esrb: " . $this->esrb . 
				" NombreJuego: " . $this->nombreJuego . 
				" Descripcion: " . $this->descripcion . 
				" FechaPublicacion: " . $this->fechaPublicacion . 
				" Url_iso: " . $this->url_iso . 
				" Portada: " . $this->portada . 
				" Calificacion: " . $this->calificacion . 
				" Precio: " . $this->precio;
		}

		public static function generacionTarjetas($conexion){
			$tarjetas = $conexion->ejecutarInstruccion('
						SELECT 
								codigo_juego, 
								codigo_desarrollador,
								codigo_esrb, nombre_juego, 
								descripcion, 
								fecha_publicacion, 
								url, portada, 
								calificacion, 
								precio FROM tbl_juegos 
				');

			while ($fila_tarjetas = $conexion->obtenerFila($tarjetas)) {
				?>
	             <a href="mostrar_informacion_juegos.php?codigoJuego=<?php echo $fila_tarjetas["codigo_juego"]; ?>"> <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 row-divisor-bottom">
	                <div class="well hovereffect">
	                    <img id='img-<?php echo $fila_tarjetas["nombre_juego"]; ?>' class='img img-responsive' src='<?php echo $fila_tarjetas["portada"]; ?>' alt='Portada'>
	                        <div class="overlay">
	                            <h2><b><?php echo $fila_tarjetas["nombre_juego"]; ?></b></h2>
	                             <!-- <img class="img img-rounded" src="img/steam-icono.jpg" style="width: 50px; height: 35px;"> -->
	                             <br>
	                             <?php for ($j=0; $j < $fila_tarjetas["calificacion"]  ; $j++) { ?>
	                                  <span class="glyphicon glyphicon-star" style="color:#f0ad4e;"></span>
	                              <?php } ?>
	                            <br>
			                    <p>
			                      <b>Desde:<br><?php echo $fila_tarjetas["precio"]; ?></b><br>
			                    </p>
	                    
	                        </div>
	                </div>
	              </div>
	            </a>

	            <?php
	        }
	        $conexion->liberarResultado($tarjetas);
	            
		}

		public static function obtenerTarjetasEliminar($conexion){
			$tarjetasEliminar = $conexion->ejecutarInstruccion('
						SELECT 
								codigo_juego, 
								codigo_desarrollador,
								codigo_esrb, nombre_juego, 
								descripcion, 
								fecha_publicacion, 
								url, portada, 
								calificacion, 
								precio FROM tbl_juegos 
				');

			while ($fila_tarjetas_eliminar = $conexion->obtenerFila($tarjetasEliminar)) {
				?>
				<div class="rowglyphicon-thumbs-up">
		            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 row-divisor-bottom card-container ">
		                <div class="well hovereffect card-profile ">
		                    <img id='img-<?php echo $fila_tarjetas_eliminar["nombre_juego"]; ?>' class='img img-responsive' src='<?php echo $fila_tarjetas_eliminar["portada"]; ?>' alt='Portada'>
		                        <div class="overlay">
		                            <h2><b><?php echo $fila_tarjetas_eliminar["nombre_juego"]; ?></b></h2>
		                             <br>
		                              <button type="button" class="btn btn-danger"  title="Eliminar <?php echo $fila_tarjetas_eliminar['nombre_juego']; ?>" style="position: center;">
	                                        <span class="glyphicon glyphicon-trash" style="font-size: 200%" aria-hidden="true"></span>
	                                 </button>
		                        </div>
		                </div>
		              </div>
		         </div>

	            <?php
	        }
	        $conexion->liberarResultado($tarjetasEliminar);
		}

		public static function obtenerMasValorados($conexion){
			$masValorados = $conexion->ejecutarInstruccion('
					SELECT 
							codigo_juego, 
							codigo_desarrollador, 
							codigo_esrb, 
							nombre_juego, 
							descripcion, 
							fecha_publicacion, 
							url, portada, 
							calificacion, 
							precio 
							FROM tbl_juegos 
							WHERE calificacion = 5
				');
			$opcion = 0;
			?>
				<div class="col-lg-8 col-md-9 col-lg-offset-2 col-md-offset-2">
		            <h5 class="titulo">Lo Mas Valorados</h5>
		            <div id="div-masComprados" class="carousel slide" data-ride="carousel">
		                <div class="carousel-inner" role="listbox">
			<?php
			while ($fila_masValorados = $conexion->obtenerFila($masValorados)) {
				if ($opcion==0) {
			?>
						    <div class="item active">
		                        <img class="img img-responsive" src="<?php echo $fila_masValorados["portada"]; ?>" alt="">
		                        <div class="carousel-caption">
		                          <h4><?php echo $fila_masValorados["nombre_juego"]; ?></h4>
		                        </div>
		                     </div>
				<?php
					$opcion++;
				}else{
				?>
							<div class="item">
		                        <img class="img img-responsive" src="<?php echo $fila_masValorados["portada"]; ?>" alt="">
		                        <div class="carousel-caption">
		                            <h4><?php echo $fila_masValorados["nombre_juego"]; ?></h4>
		                        </div>
		                     </div>
				<?php
				}
			}
				?>		
						</div>

		                  <a class="left carousel-control" href="#div-masComprados" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hiden="true"></span></a>

		                  <a class="right carousel-control" href="#div-masComprados" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hiden="true"></span></a>

					</div>
				</div>                 
			<?php			
			$conexion->liberarResultado($masValorados);
		}

		public static function generarESRB($conexion){
			$resultado = $conexion->ejecutarInstruccion(
				'SELECT codigo_esrb, 
						tipo_esrb,
						icono 
				FROM tbl_esrb');

			echo "<select name='slc-esrb' id='slc-esrb' class='form-control' style='height: 30px;'>";
			while ($fila = $conexion->obtenerFila($resultado)) {
				echo "<option value='".$fila["codigo_esrb"]."'>
				".$fila["tipo_esrb"]."</option>";
			}
			echo "</select>";
			$conexion->liberarResultado($resultado);
		}

		public function guardarJuego($conexion){
			$sql = sprintf("INSERT INTO tbl_juegos(
					codigo_juego, codigo_desarrollador, 
					codigo_esrb, nombre_juego, 
					descripcion, fecha_publicacion, 
					url, portada, calificacion, precio
					) VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s')",
						stripslashes($this->desarrollador),
						stripslashes($this->esrb),
						stripslashes($this->nombreJuego),
						stripslashes($this->descripcion),
						stripslashes($this->fechaPublicacion),
						stripslashes($this->url_iso),
						stripslashes($this->portada),
						stripslashes($this->calificacion),
						stripslashes($this->precio)
				);
			echo "Instruccion a ejecutar: ".$sql;
			$res = $conexion->ejecutarInstruccion($sql);
			if($res){
				echo "Registro almacenado con exito";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
			//Es necesario obtener el ultimo ID agregado:
			$UltimoInsert = $conexion->ejecutarInstruccion("SELECT last_insert_id(codigo_juego) as id FROM tbl_juegos ORDER BY id DESC;");
			$fila = $conexion->obtenerFila($UltimoInsert);

			//Las categorias
			if ($fila["id"]>0){
				for ($i=0;$i<count($this->categoria);$i++){
					$sql = sprintf(
						"INSERT INTO tbl_juegos_x_tbl_categorias(codigo_juego, codigo_categoria) VALUES ('%s','%s')",
						stripslashes($fila["id"]),	
						stripslashes($this->categoria[$i])
											
					);
					$conexion->ejecutarInstruccion($sql);
				}
			}

		}
	}
?>