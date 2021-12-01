<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:docente-list|docente-create|docente-edit|docente-delete', ['only' => ['index','show']]);
         $this->middleware('permission:docente-create', ['only' => ['create','store']]);
         $this->middleware('permission:docente-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:docente-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = DB::table('docente')->orderBy('created_at', 'DESC')->get();
        return view('docente.index',compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required'
        ]);

        Docente::create($request->all());

        return redirect()->route('docentes.index')
                        ->with('success','Docente creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('docentes.show',compact('docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return view('docentes.edit',compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
         request()->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required'
        ]);

        $docente->update($request->all());

        return redirect()->route('docentes.index')
                        ->with('success','Docente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')
                        ->with('success','Docente eliminado correctamente');
    }
}
