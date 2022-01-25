<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Control_reproductivo;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;


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
    public function create(Request $request)
    {
        
        $madre_id = null;
        $fecha_parto =null;
        $madre_nombre= null;
        $madre_arete=null;

        if($request){
            
            
           
            $madre_id = $request->id_madre;
            $fecha_parto = $request->fecha_parto;
            $madre_nombre= $request->madre;
            $madre_arete= $request->arete;
           

         
        }
       
        return view('animales.create', compact('madre_id','fecha_parto','madre_nombre','madre_arete'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->madre_id){
            $animal = Animal::find($request->madre_id);
            $animal->num_parto= $animal->num_parto+1;
            $animal -> save();
        }
        $animalinformation = $request-> all();
        request()->validate([
            'nombre' => 'required',
            'fecha_de_nacimiento' => 'required',
            'padre' => 'required',
            'arete' => 'required',
            'peso_al_nacer' => 'required',
            'peso_al_destete' => 'required',
            'madre' => 'required',
            'sexo' => 'required',
            'imagen' => 'required',
        ]);

        $animales = new Animal();
        if ($request->hasFile('imagen')){
            $imagen = $request -> file('imagen')-> store('public/imagenes');
            $url = Storage::url($imagen);
            $animales->imagen= $url;
        }
       if($request->madre_id){
        $borrarExp = Control_reproductivo::where('animal_id', $request->madre_id)->get();
        for($i = 0; $i < sizeof($borrarExp); $i++){
            $borrarExp[$i]->delete();
        }
           // $animales -> id = $request->madre_id;
       }
        
        $animales->nombre=$request->nombre;
        $animales->fecha_de_nacimiento=$request->fecha_de_nacimiento;
        $animales->padre=$request->padre;
       
        $animales->arete=$request->arete;
        $animales->peso_al_nacer=$request->peso_al_nacer;
        $animales->peso_al_destete=$request->peso_al_destete;
        $animales->madre=$request->madre;
        $animales->sexo=$request->sexo;
        $animales->num_parto=0;
       //return $request->all();
        //return $animales;    
        $animales -> save();
        
        return redirect('animales/create?madre=&fecha_parto=')-> with([
            'message'=>'ok',
            'madre_id'=> null,]
            
        );
      //  return redirect('/animales')-> with('mensaje','Registro exitoso');
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
        $animales->sexo=$request->clasificacion;
        if($request ->hasFile('imagen')){
            $url = str_replace('storage', 'public', $animales->imagen);
            Storage::delete($url);
            $imagen = $request->file('imagen')->store('public/imagenes');
            $url = Storage::url($imagen);
            $animales->imagen = $url;
        }
        
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

    public function PDF($id){
        $animales1=Animal::find($id);
        return view('PDF', compact('animales1'));
    } 
    
}
