<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
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

    public function amortizacion(){
        $data = ['hola'];;
        $pdf = PDF::loadView('pdf.amortizacion', $data);
        return $pdf->stream();
    }
}