<?php
    include_once("class/class_conexion.php");
    include_once("class/class_categorias.php");  
    include_once("class/class_desarrolladores.php");
    include_once("class/class_juegos.php");
    $conexion = new Conexion();
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
            </ul>
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
            <label>Gestion de Producto</label><br><br>
              <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-nuevo-juego">Agregar</button><br><br>
              <button class="btn btn-primary btn-lg">Modificar</button><br><br>
              <a href="eliminar_producto.php"><button class="btn btn-danger btn-lg">Eliminar</button></a><br><br>

            </div>
        </div>
      </div>
    </div>

    <!--Ventana Modal de registro de nuevo juego-->
<div class="modal fade" id="modal-nuevo-juego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de Juego</h4>
      </div>
      <div class="modal-body">
          <!--Formulario de registro-->
          <table class="table">
          <tr>
            <th>Titulo</th>
            <td colspan="3"><input type="text" name="txt-titulo-juego" id="txt-titulo-juego" class="form-control" ></td>
          </tr>
          <tr>
            <th>Portada</th>
            <td colspan="3"><input type="text" name="txt-portada" id="txt-portada" class="form-control"></td>
          </tr>
          <tr>
            <th>Descripcion</th>
            <td colspan="3"><textarea  name="textArea-descripcion" id="textArea-descripcion" class="form-control"></textarea></td>
          </tr>
          <tr>
            <th>Categorias</th>
            <td colspan="3"><?php Categorias::checkBoxCategoria($conexion); ?></td>
          </tr>
          <tr>
            <th>Fecha de lanzamiento</th>
            <td colspan="3"><input type="text" name="txt-fecha-lanzamiento" id="txt-fecha-lanzamiento"  class="form-control"></td>
          </tr>
           <tr>
            <th>Precio</th>
            <td colspan="3"><input type="text" name="txt-precio" id="txt-precio" class="form-control"></td>
          </tr>
          <tr>
            <th>Tamaño</th>
            <td colspan="3"><input type="text" name="txt-tamano" id="txt-tamano" class="form-control"></td>
          </tr>
          <tr>
            <th>Url del producto</th>
            <td colspan="3"><input type="text" name="txt-url-iso" id="txt-url-iso" class="form-control"></td>
          </tr>
          <tr>
            <th>Desarrollador</th>
            <td colspan="3"><?php Desarrolladores::generarDesarrolladores($conexion);?></td>
          </tr>
          <tr>
            <th>Clasificacion ESRB</th>
            <td colspan="3"><?php Juegos::generarESRB($conexion);?></td>
          </tr>
           <tr>
             <th class="text-center" colspan="3">Especificaciones</th>
          </tr>
           <tr>
              <th></th>
              <th class="text-center">Minimos</th> 
              <th class="text-center">Recomendados</th>
          </tr>
          <tr>
            <th>CPU</th>
            <td><input type="text" name="txt-cpu-minimo" id="txt-cpu-minimo" class=" form-control"></td>
            <td><input type="text" name="txt-cpu-recomendado" id="txt-cpu-recomendado" class="form-control"></td>
          </tr>
          <tr>
            <th>RAM</th>
            <td><input type="text" name="txt-ram-minimo" id="txt-ram-minimo" class=" form-control"></td>
            <td><input type="text" name="txt-ram-recomendado" id="txt-ram-recomendado" class="form-control"></td>
          </tr>
          <tr>
            <th>Sistema Operativo</th>
            <td><input type="text" name="txt-sistema-operativo-minimo" id="txt-sistema-operativo-minimo" class=" form-control"></td>
            <td><input type="text" name="txt-sistema-operativo-recomendado" id="txt-sistema-operativo-recomendado" class="form-control"></td>
          </tr>
          <tr>
            <th>Tarjeta Grafica</th>
            <td><input type="text" name="txt-tarjeta-grafica-minimo" id="txt-tarjeta-grafica-minimo" class=" form-control"></td>
            <td><input type="text" name="txt-tarjeta-grafica-recomendado" id="txt-tarjeta-grafica-recomendado" class="form-control"></td>
          </tr>
        </table>

          <!--Fin Formulario de registro de  nuevo juego-->
      </div>
       <!--formulario de los botones de la ventana modal-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-guardar-usuario"  class="btn btn-primary">Guardar</button>
        
      </div>
    </div>
  </div>
</div>
      <br>
      <br>
      <br>
      <br>
    <footer>
            <div class="container ">
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
   <script src="js/controlador.js"></script>


</body>
</html>
