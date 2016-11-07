<?php
	include_once("class/class_conexion.php");
	$conexion = new Conexion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar Juego</title>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hovereffects.css">
    <link rel="stylesheet" href="css/admin.css">
    <meta charset="utf-8">

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
              <li><a href="index.php" class="hvr-underline-from-center">
              		<button class="btn btn-warning">Volver Atras</button>
              	</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 col-lg-offset-3 cont">
				<?php
					$codigoJuego = $_GET['codigoJuego'];
					$juego = $conexion->ejecutarInstruccion('
							SELECT 
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
									c.tipo_esrb
									FROM tbl_juegos a
									INNER JOIN tbl_desarrollador b
									ON (a.codigo_desarrollador=b.codigo_desarrollador) 
									INNER JOIN tbl_esrb c
									ON (a.codigo_esrb = c.codigo_esrb)
									WHERE codigo_juego = '.$codigoJuego.'
						');
					$fila_juego = $conexion->obtenerFila($juego);				
				?>
					<br><br>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-lg-offset-3 cont">
						<img src="<?php echo $fila_juego['portada']; ?>" class='img img-responsive'>						
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  cont">
							<h2 style="text-align: center;"><?php echo $fila_juego['nombre_juego'] ?></h2>
					</div>
					<br><br><br><br><hr>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<label>Desarrollador :  </label>
						<?php echo $fila_juego['nombre_desarrollador']; ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<label>ESRB : </label>
						<?php echo $fila_juego['tipo_esrb']; ?>
					</div>
					<br><br><hr>
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
					<br><br><hr>
					<h2 style="text-align: center;">Descripcion</h2>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2" style="height: 300px;overflow-y: scroll;">
						<?php echo $fila_juego['descripcion']; ?>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
					<h2 style="text-align: center;">Comprar</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button class="btn btn-warning form-control" >$ <?php echo $fila_juego['precio'];?></button>
					</div>

			</div>
		</div>
	</div>
	<br>
	<br>
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
</body>
</html>