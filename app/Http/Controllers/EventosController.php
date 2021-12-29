<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Animal;
use App\Models\Control_reproductivo;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos1=Evento::all();
        return view('eventos.Evento', compact('eventos1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $animalinformation = $request-> all();
        request()->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
           
        ]);
        $eventos1 = new Evento();
        $eventos1->nombre_evento=$request->nombre;
        $eventos1->fecha_inicial=$request->fecha_inicio;
        $eventos1->fecha_final=$request->fecha_final;
        $eventos1->descripcion=$request->descripcion;
        $eventos1 -> save();
        return redirect()->back()-> with('message','ok');
        return redirect(('/eventos'))-> with('message','ok');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos1 = Evento::find($id);
        return view('eventos.show', compact('eventos1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos1= Evento::find($id);
        return view('Eventos.edit', compact('eventos1'));
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
        $eventos1 = Evento::find($id);
        $eventos1->nombre_evento=$request->nombre;
        $eventos1->fecha_inicial=$request->fecha_inicio;
        $eventos1->fecha_final=$request->fecha_final;
        $eventos1->descripcion=$request->descripcion;

        $eventos1 -> save();
        return redirect('/eventos')-> with('mensaje','Registro exitoso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::destroy($id);
        //return redirect()->back()-> with('message','ok');
        return redirect('/eventos')-> with('message','ok');
    }

    public function tareas_Trabajador(){


        $animales=Animal::with('eventos', 'control_reproductivo')->get();
        $var= DB::table('animal_evento')->get();
        $eventos=Evento::all();
        // return $animales;
        return view('trabajador', compact('animales','eventos','var'));


    }
}
