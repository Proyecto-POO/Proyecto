 comprar = function(fecha, precio){
	var info = "fecha="+fecha+"&"+
				"precio="+precio+"&"+
				"t-nombre="+$("#t-nombre").val()+"&"+
				"t-numero="+$("#t-numero").val()+"&"+
				"t-vencimiento="+$("#t-vencimiento").val()+"&"+
				"t-seguridad="+$("#t-seguridad").val();

	$.ajax({
		url: "ajax/acciones.php?accion=9",
		method: "POST",
		data: info,
		beforeSend: function(){
			$("#mensaje").hide();
			$("#loading").fadeIn();
		},
		success: function(respuesta){
			$("#loading").hide();
			$("#mensaje").fadeIn();
			$("#mensaje").html("<h2>TRANSACCION EXITOSA</h2>");
		}
	})			
}