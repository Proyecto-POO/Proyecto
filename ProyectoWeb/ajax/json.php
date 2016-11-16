<?php
	include_once("../class/class_conexion.php");
	include_once("../class/class_juegos.php");
	include_once("../class/class_usuario.php");
	include_once("../class/class_administradores.php");
	session_start();
	$conexion = new Conexion();
	switch ($_GET['accion']) {
		case '1'://editar juego
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

		case '2'://obtener requisitos minimos
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

		case '3'://obtener requistos Recomendados
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
		case '4'://comprobacion del login Usuario
				$usuario = $_POST['usuario'];
				$contrasena = $_POST['contrasena'];
				$resultado = Usuario::inicioSesion($conexion, $usuario, $contrasena);
				$_SESSION["nombre_usuario"] = $resultado["nombre_usuario"];
				$_SESSION["inicio"] = $resultado["inicio"];
				echo json_encode($resultado);
				
				break;	
		case '5'://comprobacion del login Admin
			$usuario = $_POST['Admin'];
			$contrasena = $_POST['contrasena'];

			$respuesta = Administradores::inicioSesionAdmin($conexion,$usuario, $contrasena);
			$_SESSION["usuario"] = $respuesta["usuario"];
			$_SESSION["inicio"] = $respuesta["inicio"];
			echo json_encode($respuesta);
			
			break;
		
		default:
			# code...
			break;
	}
?>