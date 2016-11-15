<?php
	class Usuario{

		protected $nombreUsuario;
		protected $correoElectronico;

		
		public function __construct($nombreUsuario,
					$correoElectronico){
			$this->nombreUsuario = $nombreUsuario;
			$this->correoElectronico = $correoElectronico;
		}
		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
		}
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function toString(){
			return "NombreUsuario: " . $this->nombreUsuario . 
				" CorreoElectronico: " . $this->correoElectronico;
		}

		public static function generar_select_usuarios($conexion){
			$resultado = $conexion->ejecutarInstruccion('
				                    SELECT 
											codigo_usuario,  
											codigo_tipo_pago, 
											codigo_tarjeta_credito, 
											nombre_usuario, nombre, 
											apellido, 
											correo_electronico, 
											contrasena, 
											fecha_nacimiento
			 						FROM tbl_usuarios
			 						');
			
			echo "<select name='slc-usuarios' id='slc-usuarios' class='form-control' style='height: 30px;'>";
			while ($fila = $conexion->obtenerFila($resultado)) {
				echo "<option value='" .$fila["codigo_usuario"] .
				"'>" . $fila["nombre"] . " " . $fila["apellido"] . "</option>";
			}
			echo "</select>";
			$conexion->liberarResultado($resultado);

		}

		public static function mostrarUsuarios($conexion){
			$usuarios=$conexion->ejecutarInstruccion('
									SELECT 
										codigo_usuario, 
										codigo_tipo_pago, 
										codigo_tarjeta_credito, 
										nombre_usuario, 
										nombre, 
										apellido, 
										correo_electronico, 
										contrasena, 
										fecha_nacimiento 
										FROM tbl_usuarios 
								');
			?>

				<table class="table table-striped col-lg-6 col-md-6 col-sm-6 col-xs-6 " style="background-color: #fff; text-align: center;">
             		<tr>
		                <th> Nombre </th>
		                <th> Apellido</th>
		                <th> Alias </th>
		                <th> Correo Electronico </th>
		                <th> Fecha de Nacimiento </th>
		                <th> Eliminar </th>
		             </tr>
			<?php
			while ($fila_usuarios = $conexion->obtenerFila($usuarios)) {
				?>
					<tr>
						<td>
							<?php
								echo $fila_usuarios['nombre'];
							?>
						</td>
						<td>
							<?php
								echo $fila_usuarios['apellido'];
							?>
						</td>
						<td>
							<?php
								echo $fila_usuarios['nombre_usuario'];
							?>
						</td>
						<td>
							<?php
								echo $fila_usuarios['correo_electronico'];
							?>
						</td>
						<td>
							<?php
								echo $fila_usuarios['fecha_nacimiento'];
							?>
						</td>
						<td>
							 <span class="glyphicon glyphicon-trash" style="font-size: 150%" onclick="eliminarUsuario('<?php echo $fila_usuarios["codigo_usuario"]; ?>')" aria-hidden="true"></span>
						</td>
					</tr>
				<?php
			}
			?>
				</table>				
			
					<?php
		}

		public static function inicioSesion($conexion, $usuario, $contrasena){
			$sql = sprintf("SELECT 
						nombre_usuario, 
						contrasena
						FROM tbl_usuarios
						WHERE nombre_usuario = '%s' AND contrasena = '%s'",
						stripslashes($usuario),
						stripslashes($contrasena)

			);
			$respuesta = array();
			$sesion_usuario = $conexion->ejecutarInstruccion($sql);
			if($conexion->cantidadRegistros($sesion_usuario) >0){
				$fila = $conexion->obtenerFila($sesion_usuario);
				$respuesta["inicio"] = "1";
				$respuesta["nombre_usuario"] = $fila["nombre_usuario"];
				
			}
			else {
				$respuesta["inicio"] = "0";
				$respuesta["resultado"] = "Usuario no Existe";
			}
			return $respuesta;
           $conexion->liberarResultado($resultado); 
		}

		public static function eliminarUsuario($conexion,$codigo_usuario){
			//eliminacion de los comentarios
			$sql = sprintf("DELETE FROM tbl_comentarios 
							WHERE codigo_usuario ='%s'", stripslashes($codigo_usuario));
			$conexion->ejecutarInstruccion($sql);

			$sql2 = sprintf("DELETE FROM tbl_usuarios 
							WHERE codigo_usuario ='%s'", stripslashes($codigo_usuario));
			$conexion->ejecutarInstruccion($sql2);
		}

	}
?>