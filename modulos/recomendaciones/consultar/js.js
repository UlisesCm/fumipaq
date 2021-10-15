// JavaScript Document
var orden, campoOrden, cantidadamostrar, paginacion;
orden="DESC";
campoOrden="idrecomendacion";
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
	if(recuperarCookie("campoOrdenRecomendacion")!=null){
		campoOrden=recuperarCookie("campoOrdenRecomendacion");
		 $("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}else{
		campoOrden="idrecomendacion";
		$("#campoOrden option[value="+campoOrden+"]").attr("selected",true);
	}

	//Identificar el numero de elementos para mostrar
	if(recuperarCookie("cantidadamostrarRecomendacion")!=null){
		cantidadamostrar=recuperarCookie("cantidadamostrarRecomendacion");
		 $("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);
	}else{
		cantidadamostrar="20";
		$("#cantidadamostrar option[value="+cantidadamostrar+"]").attr("selected",true);

	}

	//Identificar el tipo de orden
	if(recuperarCookie("ordenRecomendacion")=="asc"){
		orden="ASC"
		$('#asc').attr('checked', true);
		$('#desc').attr('checked', false);
	}else if(recuperarCookie("ordenRecomendacion")=="desc"){
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}else{
		orden="DESC"
		$('#asc').attr('checked', false);
		$('#desc').attr('checked', true);
	}
	//Mostrar u Ocultar Idcliente
	if(recuperarCookie("mostrarIdclienteRecomendacion")=="si"){
		$('.Cidcliente').show();
		$('#CheckIdcliente').attr('checked', true);
	}else if(recuperarCookie("mostrarIdclienteRecomendacion")=="no"){
		$('.Cidcliente').hide();
		$('#CheckIdcliente').attr('checked', false);
	}
	//Mostrar u Ocultar Iddomicilio
	if(recuperarCookie("mostrarIddomicilioRecomendacion")=="si"){
		$('.Ciddomicilio').show();
		$('#CheckIddomicilio').attr('checked', true);
	}else if(recuperarCookie("mostrarIddomicilioRecomendacion")=="no"){
		$('.Ciddomicilio').hide();
		$('#CheckIddomicilio').attr('checked', false);
	}
	//Mostrar u Ocultar Area
	if(recuperarCookie("mostrarAreaRecomendacion")=="si"){
		$('.Carea').show();
		$('#CheckArea').attr('checked', true);
	}else if(recuperarCookie("mostrarAreaRecomendacion")=="no"){
		$('.Carea').hide();
		$('#CheckArea').attr('checked', false);
	}
	//Mostrar u Ocultar Plaga
	if(recuperarCookie("mostrarPlagaRecomendacion")=="si"){
		$('.Cplaga').show();
		$('#CheckPlaga').attr('checked', true);
	}else if(recuperarCookie("mostrarPlagaRecomendacion")=="no"){
		$('.Cplaga').hide();
		$('#CheckPlaga').attr('checked', false);
	}
	//Mostrar u Ocultar Recomendacion
	if(recuperarCookie("mostrarRecomendacionRecomendacion")=="si"){
		$('.Crecomendacion').show();
		$('#CheckRecomendacion').attr('checked', true);
	}else if(recuperarCookie("mostrarRecomendacionRecomendacion")=="no"){
		$('.Crecomendacion').hide();
		$('#CheckRecomendacion').attr('checked', false);
	}
	//Mostrar u Ocultar Fotorecomendacion
	if(recuperarCookie("mostrarFotorecomendacionRecomendacion")=="si"){
		$('.Cfotorecomendacion').show();
		$('#CheckFotorecomendacion').attr('checked', true);
	}else if(recuperarCookie("mostrarFotorecomendacionRecomendacion")=="no"){
		$('.Cfotorecomendacion').hide();
		$('#CheckFotorecomendacion').attr('checked', false);
	}
	//Mostrar u Ocultar Fechadeejecucionestablecida
	if(recuperarCookie("mostrarFechadeejecucionestablecidaRecomendacion")=="si"){
		$('.Cfechadeejecucionestablecida').show();
		$('#CheckFechadeejecucionestablecida').attr('checked', true);
	}else if(recuperarCookie("mostrarFechadeejecucionestablecidaRecomendacion")=="no"){
		$('.Cfechadeejecucionestablecida').hide();
		$('#CheckFechadeejecucionestablecida').attr('checked', false);
	}
	//Mostrar u Ocultar Responsable
	if(recuperarCookie("mostrarResponsableRecomendacion")=="si"){
		$('.Cresponsable').show();
		$('#CheckResponsable').attr('checked', true);
	}else if(recuperarCookie("mostrarResponsableRecomendacion")=="no"){
		$('.Cresponsable').hide();
		$('#CheckResponsable').attr('checked', false);
	}
	//Mostrar u Ocultar Idtecnico
	if(recuperarCookie("mostrarIdtecnicoRecomendacion")=="si"){
		$('.Cidtecnico').show();
		$('#CheckIdtecnico').attr('checked', true);
	}else if(recuperarCookie("mostrarIdtecnicoRecomendacion")=="no"){
		$('.Cidtecnico').hide();
		$('#CheckIdtecnico').attr('checked', false);
	}
	//Mostrar u Ocultar Idcaptura
	if(recuperarCookie("mostrarIdcapturaRecomendacion")=="si"){
		$('.Cidcaptura').show();
		$('#CheckIdcaptura').attr('checked', true);
	}else if(recuperarCookie("mostrarIdcapturaRecomendacion")=="no"){
		$('.Cidcaptura').hide();
		$('#CheckIdcaptura').attr('checked', false);
	}
	//Mostrar u Ocultar Estado
	if(recuperarCookie("mostrarEstadoRecomendacion")=="si"){
		$('.Cestado').show();
		$('#CheckEstado').attr('checked', true);
	}else if(recuperarCookie("mostrarEstadoRecomendacion")=="no"){
		$('.Cestado').hide();
		$('#CheckEstado').attr('checked', false);
	}
	//Mostrar u Ocultar Fechaalta
	if(recuperarCookie("mostrarFechaaltaRecomendacion")=="si"){
		$('.Cfechaalta').show();
		$('#CheckFechaalta').attr('checked', true);
	}else if(recuperarCookie("mostrarFechaaltaRecomendacion")=="no"){
		$('.Cfechaalta').hide();
		$('#CheckFechaalta').attr('checked', false);
	}
	//Mostrar u Ocultar Evidencia
	if(recuperarCookie("mostrarEvidenciaRecomendacion")=="si"){
		$('.Cevidencia').show();
		$('#CheckEvidencia').attr('checked', true);
	}else if(recuperarCookie("mostrarEvidenciaRecomendacion")=="no"){
		$('.Cevidencia').hide();
		$('#CheckEvidencia').attr('checked', false);
	}
	//Mostrar u Ocultar Fotoevidencia
	if(recuperarCookie("mostrarFotoevidenciaRecomendacion")=="si"){
		$('.Cfotoevidencia').show();
		$('#CheckFotoevidencia').attr('checked', true);
	}else if(recuperarCookie("mostrarFotoevidenciaRecomendacion")=="no"){
		$('.Cfotoevidencia').hide();
		$('#CheckFotoevidencia').attr('checked', false);
	}
	//Mostrar u Ocultar Fechaejecucion
	if(recuperarCookie("mostrarFechaejecucionRecomendacion")=="si"){
		$('.Cfechaejecucion').show();
		$('#CheckFechaejecucion').attr('checked', true);
	}else if(recuperarCookie("mostrarFechaejecucionRecomendacion")=="no"){
		$('.Cfechaejecucion').hide();
		$('#CheckFechaejecucion').attr('checked', false);
	}
	//Mostrar u Ocultar Composicion
	if(recuperarCookie("mostrarComposicionRecomendacion")=="si"){
		$('.Ccomposicion').show();
		$('#CheckComposicion').attr('checked', true);
	}
	if(recuperarCookie("mostrarComposicionRecomendacion")=="no"){
		$('.Ccomposicion').hide();
		$('#CheckComposicion').attr('checked', false);
	}

	//Elegir el tipo de vista
	if(recuperarCookie("tipoVistaRecomendacion")=="tabla"){
		$('.tipoLista').show();
		$('.tipoTabla').hide();
		tipoVista="tabla";
	}else{
		$('.tipoLista').hide();
		$('.tipoTabla').show();
		tipoVista="lista";
	}
	$( ".tipoTabla" ).click(function() {
    	crearCookie("tipoVistaRecomendacion", "tabla");
		tipoVista="tabla";
		$(".tipoLista").show();
		$(".tipoTabla").hide();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( ".tipoLista" ).click(function() {
    	crearCookie("tipoVistaRecomendacion", "lista");
		tipoVista="lista";
		$(".tipoLista").hide();
		$(".tipoTabla").show();
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});

}


$(document).ready(function() {
	$("#cajaBuscar").focus();
	comprobarReglas();
	load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);



		//funciones miguel


		//AUTOCOMPLETAR
		$( "#autoidcliente" ).autocomplete({
					source: "../componentes/buscarCliente.php",
			autoFocus:true,
			select:function(event,ui){
						$('#cidcliente').val(ui.item.id);
				$('#consultaidcliente').val(ui.item.consulta);
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


	//	fin funciones miguel filtro


	// function VerificaImagen(urlimagen) {
	//  	var imagens = new Image();
	//      //imagens.onerror = "";
	// 		imagens.src = "../../../empresas/modulalite/archivosSubidos/recomendaciones/"+urlimagen;
	//
	//
	//
	// 		var imagens = new Image();
	// 			imagens.src = "algo.jpg";
	//
	//
	//
	// 			imagens.onload = function(){
	//
	// 				alert("Imagen cargada");
	// 				return true;
	// 			}
	//
	// 			 imagens.onerror = function(){
	// 			 	alert("Error en imagen");
	// 			 	return false;
	// 			 }
	//
	// 			 imagens.onabort = function(){
	// 			 	alert("Imagen abortada");
	// 			}
	//
	// }






	//	funcion obtiene url de la imagen de la tabla de acuerdo al boton seleccionado y la muestra en al mod





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
		crearCookie("campoOrdenRecomendacion", campoOrden);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$("#cantidadamostrar").change(function(){
		cantidadamostrar = this.value;
		crearCookie("cantidadamostrarRecomendacion", cantidadamostrar);
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
	});
	$( "#asc" ).click(function() {
    	if ($( "#asc" ).is(':checked')){
			crearCookie("ordenRecomendacion", "asc");
			orden="ASC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#desc" ).click(function() {
    	if ($( "#desc" ).is(':checked')){
			crearCookie("ordenRecomendacion", "desc");
			orden="DESC"
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
		}
	});
	$( "#CheckIdcliente" ).click(function() {
    	if ($( "#CheckIdcliente" ).is(':checked')){
			crearCookie("mostrarIdclienteRecomendacion", "si");
			$('.Cidcliente').show();
		}else{
			crearCookie("mostrarIdclienteRecomendacion", "no");
			$('.Cidcliente').hide();
		}
	});
	$( "#CheckIddomicilio" ).click(function() {
    	if ($( "#CheckIddomicilio" ).is(':checked')){
			crearCookie("mostrarIddomicilioRecomendacion", "si");
			$('.Ciddomicilio').show();
		}else{
			crearCookie("mostrarIddomicilioRecomendacion", "no");
			$('.Ciddomicilio').hide();
		}
	});
	$( "#CheckArea" ).click(function() {
    	if ($( "#CheckArea" ).is(':checked')){
			crearCookie("mostrarAreaRecomendacion", "si");
			$('.Carea').show();
		}else{
			crearCookie("mostrarAreaRecomendacion", "no");
			$('.Carea').hide();
		}
	});
	$( "#CheckPlaga" ).click(function() {
    	if ($( "#CheckPlaga" ).is(':checked')){
			crearCookie("mostrarPlagaRecomendacion", "si");
			$('.Cplaga').show();
		}else{
			crearCookie("mostrarPlagaRecomendacion", "no");
			$('.Cplaga').hide();
		}
	});
	$( "#CheckRecomendacion" ).click(function() {
    	if ($( "#CheckRecomendacion" ).is(':checked')){
			crearCookie("mostrarRecomendacionRecomendacion", "si");
			$('.Crecomendacion').show();
		}else{
			crearCookie("mostrarRecomendacionRecomendacion", "no");
			$('.Crecomendacion').hide();
		}
	});
	$( "#CheckFotorecomendacion" ).click(function() {
    	if ($( "#CheckFotorecomendacion" ).is(':checked')){
			crearCookie("mostrarFotorecomendacionRecomendacion", "si");
			$('.Cfotorecomendacion').show();
		}else{
			crearCookie("mostrarFotorecomendacionRecomendacion", "no");
			$('.Cfotorecomendacion').hide();
		}
	});
	$( "#CheckFechadeejecucionestablecida" ).click(function() {
    	if ($( "#CheckFechadeejecucionestablecida" ).is(':checked')){
			crearCookie("mostrarFechadeejecucionestablecidaRecomendacion", "si");
			$('.Cfechadeejecucionestablecida').show();
		}else{
			crearCookie("mostrarFechadeejecucionestablecidaRecomendacion", "no");
			$('.Cfechadeejecucionestablecida').hide();
		}
	});
	$( "#CheckResponsable" ).click(function() {
    	if ($( "#CheckResponsable" ).is(':checked')){
			crearCookie("mostrarResponsableRecomendacion", "si");
			$('.Cresponsable').show();
		}else{
			crearCookie("mostrarResponsableRecomendacion", "no");
			$('.Cresponsable').hide();
		}
	});
	$( "#CheckIdtecnico" ).click(function() {
    	if ($( "#CheckIdtecnico" ).is(':checked')){
			crearCookie("mostrarIdtecnicoRecomendacion", "si");
			$('.Cidtecnico').show();
		}else{
			crearCookie("mostrarIdtecnicoRecomendacion", "no");
			$('.Cidtecnico').hide();
		}
	});
	$( "#CheckIdcaptura" ).click(function() {
    	if ($( "#CheckIdcaptura" ).is(':checked')){
			crearCookie("mostrarIdcapturaRecomendacion", "si");
			$('.Cidcaptura').show();
		}else{
			crearCookie("mostrarIdcapturaRecomendacion", "no");
			$('.Cidcaptura').hide();
		}
	});
	$( "#CheckEstado" ).click(function() {
    	if ($( "#CheckEstado" ).is(':checked')){
			crearCookie("mostrarEstadoRecomendacion", "si");
			$('.Cestado').show();
		}else{
			crearCookie("mostrarEstadoRecomendacion", "no");
			$('.Cestado').hide();
		}
	});
	$( "#CheckFechaalta" ).click(function() {
    	if ($( "#CheckFechaalta" ).is(':checked')){
			crearCookie("mostrarFechaaltaRecomendacion", "si");
			$('.Cfechaalta').show();
		}else{
			crearCookie("mostrarFechaaltaRecomendacion", "no");
			$('.Cfechaalta').hide();
		}
	});
	$( "#CheckEvidencia" ).click(function() {
    	if ($( "#CheckEvidencia" ).is(':checked')){
			crearCookie("mostrarEvidenciaRecomendacion", "si");
			$('.Cevidencia').show();
		}else{
			crearCookie("mostrarEvidenciaRecomendacion", "no");
			$('.Cevidencia').hide();
		}
	});
	$( "#CheckFotoevidencia" ).click(function() {
    	if ($( "#CheckFotoevidencia" ).is(':checked')){
			crearCookie("mostrarFotoevidenciaRecomendacion", "si");
			$('.Cfotoevidencia').show();
		}else{
			crearCookie("mostrarFotoevidenciaRecomendacion", "no");
			$('.Cfotoevidencia').hide();
		}
	});
	$( "#CheckFechaejecucion" ).click(function() {
    	if ($( "#CheckFechaejecucion" ).is(':checked')){
			crearCookie("mostrarFechaejecucionRecomendacion", "si");
			$('.Cfechaejecucion').show();
		}else{
			crearCookie("mostrarFechaejecucionRecomendacion", "no");
			$('.Cfechaejecucion').hide();
		}
	});
	$( "#CheckComposicion" ).click(function() {
    	if ($( "#CheckComposicion" ).is(':checked')){
			crearCookie("mostrarComposicionRecomendacion", "si");
			$('.Ccomposicion').show();
		}else{
			crearCookie("mostrarComposicionRecomendacion", "no");
			$('.Ccomposicion').hide();
		}
	});

	$(".botonBuscar").click(function() {
		var busqueda=$.trim( $("#cajaBuscar").val());
		load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	});

	//funcion miguel filtrado
	$("#botonFiltrar").click(function() {
			load_tablas(campoOrden,orden,cantidadamostrar,paginacion,busqueda,tipoVista);
	});
	//funcion miguel fin filtrado

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
	//funciones miguel filtrado
	var variables = $("#formulario").serialize();
	//alert(variables);
//funciones miguel filtrado
//funciones miguel filtrado
	xmlhttp.open("POST","consultar.php?campoOrden="+campoOrden+"&orden="+orden+"&cantidadamostrar="+cantidadamostrar+"&paginacion="+paginacion+"&busqueda="+busqueda+"&tipoVista="+tipoVista+"&papelera="+papelera+"&"+variables, true);
//fin funciones miguel filtrado
	xmlhttp.send();
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

function llenarSelectTecnico(condicion){
		$("#idtecnico_ajax").html("<option value='1'>cargando...</option>");
		$.ajax({
			url: '../componentes/llenarSelectTecnico.php',
			type: "POST",
			data: "submit=&condicion="+condicion, //Pasamos los datos en forma de array seralizado desde la funcion de envio
			success: function(mensaje){
				$("#idtecnico_ajax").html(mensaje);
				$("#idstecnicos_ajax").html(mensaje);
			}
		});
		return false;
}

//fin funciones miguel filtro






function MostrarInformacionDetallada(){

		var dataCliente="";
		dataCliente = $(event.target).closest('tr').find('td:eq(3)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataDomicilio="";
		dataDomicilio = $(event.target).closest('tr').find('td:eq(4)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataArea="";
				dataArea = $(event.target).closest('tr').find('td:eq(5)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataPlaga="";
		dataPlaga = $(event.target).closest('tr').find('td:eq(6)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataRecomendacion="";
		dataRecomendacion = $(event.target).closest('tr').find('td:eq(7)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataFechadeejecucionestablecida="";
		dataFechadeejecucionestablecida = $(event.target).closest('tr').find('td:eq(11)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataResponsable="";
		dataResponsable = $(event.target).closest('tr').find('td:eq(12)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataEmpleadoRegistro="";
		dataEmpleadoRegistro = $(event.target).closest('tr').find('td:eq(13)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic


		var dataIdCaptura="";
		dataIdCaptura = $(event.target).closest('tr').find('td:eq(14)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataEstado="";
		dataEstado = $(event.target).closest('tr').find('td:eq(15)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataFechaAlta="";
		dataFechaAlta = $(event.target).closest('tr').find('td:eq(17)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataDescripcionEvidencia="";
		dataDescripcionEvidencia = $(event.target).closest('tr').find('td:eq(18)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic

		var dataFechaEjecutado="";
		dataFechaEjecutado = $(event.target).closest('tr').find('td:eq(21)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic


document.getElementById("tamanomodal").classList.add ("modal-dialog"); //agregamos clases al modal
 document.getElementById("tamanomodal").classList.add ("modal-lg"); //agregamos clases al modal (tamaño de modal ideal para información.)
	  $("#idtitulomodal").html("Información Detallada");
		 $("#IntroducirImagen").html(" <form class='form-horizontal' name='formulario' id='formulario' method='post' enctype='multipart/form-data'>	<div class='box-body'><div class='form-group'><label for='cidempleadoejecucion' class='col-sm-2 control-label'>Cliente:</label><div class='col-sm-8 control-label'>	 <label for='cidempleadoejecucion' class='col-sm-8 text-left'>"+dataCliente+"</label></div></div><div class='form-group'><label for='cidempleadoejecucion' class='col-sm-2 control-label'>Domicilio:</label><div class='col-sm-8 control-label'>	 <label for='cidempleadoejecucion' class='col-sm-8 text-left'>"+dataDomicilio+"</label></div></div>				<div class='form-group'><label for='ctiporecomendaciondetalles' class='col-sm-2 control-label'>Area:</label><div class='col-sm-5'>	 <label for='Carea' class='col-sm-2 control-label'>"+dataArea+"</label></div></div>		    <div class='form-group'><label for='cplaga' class='col-sm-2 control-label'>Plaga:</label><div class='col-sm-5'>	 <label for='ctiporecomendaciondetalles' class='col-sm-2 control-label'>"+dataPlaga+"</label></div></div>	  <div class='form-group'><label for='cidempleadoejecucion' class='col-sm-2 control-label'>Recomendación:</label><div class='col-sm-10 control-label'>	 <label for='cidempleadoejecucion' class='col-sm-10 pre-scrollable text-left'>"+dataRecomendacion+"</label></div></div>	 	 		  <div class='form-group'><label for='cfechadeejecucionestablecida' class='col-sm-2 control-label'>Fecha a ejecutar:</label><div class='col-sm-10 control-label'>	 <label for='cfechadeejecucionestablecida' class='col-sm-10 pre-scrollable text-left'>"+dataFechadeejecucionestablecida+"</label></div></div>  					  <div class='form-group'><label for='Cresponsable' class='col-sm-2 control-label'>Responsable:</label><div class='col-sm-10 control-label'>	 <label for='Cresponsable' class='col-sm-10 pre-scrollable text-left'>"+dataResponsable+"</label></div></div>									<div class='form-group'><label for='cempleadoregistro' class='col-sm-2 control-label'>Empleado:</label><div class='col-sm-8 control-label'>	 <label for='cempleadoregistro' class='col-sm-8 text-left'>"+dataEmpleadoRegistro+"</label></div></div>					<div class='form-group'><label for='cidcaptura' class='col-sm-2 control-label'>ID Captura: </label><div class='col-sm-5'>	 <label for='cidcaptura' class='col-sm-2 control-label'>"+dataIdCaptura+"</label></div></div>		 <div class='form-group'><label for='cestado' class='col-sm-2 control-label'>Estado: </label><div class='col-sm-5'>	 <label for='cestado' class='col-sm-2 control-label'>"+dataEstado+"</label></div></div>		 <div class='form-group'><label for='cfechaalta' class='col-sm-2 control-label'>Fecha de registro: </label><div class='col-sm-5'>	 <label for='cfechaalta' class='col-sm-2 control-label'>"+dataFechaAlta+"</label></div></div>			<div class='form-group'><label for='cDescripcionEvidencia' class='col-sm-2 control-label'>Evidencia: </label><div class='col-sm-10 control-label'>	 <label for='cDescripcionEvidencia' class='col-sm-10 pre-scrollable text-left'>"+dataDescripcionEvidencia+"</label></div></div>		<div class='form-group'><label for='cfechaejecucion' class='col-sm-2 control-label'>Fecha de ejecución: </label><div class='col-sm-10 control-label'>	 <label for='cfechaejecucion' class='col-sm-10 pre-scrollable text-left'>"+dataFechaEjecutado+"</label></div></div>						 </div> </form>");
	  // mostramos el modal

	 $('#modal_muestra_imagen').modal('show')

}

function fileinput(nombre){
	$('#c'+nombre).val($('#c'+nombre+'I').val());
}

function ObtenerDatosModificarEstadoModal(){


	document.getElementById("tamanomodalestado").classList.add ("modal-dialog"); //agregamos clases al modal
	 document.getElementById("tamanomodalestado").classList.remove ("modal-lg");

	 var dataidrecomendacion="";
 	dataidrecomendacion = $(event.target).closest('tr').find('td:eq(2)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
	var dataFotoEvidencia="";
	dataFotoEvidencia = $(event.target).closest('tr').find('td:eq(16)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
	$("#cidcliente").val("");
	$("#ciddomicilio").val("");
	$("#crecomendacion").val("");
	$("#cidempleado").val("");
	$("#cidempleadoejecucion").val("");
	$("#cfotoevidencia").val("");
	$("#cevidencia").val("");
	$("#cfechaejecucion").val("");
	//$("#cidcliente").focus();
$("#imprimiridrecomendacion").html(" <input name='idrecomendacion' type='' id='cidrecomendacion' value='"+dataidrecomendacion+"'/>");
$("#imprimiridfotoold").html(" <input value='"+dataFotoEvidencia+"' type='hidden' name='fotorecomendacionEliminacion' id='cfotorecomendacionEliminacion' >");
	//alert("VACIO");
	 $("#idtitulomodalmodificarestado").html("Modificar estado");

	 $('#modal_modificar_estado').modal('show')

}


//IMPRIMIR PDF
function ObtenerDatosFiltroImprimirPdf() {
	 var variables=$("#formulario").serialize();
	//
	alert(variables);
// 	var campo1 = document.getElementById("cidcliente").value;  //Se utiliza el id del html de musiclist.php en este caso es pruebas
//
// alert("CAMPO OBTENIDO DESDE HTML: "+campo1);
// 	alert("hola");
	window.open("reportePDF.php?"+variables+"", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=900,height=900");

}
//IMPRIMIR PDF FIN


function MostrarImagenModalFotoRecomendacion(){ //Muestra la imagen del de la recomendacion en el modal
	document.getElementById("tamanomodal").classList.add ("modal-dialog"); //agregamos clases al modal
	document.getElementById("tamanomodal").classList.remove ("modal-lg");
	var urlimagen="";
	urlimagen = $(event.target).closest('tr').find('td:eq(8)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
	//alert(urlimagen);

	var imagens = new Image();
	imagens.src = "../../../empresas/modulalite/archivosSubidos/recomendaciones/"+urlimagen;

	if(urlimagen == ''){
//alert("VACIO");
	$("#idtitulomodal").html("Foto de recomendación");
 	$("#IntroducirImagen").html("<h1><small> Lo sentimos no encontramos ninguna imagen</small></h1>");
// mostramos el modal
//$("#IntroducirImagen").addClass("desdemodal2");
	$('#modal_muestra_imagen').modal('show')

	}else{
	$("#idtitulomodal").html("Foto de recomendación");
	 $("#IntroducirImagen").html('<img src="' + imagens.src  + '  " class="img-responsive"> ');
	 $('#modal_muestra_imagen').modal('show')
	//	$(this).find('#IntroducirImagen').html($('<img src="' + imagens.src  + '  " class="img-responsive"> '))
//alert("CONDATOS"+price.length);
}
// $( "td:eq(4)" ).css( "color", "red" );  //funcion para pintar letras
//    $(this).find('#orderDetails').html($('<img src="../../../empresas/modulalite/archivosSubidos/recomendaciones/' + price  + 'images/dinosaur.jpg"> '))
}


function MostrarImagenModalFotoEvidencia(){
	document.getElementById("tamanomodal").classList.add ("modal-dialog"); //agregamos clases al modal
	document.getElementById("tamanomodal").classList.remove ("modal-lg"); //elimina clases
	//document.getElementById("tamanomodal").classList.add ("modal-xs");
	var urlimagen="";
	urlimagen = $(event.target).closest('tr').find('td:eq(19)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
	//alert(urlimagen);

	var imagens = new Image();
	imagens.src = "../../../empresas/modulalite/archivosSubidos/recomendaciones/"+urlimagen;

	if(urlimagen == ''){
	$("#idtitulomodal").html("Foto de evidencia");
 	$("#IntroducirImagen").html("<h1><small> Lo sentimos no encontramos ninguna imagen</small></h1>");
	$('#modal_muestra_imagen').modal('show')
	}else{
	$("#idtitulomodal").html("Foto de evidencia");
	$("#IntroducirImagen").html('<img src="' + imagens.src  + '  " class="rounded img-responsive"> ');
  $('#modal_muestra_imagen').modal('show')
				}
}



// function MostrarImagenModal(id){
// 	$('#modal_muestra_imagen').modal({
// 			keyboard: true,
// 			backdrop: "static",
// 			show:false,
// 	}).on('show.bs.modal', function(){ //subscribe to show method
// var urlimagen="";
// if(id=='1'){
// 	urlimagen = $(event.target).closest('tr').find('td:eq(7)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
// 	//alert(urlimagen);
// 	alert(id);
// id="";
// }
//
// if(id=='2'){
// 	urlimagen = $(event.target).closest('tr').find('td:eq(17)').text(); //obtiene el campo en la tabla donde se da clic, en la columna 5 y selecciona la fila que se le da clic
// 	//alert(urlimagen);
// 	alert(id);
// id="";
// }
//
// var imagens = new Image();
// imagens.src = "../../../empresas/modulalite/archivosSubidos/recomendaciones/"+urlimagen;
//
// if(urlimagen == ''){
// //alert("VACIO");
// $(this).find('#IntroducirImagen').html($('  <h1><small> Lo sentimos no encontramos ninguna imagen</small></h1>' + urlimagen  + ' " '))
// }else{
//
// 		$(this).find('#IntroducirImagen').html($('<img src="' + imagens.src  + '  " class="img-responsive"> '))
// //alert("CONDATOS"+price.length);
// }
// // $( "td:eq(4)" ).css( "color", "red" );  //funcion para pintar letras
// //    $(this).find('#orderDetails').html($('<img src="../../../empresas/modulalite/archivosSubidos/recomendaciones/' + price  + 'images/dinosaur.jpg"> '))
// 	});
// }


function scrollToTop() {
window.scrollTo({top: 0, behavior: 'smooth'});
}

function guardarestadovariables(){
			var variables=$("#formularioestado").serialize();
scrollToTop();
			guardarestado(variables);

		//	alert(variables);
}


function guardarestado(variables){

		var formData = new FormData($("#formularioestado")[0]);
		//alert(JSON.stringify(formData));
		$("#botonGuardarEstado").hide();
		$(".loading").show();
		$.ajax({
			url: '../modificar/modificarestadonuevo.php',
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function(mensaje){
	mostrarMensaje(mensaje);
	//alert(mensaje);
				$("#botonGuardar").show();
				$(".loading").hide();
				//$("#modal_modificar_estado").delay(5000).fadeOut("slow");


				var cadena= $.trim(mensaje); //Limpia la cadena regresada desde php
				var res=cadena.split("@"); //Separa la cadena en cada @ y convierte las partes en un array
				if (res[0]=="exito"){ //Si la primer frase contiene la palabra "exito"
						load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
					$("#modal_modificar_estado").modal("hide");
}

				 //ocultamos el modal

				// mostrarMensaje(mensaje);
			}
		});
		return false;
}




function modificar_estado(id,estadojs){
		$.ajax({
			url: '../modificar/modificarestado.php',
			type: "POST",
			data: {ids:id, estadoactuals:estadojs}, //Pasamos los datos en forma de array
		//	data: "submit=&ids="+id, //Pasamos los datos en forma de array
			success: function(mensaje){

				mostrarMensaje(mensaje,id,"aviso");
				load_tablas(campoOrden,orden,cantidadamostrar,paginacion,"",tipoVista);
			}
		});
		return false;
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
 $("#modal_modificar_estado").modal('hide').delay(5000);
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
