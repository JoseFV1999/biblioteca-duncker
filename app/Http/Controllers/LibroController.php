<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Asignatura;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $duncker_libros = Libro::orderBy('id', 'asc')->paginate(10);
        $duncker_asignaturas = Asignatura::all();
        //dd($duncker_asignaturas);
        return view("libros",["libros"=>$duncker_libros,"asignaturas"=>$duncker_asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $duncker_asignaturas = Asignatura::all();
        return view('create_libro',['asignaturas'=>$duncker_asignaturas]);
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
        $lastId = Libro::max('id');
        $nextId = $lastId + 1;

        $libro = new Libro;
        $libro->id = $nextId;
        $libro->codigo = $request->codigo_libro;
        $libro->titulo = $request->titulo_libro;
        $libro->autor = $request->autor_libro;
        $libro->year = $request->year_libro;
        $libro->mueble = $request->mueble_libro;
        $libro->observacion = $request->observacion_libro;
        $libro->asignatura_id = $request->asignatura_libro;
        $libro->save();
        return redirect()->route('Libros');
    }

    public function update(Request $request)
    {
        //
        $libro = Libro::find($request->id);
        $libro->codigo = $request->codigo_libro;
        $libro->titulo = $request->titulo_libro;
        $libro->autor = $request->autor_libro;
        $libro->year = $request->year_libro;
        $libro->mueble = $request->mueble_libro;
        $libro->observacion = $request->observacion_libro;
        $libro->asignatura_id = $request->asignatura_libro;
        $libro->save();
        return redirect()->route('Libros');
    }

    public function delete($libro_id)
    {
        $libro = Libro::find($libro_id);
        $libro-> delete();
        return redirect()->route('Libros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Libro $libro)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
