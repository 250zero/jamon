<div class="modal fade" tabindex="-300" role="dialog" id="AgendaModal">
  <div class="modal-dialog" role="document"  style="width:55%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal3-title-agenda"></h4>
      </div>
      <div class="modal-body"> 
            <div class="row">
                            <div class="col-sm-12">
                                <table id="tabla_agenda" class="table table-striped table-bordered table-hover" > 
                                    <thead>
                                        <tr> 
                                                <th>Estado</th>
                                                <th>Cliente</th>
                                                <th>Telefono</th>
                                                <th>Comentario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table> 
                                <nav aria-label="Page navigation agenda " id="agenda_nav">
                                            <ul class="pager">
                                                <li class="previous  " id="agenda_prev" ><a href="#">← Anterior</a></li> 
                                                <li id="agenda_info_pag"> </li> 
                                                <li class="next" id="agenda_next" ><a href="#">Siguiente →</a></li>
                                            </ul> 
                                            <div class="col-sm-6"><span></span></div>
                                        </nav>      
                            </div>
                            <style>
                            td:hover { 
                                cursor:pointer;
                            }
                            </style>
                    <!-- /. col-sm-12 -->
                    </div>
 
                                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_transacction">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->