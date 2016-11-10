<?php

	class desarrolladores{

		private $nombreDesarrollador;
		private $urlDesarrollador;

		public function __construct($nombreDesarrollador,
					$urlDesarrollador){
			$this->nombreDesarrollador = $nombreDesarrollador;
			$this->urlDesarrollador = $urlDesarrollador;
		}
		public function getNombreDesarrollador(){
			return $this->nombreDesarrollador;
		}
		public function setNombreDesarrollador($nombreDesarrollador){
			$this->nombreDesarrollador = $nombreDesarrollador;
		}
		public function getUrlDesarrollador(){
			return $this->urlDesarrollador;
		}
		public function setUrlDesarrollador($urlDesarrollador){
			$this->urlDesarrollador = $urlDesarrollador;
		}

		public static function generarDesarrolladores($conexion){
			$resultado = $conexion->ejecutarInstruccion(
				'SELECT codigo_desarrollador, 
				nombre_desarrollador, 
				url 
				FROM tbl_desarrollador');

			echo "<select name='slc-desarrolladores' id='slc-desarrolladores' class='form-control' style='height: 30px;'>";
			while ($fila = $conexion->obtenerFila($resultado)) {
				echo "<option value='".$fila["codigo_desarrollador"]."'>
				".$fila["nombre_desarrollador"]."</option>";
			}
			echo "</select>";
			$conexion->liberarResultado($resultado);
		}

	}
?>