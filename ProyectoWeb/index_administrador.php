<?php
    include_once("class/class_conexion.php");
    include_once("class/class_categorias.php");  
    include_once("class/class_desarrolladores.php");
    include_once("class/class_juegos.php");
    $conexion = new Conexion();
    session_start(); 
    if((!isset($_SESSION['usuario']))||($_SESSION['inicio']==1))
      header("Location: login_administrador.php");
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
              <li><a href="index_administrador.php" class="hvr-underline-from-center">Inicio</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
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
              <a href="eliminar_producto.php"><button class="btn btn-warning btn-lg">Ver Usuarios y Juegos</button></a><br><br>
              <a href="transacciones.php" class="btn btn-primary btn-lg">Ver Transacciones</a><br><br>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="cont">
            <label>Gestion de Producto</label><br><br>
              <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-nuevo-juego">Agregar</button><br><br>
              <a href="modificar_juegos.php"><button class="btn btn-primary btn-lg" >Modificar</button></a><br><br>

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
          <form id="formulario">
          <table class="table table-striped">
          <tr>
            <th>Titulo</th>
            <td colspan="3"><input type="text" name="txt-titulo-juego" id="txt-titulo-juego" class="form-control">
              <div id="error1" class="well error-form"> Error, campo vacio, ingrese el titulo del juego.</div>
            </td>
          </tr>
          <tr>
            <th>Portada</th>
            <td colspan="3">
                  <form method="post" id="formulario" enctype="multipart/form-data"> Subir imagen: <input type="file" name="file">
                  </form>
                  <input type="text" style="display: none" name="txt-portada" id="txt-portada"  class="form-control">
            </td>
          </tr>
          <tr>
            <th>Descripcion</th>
            <td colspan="3"><textarea  name="textArea-descripcion" id="textArea-descripcion" class="form-control"></textarea>
              <div id="error2" class="well error-form"> Error, campo vacio, ingrese la descripcion del juego.</div>
            </td>
          </tr>
          <tr>
            <th>Categorias</th>
            <td colspan="3"><?php Categorias::checkBoxCategoria($conexion); ?>
              <div id="error-categorias" class="well error-form"> Error, debe seleccionar al menos una categoria.</div>
            </td>
          </tr>
          <tr>
            <th>Fecha de lanzamiento</th>
            <td colspan="3"><input type="date" name="txt-fecha-lanzamiento" id="txt-fecha-lanzamiento"  class="form-control">
            <div id="error3" class="well error-form"> Error, campo vacio, seleccione la fecha de lanzamiento.</div>
            </td>
          </tr>
           <tr>
            <th>Precio</th>
            <td colspan="3"><input type="text" name="txt-precio" id="txt-precio" class="form-control">
            <div id="error4" class="well error-form"> Error, campo vacio, o valor invalido</div>
            </td>
          </tr>
          <tr>
            <th>Tamaño</th>
            <td colspan="3"><input type="text" name="txt-tamano" id="txt-tamano" class="form-control"></td>
          </tr>
          <tr>
            <th>Url del producto</th>
            <td colspan="3"><input type="text" name="txt-url-iso" id="txt-url-iso" class="form-control">
            <div id="error5" class="well error-form"> Error, campo vacio, ingrese la url del producto.</div>
            </td>
          </tr>
           <tr>
            <th>Url del Trailer</th>
            <td colspan="3"><input type="text" name="txt-trailer" id="txt-trailer" class="form-control">
            <div id="error6" class="well error-form"> Error, campo vacio, ingrese la url del trailer.</div>
            </td>
          </tr>
          <tr>
            <th>calificacion</th>
            <td colspan="3"><input type="text" name="txt-calificacion" id="txt-calificacion" class="form-control">
            <div id="error7" class="well error-form"> Error, campo vacio,  o calificacion incorrecta.</div>
            </td>
          </tr>
          <tr>
            <th>Clave del pruducto</th>
            <td colspan="3"><input type="text" name="txt-clave-producto" id="txt-clave-producto" class="form-control">
            <div id="error-clave" class="well error-form"> Error, campo vacio o ingrese la clave correcta.</div>
            </td>
          </tr>
          <tr>
            <th>Desarrollador</th>
            <td colspan="3"><?php Desarrolladores::generarDesarrolladores($conexion);?>
              <div id="error8" class="well error-form"> Error, campo vacio, seleccione el desarrollador.</div>
            </td>
          </tr>
          <tr>
            <th>Clasificacion ESRB</th>
            <td colspan="3"><?php Juegos::generarESRB($conexion);?>
              <div id="error9" class="well error-form"> Error, campo vacio, seleccione la ESRB del juego.</div>
            </td>
          </tr>
          <tr>
             <th class="text-center" colspan="3">Captura del Juego</th>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-1" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura1">
                  </form>
                  <input type="text" style="display: none" name="txt-captura1" id="txt-captura1"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-2" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura2">
                  </form>
                  <input type="text" style="display: none" name="txt-captura2" id="txt-captura2"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-3" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura3">
                  </form>
                  <input type="text" style="display: none" name="txt-captura3" id="txt-captura3"  class="form-control">
            </td>
          </tr>
           <tr>
            <td colspan="3">
                  <form method="post" id="form-captura-4" enctype="multipart/form-data"> Subir imagen de captura del juego: <input type="file" name="file-captura4">
                  </form>
                  <input type="text" style="display: none" name="txt-captura4" id="txt-captura4"  class="form-control">
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
            <td><input type="text" name="txt-cpu-minimo" id="txt-cpu-minimo" class=" form-control">
            <div id="error10" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
             </td>
            <td><input type="text" name="txt-cpu-recomendado" id="txt-cpu-recomendado" class="form-control">
            <div id="error11" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
            </td>
          </tr>
          <tr>
            <th>RAM</th>
            <td><input type="text" name="txt-ram-minimo" id="txt-ram-minimo" class=" form-control">
            <div id="error12" class="well error-form"> Error, campo vacio, o valor incorrecto.</div>
            </td>
            <td><input type="text" name="txt-ram-recomendado" id="txt-ram-recomendado" class="form-control">
            <div id="error13" class="well error-form"> Error, campo vacio, o valor incorrecto.</div>
              </td>
          </tr>
          <tr>
            <th>Sistema Operativo</th>
            <td><input type="text" name="txt-sistema-operativo-minimo" id="txt-sistema-operativo-minimo" class=" form-control">
            <div id="error14" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
             </td>
            <td><input type="text" name="txt-sistema-operativo-recomendado" id="txt-sistema-operativo-recomendado" class="form-control">
            <div id="error15" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
              </td>
          </tr>
          <tr>
            <th>Tarjeta Grafica</th>
            <td><input type="text" name="txt-tarjeta-grafica-minimo" id="txt-tarjeta-grafica-minimo" class=" form-control">
            <div id="error16" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
            </td>
            <td><input type="text" name="txt-tarjeta-grafica-recomendado" id="txt-tarjeta-grafica-recomendado" class="form-control">
            <div id="error17" class="well error-form"> Error, campo vacio, ingrese la especificacion.</div>
            </td>
          </tr>
        </table>
        </form>
          <!--Fin Formulario de registro de  nuevo juego-->
      </div>
       <!--formulario de los botones de la ventana modal-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-guardar-juego"  class="btn btn-primary">Guardar</button>
        
      </div>
    </div>
  </div>
</div>
<div id="depuracion"></div>
      <br><br><br><br><br><br><br>
    <footer>
            <div class="container ">
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
                        $("#txt-portada").val(datos);
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
                        $("#txt-captura4").val(datos);
                    }
                });
            });          
        });
          
   </script>


</body>
</html>
