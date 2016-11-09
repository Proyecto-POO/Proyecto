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
		Comentario::guardar_comentarios($conexion,$_POST["codigo_juego"],$_POST["slc-usuarios"],$_POST["txt-comentario"]);
	break;
	default:
		# code...
		break;
}
?>