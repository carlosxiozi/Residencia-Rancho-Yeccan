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
        if($usuario){
           // return $password;
           foreach ($usuario as $user1){
               
            if(Hash::check($password, $user1->contrasena)){
                Auth::login($user1);
                return redirect('/');
                
            }else{
                return "hola";
                return back()->withErrors('Datos ingresado erroneos!!')->withInput();
            }
           }
            
        }else{
            return "Adios";

         return back()->withErrors('Usuario no encontrado!!')->withInput();
        }
    }
    public function salir(){

        Auth::logout();
        return redirect('/login');
    }
}
