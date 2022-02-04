<?php

namespace App\Http\Controllers;
use App\Models\trabajador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class autenticarController extends Controller
{
    public function login(Request $request){
      
        $user = $request->input('usuario');
        $password = $request->input('contrasena');
        $usuario = trabajador::where('nombre',$user)->get();
        if($size = sizeof($usuario)==0){
           // return $password;
           return redirect('/login') ->with('error','Datos incorrectos!');
            
        }else{
            
            foreach ($usuario as $user1){
            
                if(Hash::check($password, $user1->contrasena)){
                    Auth::login($user1);
                    return redirect('/');
                    
                }else{
                    return redirect('/login') ->with('error','Datos incorrectos!');
                    
                }
               }
        }
    }
    public function salir(){

        Auth::logout();
        return redirect('/login');
    }
}
