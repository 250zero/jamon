<div class="modal fade" tabindex="-300" role="dialog" id="transactionModal">
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
                                        <label>Tipo de Transacción</label>
                                        <select id="tipo_transaccion" class="form-control">
                                            <option value="1">Pago de Cuota</option>
                                            <option value="2">Pago de Mora</option> 
                                        </select>
                                    </div>
                                    <div class="form-group pago_cuota"  >
                                            <label>Total de cuotas a pagar <span id="cuota_label"></span></label>
                                            <input type="number" class="form-control"  id="cuotas_a_pagar">
                                    </div>
                                    <div class="form-group pago_mora" style="display:none">
                                            <label>Dias de mora a Pagar</label>
                                            <input type="number" class="form-control" id="dia_mora_pagar">
                                    </div> 
                                </div>
                                <div class="col-sm-7"> 
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