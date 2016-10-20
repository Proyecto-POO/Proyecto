<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>GAMERS.ES LOG IN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login-reg.css">

  </head>

  <body>
<!-- Inicio de la barra de menu-->
  <nav class="navbar navbar-inverse">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img img-responsive" src="img/logo.png" alt="logo"></a>
          </div>


          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php" class="hvr-underline-from-center">Inicio</a></li>
              <li><a href="productos.php">Productos</a></li>
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
              <li><a href="registro.php">Registrarse</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesión <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Cliente</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="login.php">Administrador</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!-- Fin de la barra de menu-->
<!-- Inicio del formulario para registrar un nuevo Usuario-->
    <div class="form">
      <h1>Crear GAMERS<span>.ES</span> ID</h1>

                    Nombre de usuario
                    <input type="text" name="" id="" style="width:50%" class="form-control" >
                    <hr>
                    Contraseña
                    <input type="password" name="" id="" style="width:50%"  class="form-control" >
                    <hr>
                    Verificar contraseña
                    <input type="password" name="" id="" style="width:50%" class="form-control" >
                    <hr>
                    Fecha de Nacimiento<br>
                    <input type="date" name="dte-fecha-nacimiento" step="3" min="01-01-1900" max="31-31-2099"
                          value="<?php echo date('Y-m-d');?>"
                          class="date"
                    >
                    <hr>
                    Correo electronico
                    <input type="password" name="" id="" style="width:50%"  class="form-control" >
                    <hr>
                    Verificar correo electronico
                    <input type="password" name="" id="" style="width:50%"  class="form-control" >
                    <hr>
                    Terminos de suscriptor
                    <textarea class="form-control"></textarea>
                    <hr>
                    <input  type="checkbox" >&nbsp;He leido y acepto los terminos de suscriptor.
                    <hr>
                    <button class="btn btn-primary" style="width:100%"> Crear cuenta</button>

    </div>
<!-- Fin del Formulario para registrar nuevo usuario-->
<!--Inicio de las e-->
     <footer>
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <img src="img/pago-icono.png" alt="" class="img img-responsive">
                      </div>
                    </div>
                  </div>

                  <b><em>GAMERS.ES</em></b> &copy; 2016 - Todos Los Derechos Reservados
    </footer>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.string/3.2.3/underscore.string.min.js'></script>




  </body>
</html>
