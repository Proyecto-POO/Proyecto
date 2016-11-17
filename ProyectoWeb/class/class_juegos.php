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
		private $claveProducto;

		public function __construct($desarrollador,
					$esrb,
					$nombreJuego,
					$descripcion,
					$fechaPublicacion,
					$url_iso,
					$portada,
					$calificacion,
					$precio,
					$categoria,
					$claveProducto){
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
			$this->claveProducto = $claveProducto;
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
								precio
								FROM tbl_juegos 
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
		            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 row-divisor-bottom card-container ">
		                <div class="well hovereffect card-profile ">
		                    <img id='img-<?php echo $fila_tarjetas_eliminar["nombre_juego"]; ?>' class='img img-responsive' src='<?php echo $fila_tarjetas_eliminar["portada"]; ?>' alt='Portada'>
		                        <div class="overlay">
		                            <h2><b><?php echo $fila_tarjetas_eliminar["nombre_juego"]; ?></b></h2>
		                             <br>
		                              <button type="button" class="btn btn-danger"  title="Eliminar <?php echo $fila_tarjetas_eliminar['nombre_juego']; ?>" style="position: center;">
	                                        <span class="glyphicon glyphicon-trash" 
	                                        onclick="eliminarJuego('<?php echo $fila_tarjetas_eliminar["codigo_juego"]; ?>')"style="font-size: 200%" aria-hidden="true"></span>
	                                 </button>
		                        </div>
		                </div>
		              </div>
		         </div>

	            <?php
	        }
	        $conexion->liberarResultado($tarjetasEliminar);
		}

		public static function obtenerTarjetasModificar($conexion){
			$tarjetasModificar = $conexion->ejecutarInstruccion('
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

			while ($fila_tarjetas_modificar = $conexion->obtenerFila($tarjetasModificar)) {
				?>
				<div class="rowglyphicon-thumbs-up">
		            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 row-divisor-bottom card-container ">
		                <div class="well hovereffect card-profile ">
		                    <img id='img-<?php echo $fila_tarjetas_modificar["nombre_juego"]; ?>' class='img img-responsive' src='<?php echo $fila_tarjetas_modificar["portada"]; ?>' alt='Portada'>
		                        <div class="overlay">
		                            <h2><b><?php echo $fila_tarjetas_modificar["nombre_juego"]; ?></b></h2>
		                             <br>
		                              <button data-toggle="modal" data-target="#modal-actualizar-juego" type="button" class="btn btn-danger"  title="Modificar <?php echo $fila_tarjetas_modificar['nombre_juego']; ?>" style="position: center;">
	                                        <span class="glyphicon glyphicon-pencil" 
	                                        onclick="editarJuego(<?php echo $fila_tarjetas_modificar["codigo_juego"]; ?>)" style="font-size: 200%" aria-hidden="true"></span>
	                                 </button>
		                        </div>
		                </div>
		              </div>
		         </div>

	            <?php
	        }

	        $conexion->liberarResultado($tarjetasModificar);
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
	                       <a href="mostrar_informacion_juegos.php?codigoJuego=<?php echo $fila_masValorados["codigo_juego"]; ?>">
	                       	 <img class="img img-responsive" src="<?php echo $fila_masValorados["portada"]; ?>" alt="">
	                       </a>
	                        <div class="carousel-caption">
	                          <h4><?php echo $fila_masValorados["nombre_juego"]; ?></h4>
	                        </div>
	                     </div>
		                
				<?php
					$opcion++;
				}else{
				?>
						 
					<div class="item">
						<a href="mostrar_informacion_juegos.php?codigoJuego=<?php echo $fila_masValorados["codigo_juego"]; ?>">
                        	<img class="img img-responsive" src="<?php echo $fila_masValorados["portada"]; ?>" alt="">
                       	</a>
                        <div class="carousel-caption">
                            <h4><?php echo $fila_masValorados["nombre_juego"]; ?></h4>
                        </div>
                     </div>
              
				<?php
				}
			}
				?>		
						</div>
					</a>
		                  <a class="left carousel-control" href="#div-masComprados" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hiden="true"></span></a>

		                  <a class="right carousel-control" href="#div-masComprados" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hiden="true"></span></a>

					</div>
				</div>                 
			<?php			
			$conexion->liberarResultado($masValorados);
		}

		public static function obtenerRecomendados($conexion){
			$recomendados = $conexion->ejecutarInstruccion('
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
				');
			
			$x=1;
			while ($x<=6) {
				$fila_recomendados=$conexion->obtenerFila($recomendados);
				?>
					<div class="col-lg-6 col-md-6 col-lg-offset- col-md-offset-">

						 <a href="mostrar_informacion_juegos.php?codigoJuego=<?php echo $fila_recomendados["codigo_juego"]; ?>">
							<div class="item">
		                        <img class="img img-responsive" src="<?php echo $fila_recomendados["portada"]; ?>" alt="">
		                     </div>
		                </a>
		            </div>    
				<?php
				$x++;
			}
			

			$conexion->liberarResultado($recomendados);
		}	


		public static function generarESRB($conexion){
			$resultado = $conexion->ejecutarInstruccion(
				'SELECT codigo_esrb, 
						tipo_esrb,
						url_esrb 
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
					url, portada, calificacion, precio, clave_producto
					) VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
						stripslashes($this->desarrollador),
						stripslashes($this->esrb),
						stripslashes($this->nombreJuego),
						stripslashes($this->descripcion),
						stripslashes($this->fechaPublicacion),
						stripslashes($this->url_iso),
						stripslashes($this->portada),
						stripslashes($this->calificacion),
						stripslashes($this->precio),
						stripslashes($this->claveProducto)
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
					echo "Instruccion a ejecutar: ".$sql;
						$res = $conexion->ejecutarInstruccion($sql);
						if($res){
							echo "Registro almacenado con exito";
						}else{
							echo "Error al guardar el registro";
							exit;
						}
								
				}
			}
		}

 

		public function ModificarJuego($conexion, $codigoJuego){
			$sql = sprintf("UPDATE tbl_juegos 
							SET codigo_desarrollador='%s',
								codigo_esrb='%s',
								nombre_juego='%s',
								descripcion='%s',
								fecha_publicacion='%s',
								url='%s',
								portada='%s',
								calificacion='%s',
								precio='%s',
								clave_producto='%s' 
							WHERE codigo_juego = '%s'",
						stripslashes($this->desarrollador),
						stripslashes($this->esrb),
						stripslashes($this->nombreJuego),
						stripslashes($this->descripcion),
						stripslashes($this->fechaPublicacion),
						stripslashes($this->url_iso),
						stripslashes($this->portada),
						stripslashes($this->calificacion),
						stripslashes($this->precio),
						stripslashes($this->claveProducto),
						stripslashes($codigoJuego)
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
			// $UltimoInsert = $conexion->ejecutarInstruccion("SELECT last_insert_id(codigo_juego) as id FROM tbl_juegos ORDER BY id DESC;");
			// $fila = $conexion->obtenerFila($UltimoInsert);

			//Las categorias
			// if ($fila["id"]>0){
			// 	for ($i=0;$i<count($this->categoria);$i++){
			// 		$sql = sprintf(
			// 			"INSERT INTO tbl_juegos_x_tbl_categorias(codigo_juego, codigo_categoria) VALUES ('%s','%s')",
			// 			stripslashes($fila["id"]),	
			// 			stripslashes($this->categoria[$i])
											
			// 		);
			// 		echo "Instruccion a ejecutar: ".$sql;
			// 			$res = $conexion->ejecutarInstruccion($sql);
			// 			if($res){
			// 				echo "Registro almacenado con exito";
			// 			}else{
			// 				echo "Error al guardar el registro";
			// 				exit;
			// 			}
								
			// 	}
			// }
		}

		public static function generarCapturas($conexion, $codigoJuego) {
				$sql = sprintf("SELECT 
										url_captura
								FROM tbl_capturas
								WHERE codigo_juego = '%s'",stripslashes($codigoJuego));
				
				$capturas = $conexion->ejecutarInstruccion($sql);
						while ($captura = $conexion->obtenerFila($capturas)) {
					?>	
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
								<img src="<?php echo $captura['url_captura']; ?>" alt="captura" class="img img-responsive">
							</div>
					<?php		
						}
				$conexion->liberarResultado($capturas);
		}

		public static function generarTrailer($conexion, $codigoJuego) {
				$sql = sprintf("SELECT 
								url_trailer
								FROM tbl_trailer
								WHERE codigo_juego = '%s'",stripslashes($codigoJuego));
				$trailers = $conexion->ejecutarInstruccion($sql);
						while ($trailer = $conexion->obtenerFila($trailers)) {
					?>	
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="<?php echo $trailer['url_trailer']; ?>" frameborder="0" allowfullscreen>
										</iframe>
							</div>	
					<?php		
						}
				$conexion->liberarResultado($trailers);
		}

		public static function generarRequisitosMinimos($conexion, $codigoJuego) {
			$sql = sprintf("SELECT  
								codigo_especificaciones, 
								codigo_tipo_especificaciones, 
								codigo_juego, 
								sistema_operativo, 
								ram, 
								targeta_grafica, 
								cpu 
								FROM tbl_especificaciones
								WHERE codigo_juego = '%s' 
								AND codigo_tipo_especificaciones = 1", stripslashes($codigoJuego));
			$requisitos = $conexion->ejecutarInstruccion($sql);
						$req = $conexion->obtenerFila($requisitos);
						echo "Minimos<br><br>";
						echo "SO: ".$req['sistema_operativo']."<br>";
						echo "RAM: ".$req['ram']."<br>";
						echo "TARJETA GRAFICA: ".$req['targeta_grafica']."<br>";
						echo "CPU: ".$req['cpu']."<br>";

						$conexion->liberarResultado($requisitos);
		}

		public static function generarRequisitosRecomendados($conexion, $codigoJuego) {
			$sql = sprintf("SELECT  
										codigo_especificaciones, 
										codigo_tipo_especificaciones, 
										codigo_juego, 
										sistema_operativo, 
										ram, 
										targeta_grafica, 
										cpu 

								FROM tbl_especificaciones

								WHERE codigo_juego = '%s' 

								AND codigo_tipo_especificaciones = 2",stripslashes($codigoJuego));
			$requisitos = $conexion->ejecutarInstruccion($sql);
						$req = $conexion->obtenerFila($requisitos);
						echo "Recomendados<br><br>";
						echo "SO: ".$req['sistema_operativo']."<br>";
						echo "RAM: ".$req['ram']."<br>";
						echo "TARJETA GRAFICA: ".$req['targeta_grafica']."<br>";
						echo "CPU: ".$req['cpu']."<br>";

						$conexion->liberarResultado($requisitos);
		}

		public static function eliminarJuegos($conexion,$codigoJuego){
			$sql1 = sprintf("DELETE FROM tbl_capturas 
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql1);

			$sql2 = sprintf("DELETE FROM tbl_trailer
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql2);

			$sql3 = sprintf("DELETE FROM tbl_juegos_x_tbl_categorias 
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql3);

			$sql4 = sprintf("DELETE FROM tbl_especificaciones 
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql4);

			$sql5 = sprintf("DELETE FROM tbl_comentarios 
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql5);

			$sql6 = sprintf("DELETE FROM tbl_juegos 
							WHERE codigo_juego ='%s'", stripslashes($codigoJuego));
			$conexion->ejecutarInstruccion($sql6);

		}

	}
?>