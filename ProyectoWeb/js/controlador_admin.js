var CodigoJuegoActualizar;
function logInAdmin(){
	var datos = "Admin="+$("#user-admin").val()+"&"+
			    "contrasena="+$("#pass-admin").val();
	var nombreAdmin = $("#user-admin").val(); 	  	
	$.ajax({
			url:"ajax/json.php?accion=5",
			method: "POST",
			data: datos,
			dataType: 'json',
			success:function(resultado){
					if(resultado.usuario == nombreAdmin )
						location.href ="index_administrador.php";

			},
			error:function(){
				alert("ERROR")
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
	CodigoJuegoActualizar=codigoJuego;
	var info = "codigo_juego=" + codigoJuego;
	$.ajax({
		url: "ajax/json.php?accion=1",
		data: info,
		method: "POST",
		dataType: 'json',
		success:function(resultado){
			$("#txt-titulo-juego2").val(resultado.nombre_juego);
			$("#txt-portada2").val(resultado.portada);
			$("#textArea-descripcion2").val(resultado.descripcion);
			$("#txt-fecha-lanzamiento2").val(resultado.fecha_publicacion);
			$("#txt-precio2").val(resultado.precio);
			$("#txt-tamano2").val(resultado.portada);
			$("#txt-url-iso2").val(resultado.url);
			$("#txt-calificacion2").val(resultado.calificacion);
			$("#txt-clave-producto").val(resultado.clave_producto);
			$("#slc-desarrolladores").val(resultado.codigo_desarrollador);
			$("#slc-esrb").val(resultado.codigo_esrb);
			editarTrailer(codigoJuego);
			editarEspecificacionesMin(codigoJuego);
			editarEspecificacionesMax(codigoJuego);
			editarCapturas(codigoJuego);

			
		},
		error: function(){
			alert("hubo error");
		}
	});
}

editarTrailer = function(codigoJuego){
	var info = "codigo_juego=" + codigoJuego;
	$.ajax({
			url: "ajax/json.php?accion=6",
			data: info,
			method: "POST",
			dataType: 'json',
			success:function(resultado){
				$("#txt-trailer").val(resultado.url_trailer);
			}

	});
}

editarCapturas = function(codigoJuego){
  	var info = "codigo_juego=" + codigoJuego;
  	$.ajax({
  			url: "ajax/json.php?accion=7",
  			data: info,
  			method: "POST",
  			dataType: 'json',
  			success:function(resultado){
  				alert(resultado);
  				$("#txt-captura1").val(resultado.imagen0);
  				$("#txt-captura2").val(resultado.imagen1);
  				$("#txt-captura3").val(resultado.imagen2);
  				$("#txt-captura4").val(resultado.imagen3);
  			},
  			error: function(){
  				alert("NO");
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
			$("#txt-cpu-minimo").val(resultado.cpu);
			$("#txt-ram-minimo").val(resultado.ram);
			$("#txt-sistema-operativo-minimo").val(resultado.sistema_operativo);
			$("#txt-tarjeta-grafica-minimo").val(resultado.targeta_grafica);
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
			$("#txt-cpu-recomendado").val(resultado.cpu);
			$("#txt-ram-recomendado").val(resultado.ram);
			$("#txt-sistema-operativo-recomendado").val(resultado.sistema_operativo);
			$("#txt-tarjeta-grafica-recomendado").val(resultado.targeta_grafica);
			}
	});
}

$("#btn-guardar-juego").click(function(){
	formulario = document.getElementById("formulario");
	var cont = 0;
	for(var i=0; i<formulario.elements.length; i++) {
	  var elemento = formulario.elements[i];
	  if(elemento.type == "checkbox") {
	    if(elemento.checked) {
	      cont = cont + 1;
	    }
	  }
	}
	if (cont > 0) {
		categoriaSeleccionada = true;
	}else{
		categoriaSeleccionada = false;
	}
	if ($("#txt-titulo-juego").val()==""
		|| categoriaSeleccionada == false
		||$("#txt-portada").val()==""
		||$("#textArea-descripcion").val()==""
		||$("#txt-fecha-lanzamiento").val()==""
		||$("#txt-precio").val()==""
		||$("#txt-clave-producto").val()==""
		|| !/^[0-9]+$/.test($("#txt-precio").val())
		||$("#txt-url-iso").val()==""
		||$("#txt-trailer").val()==""
		||$("#txt-calificacion").val()==""
		|| !/^[0-5]+$/.test($("#txt-calificacion").val())
		||$("#slc-desarrolladores").val()==""
		||$("#slc-esrb").val()==""
		||$("#txt-captura1").val()==""
		||$("#txt-captura2").val()==""
		||$("#txt-captura3").val()==""
		||$("#txt-captura4").val()==""
		||$("#txt-cpu-minimo").val()==""
		||$("#txt-cpu-recomendado").val()==""
		||$("#txt-ram-minimo").val()==""
		|| !/^[0-9]+$/.test($("#txt-ram-minimo").val())
		||$("#txt-ram-recomendado").val()==""
		|| !/^[0-9]+$/.test($("#txt-ram-recomendado").val())
		||$("#txt-sistema-operativo-minimo").val()==""
		||$("#txt-sistema-operativo-recomendado").val()==""
		||$("#txt-tarjeta-grafica-minimo").val()==""
		||$("#txt-tarjeta-grafica-recomendado").val()=="") {

		if ($("#txt-clave-producto").val()=="") {
			$("#error-clave").fadeIn();
		}else{
			$("#error-clave").fadeOut();
		}

		if (categoriaSeleccionada==false) {
			$("#error-categorias").fadeIn();
		}else{
			$("#error-categorias").fadeOut();
		}
		

		if ($("#txt-titulo-juego").val()=="") {
			$("#error1").fadeIn();
		}else{
			$("#error1").fadeOut();		
		}
		if ($("#textArea-descripcion").val()=="") {
			$("#error2").fadeIn();	
		}else{
			$("#error2").fadeOut();			
		}
		if ($("#txt-fecha-lanzamiento").val()=="") {
			$("#error3").fadeIn();
		}else{
			$("#error3").fadeOut();			
		}
		if ($("#txt-precio").val()==""|| !/^[0-9]+$/.test($("#txt-precio").val())) {
			$("#error4").fadeIn();
		}else{
			$("#error4").fadeOut();			
		}
		if ($("#txt-url-iso").val()=="") {
			$("#error5").fadeIn();
		}else{
			$("#error5").fadeOut();			
		}
		if ($("#txt-trailer").val()=="") {
			$("#error6").fadeIn();
		}else{
			$("#error6").fadeOut();			
		}
		if ($("#txt-calificacion").val()=="" || !/^[0-5]+$/.test($("#txt-calificacion").val())) {
			$("#error7").fadeIn();
		}else{
			$("#error7").fadeOut();		}
		if ($("#slc-desarrolladores").val()=="") {
			$("#error8").fadeIn();
		}else{
			$("#error8").fadeOut();			
		}
		if ($("#slc-esrb").val()=="") {
			$("#error9").fadeIn();
		}else{
			$("#error9").fadeOut();			
		}
		if ($("#txt-cpu-minimo").val()=="") {
			$("#error10").fadeIn();
		}else{
			$("#error10").fadeOut();			
		}
		if ($("#txt-cpu-recomendado").val()=="") {
			$("#error11").fadeIn();
		}else{
			$("#error11").fadeOut();			
		}
		if ($("#txt-ram-minimo").val()=="" || !/^[0-9]+$/.test($("#txt-ram-minimo").val())) {
			$("#error12").fadeIn();
		}else{
			$("#error12").fadeOut();			
		}
		if ($("#txt-ram-recomendado").val()=="" || !/^[0-9]+$/.test($("#txt-ram-recomendado").val())) {
			$("#error13").fadeIn();
		}else{
			$("#error13").fadeOut();			
		}
		if ($("#txt-sistema-operativo-minimo").val()=="") {
			$("#error14").fadeIn();
		}else{
			$("#error14").fadeOut();			
		}
		if ($("#txt-sistema-operativo-recomendado").val()=="") {
			$("#error15").fadeIn();
		}else{
			$("#error15").fadeOut();			
		}
		if ($("#txt-tarjeta-grafica-minimo").val()=="") {
			$("#error16").fadeIn();
		}else{
			$("#error16").fadeOut();			
		}
		if ($("#txt-tarjeta-grafica-recomendado").val()=="") {
			$("#error17").fadeIn();
		}else{
			$("#error17").fadeOut();			
		}
	}
	else{
		$("#error-categorias").hide();
		$("#error1").hide();
		$("#error2").hide();
		$("#error3").hide();
		$("#error4").hide();
		$("#error5").hide();
		$("#error6").hide();	
		$("#error7").hide();	
		$("#error8").hide();
		$("#error9").hide();
		$("#error10").hide();
		$("#error11").hide();
		$("#error12").hide();
		$("#error13").hide();
		$("#error14").hide();
		$("#error15").hide();
		$("#error16").hide();
		$("#error17").hide();
		$("#error-clave").hide();
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
			"&txt-url-iso="+$("#txt-url-iso").val()+
			"&txt-trailer="+$("#txt-trailer").val()+
			"&txt-calificacion="+$("#txt-calificacion").val()+
			"&slc-desarrolladores="+$("#slc-desarrolladores").val()+
			"&slc-esrb="+$("#slc-esrb").val()+
			"&txt-captura1="+$("#txt-captura1").val()+//comienzo de las capturas del juego
			"&txt-captura2="+$("#txt-captura2").val()+
			"&txt-captura3="+$("#txt-captura3").val()+
			"&txt-captura4="+$("#txt-captura4").val()+
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
		$("#txt-sistema-operativo-recomendado").val("");
		$("#txt-titulo-juego").val("");
		$("#txt-portada").val(-1);
		$("#textArea-descripcion").val("");
		$("#txt-fecha-lanzamiento").val("");
		$("#txt-precio").val("");
		$("#txt-url-iso").val("");
		$("#txt-trailer").val("");
		$("#txt-calificacion").val("");
		$("#slc-desarrolladores").val("");
		$("#slc-esrb").val("");
		$("#txt-captura1").val(-1);
		$("#txt-captura2").val(-1);
		$("#txt-captura3").val(-1);
		$("#txt-captura4").val(-1);
		$("#txt-cpu-minimo").val("");
		$("#txt-cpu-recomendado").val("");
		$("#txt-ram-minimo").val("");
		$("#txt-ram-recomendado").val("");
		$("#txt-sistema-operativo-minimo").val("");
		$("#txt-tarjeta-grafica-minimo").val("");
		$("#txt-tarjeta-grafica-recomendado").val("");
	}
});


$("#btn-modificar-juego").click(function(){

	$("#btn-modificar-juego").button("Guardando");
	var categoriasSeleccionadas="";
		
		$("input[name='chkcategorias[]']:checked").each(function(){
			categoriasSeleccionadas+="categorias[]="+$(this).val()+"&";
		});

	var parametros=
			"txt-titulo-juego2="+$("#txt-titulo-juego2").val()+
			"&txt-portada2="+$("#txt-portada2").val()+
			"&CodigoJuegoActualizar="+CodigoJuegoActualizar+
			"&textArea-descripcion2="+$("#textArea-descripcion2").val()+
			"&"+categoriasSeleccionadas+
			"txt-fecha-lanzamiento2="+$("#txt-fecha-lanzamiento2").val()+
			"&txt-precio2="+$("#txt-precio2").val()+
			"&txt-url-iso2="+$("#txt-url-iso2").val()+
			"&txt-trailer="+$("#txt-trailer").val()+
			"&txt-calificacion2="+$("#txt-calificacion2").val()+
			"&txt-clave-producto="+$("#txt-clave-producto").val()+
			"&slc-desarrolladores="+$("#slc-desarrolladores").val()+
			"&slc-esrb="+$("#slc-esrb").val()+
			"&txt-captura1="+$("#txt-captura1").val()+//comienzo de las capturas del juego
			"&txt-captura2="+$("#txt-captura2").val()+
			"&txt-captura3="+$("#txt-captura3").val()+
			"&txt-captura4="+$("#txt-captura4").val()+
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
			url:"ajax/acciones.php?accion=8",
			method: "POST",
			data: parametros,
			success:function(resultado){
				alert(resultado);
				$("#btn-modificar-juego").button("reset");
			},
			error:function(){

			}
		});
});


