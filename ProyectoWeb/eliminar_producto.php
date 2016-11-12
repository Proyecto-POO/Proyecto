<?php
    include_once("class/class_conexion.php");
    include_once("class/class_juegos.php");  
    include_once("class/class_usuario.php");
    $conexion = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar Juego</title>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hovereffects.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body style="background-image: url('img/fondo.png'); ">
		
	<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img img-responsive" src="img/logo.png" alt="logo"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index_administrador.php" class="hvr-underline-from-center">
              		<button class="btn btn-warning">Volver Atras</button>
              	</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
	<div class="container-fluid">
       <div class="row">
              <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12   "> 
                 <?php
                      Usuario::mostrarUsuarios($conexion);
                    ?> 
             
              </div>
              <div class="row-divisor-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
              <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                            <?php
                                  //impresion de las tarjetas de los juegos para eliminarlos 
                                  Juegos::obtenerTarjetasEliminar($conexion); 
                            ?>                 
                  </div>
              </div>
          
        </div>
    </div>
  </div>
    <br><br><br><br><br><br><br>
	<footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                  <img src="img/pago-icono.png" alt="" class="img img-responsive">
                </div>
              </div>
            </div>

            <b><em>GAMERS.ES</em></b> &copy; 2016 - Todos Los Derechos Reservados
    </footer>

	<script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/eliminar.js"></script>
</body>
</html>