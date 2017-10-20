<div class="modal fade" tabindex="-200" role="dialog" id="LoansModalDetailTransac">
  <div class="modal-dialog" role="document"  style="width:85%" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal30-title">Modal title</h4>
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
                                               <td><b>Cliente </b></td>
                                               <td id="cliente_detalle_prestamo"></td>
                                            </tr> 
                                           <tr>
                                               <td><b>Metodo de Prestamo</b></td>
                                               <td id="metodo_prestamo"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>Capital Pagado</b></td>
                                                <td id="capital_pagado_detail"></td>
                                             </tr> 
                                           <tr>
                                               <td><b>Capital Restante</b></td>
                                               <td id="capital_restante_detail"></td>
                                            </tr> 
                                            <tr>
                                                <td><b>% Interes</b></td>
                                                <td id="porciento_detail"></td>
                                             </tr> 
                                             <tr>
                                                 <td><b>Monto Interes</b></td>
                                                 <td id="interes_total_detail"></td>
                                              </tr> 
                                              <tr>
                                                  <td><b>Monto Interes Pagado</b></td>
                                                  <td id="montal_interes_pagado"></td>
                                               </tr> 
                                           <tr>
                                               <td><b>Monto Interes Restante</b></td>
                                               <td id="montal_interes_restante"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Numero de Cuotas</b></td>
                                               <td id="numero_cuotas"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Monto de Capital por Cuota</b></td>
                                               <td id="monto_cuotas_capital"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Monto de Interes por Cuota</b></td>
                                               <td id="monto_cuotas_interes"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Monto por Cuota</b></td>
                                               <td id="monto_cuotas"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Numero de Cuotas Pagadas</b></td>
                                               <td id="numero_cuotas_pagadas"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Numero de Cuotas Restantes</b></td>
                                               <td id="numero_cuotas_restante"></td>
                                            </tr> 


                                            <tr>
                                            <td><b>Rango de dia mora</b></td>
                                            <td id="rango_dia_mora"></td>
                                         </tr> 
                                         <tr>
                                            <td><b>Monto a pagar por mora</b></td>
                                            <td id="monto_pagar_mora"></td>
                                         </tr> 
                                            <tr>
                                               <td><b>Mora Pagada</b></td>
                                               <td id="mora_pagada"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Dias de mora pagados</b></td>
                                               <td id="dias_mora_pagada"></td>
                                            </tr> 
                                            <tr>
                                               <td><b>Dias de Pago</b></td>
                                               <td id="dia_pago"></td>
                                            </tr>  
                                            <tr>
                                               <td> </td>
                                               <td  ></td>
                                            </tr>  
                                                <tr>
                                                    <td><button id="transaccion_detail" class="btn btn-warning" >Realizar Transacción</button> </td>
                                                    <td><button id="transaccion_detail" class="btn btn-success" >Tabla Amortización</button>  </td>
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