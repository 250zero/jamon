<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Prestamos;
use App\Models\Agenda;
use App\Models\Transaccion;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
class ReportesController extends Controller
{
    private $variables;
    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => asset('img/log.png'), 
             'ReportClass' => 'class="active-menu"' 
        ];
    }

    public function index()
    {
        return view('backend/report/index',$this->variables);
    }

    public function amortizacion(Request $r){
        if(!$r->has('id'))
        {
            return ['msn'=>'Prestamo no identificado'];
        }
        $data =  Prestamos::with(['rsPeriodo','rsCliente','rsTipoPrestamo'])->where('id_prestamo',$r->id)->first();
        $pdf = PDF::loadView('pdf.amortizacion', ['data'=>$data,'head'=>Company::find(1)]);
        return $pdf->stream();
    }
}