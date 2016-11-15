<?php

	class Administradores{

		private $nombre;
		private $apellido;
		private $contrasena;
		private $usuario;

		public function __construct($nombre,
					$apellido,
					$contrasena,
					$usuario){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->contrasena = $contrasena;
			$this->usuario = $usuario;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function toString(){
			return "Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Contrasena: " . $this->contrasena . 
				" Usuario: " . $this->usuario;
		}

		public static function inicioSesionAdmin($conexion, $usuario, $contrasena){
			$sql = sprintf("SELECT 
						usuario, 
						contrasena
				FROM tbl_administradores
				WHERE usuario = '%s' AND contrasena = '%s'"
				,stripslashes($usuario),stripslashes($contrasena)
				);
			$respuesta = array();
			$sesion_admin = $conexion->ejecutarInstruccion($sql);
				if($conexion->cantidadRegistros($sesion_admin) >0){
					$fila = $conexion->obtenerFila($sesion_admin);
					$respuesta["inicio"] = "2";
					$respuesta["usuario"] = $fila["usuario"];
					
				}
				else {
					$respuesta["inicio"] = "0";
					$respuesta["resultado"] = "Usuario no Existe";
				}
				return $respuesta;
           $conexion->liberarResultado($resultado); 
		}

	}
?>