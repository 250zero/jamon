<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $variables;
    private $limit = 10;
     
    function __construct(){
        $this->middleware('auth');
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
    public function create(Request $request)
    {
        if(!$request->has('id'))
        {
           return ['msn'=>'Id no presente','status'=>0];
        }
        if($request->id !=0 )
        {
           return ['msn'=>'Formulario no valido','status'=>0];
        }
        $insert = new Cliente();
        $insert->nombre =  $request->nombre;
        $insert->apellido = $request->apellido;
        $insert->email = $request->email;
        $insert->telefono =  $request->tell;
        $insert->celular = $request->cell ;
        $insert->estado = 1 ;
        $insert->save();
        if($insert->id_cliente > 0){
            return ['msn'=>'Cliente creado exitosamente.','status'=>1];
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
        if(!$request->has('id'))
        {
           return ['msn'=>'Id no presente','status'=>0];
        }
        if($request->id <= 0 || !is_numeric($request->id) )
        {
           return ['msn'=>'Id formulario no valido','status'=>0];
        }

        $update = Cliente::find($request->id);
        $update->nombre =  $request->nombre;
        $update->apellido = $request->apellido;
        $update->email = $request->email;
        $update->telefono =  $request->tell;
        $update->celular = $request->cell ; 
        $update->save();
        if($update->id_cliente > 0){
            return ['msn'=>'Cliente actualizado exitosamente.','status'=>1];
        }
        return ['msn'=>'Favor comunicarse con el administrador','status'=>0];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        return Cliente::where('estado',1)
                       ->where('nombre','like','%'.$request->search.'%')
                       ->paginate($this->limit);
    }

    public function show(Request $request)
    {
        return Cliente::where('id_cliente',$request->id)->first();
    }
 
}
