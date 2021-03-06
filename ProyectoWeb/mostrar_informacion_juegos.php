<?php
	include_once("class/class_conexion.php");
	include_once("class/class_usuario.php");
	include_once("class/class_juegos.php");

	$conexion = new Conexion();
	session_start(); 
  if(!isset($_SESSION['nombre_usuario']))
    $_SESSION['nombre_usuario']="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalles del Juego</title>
	<link rel="stylesheet" type="text/css" href="css/campo_comentarios.css">
	<link rel="stylesheet" type="text/css" href="css/comentarios.css">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hovereffects.css">
    <link rel="stylesheet" href="css/admin.css">
    <meta charset="utf-8">
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
              <li>
              	<?php if ($_SESSION['nombre_usuario']!="") {?>
					<a href="index_usuario.php" class="hvr-underline-from-center">
              			<button class="btn btn-warning">Volver Atras</button>
              		</a>
				<?php }else{?>
						<a href="index.php" class="hvr-underline-from-center">
		              		<button class="btn btn-warning">Volver Atras</button>
		              	</a>
				<?php
					} 
				?> 
              	
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cont">
				<?php
					$codigoJuego = $_GET['codigoJuego'];
					$sql = sprintf("SELECT 
									a.codigo_juego, 
									a.codigo_desarrollador, 
									a.codigo_esrb, 
									a.nombre_juego, 
									a.descripcion, 
									a.fecha_publicacion, 
									a.url, 
									a.portada, 
									a.calificacion, 
									a.precio, 
									b.nombre_desarrollador,
									c.url_esrb
									FROM tbl_juegos a
									INNER JOIN tbl_desarrollador b
									ON (a.codigo_desarrollador=b.codigo_desarrollador) 
									INNER JOIN tbl_esrb c
									ON (a.codigo_esrb = c.codigo_esrb)
									
									WHERE codigo_juego = '%s'",stripslashes($codigoJuego));
					$juego = $conexion->ejecutarInstruccion($sql);
					$fila_juego = $conexion->obtenerFila($juego);				
				?>
					<br><br>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont">
							<h2 style="text-align: center;"><?php echo $fila_juego['nombre_juego'] ?></h2>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-lg-offset-1 col-md-offset-1 cont">
						<img src="<?php echo $fila_juego['portada']; ?>" class='img img-responsive'>						
					</div>
					<h3 style="text-align: center;">Descripcion</h3>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-1 col-md-offset-1" style="height: 300px;overflow-y: scroll;">
						<?php echo $fila_juego['descripcion']; ?>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					        <?php if ($_SESSION['nombre_usuario']!="") {?>
									<a href="comprar.php?precio=<?php echo $fila_juego['precio'];?>&cj=<?php echo $codigoJuego; ?>" id="comprar" class="btn btn-warning form-control" >Comprar <?php echo $fila_juego['precio'];?> USD</a>
							<?php } else{?>
									<div class="text-center">Inicia sesion para poder comprar el juego. Precio USD 
											<?php echo $fila_juego['precio'];?>
									</div>
							<?php 	}?> 						
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<label>Desarrollador :  </label>
						<?php echo $fila_juego['nombre_desarrollador']; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<label>ESRB: </label>
								
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<img class="img img-responsive" src="<?php echo $fila_juego['url_esrb']; ?>" alt="">
							</div>
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<label>Calificacion : </label>
						<?php
							for ($i=0; $i < $fila_juego['calificacion'] ; $i++) { 
								?>
									<span class="glyphicon glyphicon-star" style="color:#f0ad4e;"></span>
								<?php
							}
						?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<label> Fecha de Lanzamiento : </label>
						<?php echo $fila_juego['fecha_publicacion']; ?>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
					</div>
					<!-- capturas -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont3">
							<h3 style="text-align: center;">Capturas</h3>
					</div>

					<?php
						Juegos::generarCapturas($conexion, $codigoJuego);
					?>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
					</div>
					<!-- video -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont3">
							<h3 style="text-align: center;">Trailer - Gameplay</h3>
					</div>
					<?php
						Juegos::generarTrailer($conexion, $codigoJuego);
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
					</div>				
					<!-- fin video -->
					<!-- requisitos -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont3">
							<h3 style="text-align: center;">Requisitos de sistema</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<div class="row">
							
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
							<?php
							Juegos::generarRequisitosMinimos($conexion, $codigoJuego);
							?>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
							<?php
							Juegos::generarRequisitosRecomendados($conexion, $codigoJuego);
							?>
						</div>
						

					</div>
						
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr>
					</div>
					<!-- fin requisitos -->
					<br>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont3">
							<h1 class="text-center">Comentarios</h1>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont">
							<div class="comments-container" style="">
								<ul id="comments-list" class="comments-list"></ul>
							</div>
					</div>

					<div class="container-fluid">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cont">
							<h3 class="text-center">Deja tu comentario</h3>
					</div>
		    				<div class="row">
		    					<div class="col-lg-6 col-md-6 col-sm-8 col-xs-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-1">
		    						<div class="widget-area no-padding blank">
										<div class="status-upload" style="width: 100%;">
											<form>
												<textarea id="txt-comentario" placeholder="Ingresa tu comentario aqui." ></textarea>
												
												<?php if ($_SESSION['nombre_usuario']!="") {?>
													<button onclick="GuardarComentario(<?php echo $_GET['codigoJuego']; ?>,'<?php echo $_SESSION['nombre_usuario']; ?>');" type="button" class="btn btn-success btn-lg">Enviar Comentario</button>
												<?php } else{?>
														<div class="text-center" style="background-color: #000">Inicia sesion para poder comentar acerca del juego</div>
												<?php 	}?> 
												
											</form>
										</div><!-- Status Upload  -->
									</div><!-- Widget Area -->
								</div>
		        			</div>
					</div><br>
			</div>
		</div>
	</div>
	

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
   <script src="js/controlador_usuario.js"></script>
      <script src="js/controlador_comprar.js"></script>
   <script type="text/javascript">
   	$(document).ready(function(){
   		CargarComentarios(<?php echo $_GET["codigoJuego"]?>,'<?php echo $_SESSION['nombre_usuario'];?>');
   	});
   </script>
</body>
</html>
