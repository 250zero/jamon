<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    private $variables;
    private $limit = 10;
     
    function __construct(){
        $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Configuracion',
             'favicon' => asset('img/log.png'), 
             'configclass' => 'class="active-menu"' 
         ];
    }

    public function index()
    {
        return view('backend/config/index',$this->variables);
    }
    public function configs(Request $r)
    {
        return Configuration::where('type',$r->tipo)->get() ;
    }
}
