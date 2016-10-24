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
                    <input type="text" name="txt-nombre-usuario" id="txt-nombre-usuario" style="width:50%" class="form-control" >
                    <div id="mensaje1" class="well error-form"> Error, campo vacio, ingrese su nombre.</div>
                    <hr>
                    Contraseña
                    <input type="password" name="txt-contraseña" id="txt-contraseña" style="width:50%"  class="form-control" >
                    <div id="mensaje2" class="well error-form"> Error, campo vacio, ingrese su contraseña.</div>
                    <hr>
                    Verificar contraseña
                    <input type="password" name="txt-contraseña-verificar" id="txt-contraseña-verificar" style="width:50%" class="form-control" >
                    <div id="mensaje3" class="well error-form"> Error, campo vacio o sus contraseñas no coinciden.</div>
                    <hr>
                    Fecha de Nacimiento<br>
                    <input type="date" name="dte-fecha-nacimiento" step="1" min="01-01-1900" max="31-31-2099"
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
                    <div id="mensaje5" class="well error-form"> Error, campo vacio o sus correos no coinciden.</div>
                    <hr>
                    Terminos de suscriptor
                    <textarea class="form-control"></textarea>
                    <hr>
                    <input  type="checkbox" >&nbsp;He leido y acepto los terminos de suscriptor.
                    <hr>
                    <button id="btn-crear-cuenta" name="btn-crear-cuenta" class="btn btn-primary" style="width:100%"> Crear cuenta</button>
    </div>
<!-- Fin del Formulario para registrar nuevo usuario-->
<!--Inicio de las e-->
     <footer style="position: relative;">
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

    <script type="text/javascript">
       $(document).ready(function(){
           $("#btn-crear-cuenta").click(function(){
           var nombreUsuario = $("#txt-nombre-usuario").val();
           var contraseña = $("#txt-contraseña").val();
           var contraseñaVerificar = $("#txt-contraseña-verificar").val();
           var correo = $("#txt-correo").val();
           var correoVerificar = $("#txt-correo-verificar").val();
           //faltan las variables de los select y el checkbox (que no aparece).
 
           if(nombreUsuario==""
             ||contraseña==""
             ||contraseñaVerificar==""
             ||contraseñaVerificar!=contraseña
             ||correo==""
             || !/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(correo)
             ||correoVerificar==""
             ||correo!=correoVerificar
             || !/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(correoVerificar)){
 
             if(nombreUsuario==""){
                $("#mensaje1").fadeIn();
                
             }else{
                $("#mensaje1").fadeOut();
             }
 
             if(contraseña==""){
                $("#mensaje2").fadeIn();
                
             }else{
                $("#mensaje2").fadeOut();
             }
 
             if(contraseñaVerificar==""||contraseñaVerificar!=contraseña){
                $("#mensaje3").fadeIn();
                
             }else{
                $("#mensaje3").fadeOut();
             }
 
             if(correo==""||!/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(correo)){
                $("#mensaje4").fadeIn();
                
             }else{
                $("#mensaje4").fadeOut();
             }
 
             if(correoVerificar==""||correoVerificar!=correo||!/[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(correoVerificar)){
                $("#mensaje5").fadeIn();
             }else{
               $("#mensaje5").fadeOut();
             }
 
           } else{
             alert("informacion enviada con exito.");
             $("#mensaje1").fadeOut();
             $("#mensaje2").fadeOut();
             $("#mensaje3").fadeOut();
             $("#mensaje4").fadeOut();
             $("#mensaje5").fadeOut();
 
             $("#txt-nombre-usuario").val("");
             $("#txt-contraseña").val("");
             $("#txt-contraseña-verificar").val("");
            $("#txt-correo").val("");
             $("#txt-correo-verificar").val("");
           } 
         });
       }); 
     </script>

  </body>
</html>
