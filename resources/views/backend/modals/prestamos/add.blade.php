<div class="modal fade" tabindex="-100" role="dialog" id="LoansModalDetail">
<div class="modal-dialog" role="document"  style="width:70%" >
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title-loans">Modal title</h4>
    </div>
    <div class="modal-body"> 
                 <div class="col-sm-6 form-group">
                     <select id="periodo_prestamo" class="form-control">
                     <option value="0">Seleccionar Periodo de Pago</option>
                     <option value="1">Quincenal</option>    
                     <option  value="2">Mensual</option>
                     </select>
                 </div>
                  <div class="row hide">
                          <div class="col-sm-12"> 
                              <div class="col-sm-3"> 
                                  <div class="form-group">
                                      <label>Capital a Solicitar</label>
                                      <input type="number" id="capital_solicitado" class="form-control"> 
                                      <label></label>
                                  </div>
                              </div>
                              <div class="col-sm-3"> 
                                  <div class="form-group">
                                      <label>% Interes</label>
                                      <input type="number" id="interes" class="form-control">
                                      <label></label>
                                  </div>
                              </div> 
                              <div class="col-sm-3"> 
                                  <div class="form-group">
                                      <label>Total a pagar de intereses</label>
                                      <input type="number" readonly="true" id="total_pagar_interes" class="form-control">
                                  </div>
                              </div> 
                              <div class="col-sm-3"> 
                                  <div class="form-group">
                                      <label>Total a pagar</label>
                                      <input type="number" readonly="true" id="total_pagar" class="form-control">
                                  </div>
                              </div> 
                          </div>
                  </div> 
                 <div class="row hide">
                          <div class="col-sm-12"> 
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Fecha Inicio</label>
                                      <input type="date" step="15"  id="fecha_ini" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Fecha Fin</label>
                                      <input type="month" id="fecha_fin" class="form-control">
                                  </div>
                              </div> 
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Numero Cuotas</label>
                                      <input type="number" id="numero_cuota" readonly="true" class="form-control">
                                  </div>
                              </div> 
                          </div>
                  </div>   
                  <div class="row hide">
                          <div class="col-sm-12"> 
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Dia de Pago</label>
                                      <input type="number" id="dia_pago" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Cuota a pagar</label>
                                      <input type="number" readonly="true" id="cuota_pagar" class="form-control">
                                  </div>
                              </div> 
                              
                              <div class="col-sm-4"> 
                                  <!-- <div class="form-group"><br> 
                                       <button class="btn btn-primary">Tabla Amortización</label>
                                  </div>  -->
                              </div> 
                          </div>
                  </div>   
                  <div class="row hide">
                          <div class="col-sm-12"> 
                                  <div class="col-sm-6"> 
                                      <h3>Mora por dias atrasados</h3><br>
                                  </div>
                          </div>
                          <div class="col-sm-12"> 
                             
                              <div class="col-sm-4"> 
                                  
                                  <div class="form-group">
                                      <label>% interes</label>
                                      <input type="number" id="interes_mora" class="form-control">
                                  </div>
                              </div>
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Monto</label>
                                      <input type="number" id="monto_mora" class="form-control">
                                  </div>
                              </div> 
                              <div class="col-sm-4"> 
                                  <div class="form-group">
                                      <label>Rango de dias</label>
                                      <input type="number" id="rango_dia_mora" class="form-control">
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