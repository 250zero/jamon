<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
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
        return view('backend/schedule/index',$this->variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    public function all(Request $r )
    {
         $result = [];
         $data = Agenda::with('rsCliente')->get();
         foreach($data as $d){ 
             $color = '';
            switch($d->estado){
                case 1:
                $color = 'blue';
                break;
                case 2:
                $color = 'red';
                break;
                case 3:
                $color = 'green';
                break;
            } 
            $result[] = [
                'title' => $d->rsCliente->nombre.' '. $d->rsCliente->apellido.' '.$d->comentario,
                'start' => $d->fecha,
                'color' =>  $color
            ];
         }
         return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
