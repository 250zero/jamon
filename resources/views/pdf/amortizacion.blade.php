<?php
$interes=$data->cuotas_numero*($data->capital_solicitado*($data->interes/100));
$capital_restante = 0 ;
$interes_restante = 0;
$capital_amortizado = 0 ;
 
/*
dd($data->rsCliente);
 "id_cliente" => 2
    "nombre" => "Firo"
    "apellido" => "Hernandez"
    "telefono" => "829-655-6234"
    "celular" => "829-652-3632"
    "email" => "ejemplo2@gmail.com"
    "estado" => 1
    "created_at" => null
    "updated_at" => null

 "id_prestamo" => 1
    "id_cliente" => 2
    "metodologia" => 1
    "periodo" => 3
    "dias_pago" => 1
    "capital_solicitado" => 50000.0
    "capital_pagado" => 0.0
    "capital_restante" => 50000.0
    "interes" => 10
    "interes_pagado" => 0.0
    "interes_restante" => 150000.0
    "interes_total" => 150000.0
    "mora_pagado" => 0.0
    "mora_monto" => 0.0
    "cuotas_numero" => 30
    "cuotas_pagada" => 0.0
    "cuotas_restante" => 30.0
    "cuotas_monto" => 1833.33
    "cuotas_interes" => 166.67
    "cuotas_capital" => 1666.67
    "estado" => 1
    "created_at" => null
    "updated_at" => null

    */

?>

<link href="{{asset('css/amortizacion.css')}}" rel="stylesheet" /> 
 
<h1>{{$head->name}} </h1>                                          <span id="fecha_creacion">Fecha de Creación: {{$data->created_at}}</span>
<h3>Dirección:{{$head->direccion}}  </h3>
<h4>Telefono :{{$head->telefono}}  </h4>
<h4>RNC:{{$head->rnc}}  </h4>
<br>

 <h4>Cliente: {{$data->rsCliente->nombre.' '.$data->rsCliente->apellido}}</h4>

 <h4>Telefono: {{$data->rsCliente->telefono }}</h4>
 <h4>Celular: {{$data->rsCliente->celular }}</h4>
 <h4>Email: {{$data->rsCliente->email }}</h4>

 <br>
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
      @for($i=0;$i<$data->cuotas_numero;$i++)
      <?php
          $capital_restante += $data->capital_solicitado/$data->cuotas_numero;
          $interes_restante +=$interes/$data->cuotas_numero;
          if($data->metodologia == 1)
          {
              $capital_amortizado =( $interes_restante +$capital_restante);
          }else{
              $capital_amortizado =( $capital_restante);
          }
      ?>
       <tr>
          <td>{{$i+1}}</td>
          <td> {{number_format( $data->capital_solicitado/$data->cuotas_numero,2)}} $</td> 
          <td> {{number_format($interes/$data->cuotas_numero,2)}} $</td> 
          <td> {{number_format($data->capital_solicitado - $capital_restante)}} $</td> 
          <td> {{number_format($capital_amortizado)}} $</td> 
          <td>{{number_format(($data->capital_solicitado/$data->cuotas_numero) + ($interes/$data->cuotas_numero) )}} $</td> 
       </tr>  
       @endfor
       <tr  id="ultima_linea_total">
          <td>Total</td>
          <td> {{number_format($data->capital_solicitado,2)}}$</td> 
          <td> {{number_format($interes,2)}} $</td> 
          <td> 0.0 $</td> 
          <td> {{number_format($capital_amortizado)}} $</td> 
          <td>{{number_format(($data->capital_solicitado) + ($interes) )}} $ </td> 
       </tr>  
 </tbody> 
</table> 
<br><br> <br><br><br><br> <br><br>
<div style="position:relative">
<hr><h4>Firma del Solicitante</h4>
 <h4 id="firma_dos">Firma del Personal Autorizado</h4>
</div>
 