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
		case '6'://editar Trailer
				$sqlTrailer = sprintf("
								SELECT 
									codigo_trailer, 
									codigo_juego, 
									url_trailer 
								FROM tbl_trailer 
								WHERE codigo_juego = '%s'",
					stripslashes($_POST["codigo_juego"])
				);

				 $resultadoTrailer=$conexion->ejecutarInstruccion($sqlTrailer);
				 $filaTrailer = $conexion->obtenerFila($resultadoTrailer);
				 $filaTrailer = array_map('utf8_encode', $filaTrailer);
				 echo json_encode($filaTrailer);
			break;
		case '7':// obtener las capturas para editarlas
			/*$sqlCapturas = sprintf("
								SELECT 
									codigo_capturas, 
									codigo_juego, 
									url_captura 
								FROM tbl_capturas 
								WHERE codigo_juego = '%s'",
					stripslashes($_POST["codigo_juego"])
				);

				 $resultadoCapturas=$conexion->ejecutarInstruccion($sqlCapturas);
				 while ( $filaCapturas = $conexion->obtenerFila($resultadoCapturas)) {
				 	$capturas[] = echo $filaCapturas["url_captura"]; 
				 };
				$json= '{
						 	"Captura1" :"$capturas[0]",
						 	"Captura2" :"echo $capturas[1]",
						 	"Captura3" :"echo $capturas[2]",
						 	"Captura4" :"$capturas[3]"
						 }';
				/*$Captura['captura1']= echo $capturas[0];;
				$Captura['captura2']= echo $capturas[1];;
				$Captura['captura3']= echo $capturas[2];;
				$Captura['captura4']= echo $capturas[3];;
				echo json_encode($Captura);*/
				 break;
		default:
			# code...
			break;
	}
?>