<?php 
	include_once("../class/class_conexion.php");
	include_once("../class/class_comentarios.php");
	include_once("../class/class_juegos.php");
	include_once("../class/class_especificaciones.php");
	include_once("../class/class_usuario.php");
	include_once("../class/class_administradores.php");
	include_once("../class/class_capturas.php");
	include_once("../class/class_tarjetas.php");
	session_start();
				
	$conexion = new Conexion();
	switch ($_GET["accion"]) {
		case '1':// cargar los comentarios
			
			$codigoJuego = $_POST["codigo_juego"];
			Comentario::generar_comentarios($conexion,$codigoJuego,$_POST["nombre_usuario"]);
			break;

		case '2'://Guardar los comentarios
		
			$codigoJuego = $_POST["codigo_juego"];
			$nombreUsuario = $_POST["nombre_usuario"];
			$comentario = $_POST["txt-comentario"];
			Comentario::guardar_comentarios($conexion, $codigoJuego, $nombreUsuario, $comentario);
		break;

		case '3'://Eliminar Comentario
			
			Comentario::eliminarComentario($conexion,$_POST["codigoComentario"]);
			break;

		case '4':// guardado de un juego
		sleep(3);
		$nuevoJuego = new Juegos($_POST["slc-desarrolladores"],
					$_POST["slc-esrb"],
					$_POST["txt-titulo-juego"],
					$_POST["textArea-descripcion"],
					$_POST["txt-fecha-lanzamiento"],
					$_POST["txt-url-iso"],
					$_POST["txt-portada"],
					$_POST["txt-calificacion"],
					$_POST["txt-precio"],
					$_POST["categorias"]
			);
		$nuevoJuego->guardarJuego($conexion);

		$resultado = $conexion->ejecutarInstruccion("SELECT last_insert_id(codigo_juego) as id FROM tbl_juegos ORDER BY id DESC;");
		$fila = $conexion->obtenerFila($resultado);
		
		$nuevaEspecificacionMinima = new especificaciones(1,
					$fila["id"],
					$_POST["txt-sistema-operativo-minimo"],
					$_POST["txt-tarjeta-grafica-minimo"],
					$_POST["txt-ram-minimo"],
					$_POST["txt-cpu-minimo"]
			);
		$nuevaEspecificacionMinima->guardarEspecificaciones($conexion);
		$nuevaEspecificacionRecomendada = new especificaciones(2,
					$fila["id"],
					$_POST["txt-sistema-operativo-recomendado"],
					$_POST["txt-tarjeta-grafica-recomendado"],
					$_POST["txt-ram-recomendado"],
					$_POST["txt-cpu-recomendado"]
			);
		$nuevaEspecificacionRecomendada->guardarEspecificaciones($conexion);

		//Almacenamiento de las capturas del juego
		/*$nuevaCaptura1 = new capturas(
										$fila["id"],
										$_POST["txt-captura1"]);
		$nuevaCaptura1->guardarCapturas($conexion);

		$nuevaCaptura2 = new capturas(
										$fila["id"],
										$_POST["txt-captura2"]);
		$nuevaCaptura2->guardarCapturas($conexion);

		$nuevaCaptura3 = new capturas(
										$fila["id"],
										$_POST["txt-captura3"]);
		$nuevaCaptura3->guardarCapturas($conexion);

		$nuevaCaptura4 = new capturas(
										$fila["id"],
										$_POST["txt-captura4"]);
		$nuevaCaptura4->guardarCapturas($conexion);*/
		$sqlCapturas1 = sprintf("
									INSERT INTO tbl_capturas(
															codigo_capturas, 
															codigo_juego, 
															url_captura
															) VALUES (NULL,'%s','%s')",
										stripslashes($fila["id"]),
										stripslashes($_POST["txt-captura1"])										
								);
		$conexion->ejecutarInstruccion($sqlCapturas1);
		$sqlCapturas2 = sprintf("
								INSERT INTO tbl_capturas(
														codigo_capturas, 
														codigo_juego, 
														url_captura
														) VALUES (NULL,'%s','%s')",
										stripslashes($fila["id"]),
										stripslashes($_POST["txt-captura2"])										
							);
		$conexion->ejecutarInstruccion($sqlCapturas2);
		$sqlCapturas3 = sprintf("
								INSERT INTO tbl_capturas(
														codigo_capturas, 
														codigo_juego, 
														url_captura
														) VALUES (NULL,'%s','%s')",
										stripslashes($fila["id"]),
										stripslashes($_POST["txt-captura3"])										
							);
		$conexion->ejecutarInstruccion($sqlCapturas3);
		$sqlCapturas4 = sprintf("
								INSERT INTO tbl_capturas(
														codigo_capturas, 
														codigo_juego, 
														url_captura
														) VALUES (NULL,'%s','%s')",
										stripslashes($fila["id"]),
										stripslashes($_POST["txt-captura4"])										
							);
		$conexion->ejecutarInstruccion($sqlCapturas4);
		//Guardar Trailer
		$sqlTrailer = sprintf("
								INSERT INTO tbl_trailer(
														codigo_trailer, 
														codigo_juego, 
														url_trailer
														) VALUES (NULL,'%s','%s')",
										stripslashes($fila["id"]),
										stripslashes($_POST["txt-trailer"])
							);	
		$conexion->ejecutarInstruccion($sqlTrailer);

		break;					
		case '6'://Eliminacion de un usuario
				$codigo_usuario=$_POST['codigoUsuario'];
				Usuario::eliminarUsuario($conexion,$codigo_usuario);
				Usuario::mostrarUsuarios($conexion);
			break;
		case '7'://Eliminacion de un juego
			$codigo_juego=$_POST['codigoJuego'];
			Juegos::eliminarJuegos($conexion,$codigo_juego);
			Juegos::obtenerTarjetasEliminar($conexion);
			break;
		case '8'://Actualizar los datos del juego
			
			break;
		case '9'://registro de un nuevo usuario
			/*$nombreUsuario
			$nombre
			$apellido
			$contrasena
			$correoElectronico
			
			$nuevoUsuario = new Usuario(
											$_POST["txt-nombre-usuario"],
											$_POST["txt-nombre"],
											$_POST["txt-apellido"],
											$_POST["txt-contrasena"],
											$_POST["dte-fecha-nacimiento"],
											$_POST["txt-correo"]
										);
			$nuevoUsuario->guardarUsuario($conexion);*/
			$sql = sprintf("INSERT INTO tbl_usuarios(
												codigo_usuario, 
												codigo_tipo_pago, 
												codigo_tarjeta_credito, 
												nombre_usuario, 
												nombre, 
												apellido, 
												correo_electronico, 
												contrasena, 
												fecha_nacimiento
												) VALUES (NULL,NULL,NULL,'%s','%s','%s','%s','%s','%s')",
												stripslashes($_POST["txt-nombre-usuario"]),
												stripslashes($_POST["txt-nombre"]),
												stripslashes($_POST["txt-apellido"]),
												stripslashes($_POST["txt-correo"]),
												stripslashes($_POST["txt-contrasena"]),
												stripslashes($_POST["dte-fecha-nacimiento"])
						);	
			echo $sql;
			$conexion->ejecutarInstruccion($sql);
			break;
		case '10':
		sleep(6);
			$fecha = $_POST['fecha'];
			$monto = $_POST['precio'];
			TarjetaCredito::guardarTransaccion($conexion, $fecha, $monto);

			TarjetaCredito::guardarTarjeta( $conexion, 
											$_POST['t-nombre'],
			 								$_POST['t-numero'],
			 								$_POST['t-vencimiento'], 
			 								$_POST['t-seguridad']
			 								);
			break;
		case '11': //generar clave de producto

				TarjetaCredito::claveProducto($conexion, $_POST['codigoJuego']);
				

			break;
		case '12': //generar descarga

				TarjetaCredito::descarga($conexion, $_POST['codigoJuego']);

			break;							
		default:		
			# code...
			break;
	}
?>