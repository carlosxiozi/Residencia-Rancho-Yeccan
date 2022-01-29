<?php

namespace App\Http\Controllers;
use App\Models\Control_reproductivo;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Animal;
use Carbon\Carbon;

class Control_reproductivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $reproductivo1=Control_reproductivo::all();
       // return view('controles_reproductivos.reproductivo', compact('reproductivo1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    //     $reproductivo1=Control_reproductivo::all();
    //     $animal_id=$request->all();
    //     return $request;
    //    return view('controles_reproductivos.reproductivo', compact('reproductivo1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $variable=$request->all();
        $animal_id =(int)$request['id'];
        $control = new Control_reproductivo();
        $control->fecha_de_servicio=$variable['fecha_servicio'];
        //$control->fecha_de_parto=$variable['fecha_parto'];
        $control ->fecha_de_parto = Carbon::parse($variable['fecha_servicio'])->addDay(21);
        //$control->fecha_parto=$variable['fecha_servicio']->subweek();
            
       // $control->fecha_parto=$fechas;
           // $control['fecha_de_parto'] = $fechas;
       // $control['animal_id'] = $animal_id;
       $control->estado_animal = 0;
        $control->animal_id=$variable['id'];

        $control -> save();
      
      // return redirect('/controles_reproductivos')-> with('message','ok');
        if($control->save()){
            $message =['message'=>'El deposito fue rechazado, el motivo fue registrado existosamente'];
        return response(json_encode($message), 200)->header('Content-type','text/plain');
        }else {
            $message =['message'=>'El deposito fue rechazado, el motivo fue registrado exi'];

        return response(json_encode($message), 200)->header('Content-type','text/plain');
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
       //$reproductivo1=Control_reproductivo::all();
       // return view('controles_reproductivos.reproductivo', compact('reproductivo1'));
        $reproductivo1=Control_reproductivo::where('animal_id',$id)->get();
        $bandera = false;
        $j=false;
        $notifi=0;
        $animal=Animal::find($id);
       
        if(sizeof($reproductivo1) >0 and sizeof($reproductivo1) < 4){
        
           for($i=0; $i<sizeof($reproductivo1); $i++){
            if(Carbon::now()->gt($reproductivo1[$i]->fecha_de_parto)) {
                $bandera = true;
                if($reproductivo1[$i]-> estado_animal == 1){
                    $bandera = false;
                    $j = true;
                }
            }else{
                $bandera = false;
                
            }
           }

        }elseif(sizeof($reproductivo1) == 0)
            {
            $bandera = true;
            }
         elseif(sizeof($reproductivo1)==4){
            for($i=3; $i<sizeof($reproductivo1); $i++){
                if(Carbon::now()->gt($reproductivo1[$i]->fecha_de_parto)) {
                    $notifi=1;
                }
            }
            
         }   
        return view('controles_reproductivos.reproductivo', compact('reproductivo1','animal','bandera','j','notifi'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ban=0;
        $reproductivo1= Control_reproductivo::find($id);
        $reproductor=Animal::with('control_reproductivo')->get();
        foreach($reproductor as $control){
                foreach($control->control_reproductivo as $ocultar){
                        if($ocultar->animal_id==$reproductivo1->animal_id){
                            $variable=$ocultar->id;
                                
                        }
                }

                
        }
        if($reproductivo1->id==$variable){
            $ban=1;
        }

       
          $expediente = explode('_', $reproductivo1->expediente);
        return view('controles_reproductivos.revisar', compact('reproductivo1', 'expediente','ban'));

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

        $control = Control_reproductivo::find($id);
        if($request->estadoTrue){
           $control->estado_animal = 1;
           $control ->fecha_de_parto = \Carbon\Carbon::parse($request->fecha_parto)->addDay(270);
           
        }
        if($request->estadoFalse){
            $control->estado_animal = 0;
        }
        if($request->motivo == "")
        {

        }
        else{
        $control->expediente=$control->expediente."_".$request->motivo;
        
        }
        $control -> save();
        return redirect('/controles_reproductivos/'.$control->animal_id.'')-> with('mensaje','Registro exitoso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Control_reproductivo::destroy($id);
        return redirect()->back()-> with('message','ok');
       // return redirect('/controles_reproductivos')-> with('message','ok');
    }

    
}
