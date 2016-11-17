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
    <style type="text/css">
      .error-form{
         background-color: #e26161; 
         display: none;
       }
    </style>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre_usuario'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
                  <li role="separator" class="divider"></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <?php
       
          $fecha = date("Y") . "-" . date("m") . "-" . date("d");
      ?>
    
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2">
            <div class="cont">
            <h1>INFORMACION DE PAGO</h1>
            <br>
             <hr> 
                  <div class="text-center">
                      Monto: <?php echo $_GET["precio"];?> USD
                  </div>
              <hr>
               <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <input type="text" class="form-control" placeholder="Nombre" value="<?php echo $_SESSION['nombre_usuario']; ?>" id="t-nombre" disabled="disabled">
                    
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <input type="text" class="form-control" placeholder="Numero de tarjeta" id="t-numero">
                    <div id="campo1" class="well error-form"> Error, campo vacio, ingrese su numero de tarjeta.</div>
                    
                  </div>
              </div>
             <br>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                     <input type="text" class="form-control" placeholder="fecha vencimiento" id="t-vencimiento">
                     <div id="campo2" class="well error-form"> Error, campo vacio, ingrese la fecha de vencimiento.</div>
                      
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                    <input type="text" class="form-control" placeholder="Cod. seguridad" id="t-seguridad">
                    <div id="campo3" class="well error-form"> Error, campo vacio, ingrese el codigo de seguridad.</div>
                </div>    
              </div>
              <br><br>

              <button class="btn btn-warning btn-lg" onclick="comprar('<?php echo $fecha; ?>', '<?php echo $_GET["precio"];?>');" >Confirmar</button><br>

            </div>
        </div>
      
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
               
                <div class="cont2" id="mensaje" style="display: none;">
                    <!-- imagen GIF de carga AQUI-->
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-2">
                <div class="btn btn-danger" id="continuar" style="display: none;">
                   <a href="final_compra.php?codigoJuego=<?php echo $_GET['cj']; ?>"><h4>Clave de Producto y Descarga</h4></a>
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
