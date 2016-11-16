<?php
	session_start();
	session_destroy();
	 if ($_SESSION['inicio']==1)
       header("Location: login_usuario.php");
	else
		 header("Location: login_administrador.php");
?>