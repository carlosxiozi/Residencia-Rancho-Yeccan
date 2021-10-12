<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animales1=Animal::all();
       // return $animales1;
       return view('animales.Animals', compact('animales1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = $request ->all();
        if (is_null($request['imagen']))
            {
                unset($request['imagen']);
            }
        else
        {
            $imagen = $request -> file('imagen')-> store('public/imagenes');
            $url = Storage::url($imagen);
            $valor['imagen'] = $url;
        }
       
        $animales = new Animal();
        $animales->nombre=$request->nombre;
        $animales->fecha_de_nacimiento=$request->fecha_de_nacimiento;
        $animales->padre=$request->padre;
       
        $animales->arete=$request->arete;
        $animales->peso_al_nacer=$request->peso_al_nacer;
        $animales->peso_al_destete=$request->peso_al_destete;
        $animales->madre=$request->madre;
        $animales->clasificacion=$request->clasificacion;
        $animales->imagen=$request->imagen;
        //return $request->all();
        $animales -> save();
        return redirect()->back()-> with('message','ok');
        return redirect('/animales')-> with('mensaje','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $animales1 = Animal::find($id);
        return view('animales.show', compact('animales1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animales1= Animal::find($id);
        return view('animales.edit', compact('animales1'));
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
        $animales = Animal::find($id);
     
        $animales->nombre=$request->nombre;
        $animales->fecha_de_nacimiento=$request->fecha_de_nacimiento;
        $animales->padre=$request->padre;
        
        $animales->arete=$request->arete;
        $animales->peso_al_nacer=$request->peso_al_nacer;
        $animales->peso_al_destete=$request->peso_al_destete;
        $animales->madre=$request->madre;
        $animales->clasificacion=$request->clasificacion;
        $animales->imagen=$request->imagen;
        //return $request->all();
        $animales -> save();
        
        return redirect('/animales')-> with('mensaje','Registro actualizado');
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
        Animal::destroy($id);
        return redirect('/animales')-> with('message','ok');
  
    }
}
