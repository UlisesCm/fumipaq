		<style>
      	#map {
        	width: 100%;
        	height: 500px;
      	}
    	</style>
        <div class="modal fade" id="modal">
          <div class="modal-dialog modal-md" style="width:90%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="tituloModal">Seleccione la ubicación</h3>
              </div>
              <div class="modal-body" id="contenidoModal">
                 <div id="map"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->