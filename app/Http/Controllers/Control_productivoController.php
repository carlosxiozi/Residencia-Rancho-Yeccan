<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Evento;
use App\Events\trabajadorEvent;

use Illuminate\Http\Request;

class Control_productivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productivo=Animal::all();
        return view('productivo', compact('productivo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    
    {   $eventos=Evento::all();
        $animal = Animal::with('eventos')->get()->find($id);
      
        return view('productivo', compact('animal','eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $eventos= $request->eventos;
            $animal = Animal::find($request->id);
            $animal -> eventos()->attach($eventos);
            if (event(new trabajadorEvent($animal))) {
                return 'Evento Aceptado';
            }
            return redirect('control_productivo/'.$request->id);
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
    public function destroy($id, Request $request)
    {
        
        $evento=Animal::findOrFail($id);
      //  $evento = Animal::with('eventos')->get()->find($id);
      //return $request->evento_id;
        $evento->eventos()->detach($request->evento_id,$request->evento_animal);
        //return $request->evento_animal;
        return redirect('control_productivo/'.$id);
    }
}
