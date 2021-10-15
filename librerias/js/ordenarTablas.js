/*
  OrdenarTablas
  Version 1
  22 de Enero 2019
  Autor: Armando Viera Rodríguez para Modula Software
*/

function ordenarTabla(tabla,columna,orden,tipo){
	var frecuencia=0;
	var anterior=0;
	var con=0;
	var filasTotales= $("#"+tabla+" > tbody").children().length;
	//alert(filasTotales);
	while (con<filasTotales){
		$('#'+tabla+' tbody tr').each(function () {
			$(this).find('td').each(function (index,valor) {
				if (index==columna){
					frecuencia=$(valor).html();
				}
			})
			if(tipo=="numero"){
				frecuencia=parseFloat(frecuencia);
				anterior=parseFloat(anterior)
			}
			
			if(tipo=="fecha"){
				var res=frecuencia.split("-");
				dia = res[0];
				mes = res[1];
				ano = res[2];
				fecha_texto = ano+"-"+mes+"-"+dia;
				ms = Date.parse(fecha_texto);
				frecuencia = new Date(ms);
				
				//anterior = new Date(ms);
			}
			
			if (orden=="DESC"){
				//alert(frecuencia+"<="+anterior);
				if(frecuencia<=anterior){
					//alert("Si, Subir "+frecuencia);
					$(this).insertBefore($(this).prev()); //Subir
				}else{
					//alert("No, Bajar "+frecuencia);
					$(this).insertAfter($(this).next()); //Bajar
				}
			}else{
				if(frecuencia<=anterior){
					//alert("Si, Subir "+frecuencia);
					$(this).insertAfter($(this).next()); //Bajar
				}else{
					//alert("No, Bajar "+frecuencia);
					$(this).insertBefore($(this).prev()); //Subir
					
				}
			}
			
				
			anterior = frecuencia;
			
			
		})// Fin de recorrido
		
		con++;
		//alert(menor);
	}// Fin de While*/
}