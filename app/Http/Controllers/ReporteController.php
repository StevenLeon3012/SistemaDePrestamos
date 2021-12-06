<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Docente;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Reporte;
use Illuminate\Http\Request;
use PDF;
use DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:reporte-list|reporte-create|reporte-edit|reporte-delete', ['only' => ['index','show']]);
         $this->middleware('permission:reporte-create', ['only' => ['create','store']]);
         $this->middleware('permission:reporte-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:reporte-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = DB::table('prestamos')->orderBy('created_at', 'DESC')->get();
        $usuarios = User::all();
        $equipos = Equipo::all();
        $docentes = Docente::all();
        $pdf = PDF::loadView('reporte.index',compact('prestamos', 'equipos', 'docentes', 'usuarios'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Reporte.pdf');
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
        request()->validate([
            'prestamo' => 'required',
            'detalle' => 'required',
        ]);

        Docente::create($request->all());

        return redirect()->route('reportes.index')
                        ->with('success','Reporte generado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reporte $reporte
     * @return \Illuminate\Http\Response
     */
    public function show(Reporte $reporte)
    {
        /*
        $user = Prestamo::find($reporte->usuarioID);
        $docente = Prestamo::find($reporte->docenteID);
        $equipo = Prestamo::find($reporte->equipoID);
        return view('prestamos.show',compact('prestamo', 'user', 'docente', 'equipo'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        /*
        $user = Prestamo::find($prestamo->usuarioID);
        $docente = Docente::find($prestamo->docenteID);
        $equipo = Equipo::find($prestamo->equipoID);
        return view('prestamos.edit',compact('prestamo', 'user', 'docente', 'equipo'));
        */
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
        /*
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
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        /*
        $prestamo->delete();

        return redirect()->route('prestamos.index')
                        ->with('success','Prestamo eliminado correctamente');
        */
    }
}
