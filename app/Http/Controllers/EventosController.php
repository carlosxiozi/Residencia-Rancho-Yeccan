<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Animal;
use App\Models\Control_reproductivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\carbon;
use App\Events\trabajadorEvent;


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

      //  return $mes;
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
        $date= Carbon::now()->toDateString();
      
        $animalinformation = $request-> all();
        request()->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'descripcion' => 'required',
            'fecha_final' => 'required',
            'tipo' => 'required',
        ]);
        $date2=Carbon::createFromDate($request->fecha_inicio);
        $date3=Carbon::createFromDate($request->fecha_final);
        $eventos1 = new Evento();
        $eventos1->nombre_evento=$request->nombre;
        if(Carbon::today()->lte($date2)){

            if(Carbon::today()->lte($date3)){
                if($request->tipo=="General"){

                    $eventos1->fecha_inicial=$request->fecha_inicio;
                    $eventos1->fecha_final=$request->fecha_final;
                    $eventos1->descripcion=$request->descripcion;
                    $eventos1->tipo=$request->tipo;
                    $eventos1->nota=$request->nota;
                    $eventos1 -> save();
                    $animal = Animal::all();
                    foreach($animal as $animal){
                        
                        $animal -> eventos()->attach($eventos1);

                    }
        
                   
                return redirect()->back()-> with('message','ok');
                
                } else{

                   
                    $eventos1->fecha_inicial=$request->fecha_inicio;
                    $eventos1->fecha_final=$request->fecha_final;
                    $eventos1->descripcion=$request->descripcion;
                    $eventos1->tipo=$request->tipo;
                    $eventos1->nota=$request->nota;
                    $eventos1 -> save();
                    return redirect()->back()-> with('message','ok');
                }
               
            }else{

                return redirect()->back()-> with('msg','falta');
            }
        }else{
          
            return redirect()->back()-> with('msg','falta');
        }
      
        
   
       // return redirect(('/eventos'))-> with('message','ok');
        
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
        if($request->estadoTrue){
            $eventos1 = Evento::find($id);
            $eventos1->nota= $eventos1->nota."_".$request->notas;
            $eventos1->save();
            return redirect('/notas')-> with('mensaje','Registro exitoso');
        }
        else{
        $eventos1 = Evento::find($id);
        $eventos1->nombre_evento=$request->nombre;
        $eventos1->fecha_inicial=$request->fecha_inicio;
        $eventos1->fecha_final=$request->fecha_final;
        $eventos1->descripcion=$request->descripcion;
        $eventos1 -> save();
        return redirect('/eventos')-> with('mensaje','Registro exitoso');
        }
        
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
        $mostrar = 0;
        $no_eventos = 0;
        $servicio=0;
        foreach ( $animales as $animal ){
            foreach($animal->control_reproductivo as $control ){

                $nueva_fecha=Carbon::createFromDate($control->fecha_de_parto)->subDays(15);
                $fecha_final=Carbon::createFromDate($control->fecha_de_parto)->addDays(7);
                $nueva_fecha1=Carbon::createFromDate($control->fecha_de_servicio);
                $fecha_final1=Carbon::createFromDate($control->fecha_de_parto);
                if(Carbon::today()->gte($nueva_fecha) & Carbon::today()->lte($fecha_final) & $control->estado_animal==1 ){
                    $mostrar = 1;

                }
                if(Carbon::today()->gte($nueva_fecha1) & Carbon::today()->lte($fecha_final1) & $control->estado_animal==0 )
                {
                    $mostrar = 1;
                    $servicio=1;
                }
                
            }
            foreach( $animal->eventos as $evento){
                $nueva_fecha=Carbon::createFromDate($evento->fecha_inicial);
                $fecha_final=Carbon::createFromDate($evento->fecha_final);
                if(sizeof($animal->eventos) > 0){
                    if(Carbon::today()->gte($nueva_fecha) & Carbon::today()->lte($fecha_final)){
                
                        $mostrar = 1;
                        if (event(new trabajadorEvent($animal,$evento))) {
                            
                            return 'Evento Aceptado';
                        }
                    }
                }
                else
                {
                    $no_eventos = 1;
                }
            }
        }
        // return $animales;
      //  return $nueva_fecha,$fecha_final;
        return view('trabajador', compact('animales','eventos','var','mostrar','no_eventos','servicio'));


    }
    public function notas(){
        $eventos1=Evento::all();
        $bandera = 0;
        foreach($eventos1 as $eventos)
        {
            if(is_null($eventos->nota))
            {
                
            }else
            {
                $bandera = 1;
            }
        }
        
        return view('notas', compact('eventos1','bandera'));
    }

    public function calendar(){
        $eventos1=Evento::where('tipo',"General")->get();
        $a = [];
        $i = 0;
        foreach($eventos1 as $evento){
            
            $title = $evento->nombre_evento;
            $start = $evento->fecha_inicial;
            $end = $evento->fecha_final;
            $a[$i] = array(
                    "title" => $title,
                    "start" => $start,
                    "end" => $end
                );
            $i = $i+1;
        }
        return response()->json($a);
    }
}
