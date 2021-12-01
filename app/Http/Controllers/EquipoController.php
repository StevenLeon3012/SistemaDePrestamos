<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:equipo-list|equipo-create|equipo-edit|equipo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:equipo-create', ['only' => ['create','store']]);
         $this->middleware('permission:equipo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:equipo-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = DB::table('equipo')->orderBy('created_at', 'DESC')->get();
        return view('equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.create');
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
            'nombre' => 'required',
            'tipoDispositivo' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'color' => 'required',
            'estado' => 'required',
            'detaller' => 'required'
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index')
                        ->with('success','Equipo creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        return view('equipos.show',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit',compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
         request()->validate([
            'nombre' => 'required',
            'tipoDispositivo' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'color' => 'required',
            'estado' => 'required',
            'detaller' => 'required'
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
                        ->with('success','Equipo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index')
                        ->with('success','Equipo eliminado correctamente');
    }
}
