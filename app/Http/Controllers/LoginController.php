<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index');
    } 
    
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function login(Request $r)
    {
        $user = User::where('username',$r->username)->where('state',1)->first();
        if(empty($user)){
              return redirect('login');   
        }
        if (Hash::check($r->password, $user->password))
        {
            
            Auth::login($user);
            if($user->level == 2)
            {
                return redirect('/');
            } 
            return redirect('/dashboard/Client');
        }
        return redirect('login');
    }
}
