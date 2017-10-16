<div class="modal fade" tabindex="-100" role="dialog" id="LoansModalDetail">
<div class="modal-dialog" role="document"  style="width:70%" >
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title-loans">Modal title</h4>
    </div>
    <div class="modal-body"> 
                  <!--Inicio del body-->
                  <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#capital" aria-controls="capital" role="tab" data-toggle="tab">Generales</a></li>
                         <li role="presentation"><a href="#penalidad" aria-controls="penalidad" role="tab" data-toggle="tab">Penalidad</a></li>
                        <li role="presentation"><a href="#impresion" aria-controls="impresion" role="tab" data-toggle="tab">Proyeccion</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="capital">
                                    <div class="row">
                                            <div class="col-sm-12"> 
                                                    <div class="col-sm-4"> 
                                                                <div class="form-group">
                                                                    <label>Metodologia</label>
                                                                    <select name="method_loans" id="method_loans" class="form-control"> 
                                                                    </select> 
                                                                </div>
                                                      </div>
                                                      <div class="col-sm-4"> 
                                                                  <div class="form-group">
                                                                      <label>Periodo</label>
                                                                      <select name="period_loans" id="period_loans" class="form-control"> 
                                                                      </select> 
                                                                  </div>
                                                        </div>
                                                    <div class="col-sm-4"> 
                                                                <div class="form-group">
                                                                    <label>Cliente</label>
                                                                    <select name="client_loans" id="client_loans" class="form-control"> 
                                                                    </select> 
                                                                </div>
                                                      </div>
                                            </div>
                                    </div>
                                      <div class="row  ">
                                      <br>
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
                                                                <label>Numero de Cuotas</label>
                                                                <input type="text"   id="num_cuotas" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3"> 
                                                            <div class="form-group">
                                                                <label>Dias de Pago</label>
                                                                <input type="text" id="dia_pago"  name="dia_pago" class="form-control">
                                                            </div>
                                                        </div> 
                                                </div>
                                        </div>  
                                       
                                           
                        </div>
                        <div role="tabpanel" class="tab-pane" id="penalidad">
                                                <div class="row   ">
                                                <div class="col-sm-12"> 
                                                        <div class="col-sm-6"> 
                                                            <h3>Mora por dias atrasados</h3><br>
                                                        </div>
                                                </div>
                                                <div class="col-sm-12"> 
                                                    
                                                   
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
                        <div role="tabpanel" class="tab-pane" id="impresion"> 
                                <div class="row  ">
                                    <div class="col-sm-12">
                                        <div class="col-sm-3"><br>
                                                <button class="btn btn-primary" id="generar_proyeccion"><li class="fa fa-spinner"></li> Generar Proyección</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  " id="prestamos_vista_previa" style="">
                                
                                         <!-- <div class="col-sm-12"> 
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
                                                         <label>Numero de Cuotas</label>
                                                         <input type="text"   id="fecha_ini" class="form-control">
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-3"> 
                                                     <div class="form-group">
                                                         <label>Dias de Pago</label>
                                                         <input type="text" id="dia_pago"  name="dia_pago" class="form-control">
                                                     </div>
                                                 </div> 
                                         </div> -->
                                 </div>  
                        </div>
                    </div>
                    <!-- final Tab panes -->
                    </div>

                
             

           <!--final del body-->                             
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="button" class="btn btn-primary" id="save_loans">Guardar</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->