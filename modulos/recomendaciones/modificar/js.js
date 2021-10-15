// JS MODULA Autor: Armando Viera Rodriguez 2016
function vaciarCampos(){
	$("#cidcliente").focus();
}

function fileinput(nombre){
	$('#c'+nombre).val($('#c'+nombre+'I').val());
}
$(document).ready(function() {
	llenarSelectPlagas("");
	$("#panel_alertas").hide();
	$(".loading").hide();
	//$("#panel_alertas").delay(8000).hide(600);

	//AUTOCOMPLETAR
	$( "#autoidtecnico" ).autocomplete({
        source: "../componentes/buscartecnico.php",
		autoFocus:true,
		select:function(event,ui){
        	$('#cidtecnico').val(ui.item.id);
			$('#consultaidtecnico').val(ui.item.consulta);
    	},
		search: function (event, ui) {
			$("#cidtecnico").val("");
			$("#consultaidtecnico").val($("#autoidtecnico").val());
		},
		change: function (event, ui) {
			$.ajax({
            	url:'../componentes/tecnico.php',
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


});

//nuevafuncion

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

//nuevafuncion

function validar(){
	var estado=true;
	var mensaje="";

	if (estado==false){
		mostrarMensaje(mensaje);
	}
	return estado;
}// Autor: Armando Viera Rodríguez
// Onixbm 2016

function buscar (busqueda){
	location.href='../consultar/vista.php?link=vista&busqueda='+busqueda+'&n1=recomendaciones&n2=consultarrecomendaciones';
}

function guardar(variables){
		var formData = new FormData($("#formulario")[0]);
		$("#botonGuardar").hide();
		$(".loading").show();
		$.ajax({
			url: 'guardar.php',
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function(mensaje){
				$("#botonGuardar").show();
				$(".loading").hide();
				mostrarMensaje(mensaje);
			}
		});
		return false;
}

function mostrarMensaje(mensaje){
	//alert(mensaje);
	var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
	var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
	if (res[0]=="exito"){ //Si la primer frase contiene la palabra "exito"
		$("#panel_alertas").removeClass().addClass("alert alert-success alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-check'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
		vaciarCampos();
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
