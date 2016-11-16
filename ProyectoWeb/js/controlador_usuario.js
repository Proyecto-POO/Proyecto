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




function logInUsuario(){
	var datos = "usuario="+$("#user").val()+"&"+
			    "contrasena="+$("#pass").val();
	var nombre = $("#user").val()  	
	$.ajax({
			url:"ajax/json.php?accion=4",
			method: "POST",
			data: datos,
			dataType: 'json',
			success:function(resultado){
					if(resultado.nombre_usuario == nombre )
						location.href ="index_usuario.php";
			},
			error:function(){
			}
		})
} 

