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
              <li><a href="index_administrador.php" class="hvr-underline-from-center">Inicio</a></li>
              <li><a href="#">Productos</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acerca de <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Conocenos</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Contacto</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left">
              <div class="form-group input-group">
                <input type="text" class="form-control-search" placeholder="Buscar">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default">
                       <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
              </div>

            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nombre Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php">Cerrar Sesion</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-2">
            <div class="cont">
            <label>Ver Listas</label><br><br>
              <button class="btn btn-warning btn-lg">Ver Usuarios</button><br><br>
              <button class="btn btn-primary btn-lg">Ver Transacciones</button><br><br>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="cont">
            <label>Gestion de Productor</label><br><br>
              <a href="agregar_producto.php"><button class="btn btn-success btn-lg">Agregar</button></a><br><br>
              <button class="btn btn-primary btn-lg">Modificar</button><br><br>
              <button class="btn btn-danger btn-lg">Eliminar</button><br><br>

            </div>
        </div>
      </div>
    </div>
      <br>
      <br>
      <br>
    <footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4">
                  <img src="img/pago-icono.png" alt="" class="img img-responsive">
                </div>
              </div>
            </div>

            <b><em>GAMERS.ES</em></b> &copy; 2016 - Todos Los Derechos Reservados
    </footer>

		 <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/funciones.js"></script>

   </script>

        <script type="text/javascript">
          $(".carousel").carousel({
            interval: 3000,
            pause: "hover"
          });
        </script>

</body>
</html>
