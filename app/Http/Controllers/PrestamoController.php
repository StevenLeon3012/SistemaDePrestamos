<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Docente;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;
use DB;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:prestamo-list|prestamo-create|prestamo-edit|prestamo-delete', ['only' => ['index','show']]);
         $this->middleware('permission:prestamo-create', ['only' => ['create','store']]);
         $this->middleware('permission:prestamo-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:prestamo-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = DB::table('equipo')->orderBy('created_at', 'DESC')->get();
        return view('prestamo.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes = Docente::all();
        $equipos = Equipo::all();
        return view('prestamos.create', compact('docentes', 'equipos'));
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
            'usuario' => 'required',
            'equipo' => 'required',
            'docente' => 'required',
            'detalle' => 'required',
            'estado' => 'required'
        ]);

        Docente::create($request->all());

        return redirect()->route('prestamos.index')
                        ->with('success','Prestamo procesado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        $user = Prestamo::find($prestamo->usuarioID);
        $docente = Docente::find($prestamo->docenteID);
        $equipo = Equipo::find($prestamo->equipoID);
        return view('prestamos.show',compact('prestamo', 'user', 'docente', 'equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        $user = Prestamo::find($prestamo->usuarioID);
        $docente = Docente::find($prestamo->docenteID);
        $equipo = Equipo::find($prestamo->equipoID);
        return view('prestamos.edit',compact('prestamo', 'user', 'docente', 'equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
         request()->validate([
            'usuario' => 'required',
            'equipo' => 'required',
            'docente' => 'required',
            'detalle' => 'required',
            'estado' => 'required'
        ]);

        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')
                        ->with('success','Prestamo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        return redirect()->route('prestamos.index')
                        ->with('success','Prestamo eliminado correctamente');
    }
}
