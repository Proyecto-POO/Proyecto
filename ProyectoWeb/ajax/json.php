<?php
	include_once("../class/class_conexion.php");
	$conexion = new Conexion();
	switch ($_GET['accion']) {
		case '8':
				 $sql = sprintf("SELECT codigo_juego, codigo_desarrollador, codigo_esrb, nombre_juego, descripcion, fecha_publicacion, url, portada, calificacion, precio
					 FROM tbl_juegos 
				 	 WHERE codigo_juego = '%s'",
					stripslashes($_POST["codigo_juego"]));

				 $resultado=$conexion->ejecutarInstruccion($sql);
				 $fila = $conexion->obtenerFila($resultado);
				 $nada[]=1;
				 $nada[]=2;
				 $nada[]=3;
				 echo json_encode($fila);
		break;
		default:
			# code...
			break;
	}
?>