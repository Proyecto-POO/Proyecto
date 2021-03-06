<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>GAMERS.ES LOG IN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login-reg.css">
    <link rel="icon" type="image/png" href="img/logo.png">

  </head>

  <body >
        <!-- Barra de Navegacion -->
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
                    <li><a href="index.php" class="hvr-underline-from-center">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                   
                  </ul>
                  
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
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        <!-- Formulario de login -->
     <div class="form">
      <h1>GAMERS<span>.ES</span> ID</h1>
      <form role="form" action="/login" method="POST" name="login" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" autocomplete="off">
        <div class="field-wrap">
          <div class="form-group input-group"><span id="basic-addon1" class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" id="user" name="username" placeholder="Username" aria-describedby="basic-addon1" class="form-control" />
          </div>
        </div>

        <div class="field-wrap">
          <div class="form-group input-group"><span id="basic-addon2" class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" id="pass" name="password" placeholder="Password" aria-describedby="basic-addon2" autocomplete="off" class="form-control" />
          </div>
        </div><br>
        <p class="forgot"><a href="/forgot">olvidaste tu contraseña?</a></p>
        <button type="button" class="btn btn-danger button button-block" onclick="logInUsuario()">Acceder</button>
      </form>
    </div><!-- fin log in  -->

    <div id="usuario-registrado" class="alert alert-info"></div>

    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/controlador_usuario.js'></script>

  </body>
</html>
