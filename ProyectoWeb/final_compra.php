<?php
 session_start(); 
    if((!isset($_SESSION['nombre_usuario']))||($_SESSION['inicio']==2))
      header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GAMERS.ES</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hovereffects.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="image/png" href="img/logo.png">

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
              <li><a href="index_usuario.php" class="hvr-underline-from-center">Atras</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre_usuario'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2">
            <div class="cont" id="contenido">
            <hr>
                  <button class="btn btn-warning" onclick="finalCompra(<?php echo $_GET['codigoJuego']; ?>);"><h4>Mostrar Clave de Producto</h4></button>
                  <hr>
                  <div class="cont3" id="clave-activacion" style="display: none;"></div>
                  <hr>
                 <div id="descarga"></div>
            </div>
        </div>
      
      </div>
    </div>
 
      <br><br> 
    <footer>
            <div class="container ">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                  <label>powered by</label><img src="img/logo.png" alt="" class="img img-responsive"><label>GAMERSPAY</label>
                </div>
              </div>
            </div>
            <br>
            <b><em>GAMERS.ES</em></b> &copy; 2016 - Todos Los Derechos Reservados
    </footer>

	 <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/controlador_comprar.js"></script>


</body>
</html>
