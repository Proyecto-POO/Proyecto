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

CargarComentarios = function(codigoJuego){
	var info = "codigo_juego=" + codigoJuego;
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

GuardarComentario=function(codigoJuego){
	var info = "codigo_juego=" + codigoJuego +"&"+
		"slc-usuarios=" + $("#slc-usuarios").val()+"&"+
	 	"txt-comentario=" + $("#txt-comentario").val();
		$.ajax({
			data: info,
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			success:function(resultado){
				CargarComentarios(codigoJuego);
			},
			error:function(){
		}
	});
}

eliminarComentario = function(codigoComentario,codigoJuego){
	var info = "codigoComentario=" + codigoComentario;
		$.ajax({
			data: info,
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			success:function(resultado){
				CargarComentarios(codigoJuego);
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