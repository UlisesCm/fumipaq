		<div class="modal fade" id="modalfechas">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="tituloModal">Generador de fechas</h3>
              </div>
              
              <div class="modal-body" id="contenidoModalFechas">
                  <div class="row">
                  	 <section class="content">
                        <div class="col-sm-9" style="background:#F4F4F4"> 
                        
                  
                            <section class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="fnumeroservicios" class="col-sm-3 control-label">No. de servicios:</label>
                                        <div class="col-sm-2">
                                            <input value="12" name="fnumeroservicios" type="number" required class="form-control" id="fnumeroservicios" />
                                        </div>
                                        
                                        <label for="fnumeroservicios" class="col-sm-3 control-label">Iniciar a partir de :</label>
                                        <div class="col-sm-4">
                                            <input value="<?php echo date("Y-m-d"); ?>" name="ffechainicio" type="date" required class="form-control" id="ffechainicio" />
                                        </div>
                                    </div>
                                </div>
                            </section>
                      
                            <div class="nav-tabs-custom">
                        
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1f" data-toggle="tab" aria-expanded="true">Diaria</a></li>
                                    <li class=""><a href="#tab_2f" data-toggle="tab" aria-expanded="false">Semanal</a></li>
                                    <li class=""><a href="#tab_3f" data-toggle="tab" aria-expanded="false">Catorcenal</a></li>
                                    <li class=""><a href="#tab_4f" data-toggle="tab" aria-expanded="false">Quincenal</a></li>
                                    <li class=""><a href="#tab_5f" data-toggle="tab" aria-expanded="false">Mensual</a></li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1f"> <!--TAB 1-->
                                        <section class="box-body">
                                            <div class="form-horizontal">
                                            
                                                <div class="form-group ">
                                                    <div class="col-sm-5" id="tipodias">
                                                        <label class="radio inline control-label">
                                                            <input id="tipodias" type="radio" name="tipodias" value="cadaxdias" checked="checked">
                                                            Cada
                                                            <input id="cantidaddias" type="number" name="cantidaddias" value="1" style="width:70px; padding:0px 5px 0px 5px;">
                                                            días
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-5" id="tipodias">
                                                        <label class="radio inline control-label">
                                                            <input id="tipodias" type="radio" name="tipodias" value="diario">
                                                            Diario
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12" id="idsucursal_ajax">
                                                        <label class="radio inline control-label">&nbsp;
                                                            <button type="button" class="btn btn-success pull-right" id="botonGenerarDias"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </section>
                                    </div> <!-- FIN TAB 1-->
                                
                                    <div class="tab-pane" id="tab_2f"><!--TAB 2-->
                                    	<section class="box-body">
                                            <div class="form-horizontal">
                                            	<div class="form-group ">
                                                	<div class="col-sm-12">
                                                        <label>
                                                            Repetir cada:
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="lunes" type="radio" name="diasemana" value="lunes" checked="checked">
                                                            Lunes
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                       <label class="radio inline control-label">
                                                            <input id="martes" type="radio" name="diasemana" value="martes">
                                                            Martes
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="miercoles" type="radio" name="diasemana" value="miercoles">
                                                            Miercoles
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="jueves" type="radio" name="diasemana" value="jueves">
                                                            Jueves
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="viernes" type="radio" name="diasemana" value="viernes">
                                                            Viernes
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="sabado" type="radio" name="diasemana" value="sabado">
                                                            Sabado
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="radio inline control-label">
                                                            <input id="domingo" type="radio" name="diasemana" value="domingo">
                                                            Domingo
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group ">
                                                    <div class="col-sm-5" id="tipodias">
                                                        <label class="cantidadsemanas inline control-label">
                                                            De cada
                                                            <input id="cantidadsemanas" type="number" name="cantidadsemanas" value="1" style="width:70px; padding:0px 5px 0px 5px;">
                                                            semana
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <label>
                                                            <input id="quintasemana" type="checkbox" name="quintasemana" value="SI">
                                                            Tomar en cuenta la quinta semana
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12" id="idsucursal_ajax">
                                                        <label class="radio inline control-label">&nbsp;
                                                            <button type="button" class="btn btn-success pull-right" id="botonGenerarSemanas"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </section>
                                    </div><!-- FIN TAB 2-->
                                    <div class="tab-pane" id="tab_3f"><!--TAB 3-->
                                    	<section class="box-body">
                                            <div class="form-horizontal">
                                            
                                                <div class="form-group ">
                                                	<div class="col-sm-6">
                                                        <label>
                                                            Repetir cada 14 dias:
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12" id="idsucursal_ajax">
                                                        <label class="radio inline control-label">&nbsp;
                                                            <button type="button" class="btn btn-success pull-right" id="botonGenerarCatorcenas"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                    		</div><!-- FIN form-horizontal-->
                                        </section>           
                                    </div><!-- FIN TAB 3-->
                                    <div class="tab-pane" id="tab_4f"><!--TAB 3-->
                                    	<section class="box-body">
                                            <div class="form-horizontal">
                                            
                                                <div class="form-group ">
                                                	<div class="col-sm-3">
                                                        <label>
                                                            Repetir cada:
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                            <select id="tipocatorcena" name="tipocatorcena" class="form-control">
                                                                <option value="1">Primer y Tercer</option>
                                                                <option value="2">Segundo y Cuarto</option>
                                                         	</select>
                    								</div>
                                                    <div class="col-sm-4">
                                                            <select id="diacatorcena" name="diacatorcena" class="form-control">
                                                                <option value="1">Lunes</option>
                                                                <option value="2">Martes</option>
                                                                <option value="3">Miercoles</option>
                                                                <option value="4">Jueves</option>
                                                                <option value="5">Viernes</option>
                                                                <option value="6">Sabado</option>
                                                                <option value="0">Domingo</option>
                                                         	</select>
                    								</div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12" id="idsucursal_ajax">
                                                        <label class="radio inline control-label">&nbsp;
                                                            <button type="button" class="btn btn-success pull-right" id="botonGenerarQuincenas"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                    		</div><!-- FIN form-horizontal-->
                                        </section>           
                                    </div><!-- FIN TAB 3-->
                                    <div class="tab-pane" id="tab_5f"><!--TAB 4-->
                                    	<section class="box-body">
                                    		<div class="form-horizontal">
                                            
                                                <div class="form-group ">
                                                	<div class="col-sm-1">
                                                        <label class="radio inline control-label">
                                                            <input id="tipomeses1" type="radio" name="tipomeses" value="1" checked="checked">
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="radio inline control-label">
                                                            El día
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input id="diames" min="1" max="31" type="number" name="diames" value="30" style="width:70px; padding:0px 5px 0px 5px;">
                                                        
                                                    </div>
                                                    <div class="col-sm-2">
                                                   		<label class="control-label">de cada</label>
                    								</div>
                                                    <div class="col-sm-2">
                                                            <input id="cantidadmeses" type="number" name="cantidadmeses" value="1" style="width:70px; padding:0px 5px 0px 5px;">
                    								</div>
                                                    <div class="col-sm-2">
                                                            <label class="control-label">mes(es)</label>
                    								</div>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group ">
                                                	<div class="col-sm-1">
                                                        <label class="radio inline control-label">
                                                            <input id="tipomeses2" type="radio" name="tipomeses" value="2" checked="checked">
                                                            El
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                   		<select id="funcion1" name="funcion1" class="form-control">
                                                                <option value="primero">Primer</option>
                                                                <option value="segundo">Segundo</option>
                                                                <option value="tercero">Tercero</option>
                                                                <option value="cuarto">Cuarto</option>
                                                                <option value="ultimo">Último</option>
                                                         	</select>
                    								</div>
                                                    <div class="col-sm-3">
                                                            <select id="funcion2" name="funcion2" class="form-control">
                                                                <option value="pordia">Día del mes</option>
                                                                <!--option value="diadelasemana">Día de la semana</option-->
                                                                <option value="monday">Lunes</option>
                                                                <option value="tuesday">Martes</option>
                                                                <option value="wednesday">Miércoles</option>
                                                                <option value="thursday">Jueves</option>
                                                                <option value="friday">Viernes</option>
                                                                <option value="saturday">Sabado</option>
                                                                <option value="sunday">Domingo</option>
                                                         	</select>
                    								</div>
                                                    
                                                    <div class="col-sm-1">
                                                        <label class="control-label">
                                                            de cada
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="col-sm-2" id="idsucursal_ajax">
                                                    	 <input id="cantidadmeses2" min="1" max="31" type="number" class="form-control" value="1">
                                                    </div>
                                                    
                                                    <div class="col-sm-1">
                                                        <label class="control-label">
                                                            mes(es)
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="col-sm-12" id="idsucursal_ajax">
                                                        <label class="radio inline control-label">&nbsp;
                                                            <button type="button" class="btn btn-success pull-right" id="botonGenerarMeses"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;Generar</button>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                    		</div><!-- FIN form-horizontal-->
                                    	</section>
                                    </div><!-- FIN TAB 4-->
                                </div><!--fin tab-content-->
                            
                            </div><!-- fin nav-tabs-custom-->
                            
                        </div><!-- fin col-->
                        <div class="col-sm-3">
                            <div id="fechasGeneradas" style="background:#F4F4F4; text-align:right; padding:10px; max-height:5000px; overflow:scroll;">
                            </div>
                        </div>
                        
                	</section>
                    
                </div><!-- fin row-->
                  
              </div><!-- /.modal-body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" id="referenciaFechas"/>
                <input type="hidden" id="listaFechasModal"/>
                <button id="botonAceptarFechas" type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->