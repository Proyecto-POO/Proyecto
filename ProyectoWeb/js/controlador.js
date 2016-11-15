$(document).ready(function(){
	$("#btn-crear-cuenta").click(function(){
           var nombreUsuario = $("#txt-nombre-usuario").val();
           var nombre = $("#txt-nombre").val();
           var apellido = $("#txt-apellido").val();
           var contrasena = $("#txt-contrasena").val();
           var contrasenaVerificar = $("#txt-contrasena-verificar").val();
           var correo = $("#txt-correo").val();
           var correoVerificar = $("#txt-correo-verificar").val();
           //faltan las variables de los select y el checkbox (que no aparece).
 
           if(nombreUsuario==""
             ||nombre==""
             ||apellido==""
             ||contrasena==""
             ||contrasenaVerificar==""
             ||contrasenaVerificar!=contrasena
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
 
             if(contrasena==""){
                $("#mensaje2").fadeIn();
                
             }else{
                $("#mensaje2").fadeOut();
             }
 
             if(contrasenaVerificar==""||contrasenaVerificar!=contrasena){
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

             if(nombre==""){
                $("#mensaje6").fadeIn();
                
             }else{
                $("#mensaje6").fadeOut();
             }

             if(apellido==""){
                $("#mensaje7").fadeIn();
                
             }else{
                $("#mensaje7").fadeOut();
             }
 
           } else{
             alert("informacion enviada con exito.");
             $("#mensaje1").fadeOut();
             $("#mensaje2").fadeOut();
             $("#mensaje3").fadeOut();
             $("#mensaje4").fadeOut();
             $("#mensaje5").fadeOut();
             $("#mensaje6").fadeOut();
             $("#mensaje7").fadeOut();
 			 
             $("#txt-nombre-usuario").val("");
             $("#txt-nombre").val("");
             $("#txt-apellido").val("");
             $("#txt-contrasena").val("");
             $("#txt-contrasena-verificar").val("");
             $("#txt-correo").val("");
             $("#txt-correo-verificar").val("");
           } 
         });
	

});

CargarComentarios = function(codigoJuego,nombreUsuario){
	var info = "codigo_juego=" + codigoJuego + "&nombre_usuario=" + nombreUsuario;
		$.ajax({
			data: info,
			url:"ajax/acciones.php?accion=1",
			method: "POST",
			success:function(resultado){
				$("#comments-list").html(resultado);
			},
			error:function(){
		}
	});
}

GuardarComentario=function(codigoJuego,nombreUsuario){
	var info = "codigo_juego=" + codigoJuego +"&"+
		"nombre_usuario=" + nombreUsuario + "&"+
	 	"txt-comentario=" + $("#txt-comentario").val();
		$.ajax({
			data: info,
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			success:function(resultado){
				CargarComentarios(codigoJuego,nombreUsuario);
				$("#txt-comentario").val("");
			},
			error:function(){
		}
	});
}

eliminarComentario = function(codigoComentario,codigoJuego,nombreUsuario){
	var info = "codigoComentario=" + codigoComentario;
		$.ajax({
			data: info,
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			success:function(resultado){
				CargarComentarios(codigoJuego,nombreUsuario);
				alert("Comentario eliminado con exito.");
			},
			error:function(){
		}
	});

}

$("#btn-guardar-juego").click(function(){
	$("#btn-guardar-juego").button("Guardando");
	var categoriasSeleccionadas="";
		
		$("input[name='chkcategorias[]']:checked").each(function(){
			categoriasSeleccionadas+="categorias[]="+$(this).val()+"&";
		});

	var parametros=
			"txt-titulo-juego="+$("#txt-titulo-juego").val()+
			"&txt-portada="+$("#txt-portada").val()+
			"&textArea-descripcion="+$("#textArea-descripcion").val()+
			"&"+categoriasSeleccionadas+
			"txt-fecha-lanzamiento="+$("#txt-fecha-lanzamiento").val()+
			"&txt-precio="+$("#txt-precio").val()+
			"&txt-tamano="+$("#txt-tamano").val()+
			"&txt-url-iso="+$("#txt-url-iso").val()+
			"&txt-calificacion="+$("#txt-calificacion").val()+
			"&slc-desarrolladores="+$("#slc-desarrolladores").val()+
			"&slc-esrb="+$("#slc-esrb").val()+
			"&txt-cpu-minimo="+$("#txt-cpu-minimo").val()+//comienza informacion de especificaciones
			"&txt-cpu-recomendado="+$("#txt-cpu-recomendado").val()+
			"&txt-ram-minimo="+$("#txt-ram-minimo").val()+
			"&txt-ram-recomendado="+$("#txt-ram-recomendado").val()+
			"&txt-sistema-operativo-minimo="+$("#txt-sistema-operativo-minimo").val()+
			"&txt-sistema-operativo-recomendado="+$("#txt-sistema-operativo-recomendado").val()+
			"&txt-tarjeta-grafica-minimo="+$("#txt-tarjeta-grafica-minimo").val()+
			"&txt-tarjeta-grafica-recomendado="+$("#txt-tarjeta-grafica-recomendado").val();

			alert(parametros);
	$.ajax({
			url:"ajax/acciones.php?accion=4",
			method: "POST",
			data: parametros,
			success:function(resultado){
				alert(resultado);
				$("#btn-guardar-juego").button("reset");
			},
			error:function(){

			}
		});
});


function logInUsuario(){
	var datos = "usuario="+$("#user").val()+"&"+
			    "contrasena="+$("#pass").val();

			  // alert(datos);  	
	$.ajax({
			url:"ajax/acciones.php?accion=5",
			method: "POST",
			data: datos,
			
			success:function(resultado){
				
				if (resultado==1) {
					
					location.href = "index_usuario.php?nombre="+$("#user").val()+"";
					$("#comprar").fadeIn();
			}

			},
			error:function(){

			}
		})
} 
function logInAdmin(){
	var datos = "Admin="+$("#user-admin").val()+"&"+
			    "contrasena="+$("#pass-admin").val();

			  // alert(datos);  	
	$.ajax({
			url:"ajax/acciones.php?accion=8",
			method: "POST",
			data: datos,
			
			success:function(resultado){
				if (resultado==1) {
					location.href = "index_administrador.php?nombre="+$("#user-admin").val()+"";
					
			}

			},
			error:function(){

			}
		})
}
function eliminarUsuario(codigoUsuario){
	alert(codigoUsuario);
	var eliminarUsuario = "codigoUsuario= " + codigoUsuario;
	$.ajax({
		url:"ajax/acciones.php?accion=6",
		method:"POST",
		data: eliminarUsuario,
		success:function(resultado){
				$("#div-lista-usuarios").html(resultado);
			},
			error:function(){
		}
	}) 
}

function eliminarJuego(codigoJuego){
	alert(codigoJuego);
	var eliminarJuego = "codigoJuego= " + codigoJuego;
	$.ajax({
		url:"ajax/acciones.php?accion=7",
		method:"POST",
		data: eliminarJuego,
		success:function(resultado){
				$("#div-lista-eliminar-juegos").html(resultado);
			},
			error:function(){
		}
	}) 
}

function editarJuego(codigoJuego){
	alert(codigoJuego);
	var info = "codigo_juego=" + codigoJuego;
	$.ajax({
		url: "ajax/json.php?accion=1",
		data: info,
		method: "POST",
		dataType: 'json',
		success:function(resultado){
			alert(resultado);
			$("#txt-titulo-juego2").val(resultado.nombre_juego);
			$("#txt-portada2").val(resultado.portada);
			$("#textArea-descripcion2").val(resultado.descripcion);
			$("#txt-fecha-lanzamiento2").val(resultado.fecha_publicacion);
			$("#txt-precio2").val(resultado.precio);
			$("#txt-tamano2").val(resultado.portada);
			$("#txt-url-iso2").val(resultado.url);
			$("#txt-calificacion2").val(resultado.calificacion);
			$("#slc-desarrolladores").val(resultado.codigo_desarrollador);
			$("#slc-esrb").val(resultado.codigo_esrb);
			editarEspecificacionesMin(codigoJuego);
			editarEspecificacionesMax(codigoJuego);

			
		},
		error: function(){
			alert("hubo error");
		}
	});
}

editarEspecificacionesMin = function(codigoJuego){
	var info = "codigo_juego=" + codigoJuego;
	$.ajax({
		url: "ajax/json.php?accion=2",
			data: info,
			method: "POST",
			dataType: 'json',
			success:function(resultado){
			$("#txt-cpu-minimo2").val(resultado.cpu);
			$("#txt-ram-minimo2").val(resultado.ram);
			$("#txt-sistema-operativo-minimo2").val(resultado.sistema_operativo);
			$("#txt-tarjeta-grafica-minimo2").val(resultado.targeta_grafica);
			}
	});
}

editarEspecificacionesMax = function(codigoJuego){
	var info = "codigo_juego=" + codigoJuego;
	$.ajax({
		url: "ajax/json.php?accion=3",
			data: info,
			method: "POST",
			dataType: 'json',
			success:function(resultado){
			$("#txt-cpu-recomendado2").val(resultado.cpu);
			$("#txt-ram-recomendado2").val(resultado.ram);
			$("#txt-sistema-operativo-recomendado2").val(resultado.sistema_operativo);
			$("#txt-tarjeta-grafica-recomendado2").val(resultado.targeta_grafica);
			}
	});
}

function comprarJuego(codigoJuego,nombreUsuario){
	alert("codigo del juego: " + codigoJuego + " nombre de usuario: " + nombreUsuario);
	var info = "codigo_juego=" + codigoJuego + "&nombre_usuario=" + nombreUsuario + "&numero_identidad=" + $("#numero-id").val()
	+ "&numero_tarjeta=" + $("#numero-tarjeta").val();
	$.ajax({
		url: "ajax/acciones.php?accion=9",
		data: info,
		method: "POST",
		success:function(resultado){
			alert("llegue al success de comprar juego");
			alert(resultado);
		},
		error: function(){
			alert("hubo error");
		}
	});
}
