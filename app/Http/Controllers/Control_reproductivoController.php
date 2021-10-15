<?php

namespace App\Http\Controllers;
use App\Models\Control_reproductivo;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Control_reproductivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reproductivo1=Control_reproductivo::all();
        return view('controles_reproductivos.reproductivo', compact('reproductivo1'));
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
        $variable=$request->all();
        $control = new Control_reproductivo();
        $control->fecha_de_servicio=$variable['fecha_servicio'];

        $control -> save();
       
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
    public function destroy($id)
    {
        Control_reproductivo::destroy($id);
        //return redirect()->back()-> with('message','ok');
        return redirect('/controles_reproductivos')-> with('message','ok');
    }
}
