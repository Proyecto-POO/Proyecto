<?php
	include_once("../class/class_conexion.php");
	include_once("../class/class_juegos.php");
	$conexion = new Conexion();
	switch ($_GET['accion']) {
		case '1':
				 $sql = sprintf("SELECT codigo_juego, codigo_desarrollador, 
				 				codigo_esrb, nombre_juego, 
				 				descripcion, fecha_publicacion, 
				 				url, portada, calificacion, precio
					 FROM tbl_juegos
				 	 WHERE codigo_juego = '%s'",
					stripslashes($_POST["codigo_juego"]));

				 $resultado=$conexion->ejecutarInstruccion($sql);
				 $fila = $conexion->obtenerFila($resultado);
				 $fila = array_map('utf8_encode', $fila);
				 echo json_encode($fila);
		break;

		case '2':
				$sql = sprintf("SELECT
				 				codigo_especificaciones, codigo_tipo_especificaciones, 
				 				codigo_juego, sistema_operativo, 
				 				ram, targeta_grafica, cpu
					 FROM tbl_especificaciones 
				 	 WHERE codigo_juego = '%s'
				 	 AND codigo_tipo_especificaciones = '%s'",
					stripslashes($_POST["codigo_juego"]),
					stripslashes(1));

				 $resultado=$conexion->ejecutarInstruccion($sql);
				 $fila = $conexion->obtenerFila($resultado);
				 $fila = array_map('utf8_encode', $fila);
				 echo json_encode($fila);
		break;

		case '3':
				$sql = sprintf("SELECT
				 				codigo_especificaciones, codigo_tipo_especificaciones, 
				 				codigo_juego, sistema_operativo, 
				 				ram, targeta_grafica, cpu
					 FROM tbl_especificaciones 
				 	 WHERE codigo_juego = '%s'
				 	 AND codigo_tipo_especificaciones = '%s'",
					stripslashes($_POST["codigo_juego"]),
					stripslashes(2));

				 $resultado=$conexion->ejecutarInstruccion($sql);
				 $fila = $conexion->obtenerFila($resultado);
				 $fila = array_map('utf8_encode', $fila);
				 echo json_encode($fila);
		break;
		default:
			# code...
			break;
	}
?>