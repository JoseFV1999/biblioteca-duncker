<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $duncker_asignaturas = Asignatura::all();
        //dd($duncker_asignaturas);
        return view("asignatura",["asignaturas"=>$duncker_asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$duncker_asignaturas = Asignatura::all();
        return view('create_asignatura');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $lastId = Asignatura::max('id');
        $nextId = $lastId + 1;

        $request->validate([
            'nombre_asignatura'=>'required',
            'abreviacion_asignatura'=>'required',
        ]);

        $asignatura = new Asignatura;
        $asignatura->id = $nextId;
        $asignatura->nombre = $request->nombre_asignatura;
        $asignatura->abreviacion = $request->abreviacion_asignatura;
        $asignatura->save();

        return redirect()->route('Asignaturas');
    }

    public function view($asignatura_id) {
        $asignatura = Asignatura::find($asignatura_id);
        return view('update_asignatura', ['asignatura'=>$asignatura]);
    }

    public function update(Request $request)
    {
        $asignatura = Asignatura::find($request->id);
        $asignatura->nombre = $request->nombre_asignatura;
        $asignatura->abreviacion = $request->abreviacion_asignatura;
        $asignatura->save();
        return redirect()->route('Asignaturas');
    }

    public function delete($asignatura_id)
    {
        $asignatura = Asignatura::find($asignatura_id);
        $asignatura-> delete();
        return redirect()->route('Asignaturas');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Asignatura $asignatura)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
        
    }
}
