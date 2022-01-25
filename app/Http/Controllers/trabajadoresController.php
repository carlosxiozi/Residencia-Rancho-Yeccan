<?php

namespace App\Http\Controllers;
use App\Models\trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class trabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores=trabajador::all();
        //return $trabajadores;
        return view("trabajadores.trabajadores-lista",compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("trabajadores.trabajador-create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new trabajador();
        // $usuarioBD = trabajador::where()->get();
        if($request->contrasena == $request->contrasena_conf){
            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;
            $usuario->contrasena =Hash::make($request->contrasena);
            $usuario->telefono = $request->telefono;
            $usuario->rol = $request->rol;
            $usuario->save();
            
            return redirect()->back()-> with('message','ok');

        }else{
            return redirect()->back()-> with('msg','falta');
            return "LAs contraseñas no coinciden";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = trabajador::find($id);
        return view('trabajadores.trabajador-show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = trabajador::find($id);
        return view('trabajadores.trabajador-edit', compact('usuario'));
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
        $usuario = trabajador::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        if(is_null($request->contrasena)){
        }
        else{
            $usuario->contrasena = Hash::make( $request->contrasena );
        }
        $usuario->telefono = $request->telefono;
        $usuario->rol = $request->rol;
        $usuario->save();
        return "usuario actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        trabajador::destroy($id);
        return redirect('/usuarios')-> with('message','ok');   //
    }
}
