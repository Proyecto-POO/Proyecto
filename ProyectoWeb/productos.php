<?php
		include_once("class/class_conexion.php");
	    include_once("class/class_juegos.php");
	    $conexion = new Conexion();
	    session_start();
	    if(!isset($_SESSION['nombre_usuario']))
   			 $_SESSION['nombre_usuario']="";
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hovereffects.css">
    <link rel="icon" type="image/png" href="img/logo.png">

</head>
<body style=" background-image: url('img/fondo.png')">

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
	            <?php if ($_SESSION['nombre_usuario']!="") {?>
						<li><a href="index_usuario.php" class="hvr-underline-from-center">Inicio</a></li>
					<?php } else{?>
							<li><a href="index.php" class="hvr-underline-from-center">Inicio</a></li>
					<?php 	}?> 
	              <li><a href="productos.php">Productos</a></li>
	              
	            </ul>
	           
	            <?php if ($_SESSION['nombre_usuario']!="") {?>
					<ul class="nav navbar-nav navbar-right">
			              <li class="dropdown">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre_usuario'] ?> <span class="caret"></span></a>
			                <ul class="dropdown-menu">
			                  <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
			                  
			                 
			                </ul>
			              </li>
			            </ul>
				<?php } else{?>
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
				<?php 	}?> 	            
	              
	          </div><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
      </nav>
      <div>
			<div class="container-fluid">
				<div class="row ">
		        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 row-divisor-right">
		          <?php
		                //impresion de las tarjetas de los juegos
		                Juegos::generacionTarjetas($conexion);
		          ?>
		             
		        </div>

		        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
		          <div class="row">
		             <?php
			              //creacion del carrousel de mas valorados
			              Juegos::obtenerMasValorados($conexion);
			         ?>
		          </div>
		          <br><br><br>
	              <div class="row">
	                 <div class="col-lg-8 col-md-9 col-lg-offset-2 col-md-offset-2">
	                    <h5 class="titulo">Recomendados</h5>
	                    <div class="row">
	                        <?php
	                        Juegos::obtenerRecomendados($conexion);
	                        ?>
	                    </div>
	                  </div>
	              </div>
		          <div class="row">
		             <!-- agregar contenido debajo de carousel de "lo mas comprado" -->
		          </div>
		        </div>
				</div>
			</div>
		<!-- data-toggle="modal" data-target="#myModal" esto se agrega a <a> o <button>-->
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">CREAR GAMERS.ES ID</h4>
		      </div>
		      <div class="modal-body">
		        <p>Some text in the modal.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
		<br><br><br><br>

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
	</div>
	 <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
 

</body>
</html>