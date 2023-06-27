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

    public function search(Request $request)
    {
        $data=null;

        // if ($request->dato_codigo && $request->dato_titulo && $request->dato_autor) {

        //     $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_codigo)) LIKE '%".strtolower($this->removeAccents($request->dato_codigo))."%'")
        //         ->whereRaw("LOWER(UNACCENT($request->campo_titulo)) LIKE '%".strtolower($this->removeAccents($request->dato_titulo))."%'")
        //         ->whereRaw("LOWER(UNACCENT($request->campo_autor)) LIKE '%".strtolower($this->removeAccents($request->dato_autor))."%'")
        //         ->paginate(10);

        // } else {
        //     if (condition) {
        //         # code...
        //     } else {
        //         # code...
        //     }
            
        // }

        $codigo = $request->dato_codigo;
        $titulo = $request->dato_titulo;
        $autor = $request->dato_autor;
        if ($codigo != null && $titulo != null && $autor != null) {
            // Acción cuando ninguno de los dados es nulo
            $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_codigo)) LIKE '%".strtolower($this->removeAccents($request->dato_codigo))."%'")
                ->whereRaw("LOWER(UNACCENT($request->campo_titulo)) LIKE '%".strtolower($this->removeAccents($request->dato_titulo))."%'")
                ->whereRaw("LOWER(UNACCENT($request->campo_autor)) LIKE '%".strtolower($this->removeAccents($request->dato_autor))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);
        } elseif ($codigo == null) {
                
                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_titulo)) LIKE '%".strtolower($this->removeAccents($request->dato_titulo))."%'")
                ->whereRaw("LOWER(UNACCENT($request->campo_autor)) LIKE '%".strtolower($this->removeAccents($request->dato_autor))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);

        } elseif ($titulo == null) {
                
                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_codigo)) LIKE '%".strtolower($this->removeAccents($request->dato_codigo))."%'")
                ->whereRaw("LOWER(UNACCENT($request->campo_autor)) LIKE '%".strtolower($this->removeAccents($request->dato_autor))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);

        } elseif ($autor == null){

                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_codigo)) LIKE '%".strtolower($this->removeAccents($request->dato_codigo))."%'")
                ->whereRaw("LOWER(UNACCENT($request->campo_titulo)) LIKE '%".strtolower($this->removeAccents($request->dato_titulo))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);

        } elseif ($codigo == null && $titulo == null) {
                
                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_autor)) LIKE '%".strtolower($this->removeAccents($request->dato_autor))."%'")
                ->paginate(10);

        } elseif ($titulo == null && $autor == null) {
                
                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_codigo)) LIKE '%".strtolower($this->removeAccents($request->dato_codigo))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);

        } elseif ($codigo == null && $autor == null) {
                
                $data = Libro::whereRaw("LOWER(UNACCENT($request->campo_titulo)) LIKE '%".strtolower($this->removeAccents($request->dato_titulo))."%'")
                ->orderBy('id', 'asc')
                ->paginate(10);

            }
        
        


        //$data = Libro::whereRaw("LOWER(UNACCENT($request->tabla)) LIKE '%".strtolower($this->removeAccents($request->dato))."%'")->paginate(10);
        $duncker_asignaturas = Asignatura::all();
        return view("libros",["libros"=>$data,"asignaturas"=>$duncker_asignaturas]);
    }

    private function removeAccents($string)
    {
        return preg_replace('/[áÁ]/u', 'a', preg_replace('/[éÉ]/u', 'e', preg_replace('/[íÍ]/u', 'i', preg_replace('/[óÓ]/u', 'o', preg_replace('/[úÚüÜ]/u', 'u', $string)))));
    }
}
