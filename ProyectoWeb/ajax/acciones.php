<?php 
	switch ($_GET["accion"]) {
		case '1':
			include_once("../class/class_conexion.php");
			include_once("../class/class_comentarios.php");
			$conexion = new Conexion();
			$codigoJuego = $_POST["codigo_juego"];
			Comentario::generar_comentarios($conexion,$codigoJuego);
			break;

		case '2':
			include_once("../class/class_conexion.php");
			include_once("../class/class_comentarios.php");
			$conexion = new Conexion();
			$codigoJuego = $_POST["codigo_juego"];
			$codigoUsuario = $_POST["slc-usuarios"];
			$comentario = $_POST["txt-comentario"];
			Comentario::guardar_comentarios($conexion, $codigoJuego, $codigoUsuario, $comentario);
		break;

		case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_comentarios.php");
			$conexion = new Conexion();
			Comentario::eliminarComentario($conexion,$_POST["codigoComentario"]);
			break;

		default:
			# code...
			break;
	}
?>