 comprar = function(fecha, precio){
	var info = "fecha="+fecha+"&"+
				"precio="+precio+"&"+
				"t-nombre="+$("#t-nombre").val()+"&"+
				"t-numero="+$("#t-numero").val()+"&"+
				"t-vencimiento="+$("#t-vencimiento").val()+"&"+
				"t-seguridad="+$("#t-seguridad").val();

	$.ajax({
		url: "ajax/acciones.php?accion=10",
		method: "POST",
		data: info,
		beforeSend: function(){
			$("#mensaje").hide();
			$("#continuar").hide();
			$("#loading").fadeIn();
		},
		success: function(respuesta){
			$("#loading").hide();
			$("#mensaje").fadeIn();
			$("#mensaje").html("<h2>TRANSACCION EXITOSA</h2>");
			$("#continuar").fadeIn();
		}
	})			
}

finalCompra = function(codigoJuego){
	var codigo="codigoJuego="+codigoJuego;
	
	$.ajax({
		url: "ajax/acciones.php?accion=11",
		method: "POST",
		data: codigo,
		success: function(respuesta){
			$("#clave-activacion").fadeIn();
			$("#clave-activacion").html(respuesta);
			descarga(codigoJuego);
		}
	})
}

descarga = function(codigoJuego){
	var codigo="codigoJuego="+codigoJuego;
	
	$.ajax({
		url: "ajax/acciones.php?accion=12",
		method: "POST",
		data: codigo,
		success: function(respuesta){
			$("#descarga").html(respuesta);
		}
	})
}