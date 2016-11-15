<?php 
	include_once("../class/class_conexion.php");
	include_once("../class/class_comentarios.php");
	include_once("../class/class_juegos.php");
	include_once("../class/class_especificaciones.php");
	include_once("../class/class_usuario.php");
	include_once("../class/class_administradores.php");
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
		default:		
			# code...
			break;
	}
?>