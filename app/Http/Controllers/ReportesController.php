<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    private $variables;
    function __construct(){
        // $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => 'fav.ico', 
             'ReportClass' => 'class="active-menu"' 
         ];
    }

    public function index()
    {
        return view('backend/report/index',$this->variables);
    }
}