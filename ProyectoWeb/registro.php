<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>GAMERS.ES LOG IN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login-reg.css">
    <style type="text/css">
       .color-letras{
          color: #ffffff;
         font-size: 15px;
       }
 
       .error-form{
         background-color: #e26161; 
         display: none;
       }
     </style>

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
                  <li><a href="login_usuario.php">Cliente</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="login_administrador.php">Administrador</a></li>
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
                    <input type="text" name="txt-nombre-usuario" id="txt-nombre-usuario" style="width:50%" class="form-control" >
                    <div id="mensaje1" class="well error-form"> Error, campo vacio, ingrese su nombre.</div>
                    <hr>
                    Nombre 
                    <input type="text" name="txt-nombre" id="txt-nombre" style="width:50%" class="form-control" >
                    <div id="mensaje6" class="well error-form"> Error, campo vacio, ingrese su nombre.</div>
                    <hr>
                    Apellido
                    <input type="text" name="txt-apellido" id="txt-apellido" style="width:50%" class="form-control" >
                    <div id="mensaje7" class="well error-form"> Error, campo vacio, ingrese su nombre.</div>
                    <hr>
                    Contraseña
                    <input type="password" name="txt-contrasena" id="txt-contrasena" style="width:50%"  class="form-control" >
                    <div id="mensaje2" class="well error-form"> Error, campo vacio, ingrese su contraseña.</div>
                    <hr>
                    Verificar contraseña
                    <input type="password" name="txt-contrasena-verificar" id="txt-contrasena-verificar" style="width:50%" class="form-control" >
                    <div id="mensaje3" class="well error-form"> Error, campo vacio o sus contraseñas no coinciden.</div>
                    <hr>
                    Fecha de Nacimiento<br>
                    <input type="date" name="dte-fecha-nacimiento" id="dte-fecha-nacimiento" step="1" min="01-01-1900" max="31-31-2099"
                          value="<?php echo date('Y-m-d');?>"
                          class="date"
                    >
                    <hr>
                    Correo electronico
                    <input type="text" name="txt-correo" id="txt-correo" style="width:50%"  class="form-control" >
                    <div id="mensaje4" class="well error-form"> Error, campo vacio, ingrese un correo electrónico.</div>
                    <hr>
                    Verificar correo electronico
                    <input type="text" name="txt-correo-verificar" id="txt-correo-verificar" style="width:50%"  class="form-control" >
                    <div id="mensaje5" class="well error-form"> Error, campo vacio o sus correos no coinciden.</div><br>
                    <button id="btn-crear-cuenta" name="btn-crear-cuenta" class="btn btn-primary" style="width:100%"> Crear cuenta</button>
    </div>
    <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-2">
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2">
                       <div class="cont" id="loading" style="display: none;">
                          <img class="img img-responsive" src="img/loading.gif" alt="">
                      </div>
                  </div>
                  
              </div>
               
                <div class="cont2" id="verifica-usuario" style="display: none;">
                    <!-- imagen GIF de carga AQUI-->
                </div>
            </div>
        </div>
    <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-2">
                <div class="btn btn-danger" id="verificar" style="display: none;">
                   
                </div>
            </div>
        </div>
<!-- Fin del Formulario para registrar nuevo usuario-->
<!--Inicio de las e-->
     <footer style="position: relative;">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
                        <img src="img/pago-icono.png" alt="" class="img img-responsive">
                      </div>
                    </div>
                  </div>

                  <b><em>GAMERS.ES</em></b> &copy; 2016 - Todos Los Derechos Reservados
    </footer>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/controlador_usuario.js'></script>


  </body>
</html>
