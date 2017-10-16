 <?php

$interes=$data['numero_cuotas']*($data['capital_solicitado']*($data['interes']/100));
$capital_restante = 0 ;
$interes_restante = 0;
$capital_amortizado = 0 ;
//  dd($data);
/* 
array:10 [▼
  "capital_solicitado" => "0"
  "interes" => "0"
  "numero_cuotas" => "0"
  "dia_pago" => "1"
  "cuotas" => "0"
  "monto_mora" => "0"
  "rango_dia_mora" => "0"
  "metodologia" => "1"
  "periodo" => "3"
  "client" => null
]
*/
 ?><br> 
<div class="row">
     <div class="col-sm-12">
            <div class="col-sm-4">   
                    <table class="table table-striped table-bordered table-hover" >  
                            <tr>
                                <th>Capital Solicitado</th>
                                <th>{{number_format($data['capital_solicitado'],2)}}$</th> 
                            </tr> 
                            <tr>
                                <th>Interes</th>
                                <th>{{$data['interes']}}%</th> 
                            </tr> 
                            <tr>
                                <th>Numero de Cuotas</th>
                                <th>{{$data['numero_cuotas']}}</th> 
                            </tr> 
                            <tr>
                                <th>Interes a Pagar</th>
                                <th>{{number_format($interes,2) }}</th> 
                            </tr> 
                            <tr>
                                <th>Total a Pagar</th>
                                <th>{{number_format($interes+$data['capital_solicitado'],2) }}</th> 
                            </tr> 
                            <tr>
                                <th>Dia de Pago</th>
                                <th>{{$data['dia_pago']}}</th> 
                            </tr> 
                            <tr>
                                <th>Monto de Mora</th>
                                <th>{{number_format($data['monto_mora'],2)}}$</th> 
                            </tr> 
                            <tr>
                                <th>Generar mora por dias</th>
                                <th>{{$data['rango_dia_mora']}}</th> 
                            </tr> 
                    </table>
                   
            </div>
            <div class="col-sm-8"  style=" overflow: auto; height: 230px;" >   
                    <table class="table table-striped table-bordered table-hover">  
                           <thead>
                                 <tr>
                                    <th>Cuota</th>
                                    <th> Capital a pagar</th> 
                                    <th> Interes a pagar</th> 
                                    <th> Capital Restante</th> 
                                    <th> Capital Amortizado</th> 
                                    <th> Cuota a Pagar</th> 
                                 </tr>  
                           </thead> 
                           <tbody>
                                @for($i=0;$i<$data['numero_cuotas'];$i++)
                                <?php
                                    $capital_restante += $data['capital_solicitado']/$data['numero_cuotas'];
                                    $interes_restante +=$interes/$data['numero_cuotas'];
                                    if($data['metodologia'] == 1)
                                    {
                                        $capital_amortizado =( $interes_restante +$capital_restante);
                                    }else{
                                        $capital_amortizado =( $capital_restante);
                                    }
                                ?>
                                 <tr>
                                    <td>{{$i+1}}</td>
                                    <td> {{number_format( $data['capital_solicitado']/$data['numero_cuotas'],2)}}$</td> 
                                    <td> {{number_format($interes/$data['numero_cuotas'],2)}}$</td> 
                                    <td> {{number_format($data['capital_solicitado'] - $capital_restante)}}$</td> 
                                    <td> {{number_format($capital_amortizado)}}</td> 
                                    <td>{{number_format(($data['capital_solicitado']/$data['numero_cuotas']) + ($interes/$data['numero_cuotas']) )}} </td> 
                                 </tr>  
                                 @endfor
                                 <tr>
                                    <td>Total</td>
                                    <td> {{number_format( $data['capital_solicitado'],2)}}$</td> 
                                    <td> {{number_format($interes,2)}}$</td> 
                                    <td> 0.0$</td> 
                                    <td> {{number_format($capital_amortizado)}}</td> 
                                    <td>{{number_format(($data['capital_solicitado']) + ($interes) )}} </td> 
                                 </tr>  
                           </tbody> 
                    </table> 
            </div>
                   
      </div>
</div>
                                    