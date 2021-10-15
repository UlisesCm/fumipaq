// JS MODULA Autor: Armando Viera Rodriguez 2016
function vaciarCampos(){
		$("#cidcliente").val("");
		$("#autoidcliente").val("");
		$("#consultaidcliente").val("");
		$("#carea").val("");
	//	$("#cfechadeejecucionestablecida").val("");
		$("#autoidtecnico").val("");
		$("#consultaidtecnico").val("");
		$("#cidtecnico").val("");
		$("#iddomicilio_ajax").val("");
		$("#crecomendacion").val("");
		//$("#cfechadeejecucionestablecida").val("");
		$("#cidcaptura").val("");
		//("#cfechaalta").val("");
		//$("#cfechaejecucion").val("");
		$("#nfotorecomendacion").val("");
	$("#cidcliente").focus();
}

function llenarSelectPlagas(condicion){
		$("#cplaga").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectPlaga.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#cplaga").html(mensaje);
			}
		});
		return false;
}


function vaciarCamposContinuarCaptura(){
//	var f = new Date();
//document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());

		$("#carea").val("");
		//$("#cfechadeejecucionestablecida").val("");
		$("#iddomicilio_ajax").val("");
		$("#crecomendacion").val("");
		//$("#cfechadeejecucionestablecida").val(f);
		$("#cidcaptura").val("");
		//$("#cfechaejecucion").val("");
		$("#nfotorecomendacion").val("");
	$("#cidcliente").focus();
}

function fileinput(nombre){
	$('#n'+nombre).val($('#c'+nombre).val());
}
$(document).ready(function() {
llenarSelectPlagas("");
	$("#panel_alertas").hide();
	$(".loading").hide();
	//$("#panel_alertas").delay(8000).hide(600);

		//AUTOCOMPLETAR
		$( "#autoidcliente" ).autocomplete({
					source: "../componentes/buscarCliente.php",
			autoFocus:true,
			select:function(event,ui){
						$('#cidcliente').val(ui.item.id);
				$('#consultaidcliente').val(ui.item.consulta);
				//alert(ui.item.id);
				llenarSelectDomicilio(ui.item.id);
				},
			search: function (event, ui) {
				$("#cidcliente").val("");
				$("#consultaidcliente").val($("#autoidcliente").val());
			llenarSelectDomicilio(0);
			},

			change: function (event, ui) {
				$.ajax({
								url:'../componentes/Cliente.php',
								type:'POST',
								dataType:'json',
					/*En caso de generar una descripció "label" compuesta por dos o mas datos
					en el archivo buscarX.php será necesario cambiar el termino
					$('#autoX').val() por $('#consultaX').val()*/
								data:{ termino:$('#autoidcliente').val()}
							}).done(function(respuesta){
									$("#cidcliente").val(respuesta.id);
						llenarSelectDomicilio(ui.item.id);
						});
			},
					minLength: 1
			});
		// FIN AUTOCOMPLETAR

		//AUTOCOMPLETAR
		$("#autoidcliente").blur(function(){
			if($("#autoidcliente").val()==""){
				$("#cidcliente").val("");
			}
			if ($("#cidcliente").val()==""){
				$("#consultaidcliente").html("");
				$.ajax({
						url:'../componentes/Cliente.php',
						type:'POST',
						dataType:'json',
						/*En caso de generar una descripció "label" compuesta por dos o mas datos
						en el archivo buscarX.php será necesario cambiar el termino
						$('#autoX').val() por $('#consultaX').val()*/
						data:{ termino:$('#autoidcliente').val()}
						}).done(function(respuesta){
							$('#cidcliente').val(respuesta.id);
										$('#consultaidcliente').val(respuesta.id);
										llenarSelectDomicilio(respuesta.id);
					});
			}
		});
		//fin funciones miguel filtro


				//AUTOCOMPLETAR
				$( "#autoidtecnico" ).autocomplete({
							source: "../componentes/buscarTecnico.php",
					autoFocus:true,
					select:function(event,ui){
								$('#cidtecnico').val(ui.item.id);
						$('#consultaidtecnico').val(ui.item.consulta);
					//	alert(ui.item.id);

						},
					search: function (event, ui) {
						$("#cidtecnico").val("");
						$("#consultaidtecnico").val($("#autoidtecnico").val());

					},

					change: function (event, ui) {
						$.ajax({
										url:'../componentes/Tecnico.php',
										type:'POST',
										dataType:'json',
							/*En caso de generar una descripció "label" compuesta por dos o mas datos
							en el archivo buscarX.php será necesario cambiar el termino
							$('#autoX').val() por $('#consultaX').val()*/
										data:{ termino:$('#autoidtecnico').val()}
									}).done(function(respuesta){
											$("#cidtecnico").val(respuesta.id);

								});
					},
							minLength: 1
					});
				// FIN AUTOCOMPLETAR

				//AUTOCOMPLETAR
				$("#autoidtecnico").blur(function(){
					if($("#autoidtecnico").val()==""){
						$("#cidtecnico").val("");
					}
					if ($("#cidtecnico").val()==""){
						$("#consultaidtecnico").html("");
						$.ajax({
								url:'../componentes/Tecnico.php',
								type:'POST',
								dataType:'json',
								/*En caso de generar una descripció "label" compuesta por dos o mas datos
								en el archivo buscarX.php será necesario cambiar el termino
								$('#autoX').val() por $('#consultaX').val()*/
								data:{ termino:$('#autoidtecnico').val()}
								}).done(function(respuesta){
									$('#cidtecnico').val(respuesta.id);
												$('#consultaidtecnico').val(respuesta.id);

							});
					}
				});
				//fin funciones miguel filtro





	// FIN AUTOCOMPLETAR

	$("#botonGuardar").click(function() {
			if (Spry.Widget.Form.validate(formulario)){
				if (validar()){
					var variables=$("#formulario").serialize();
					guardar(variables);
				}
			}
	});
	$(".botonSave").click(function() {
			if (Spry.Widget.Form.validate(formulario)){
				if (validar()){
					var variables=$("#formulario").serialize();
					guardar(variables);
				}
			}
	});
	$(".botonBuscar").click(function() {
		var busqueda=$.trim( $("#cajaBuscar").val());
		//if(busqueda!=""){
        	buscar(busqueda);
		//}
	});

	 $("#cajaBuscar").keypress(function(event){
       var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
           var busqueda=$.trim( $("#cajaBuscar").val());
			//if(busqueda!=""){
        		buscar(busqueda);
			//}
      }
 	});

	$(".botonNormal").click(function(){
		$("#panel_alertas").stop(false, true);
 	});

	$(".close").click(function(){
		$("#panel_alertas").stop(false, true);
		$("#panel_alertas").hide();
 	});


});

function validar(){
	var estado=true;
	var mensaje="";

	if (estado==false){
		mostrarMensaje(mensaje);
	}
	return estado;
}

//**************************AJAX*******************************
// Autor: Armando Viera Rodríguez
// Onixbm 2016

function buscar (busqueda){
	location.href='../consultar/vista.php?link=vista&busqueda='+busqueda+'&n1=recomendaciones&n2=consultarrecomendaciones';
}





//funciones miguel filtrado







function llenarSelectDomicilio(condicion){
		$("#iddomicilio_ajax").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectDomicilio.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){

				$("#iddomicilio_ajax").html(mensaje);
			}
		});

		return false;

}

function guardar(variables){
		var formData = new FormData($("#formulario")[0]);
		$("#botonGuardar").hide();
		$("#botonSave").hide();
		$("#loading").show();
		$.ajax({
			url: 'guardar.php',
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function(mensaje){
				$("#botonGuardar").show();
				$("#botonSave").show();
				$("#loading").hide();

				var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
				var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
		//	alert(res[0]); //Si la primer frase contiene la palabra "exito"
		if(res[0]=='exito'){
			alertify.confirm("Continuar capturando recomendaciones al cliente",
	  function() {
			document.getElementById("autoidcliente").disabled = true;

	vaciarCamposContinuarCaptura();
	    alertify.success('Continua Capturando recomendaciones al cliente seleccionado');
	  },
	  function() {
			document.getElementById("autoidcliente").disabled = false;
				vaciarCampos();
	    alertify.error('Selecciona un nuevo cliente para capturar recomendaciones');
	  }
);
		}


				mostrarMensaje(mensaje);
			}
		});
		return false;
}







function mostrarMensaje(mensaje){
	//alert(mensaje);
	//$("#salida").html(mensaje);
	var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
	var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
	if (res[0]=="exito"){ //Si la primer frase contiene la palabra "exito"
		$("#panel_alertas").removeClass().addClass("alert alert-success alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-check'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
		//vaciarCampos();
	}else if (res[0]=="fracaso"){
		$("#panel_alertas").removeClass().addClass("alert alert-error alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-ban'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
	}else if (res[0]=="aviso"){
		$("#panel_alertas").removeClass().addClass("alert alert-warning alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-warning'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
	}else{
		$("#panel_alertas").removeClass().addClass("alert alert-error alert-dismissable");
		$("#notificacionTitulo").html("Operaci&oacute;n fallida");
		$("#notificacionContenido").html("<i class='icon fa fa-ban'></i> No se han resivido datos de respuesta desde el servidor [003]");
	}
	$("#panel_alertas").stop(false, true);
	$("#panel_alertas").fadeIn("slow");
	var $contenedor=$("body");
	$("html,body").animate({scrollTop:0},1000);
	$("#panel_alertas").delay(6000).fadeOut("slow");
}
