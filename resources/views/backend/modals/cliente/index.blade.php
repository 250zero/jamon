<div class="modal fade" tabindex="-1" role="dialog" id="ClientModal">
  <div class="modal-dialog" role="document" style="width:70%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body"> 
                    <input class="form-control" type="hidden" value="0" id="id_client" name="id_client">
                    {{ csrf_field() }} 
                <div class="row"> 
                <div class="col-sm-5"> 
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" id="client_name" name="client_name">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>  
                            <input class="form-control" type="text" id="client_last_name" name="client_last_name">
                        </div>
                </div>
                <div class="col-sm-5"> 
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div> 
                        <div class="form-group">
                            <label>Telefono</label>
                            <input class="form-control" type="text" id="telephone" name="telephone">
                        </div>
                </div>
                <div class="col-sm-5"> 
                        <div class="form-group">
                            <label>Celular</label>
                            <input class="form-control" type="text" id="cellphone" name="cellphone">
                        </div>  
                </div>

                </div> 
                <div class="row"> 
                <div class="col-sm-12"  > 
                    <h3>Prestamos  <button class="btn btn-primary" id="add_loans"><li class="fa fa-plus  "></li></button></h3> 
                    
                    <table id="header_loans" class="table table-striped table-bordered table-hover" >
                    <thead>
                            <tr>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>  
                            <th>Porciento</th>
                            <th>Cuotas</th>
                            <th>Capital Solicitado</th> 
                            <th>Capital Amortizado</th> 
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
                </div>
                <br>
                                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" id="save_client">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->