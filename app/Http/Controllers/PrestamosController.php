<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Models\Agenda;
use App\Models\Transaccion;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{
    private $variable;
    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Prestamo',
             'favicon' => asset('img/log.png'), 
             'prestamosClass' => 'class="active-menu"' 
         ];
    }

    public function index()
    {
        return view('backend/loans/index',$this->variables);
    }

 
    public function create(Request $r)
    {
        // dd($r->all());
        $create = new Prestamos(); 
        $create->id_cliente = $r->client;
        $create->metodologia = $r->metodologia;
        $create->dias_pago = $r->dia_pago;

        $create->capital_solicitado = $r->capital_solicitado;
        $create->capital_pagado = 0;
        $create->capital_restante = $r->capital_solicitado;

        $create->interes = $r->interes;
        $create->interes_restante = $r->numero_cuotas *$r->capital_solicitado *($r->interes/100) ;
        $create->interes_pagado = 0;
        $create->interes_total =  $r->numero_cuotas *$r->capital_solicitado *($r->interes/100) ;

        $create->mora_pagado = 0;
        $create->mora_monto =$r->monto_mora;
        $create->dias_mora =$r->rango_dia_mora;
        $create->dias_mora_pagados = 0;
        
        $create->cuotas_numero = $r->numero_cuotas;
        $create->cuotas_pagada = 0;
        $create->cuotas_restante =  $r->numero_cuotas;
        $create->cuotas_monto = ($r->capital_solicitado + ($r->capital_solicitado *($r->interes/100)))/$r->numero_cuotas;
        $create->cuotas_interes =  ($r->capital_solicitado *($r->interes/100)) / $r->numero_cuotas;
        $create->cuotas_capital =  $r->capital_solicitado / $r->numero_cuotas;
        $create->estado = 1; 
        $create->periodo = $r->periodo; 
        $create->save();
        if( $create->id_prestamo > 0){
            if($r->numero_cuotas > 1)
            {
                
                for($i = 0 ; $i <= $r->numero_cuotas ; $i++ )
                {
                    switch($r->periodo)
                    {
                        case 3:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL  '.($i*15).' DAY )');
                        break;
                        case 4:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL  '.($i+1).' MONTH)'); 
                        break;
                        case 5:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL  '.($i+6).' MONTH )'); 
                        break;
                        case 6:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL  '.($i+3).' MONTH )'); 
                        break;
                        case 7:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL  '.($i+4).' MONTH )'); 
                        break;
                        case 8:
                        $fecha =DB::raw('DATE_ADD( curdate(), INTERVAL   '.($i+1).' YEAR )'); 
                        break;
                    }
                    DB::table('agenda')->insert([
                        'id_producto' => $create->id_prestamo,
                        'id_cliente' => $r->client,
                        'fecha' => $fecha,
                        'estado' => 1,
                        'comentario' =>'Cuota a pagar: '.($r->capital_solicitado + ($r->capital_solicitado *($r->interes/100)))/$r->numero_cuotas 
                    ]);
                }
            }
            return ['msn'=>'Prestamo registrado con exito','status'=>1];
        } 
        return ['msn'=>'Favor comunicarse con el administrador','status'=>0];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return Prestamos::with(['rsPeriodo','rsCliente'])->where('estado',1)->paginate(10);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Prestamos::with(['rsPeriodo','rsCliente'])->where('id_prestamo',$request->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function client(Request $request)
    {
        return Prestamos::where('id_cliente',$request->id)->where('estado',1)->paginate(5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview(Request $request )
    { 
        return view('backend/loans/preview',['data'=>$request->all()]);
    }
    public function transacction(Request $r)
    {
        if(!$r->has('id_prestamo')){
            return ['Esta transaccion no puede ser ejcutada','status'=>0];
        }
        $prestamo = Prestamos::find($r->id_prestamo);
        $tr= new Transaccion();  
 
        if($r->tipo_transacction == 1){
           if( $prestamo->dias_restantes - $r->cuotas_a_pagar ==  0)
           {
                $prestamo->estado = 3;
           }
            $prestamo->dias_restantes = $prestamo->dias_restantes - $r->cuotas_a_pagar ;
            $prestamo->dias_pagos = $prestamo->dias_pagos + $r->cuotas_a_pagar ; 

            $prestamo->interes_pagado = (( $prestamo->interes_total / $prestamo->numero_cuotas) *  $r->cuotas_a_pagar) + $prestamo->interes_pagado  ;
            $prestamo->interes_restante =  $prestamo->interes_total - $prestamo->interes_pagado;
            
            $prestamo->capital_restante = $prestamo->capital_solicitado - $prestamo->capital_pagado ;
            $prestamo->capital_pagado = (( $prestamo->capital_solicitado / $prestamo->numero_cuotas) *  $r->cuotas_a_pagar) + $prestamo->capital_pagado  ;
             
            $tr->id_producto = $r->id_prestamo;
            $tr->monto =  (( $prestamo->total_cuotas) *  $r->cuotas_a_pagar);
            $tr->comentario = (empty($r->comentario_transaccion))?'':$r->comentario_transaccion;


            $prestamo->save();
            $tr->save();
            return ['msn'=>'Transaccion realizada con exito','status'=>1]; 
        }
        if($r->tipo_transacction == 2){ 
 
            $prestamo->interes_mora_pagado = ($prestamo->interes_mora_monto * (  $r->dia_mora_pagar / $prestamo->dias_mora))  +  $prestamo->interes_mora_pagado  ;
             $tr->id_producto = $r->id_prestamo;
            $tr->monto =  (( $prestamo->capital_solicitado / $prestamo->numero_cuotas) *  $r->cuotas_a_pagar);
            $tr->comentario = $r->comentario_transaccion; 
            $prestamo->save();
            $tr->save();
            return ['msn'=>'Transaccion realizada con exito','status'=>1]; 
        }

        
    }

    public function transacctionShow(Request $r){
        return Transaccion::where('id_producto',$r->id)->paginate(10);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
