<?php
    include_once("class/class_conexion.php");
    include_once("class/class_juegos.php");  
    include_once("class/class_usuario.php");
    include_once("class/class_categorias.php");
    include_once("class/class_desarrolladores.php");
    $conexion = new Conexion();
    session_start(); 
      if(!isset($_SESSION['usuario'])||($_SESSION['inicio']==1))
        header("Location: login_administrador.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Juego</title>
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
              <li><a href="index_administrador.php" class="hvr-underline-from-center">
              		<button class="btn btn-warning">Volver Atras</button>
              	</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
	<div class="container-fluid">
       <div class="row">
        <div id="tmp"></div>
              <div class="row-divisor-bottom col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
              <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="div-lista-modificar-juegos">
                    <div class="row">
                            <?php
                                  //impresion de las tarjetas de los juegos para modificar 
                                  Juegos::obtenerTarjetasModificar($conexion); 
                            ?>                 
                  </div>
              </div>
          
        </div>
    </div>
  </div>

      <!--Ventana Modal para editar juego-->
<div class="modal fade" id="modal-actualizar-juego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Juego</h4>
      </div>
      <div class="modal-body">
          <!--Formulario de registro-->
          <table class="table table-striped">
          <tr>
            <th>Titulo</th>
            <td colspan="3"><input type="text" name="txt-titulo-juego" id="txt-titulo-juego2" class="form-control" ></td>
          </tr>
          <tr>
            <th>Portada</th>
            <td colspan="3">
                  <form method="post" id="formulario" enctype="multipart/form-data"> Subir imagen: <input type="file" name="file">
                  </form>
                  <input type="text" disabled name="txt-portada" id="txt-portada2"  class="form-control">
            </td>
          </tr>
          <tr>
            <th>Descripcion</th>
            <td colspan="3"><textarea  name="textArea-descripcion" id="textArea-descripcion2" class="form-control"></textarea></td>
          </tr>
          <tr>
            <th>Categorias</th>
            <td colspan="3"><?php Categorias::checkBoxCategoria($conexion); ?></td>
          </tr>
          <tr>
            <th>Fecha de lanzamiento</th>
            <td colspan="3"><input type="date" name="txt-fecha-lanzamiento" id="txt-fecha-lanzamiento2"  class="form-control"></td>
          </tr>
           <tr>
            <th>Precio</th>
            <td colspan="3"><input type="text" name="txt-precio" id="txt-precio2" class="form-control"></td>
          </tr>
          <tr>
            <th>Tamaño</th>
            <td colspan="3"><input type="text" name="txt-tamano" id="txt-tamano2" class="form-control"></td>
          </tr>
          <tr>
            <th>Url del producto</th>
            <td colspan="3"><input type="text" name="txt-url-iso" id="txt-url-iso2" class="form-control"></td>
          </tr>
          <tr>
            <th>Url del Trailer</th>
            <td colspan="3"><input type="text" name="txt-trailer" id="txt-trailer" class="form-control"></td>
          </tr>
          <tr>
            <th>calificacion</th>
            <td colspan="3"><input type="text" name="txt-calificacion" id="txt-calificacion2" class="form-control"></td>
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
             <th class="text-center" colspan="3">Captura del Juego</th>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-1" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura1">
                  </form>
                  <input type="text" disabled name="txt-captura1" id="txt-captura1"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-2" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura2">
                  </form>
                  <input type="text" disabled name="txt-captura2" id="txt-captura2"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-3" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura3">
                  </form>
                  <input type="text" disabled name="txt-captura3" id="txt-captura3"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-4" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura4">
                  </form>
                  <input type="text" disabled name="txt-captura4" id="txt-captura4"  class="form-control">
            </td>
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
        <button type="button" id="btn-modificar-juego"  class="btn btn-primary">Actualizar Datos</button>
        
      </div>
    </div>
  </div>
</div>

    <br><br><br><br><br><br><br>
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
   <script src="js/controlador_admin.js"></script>
   <script >
    //Permite el almacenamiento de la imagen en la carpeta predestinada y la URL a la base de datos
        $(function(){
            $("input[name='file']").on("change", function(){
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: "imagen.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        alert(datos);
                        $("#txt-portada2").val(datos);
                    }
                });
            });
              $("input[name='file-captura1']").on("change", function(){
                var formData = new FormData($("#form-captura-1")[0]);
                $.ajax({
                    url: "imagen_captura.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        alert(datos);
                        $("#txt-captura1").val(datos);
                    }
                });
            }); 
        });
        $(function(){
                  
        });
        $(function(){
           $("input[name='file-captura2']").on("change", function(){
                var formData = new FormData($("#form-captura-2")[0]);
                $.ajax({
                    url: "imagen_captura.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        alert(datos);
                        $("#txt-captura2").val(datos);
                    }
                });
            });
        });
        $(function(){
             $("input[name='file-captura3']").on("change", function(){
                var formData = new FormData($("#form-captura-3")[0]);
                $.ajax({
                    url: "imagen_captura.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        alert(datos);
                        $("#txt-captura3").val(datos);
                    }
                });
            });
        });
        $(function(){
             $("input[name='file-captura4']").on("change", function(){
                var formData = new FormData($("#form-captura-4")[0]);
                $.ajax({
                    url: "imagen_captura.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        alert(datos);
                        $("#txt-captura4").val(datos);
                    }
                });
            });          
        });
          
   </script>
</body>
</html>