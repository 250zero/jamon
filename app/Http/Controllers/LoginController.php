<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\Usuario;

class LoginController extends Controller
{
    private $variables;
    function __construct(){
        $this->variables = [
             'titulo' => 'Login',
             'favicon' => asset('img/log.png') 
         ];
    }
    public function index()
    { 
        return view('login/index',$this->variables);
    } 
    
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function login(Request $r)
    {
        if(!$r->has('username'))
        {
            return redirect('/');
        }
        $user = Usuario::where('usuario',$r->username)->first();
        if(empty($user)){
              return ['msn'=>'Usuario o contraña incorrecto','status'=>0];   
        }
        if (Hash::check($r->password, $user->clave))
        { 
            Auth::login($user); 
            return  ['msn'=>'Bienvenido ','status'=>1];
        }
        return ['msn'=>'Favor comunicarse con un administrador de sistema','status'=>0];
    }
}
