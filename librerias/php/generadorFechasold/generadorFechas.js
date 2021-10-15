// Generador de fechas

$(document).ready(function() {
	$("#fnumeroservicios").change(function(){ 
		$("#listaFechasModal").val("");
		$("#fechasGeneradas").html("");
 	});
	$("#botonGenerador").click(function(){ 
		abrirModalFechas("");
 	});
	$("#botonGenerarDias").click(function(){ 
		calcularFechasDias();
 	});
	$("#botonGenerarSemanas").click(function(){ 
		calcularFechasSemanas();
 	});
	$("#botonGenerarCatorcenas").click(function(){ 
		calcularFechasCatorcenas();
 	});
	$("#botonGenerarQuincenas").click(function(){ 
		calcularFechasQuincenas();
 	});
	$("#botonGenerarMeses").click(function(){ 
		var tipogenerador="meses";
		var cantidadservicios=$("#fnumeroservicios").val();
		var fechainicio=$("#ffechainicio").val();
		var tipomeses=$('input:radio[name=tipomeses]:checked').val();
		var diames=$("#diames").val();
		var cantidadmeses=$("#cantidadmeses").val();
		var funcion1=$("#funcion1").val();
		var funcion2=$("#funcion2").val();
		var cantidadmeses2=$("#cantidadmeses2").val();
		$("#fechasGeneradas").hide();
		$.ajax({
			url: '../../../librerias/php/generadorFechas/generadorFechas.php',
			type: "POST",
			data: "submit=&tipogenerador="+tipogenerador+"&cantidadservicios="+cantidadservicios+"&fechainicio="+fechainicio+"&tipomeses="+tipomeses+"&diames="+diames+"&cantidadmeses="+cantidadmeses+"&funcion1="+funcion1+"&funcion2="+funcion2+"&cantidadmeses2="+cantidadmeses2, //Pasamos los datos en forma de array seralizado desde la funcion de 
			success: function(mensaje){
				$("#fechasGeneradas").html(mensaje);
				$("#fechasGeneradas").fadeIn(500);
				serializarFechas();
			}
		});
		return false;
		
		//calcularFechasMeses();
 	});
});

function abrirModalFechas(id){
	$("#referenciaFechas").val(id);
	$("#listaFechasModal").val("");
	$("#fechasGeneradas").html("");
	$("#modalfechas").modal();
	
}

function calcularFechasDias(){
	$("#fechasGeneradas").hide();
	var tipo=$('input:radio[name=tipodias]:checked').val();
	var cantidaddias=parseFloat($("#cantidaddias").val());
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=$("#ffechainicio").val();
	var cadena="";
	if (tipo=="cadaxdias"){ //si está seleccionada la opción de cada x días
		var con=0;
		var fechanueva=new Date(fechainicio);
		while(con<cantidadservicios){
			
			fechanueva.setDate(fechanueva.getDate() + cantidaddias);
			fecha=formatearFecha(fechanueva,"mx");
			cadena=cadena+fecha+"</br>";
			con++;
		}
		
	}else{ // Si esta seleccioanda la opción de diario
		var con=0;
		var fechanueva=new Date(fechainicio);
		while(con<cantidadservicios){
			
			fechanueva.setDate(fechanueva.getDate() + 1);
			fecha=formatearFecha(fechanueva,"mx");
			cadena=cadena+fecha+"</br>";
			con++;
		}
	}
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
}

function calcularFechasSemanasOld(){
	$("#fechasGeneradas").hide();
	var tipo=$('input:radio[name=tipodias]:checked').val();
	var cantidadsemanas=parseFloat($("#cantidadsemanas").val());
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=new Date($("#ffechainicio").val());
	var incluirquintasemana = "NO";
	if($('input:checkbox[name=quintasemana]:checked').val() == "SI"){
		incluirquintasemana = "SI";
	}
	
	/*var Navidad = new Date('December 25, 2014 23:15:30');
	var mes = Navidad.getMonth();*/


	var cadena="";
	var mesactual = fechainicio.getMonth();//0 enero 11 diciembre
	var con=0;
	var contadorSemanas=0;
	var fechanueva=new Date();
	while(con<cantidadservicios){
		fechanueva.setDate(fechanueva.getDate() + 1);
		var dia=fechanueva.getDay();
		var mes=fechanueva.getMonth();
		fecha="";
		
		//si hubo cambio de mes en la fecha reiniciar contadorSemanas
		if(mes != mesactual){
			contadorSemanas=0;
			mesactual = mes;
		}
		
		if (dia==0){
			if($("#domingo").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
			
		}
		if (dia==1){
			if($("#lunes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==2){
			if($("#martes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==3){
			if($("#miercoles").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==4){
			if($("#jueves").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==5){
			if($("#viernes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==6){
			if($("#sabado").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		//fecha=formatearFecha(fechanueva,"usa");
		
	}
	
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
}

// @param string (string) : Fecha en formato YYYY-MM-DD
// @return (string)       : Fecha en formato DD/MM/YYYY
function convertDateFormat(string) {
  var info = string.split('-');
  return info[2] + '-' + info[1] + '-' + info[0];
}

function obtenerMes(string) {
  var info = string.split('-');
  return info[1];
}

function calcularFechasSemanas(){
	$("#fechasGeneradas").hide();
	var tipo=$('input:radio[name=tipodias]:checked').val();
	var cantidadsemanas=parseFloat($("#cantidadsemanas").val());
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=$("#ffechainicio").val();
	alert(fechainicio);
	//fechainicio = convertDateFormat(fechainicio);
	//alert(fechainicio);
	var incluirquintasemana = "NO";
	if($('input:checkbox[name=quintasemana]:checked').val() == "SI"){
		incluirquintasemana = "SI";
	}
	
	/*var Navidad = new Date('December 25, 2014 23:15:30');
	var mes = Navidad.getMonth();*/


	var cadena="";
	//fechainicio = new Date(fechainicio);
	var mesactual = obtenerMes(fechainicio);
	//var mesactual = fechainicio.getMonth();//0 enero 11 diciembre
	var con=0;
	var contadorSemanas=0;
	var fechanueva=new Date();
	fechanueva.setDate(fechainicio.getDate());
	while(con<cantidadservicios){
		fechanueva.setDate(fechanueva.getDate() + 1);
		var dia=fechanueva.getDay();
		var mes=fechanueva.getMonth();
		fecha="";
		
		//si hubo cambio de mes en la fecha reiniciar contadorSemanas
		if(mes != mesactual){
			contadorSemanas=0;
			mesactual = mes;
		}
		
		if (dia==0){
			if($("#domingo").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
			
		}
		if (dia==1){
			if($("#lunes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==2){
			if($("#martes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==3){
			if($("#miercoles").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==4){
			if($("#jueves").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==5){
			if($("#viernes").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		if (dia==6){
			if($("#sabado").is(':checked')){
				if(contadorSemanas <4){
					fecha=formatearFecha(fechanueva,"mx");
					cadena=cadena+fecha+"</br>";
					con++;
					contadorSemanas++;
				}
				else{
					if(incluirquintasemana == "SI"){
						fecha=formatearFecha(fechanueva,"mx");
						cadena=cadena+fecha+"</br>";
						con++;
						contadorSemanas++;
					}
				}
			}
		}
		//fecha=formatearFecha(fechanueva,"usa");
		
	}
	
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
}

function calcularFechasCatorcenasOld(){
	$("#fechasGeneradas").hide();
	var tipocatorcena=$("#tipocatorcena").val();
	var diacatorcena=$("#diacatorcena").val();
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=$("#ffechainicio").val();
	
	var cadena="";

	var con=0;
	var fechanueva=new Date(fechainicio);
	var diferenciadias=0;
	if (tipocatorcena==1){
		var diferenciadias=7;
	}
	while(con<cantidadservicios){
			
		fechanueva.setDate(fechanueva.getDate() + 1);
		var dia=fechanueva.getDay();
		var diadelmes = fechanueva.getDate() + 1;
		diferenciadias++;
		fecha="";
		if (dia==diacatorcena && diferenciadias>7){
			fecha=formatearFecha(fechanueva,"mx");
			cadena=cadena+fecha+"</br>";
			diferenciadias=0;
			con++;
		}
		
	}
	
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
}

function calcularFechasCatorcenas(){
	$("#fechasGeneradas").hide();
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=$("#ffechainicio").val();
	
	var cadena="";

	var con=0;
	
	var fechanueva=new Date(fechainicio);
	alert(fechanueva);
	fechanueva.setDate(fechanueva.getDate() + 1);
	
		
	while(con<cantidadservicios){
		fechanueva.setDate(fechanueva.getDate());
		fecha="";
		fecha=formatearFecha(fechanueva,"mx");
		cadena=cadena+fecha+"</br>";
		fechanueva.setDate(fechanueva.getDate() + 14);
		con++;
	}
	
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
}

function diasEnUnMes(mes, año) {
	return new Date(año, mes, 0).getDate();
}

function calcularFechasQuincenas(){
	
	var varRec = 0;
	var varDia = 0;
	var varMes = 0;
	var varYY = 0;
	var varDiasMes = 0;
	var varVisitas = 0;
	var varRecVisitas = 0;
	var varFeNueva = "";
	var varDiaSemana = "";
	var varFrec = 1;
	var varFechaIni = new Date();
	var cadena ="";
	var varVisitas = $("#fnumeroservicios").val();
	var varFechaIni = new Date($("#ffechainicio").val());
	var diacatorcena=$("#diacatorcena").val();
	var tipocatorcena=$("#tipocatorcena").val();//1 primer y tercer || 2 segundo y cuarto
	var tipocatorcenasegundasemana=(parseInt($("#tipocatorcena").val())+ (2));//1 primer y tercer || 2 segundo y cuarto
	while (varRecVisitas < varVisitas)
	{
		varDia = varFechaIni.getDate();
		varMes = varFechaIni.getMonth()+1;
		varYY = varFechaIni.getFullYear();
		varDiasMes = diasEnUnMes(varMes,varYY);
		var cero = "0";
		if(varMes >= 10){
			cero = "";
		}
		var Mes = cero + varMes;
		var varFechaAux = new Date(varYY+"/"+Mes+"/"+varDia);
		varFechaIni = new Date(varYY+"/"+Mes+"/"+01);
		varFrec = 1;
		varRec = 0;
		while (varRec < varDiasMes)
		{
			varDiaSemana = varFechaIni.getDay();

			if (varDiaSemana == diacatorcena)
			{//valida que sea el dia que se selecciono LUNES MARTES ETC
				if (varFechaIni >= varFechaAux)
				{//la fecha está dentro del rango de fechas que se seleccionó
					if (varFrec == tipocatorcena || varFrec == tipocatorcenasegundasemana)
					{//ES PRIMERA O TERCERA O SEGUNDA O CUARTA SEMANA
						if (varRecVisitas == varVisitas-1)
						{//SE COMPLETARON LAS FECHAS AGREGARLAS AL OBJETO Y SERIALIZAR
							//AGREGAMOS LA ULTIMA FECHA
							fecha=formatearFecha(varFechaIni,"mx");
							cadena=cadena+fecha+"</br>";
							$("#fechasGeneradas").html(cadena);
							$("#fechasGeneradas").fadeIn(500);
							serializarFechas();
							return;
						}
						fecha=formatearFecha(varFechaIni,"mx");
						cadena=cadena+fecha+"</br>";
						varRecVisitas++;
					}
				}
				varFrec++;
			}
			varRec++;
			varFechaIni.setDate(varFechaIni.getDate() + 1);
		}
	}
}

function mostrarCorrida(variable, valor, titulo){
	if (titulo!=""){
		$("#corrida").html($("#corrida").html()+"*************************"+titulo+"**********************</br>")
	}
	$("#corrida").html($("#corrida").html()+variable+": "+valor);
	$("#corrida").html($("#corrida").html()+"</br>")
}

function calcularFechasMeses(){
	$("#corrida").html("");
	$("#fechasGeneradas").hide();
	var tipomeses=$("#tipomeses").val();
	var diames=$("#diames").val();
	var cantidadmeses=$("#cantidadmeses").val();
	var cantidadservicios=$("#fnumeroservicios").val();
	var fechainicio=$("#ffechainicio").val();
	var cadena="";

	var con=0;
	var fechanueva=new Date(fechainicio);

	while(con<cantidadservicios){
		
		
		var diadelmes = fechanueva.getDate();
		var totaldias=diasDelMes(fechanueva);
		
		if (totaldias<diames){
			var mes=fechanueva.getMonth()+1;
			var ano=fechanueva.getFullYear();
			fechas=new Date(ano+"/"+mes+"/"+totaldias);
			fecha=formatearFecha(fechas,"mx");
			fechanueva=fechas; //Asignamos la fecha al ciclo neuvamente
			fechanueva=fechas;
			
			cadena=cadena+fecha+"</br>";
			con++;
		}else{
			if(diadelmes==diames){
				//fechanueva.setMonth(fechanueva.getMonth() + 1);
				mes=mes+1;
				fechas=new Date(ano+"/"+mes+"/01");
				fechanueva=fechas;
				
				var mes=fechanueva.getMonth()+1;
				var ano=fechanueva.getFullYear();
				fechas=new Date(ano+"/"+mes+"/"+diames);
				fecha=formatearFecha(fechas,"mx");
				cadena=cadena+fecha+"</br>";
				con++;
			}
		}
		
		fechanueva.setDate(fechanueva.getDate() + 1);
		
	}
	
	$("#fechasGeneradas").html(cadena);
	$("#fechasGeneradas").fadeIn(500);
	serializarFechas();
	
}

function diasDelMes(fechaM) { //Recibe del 0 a 11 meses
	var mes=fechaM.getMonth();
	var ano=fechaM.getFullYear();
	return new Date(ano, mes+1, 0).getDate(); // regresa del 1 al 12 meses
}

function formatearFecha(fechanueva,zona){
	var dia = fechanueva.getDate();
	var mes = fechanueva.getMonth()+1;// +1 porque los meses empiezan en 0
	var anio = fechanueva.getFullYear();
	var fecha="";
	
	if (dia<10){
		dia="0"+dia;
	}
	if (mes<10){
		mes="0"+mes;
	}
	if (zona=="mx"){
		fecha=dia+"-"+mes+"-"+anio;
	}
	if (zona=="usa"){
		fecha=anio+"-"+mes+"-"+dia;
	}
	return fecha;
}

function serializarFechas(){
	var cadenaFechas=$("#fechasGeneradas").html();
	var regex = /<br\s*[\/]?>/gi;
	cadenaFechas=cadenaFechas.replace(regex, ",")
	cadenaFechas=cadenaFechas.substring(0,cadenaFechas.length-1);
	$("#listaFechasModal").val(cadenaFechas);
}
