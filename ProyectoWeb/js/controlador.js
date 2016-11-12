$(document).ready(function(){
	

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