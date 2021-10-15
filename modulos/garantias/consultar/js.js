// JavaScript Document
var orden, campoOrden, cantidadamostrar, paginacion;
orden="DESC";
campoOrden="idgarantia";
iniciar="0";
cantidadamostrar="20";
paginacion=0;
function seleccionarTodo(){
	if ($("#seleccionarTodo").prop("checked")==true){
		$(".checkEliminar").prop("checked", "checked");
	}else{
		$(".checkEliminar").prop("checked", "");
	}   
}
function eliminarIndividual(id) {
	var encoded = "¿Desea borrar el registro?";
	var decoded = $("<div/>").html(encoded).text();
    var pregunta = confirm(decoded);
	if (pregunta){
		eliminar_individual(id);
	}
}
function restaurarIndividual(id) {
	var encoded = "¿Desea restaurar el registro?";
	var decoded = $("<div/>").html(encoded).text();
    var pregunta = confirm(decoded);
	if (pregunta){
		restaurar_individual(id);
	}
}
function comprobarReglas(){
	$(".checksEliminar").hide();
	//Identificar el campo de ordenamiento
	if(recuperarCookie("campoOrdenGarantias")!=null){
		campoOrden=recuperarCookie("campoOrdenGarantias");
		 $("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}else{
		campoOrden="idgarantia";
		$("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}
	
	//Identificar el numero de elementos para mostrar
	if(recuperarCookie("cantidadamostrarGarantias")!=null){
		cantidadamostrar=recuperarCookie("cantidadamostrarGarantias");
		 $("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);
	}else{
		cantidadamostrar="20";
		$("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);
		
	}
	
	//Identificar el tipo de orden
	if(recuperarCookie("ordenGarantias")=="asc"){
		orden="ASC"
		$('#asc').attr('checked', true);
		$('#desc').attr('checked', false);
	}else if(recuperarCookie("ordenGarantias")=="desc"){
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}else{
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}
	//Mostrar u Ocultar Composicion
	if(recuperarCookie("mostrarComposicionGarantias")=="si"){
		$('.Ccomposicion').show();
		$('#CheckComposicion').attr('checked', true);
	}
	if(recuperarCookie("mostrarComposicionGarantias")=="no"){
		$('.Ccomposicion').hide();
		$('#CheckComposicion').attr('checked', false);
	}
	
	//Elegir el tipo de vista
	if(recuperarCookie("tipoVistaGarantias")=="tabla"){
		$('.tipoLista').show();
		$('.tipoTabla').hide();
		tipoVista="tabla";
	}else{
		$('.tipoLista').hide();
		$('.tipoTabla').show();
		tipoVista="lista";
	}
	$( ".tipoTabla" ).click(function() {
    	crearCookie("tipoVistaGarantias", "tabla");
		tipoVista="tabla";
		$(".tipoLista").show();
		$(".tipoTabla").hide();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( ".tipoLista" ).click(function() {
    	crearCookie("tipoVistaGarantias", "lista");
		tipoVista="lista";
		$(".tipoLista").hide();
		$(".tipoTabla").show();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});

}

	
$(document).ready(function() {
	
	menuFiltro();
	menuFiltroFecha();
	

	llenarSelectEmpresasgarantias("");
	llenarSelectSucursalgarantias("");
	llenarSelectProvedorgarantias("");

	$("#idempresa_ajax").change(function(){
		llenarSelectSucursalgarantias($("#idempresa_ajax").val());
		/* alert($("#idempresa_ajax").val()); */
	});

	$("#cajaBuscar").focus();
	comprobarReglas();
	load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	
	$(".botonEliminar").click(function() {
		$("#barraPaginacion").hide();
		$(".cajaBorrar").show();
		$(".herramientasIndividuales").hide();
		$(".checksEliminar").show();
	});
	
	$(".botonCancelarBorrar").click(function() {
		$(".herramientasIndividuales").show();
		$("#barraPaginacion").show();
		$(".cajaBorrar").hide();
		$(".checksEliminar").hide();
	});
	
	$(".botonBorrar").click(function() {
		var pregunta = confirm("¿Desea borrar esta información?")
		if (pregunta){
			$(".herramientasIndividuales").show("slow");
			$("#barraPaginacion").show("slow");
			$(".cajaBorrar").hide();
			$(".checksEliminar").hide("slow");
			var valores = [];
			var todos = document.getElementsByName("registroEliminar[]");
			for(var i = 0; i < todos.length; i++){
				if (todos[i].checked){
					valores.push(todos[i].value);
				}
			}
			eliminar_registros(valores);
		}else{
			$(".herramientasIndividuales").show("slow");
			$("#barraPaginacion").show("slow");
			$(".cajaBorrar").hide();
			$(".checksEliminar").hide("slow");
		}
	});
	
	$("#campoOrden").change(function(){
		campoOrden = this.value;
		crearCookie("campoOrdenGarantias", campoOrden);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$("#cantidadamostrar").change(function(){
		cantidadamostrar = this.value;
		crearCookie("cantidadamostrarGarantias", cantidadamostrar);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( "#asc" ).click(function() {
    	if ($( "#asc" ).is(':checked')){
			crearCookie("ordenGarantias", "asc");
			orden="ASC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#desc" ).click(function() {
    	if ($( "#desc" ).is(':checked')){
			crearCookie("ordenGarantias", "desc");
			orden="DESC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#CheckComposicion" ).click(function() {
    	if ($( "#CheckComposicion" ).is(':checked')){
			crearCookie("mostrarComposicionGarantias", "si");
			$('.Ccomposicion').show();
		}else{
			crearCookie("mostrarComposicionGarantias", "no");
			$('.Ccomposicion').hide();
		}
	});
	
	$(".botonBuscar").click(function() {
		var busqueda=$.trim( $("#cajaBuscar").val());
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	});
	
	$("#botonFiltrar").click(function() {
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	});
	
	 $("#cajaBuscar").keypress(function(event){  
      	var keycode = (event.keyCode ? event.keyCode : event.which); 
      	if(keycode == '13'){  
      		var busqueda=$.trim( $("#cajaBuscar").val());
      		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
			$("#cajaBuscar").val("");
			$("#cajaBuscar").focus();
      	}     
 	}); 
	
	$(".botonNormal").click(function(){ 
		$("#panel_alertas").stop(false, true);
 	});
	
	/*Importante*/
	$('.dropdown-menu').on('click', function(e){
        if($(this).hasClass('dropdown-menu-form')){
            e.stopPropagation();
        }
	});
	
	$(".close").click(function(){ 
		$("#panel_alertas").stop(false, true);
		$("#panel_alertas").hide();
 	});
	/*Fin de Importante*/
	
});




//***********************AJAX*********************
// Autor: Armando Viera Rodríguez
// Onixbm 2014


function llenarSelectEmpresasgarantias(condicion){
	$("#idempresa_ajax").html("<option value='1'>cargando...</option>");
	$.ajax({
		url: '../componentes/llenarSelectEmpresasgarantias2.php',
		type: "POST",
		data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
		success: function(mensaje){
			$("#idempresa_ajax").html(mensaje);
			llenarSelectSucursalgarantias($('#idempresa_ajax').val());
			
		}
	});
	return false;
} 

/* function llenarSelectProvedorgarantias(condicion){
	$("#idprovedor_ajax").html("<option value='1'>cargando...</option>");
	$.ajax({
		url: '../componentes/llenarSelectProvedoresgarantias.php',
		type: "POST",
		data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
		success: function(mensaje){
			$("#idprovedor_ajax").html(mensaje);
			llenarSelectSucursalgarantias($('#idprovedor_ajax').val());
			
		}
	});
	return false;
} */

function llenarSelectSucursalgarantias(condicion){
	$("#idsucursal_ajax").html("<option value='1'>cargando...</option>");
	$.ajax({
		url: '../componentes/llenarSelectSucursalgarantias2.php',
		type: "POST",
		data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
		success: function(mensaje){
			$("#idsucursal_ajax").html(mensaje);
			
		}
	});
	return false;
}

const llenarSelectProvedorgarantias = ( condicion) => {
	$("#idprovedor_ajax").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectProvedoresgarantias.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#idprovedor_ajax").html(mensaje);
			}
		});
		return false;
}

function load_tablas (campoOrden, orden, cantidadamostrar, paginacion, busqueda, tipoVista){
	//alert (orden);
	//alert (campoOrden);
	//alert (limit);
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("muestra_contenido_ajax").innerHTML=xmlhttp.responseText;
			comprobarReglas();
			$("#loading").hide();
		}
		else{
			$("#loading").show();
		}
	}
	var variables=$("#formularioFiltro").serialize();
	xmlhttp.open("POST","consultar.php?campoOrden="+campoOrden+"&orden="+orden+"&cantidadamostrar="+cantidadamostrar+"&paginacion="+paginacion+"&busqueda="+busqueda+"&tipoVista="+tipoVista+"&papelera="+papelera+"&"+variables, true);
	xmlhttp.send();
}


function eliminar_registros(ids){
		
		$.ajax({
			url: '../eliminar/eliminar.php',
			type: "POST",
			data: {ids:ids}, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,ids,"eliminar");
			}
		});
		return false;
}

function eliminar_individual(id){
		$.ajax({
			url: '../eliminar/eliminar.php',
			type: "POST",
			data: "submit=&ids="+id, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,id,"eliminar");
			}
		});
		return false;
}

function restaurar_individual(id){
		$.ajax({
			url: '../eliminar/restaurar.php',
			type: "POST",
			data: "submit=&ids="+id, //Pasamos los datos en forma de array
			success: function(mensaje){
				mostrarMensaje(mensaje,id,"eliminar");
			}
		});
		return false;
}

function mostrarMensaje(mensaje,ids, accion){
	var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
	var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
	if (res[0]=="exito"){ //Si la primer frase contiene la palabra "exito"
		$("#panel_alertas").removeClass().addClass("alert alert-success alert-dismissable");
		$("#notificacionTitulo").html("<i class='icon fa fa-check'></i>"+res[1]);
		$("#notificacionContenido").html(res[2]);
		if(accion=="eliminar"){
			ocultar_registros_eliminados(ids);
		}
		$(".checkEliminar").attr('checked', false);
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
		$("#notificacionContenido").html("<i class='icon fa fa-ban'></i>No se han resivido datos de respuesta desde el servidor [003]");
	}
	$("#panel_alertas").stop(false, true);
	$("#panel_alertas").fadeIn("slow");
	$("#panel_alertas").delay(5000).fadeOut("slow");
}
function ocultar_registros_eliminados(ids){
	if (ids.length){
		for(var i = 0; i < ids.length; i++){
			$("#iregistro"+ids[i]).hide("slow");
		}
	}
	else{
		$("#iregistro"+ids).hide("slow");
	}
}

const menuFiltro = () => {
	//MOSTRAR Y OCULTAR FILTRO GENERAL
	const botonMostrarFiltro = $('.botonMostrarFiltro')
	const botonOcultarFiltro = $('.botonOcultarFiltro')
	const formulario = $('.box-body')

	botonOcultarFiltro.hide()
	formulario.hide()
 
	botonMostrarFiltro.click(()=>{
	 botonOcultarFiltro.show()
	 botonMostrarFiltro.hide()
	 formulario.show(200)
	})
 
	botonOcultarFiltro.click(()=>{
	 botonMostrarFiltro.show()
	 botonOcultarFiltro.hide()
	 formulario.hide(200)
	})
}

const menuFiltroFecha = () => {
	//OCULTAR Y MOSTRAR FILTRO POR FECHA
	const selectFecha = $('#cfiltrarfecha')
	const filtroFecha = $("#ocultarFecha")
	filtroFecha.hide()
	selectFecha.change(()=>{
		if(selectFecha.val() == "SI"){
			filtroFecha.show()
		} else {
			filtroFecha.hide()
		}
	})
}