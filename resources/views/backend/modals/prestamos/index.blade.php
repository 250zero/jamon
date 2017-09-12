<div class="modal fade" tabindex="-200" role="dialog" id="LoansModalDetailTransac">
  <div class="modal-dialog" role="document"  style="width:85%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal5-title">Modal title</h4>
      </div>
      <div class="modal-body"> 
                    <div class="row">
                            <div class="col-sm-12"> 
                                <div class="col-sm-5"> 
                                    <div class="form-group">
                                        <h3>Detalle</h3>
                                        <input type='hidden' id="id_prestamo" value="0">
                                        <table  class="table table-striped table-bordered table-hover" >
                                           <tbody>
                                           <tr>
                                               <td><b>Capital Solicitado</b></td>
                                               <td id="capital_solicitado_detail"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>Capital Pagado</b></td>
                                                <td id="capital_pagado_detail"></td>
                                             </tr> 
                                           <tr>
                                               <td><b>Capital por Pagar</b></td>
                                               <td id="capital_restante_detail"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>% Interes</b></td>
                                                <td id="porciento_detail"></td>
                                             </tr> 
                                           <tr>
                                               <td><b>Interes a pagar</b></td>
                                               <td id="interes_total_detail"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>Porciento de Interes por Mora</b></td>
                                                <td id="interes_mora_detail"></td>
                                             </tr> 
                                           <tr>
                                               <td><b>Monto de Interes por Mora</b></td>
                                               <td id="interes_mora_monto_detail"></td>
                                            </tr> 
                                             <tr>
                                               <td><b>Monto de Interes Pagado por Mora</b></td>
                                               <td id="interes_mora_pagado_detail"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>Monto de Cuotas</b></td>
                                                <td id="total_cuotas_detail"></td>
                                             </tr> 
                                             <tr>
                                                 <td><b>Dias de Pago</b></td>
                                                 <td id="dias_pagos_detail"></td>
                                              </tr> 
                                              <tr>
                                                  <td><b>Numero de Cuotas</b></td>
                                                  <td id="numero_cuotas_detail"></td>
                                               </tr> 
                                               <tr>
                                                   <td><b>Numero de Cuotas Restantes</b></td>
                                                   <td id="dias_restantes_detail"></td>
                                                </tr> 
                                               <tr>
                                                   <td><b>Estado del Prestamo</b></td>
                                                   <td id="estado_prestamo"></td>
                                                </tr> 
                                                <tr>
                                                    <td><button id="transaccion_detail" class="btn btn-warning" >Realizar Transacción</button> </td>
                                                    <td> </td>
                                                    </tr>  
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-7"> 
                                    <div class="form-group">
                                        <h3>Movimientos</h3>
                                        <table id="header_transact" class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                    <tr>
                                                    <th>Fecha</th> 
                                                    <th>Comentario</th> 
                                                    <th>Monto</th>  
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            </table>
                                            <nav aria-label="Page navigation ">
                                                    <ul class="pager">
                                                        <li class="previous  " id="loans_trans_prev" ><a href="#">← Anterior</a></li> 
                                                        <li id="info_pag_loans_trans"> </li> 
                                                        <li class="next" id="loans_trans_next" ><a href="#">Siguiente →</a></li>
                                                    </ul> 
                                                    <div class="col-sm-6"><span></span></div>
                                                </nav> 
                                    </div>
                                </div> 
                            </div>
                    </div>  
 
                                          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_loans">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->