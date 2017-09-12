<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Models\Transaccion;

class PrestamosController extends Controller
{
    private $variable;
    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => asset('img/log.png'), 
             'ScheduleClass' => 'class="active-menu"' 
         ];
    }

    public function index()
    {
        return view('backend/loans/index',$this->variables);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        if(!$r->has('id_cliente')){
            return ['msn'=>'No se pudo encontrar el cliente','status'=>0];
        }
        if($r->id_cliente <= 0){
            return ['msn'=>'No se pudo encontrar el cliente','status'=>0];
        }
        $create = new Prestamos();
        $create->porciento = $r->porciento;
        $create->id_cliente = $r->id_cliente;
        $create->capital_solicitado = $r->capital_solicitado;
        $create->capital_pagado = 0;
        $create->capital_restante = $r->capital_solicitado;
        $create->interes_pagado = 0;
        $create->interes_total = $r->total_pagar_interes;
        $create->interes_restante = 0;
        $create->interes_mora = $r->interes_mora;
        $create->total_cuotas = $r->cuota_pagar;
        $create->dias_pagos = $r->dias_pagos;
        $create->interes_mora_pagado = 0;
        $create->interes_mora_monto = $r->monto_mora;
        $create->dias_mora = $r->dias_mora; 
        $create->numero_cuotas = $r->numero_cuotas;
        $create->dias_restantes = $r->numero_cuotas;
        $create->estado = 1; 
        $create->save();
        if( $create->id_prestamo > 0){
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Prestamos::where('id_prestamo',$request->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function client(Request $request)
    {
        return Prestamos::where('id_cliente',$request->id)->paginate(5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
