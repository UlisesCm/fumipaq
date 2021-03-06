// JS MODULA Autor: Armando Viera Rodriguez 2016
function vaciarCampos(){
		$("#cnombre").val("");
	$("#cnombre").focus();
}

function recorrerLista(){
	var correos="";
	var numeros=$("#cnumerotecnico").val();
	var correoCliente=$("#cemailcliente").val();
	$(".multiple_emails-ul").html("");
	$('.multiple_emails-input').blur();
	$("#cemail").val("");
	$("input[type=checkbox]:checked").each(function(){
		correos=$(this).val();
		$('.multiple_emails-input').val(correos);
		$('.multiple_emails-input').blur();
		numeros=numeros+","+$(this).attr("celular");
		
    });
	//numeros=numeros.substring(0, numeros.length - 1);
	$("#cnumeros").val(numeros);
	correos=$("#cemailtecnico").val();
	if (correoCliente!=""){
		$('.multiple_emails-input').val(correoCliente);
		$('.multiple_emails-input').blur();
	}
	$('.multiple_emails-input').val(correos);
	$('.multiple_emails-input').blur();
	
}

$(document).ready(function() {
	
	$("#panel_alertas").hide();
	$(".loading").hide();
	
	llenarSelectPlantillamensaje("");
	llenarSelectCuentacorreo("");
	//$("#panel_alertas").delay(8000).hide(600);
	
	
	
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
	
	$("#plantilla_ajax").change(function(){ 
		llenarMensaje($("#plantilla_ajax").val());
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
// Autor: Armando Viera Rodr??guez
// Onixbm 2016

function buscar (busqueda){
	location.href='../consultar/vista.php?link=vista&busqueda='+busqueda+'&n1=marcas&n2=consultarmarcas';
}

function llenarSelectPlantillamensaje(condicion){
		$("#plantilla_ajax").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectPlantillamensaje.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#plantilla_ajax").html(mensaje);
			}
		});
		
		return false;
}

function llenarSelectCuentacorreo(condicion){
		$("#idcategoria_ajax").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectCuentacorreo.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#cuentacorreo_ajax").html(mensaje);
			}
		});
		return false;
}


function llenarMensaje(condicion){
		$("#cmensaje").val("Cargando plantilla...");
		$(".jqte_editor").html("Cargando plantilla...");
		$.ajax({
			url: '../componentes/cambiarPlantilla.php',
			type: "POST",
			data: "submit=&seleccionado="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#cmensaje").val(mensaje);
				$(".jqte_editor").html(mensaje);
			}
		});
		return false;
}

function guardar(variables){
		$("#botonGuardar").hide();
		$("#botonSave").hide();
		$("#loading").show();
		$.ajax({
			url: 'guardar.php',
			type: "POST",
			data: "submit=&"+variables, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#botonGuardar").show();
				$("#botonSave").show();
				$("#loading").hide();
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
