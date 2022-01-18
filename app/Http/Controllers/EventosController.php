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
           
        ]);
        $date2=Carbon::createFromDate($request->fecha_inicio);
        $date3=Carbon::createFromDate($request->fecha_final);
        $eventos1 = new Evento();
        $eventos1->nombre_evento=$request->nombre;
        if(Carbon::today()->lte($date2)){

            if(Carbon::today()->lte($date3)){
                $eventos1->fecha_inicial=$request->fecha_inicio;
                $eventos1->fecha_final=$request->fecha_final;
                $eventos1->descripcion=$request->descripcion;
                $eventos1 -> save();
                return redirect()->back()-> with('message','ok');
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
        $mostrar = 0;
        foreach ( $animales as $animal ){

         
            foreach( $animal->eventos as $evento){
                $nueva_fecha=Carbon::createFromDate($evento->fecha_inicial);
                $fecha_final=Carbon::createFromDate($evento->fecha_final);
              
      
                if(Carbon::today()->gte($nueva_fecha) & Carbon::today()->lte($fecha_final))
               
                $mostrar = 1;
                    if (event(new trabajadorEvent($animal,$evento))) {

                     

                        return 'Evento Aceptado';
                     }
            }
        }
        // return $animales;
      //  return $nueva_fecha,$fecha_final;
        return view('trabajador', compact('animales','eventos','var','mostrar'));


    }
}
