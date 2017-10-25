<div class="modal fade" tabindex="-400" role="dialog" id="transactionModal">
  <div class="modal-dialog" role="document"  style="width:55%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal3-title">Nueva Transacción</h4>
      </div>
      <div class="modal-body"> 
                    <div class="row">
                            <div class="col-sm-12"> 
                                <div class="col-sm-5"> 
                                    <div class="form-group">
                                            <input type="hidden"  id="id_prestamo" value="0">
                                        <label>Tipo de Transacción</label>
                                        <select id="tipo_transaccion" class="form-control">
                                            <option value="1">Pago de Cuota</option>
                                            <option value="2">Pago de Capital</option> 
                                            <option value="3">Pago de Mora</option> 
                                        </select>
                                    </div>
                                    <div class="form-group pago_mora"  >
                                            <label id="label_pago_transaccion">Numero de Cuotas a Pagar</label>
                                            <input type="number" class="form-control" id="monto_transaccion">
                                            <label class="lbmensaje_prestamos"> </label>
                                    </div> 
                                </div>
                                <div class="col-sm-7">
                                <label id="label_pago_transaccion">Notas</label>
                                            
                                   <textarea class="form-control" id="comentario_transaccion" cols="30" rows="10">

                                   </textarea>
                                </div> 
                            </div>
                    </div>  
 
                                          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_transacction">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->