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
			$("#slc-desarrolladores").val(resultado.codigo_desarrollador);
			$("#slc-esrb").val(resultado.codigo_esrb);
			editarTrailer(codigoJuego);
			editarEspecificacionesMin(codigoJuego);
			editarEspecificacionesMax(codigoJuego);

			
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
	alert(info);
	$.ajax({
			url: "ajax/json.php?accion=7",
			data: info,
			method: "POST",
			dataType: 'json',
			success:function(resultado){
				alert(resultado);
				$("#txt-captura1").val(resultado.Captura1);
				$("#txt-captura2").val(resultado.Captura2);
				$("#txt-captura3").val(resultado.Captura3);
				$("#txt-captura4").val(resultado.Captura4);
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
});


