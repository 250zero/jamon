<?php

namespace App\Http\Controllers;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $variables;
    private $limit = 10;
     
    function __construct(){
        // $this->middleware('auth');
        $this->variables = [
             'titulo' => 'Inicio',
             'favicon' => asset('img/log.png'), 
             'clientclass' => 'class="active-menu"' 
         ];
    }

    public function index()
    {
        return view('backend/client/index',$this->variables);
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
    public function all(Request $request)
    {
        return Clientes::where('estado',1)
                       ->where('nombre','like','%'.$request->search.'%')
                       ->paginate($this->limit);
    }

    public function show(Request $request)
    {
        return Clientes::where('id_clientes',$request->id)->paginate($this->limit);
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
