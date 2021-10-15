<?php
//Funciones disponibles para la entidad clientes
$entorno="
actividades/Actividades|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@recomendaciones/Recomendaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@garantias/Garantias|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@sucursalgarantias/Sucursales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
	@sucursales/Sucursales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@empresasgarantias/Empresas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros	
@archivos/Archivos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
	@asignacionherramientas/Asignacionherramientas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@conciliacionesbancarias/Conciliacionesbancarias|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@capturas/Capturas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@categorias/Categorias|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@ciudades/Ciudades|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@clasificacionesproductos/Clasificacionesproductos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@clasificacionesservicios/Clasificacionesservicios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@clientes/Clientes|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@compras/Ordenes de compra|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@configuracion/Configuracion|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos valores de configuracion,
	eliminar:Eliminar valores de configuracion,
	consultar:Consultar configuracion,
	modificar:Modificar valores de configuracion,
	respaldar:Respaldar base de datos
@consignacionesproductos/Consignacionesproductos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@contactos/Contactos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
	@controlgasolinas/Controlgasolinas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@cotizaciones/Cotizaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cotizacionesotros/Cotizacionesotros|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cotizacionesproductos/Cotizacionesproductos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cotizador/Cotizador|
	acceso:Acceso al modulo
@cuentasbancarias/Cuentasbancarias|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentascorreo/Cuentascorreo|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentasporcobrar/Cuentasporcobrar|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentasporpagar/Cuentasporpagar|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentasprincipales/Cuentasprincipales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@cuentassecundarias/Cuentassecundarias|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@datosfiscales/Datosfiscales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@depositos/Depositos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detallecapturas/Detallecapturas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detalleconsignacionesproductos/Detalleconsignacionesproductos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detallecotizaciones/Detallecotizaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detallecotizacionesotros/Detallecotizacionesotros|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detallecotizacionesproductos/Detallecotizacionesproductos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@detallepronosticos/Detallepronosticos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@dispositivosrcm/Dispositivosrcm|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@domicilios/Domicilios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@email/Email|
	acceso:Acceso al modulo de correo electronico,
	guardar:Permitir el envio de correo electronico
@empleados/Empleados|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@empresas/Empresas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@estados/Estados|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@facturacion/Facturacion|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificarprecio:Modificar el precio de los conceptos,
	modificar:Modificar registros,
	descargar:Permitir la descarga de los comprobantes,
	papelera:Acceso a la papelera de registros
@folios/Folios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@foliosfisicos/Folios fisicos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	consultar:Consultar registros
@formatos/Formatos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@gastos/Gastos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@giroscomerciales/Giroscomerciales|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@inventario/Inventario|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	papelera:Tener acceso a la papelera de datos eliminados,
	consultar:Consultar registros,
	consultarkardex:Consultar historiral de kardex,
	resetear:Resetear Inventario (Establece existencias en cero),
	reparar:Permitir reparaciones de existencias,
	consultarrastreador:Permitir consultar el rastreador de productos,
	cambiarubicacion:Modificar stock y ubicaciones,
	modificar:Modificar inventario
@liquidaciones/Liquidaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@listasprecios/Listasprecios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@mediospublicitarios/Mediospublicitarios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@metodosaplicacion/Metodosaplicacion|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@modelosimpuestos/Modelo de impuestos|
	acceso:Acceso al modulo,
	guardar:Registrar nuevos proveedores,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@movimientos/Movimientos de almacen|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	nuevaentrada:Registrar entradas de mercancia,
	nuevasalida:Registrar salidas de mercancia,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@objetivosprospeccion/Objetivosprospeccion|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@ordenescompras/Ordenes de compra|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	autorizaraumentocosto:Permitir atorizar compras con incremento de costos,
	modificar:Modificar registros
@otrosingresos/Otrosingresos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@pagos/Pagos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	registrarPago:Registrar pagos,
	cambiarEstatus:Cambiar estatus de pago,
	papelera:Acceso a la papelera de registros
@perfiles/Perfiles|
	acceso:Acceso al modulo,
	guardar:Guardar registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	cancelar:Cancelar apartados,
	modificar:Modificar registros
@plantillasmensajes/Plantillas de mensajes|
	acceso:Acceso al modulo,
	guardar:Crear nuevas plantillas para mensajes de correo,
	eliminar:Eliminar plantillas,
	consultar:Consultar plantillas guardadas,
	modificar:Modificar plantillas existentes
@presentaciones/Presentaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@productos/Productos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@programacion/Programacion|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@pronosticos/Pronosticos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@prospectos/Prospectos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@proveedores/Proveedores|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@recomendaciones/Recomendaciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@reportecortediario/Reportecortediario|
	acceso:Acceso al modulo
@reportegerencial/Reportegerencial|
	acceso:Acceso al modulo
@reporteventasporusuario/Reporteventasporusuario|
	acceso:Acceso al modulo
@reporteestadodecuentabancario/Reporteestadodecuentabancario|
	acceso:Acceso al modulo
@reporteprogramadetecnico/Reporteprogramadetecnico|
	acceso:Acceso al modulo
@reportependientesporcapturar/Reportependientesporcapturar|
	acceso:Acceso al modulo
@reportependientesporliquidar/Reportependientesporliquidar|
	acceso:Acceso al modulo
@reporteresumengeneraldeservicios/Reporteresumengeneraldeservicios|
	acceso:Acceso al modulo
@reportefumigacion/Reportefumigacion|
	acceso:Acceso al modulo
@requisiciones/Requisiciones|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@retiros/Retiros|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@rutas/Rutas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@servicios/Servicios|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@tecnicos/Tecnicos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@toxicidades/Toxicidades|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@traspasos/Traspasos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros
@unidades/Unidades de medida|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@usuarios/Usuarios|
	acceso:Acceso al modulo de usuarios,
	guardar:Permitir crear nuevos usuarios,
	eliminar:Permitir eliminar usuarios,
	consultar:Consultar lista de usuarios,
	modificar:Permitir modificar los datos de los usuarios,
	bloquear:Permitir bloquear usuarios,
	email:Permitir enviar correos electrónicos
@vehiculos/Vehiculos|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@zonas/Zonas|
	acceso:Acceso al modulo,
	guardar:Guardar nuevos registros,
	eliminar:Eliminar registros,
	consultar:Consultar registros,
	modificar:Modificar registros,
	papelera:Acceso a la papelera de registros
@carros/Carros|
		acceso:Acceso al modulo,
		guardar:Guardar nuevos registros,
		eliminar:Eliminar registros,
		consultar:Consultar registros,
		modificar:Modificar registros
";
$entorno= str_replace("\r","",$entorno);
$entorno= str_replace("\t","",$entorno);
$entorno= str_replace("\n","",$entorno);
?>
