<?php
	class Usuario{

		protected $nombreUsuario;
		protected $correoElectronico;

		public static function generar_select_usuarios($conexion){
			$resultado = $conexion->ejecutarInstruccion('SELECT codigo_usuario, codigo_tipo_usuario, usuario, correo_electronico, nombre, apellido, genero, fecha_nacimiento, fotografia
			 FROM tbl_usuarios');
			echo "<select name='slc-usuarios' id='slc-usuarios' class='form-control' style='height: 30px;'>";
			while ($fila = $conexion->obtenerFila($resultado)) {
				echo "<option value='" .$fila["codigo_usuario"] .
				"'>" . $fila["nombre"] . " " . $fila["apellido"] . "</option>";
			}
			echo "</select>";
			$conexion->liberarResultado($resultado);

		}

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
	}
?>