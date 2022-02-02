<?php

namespace App\Http\Controllers;

use App\Models\trabajador;
use Carbon\Carbon;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Evidencia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $nombre=$user->nombre;
        $ids=$user->id;
       
        $fecha_hoy = Carbon::now()->toDateString();
        $horas = Carbon::now()->toTimeString();
        
        $usuario = new Evidencia();
        
      
      if ($request->hasFile('imagen')){
        $imagen = $request -> file('imagen')-> store('public/imagenes');
        $url = Storage::url($imagen);
        $usuario->imagen= $url;
       
    }

        $usuario->comentarios=$request->comentarios;
        $usuario->fecha_evidencia =$fecha_hoy;
        $usuario->hora_evidencia =  $horas;
        $usuario->trabajador_id=$ids;
        $usuario->nombre=$nombre;
        $usuario->save();
        return redirect('/notas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        Evidencia::destroy($id);
        //return redirect()->back()-> with('message','ok');
        return redirect('/notas')-> with('message','ok');
    }
}
