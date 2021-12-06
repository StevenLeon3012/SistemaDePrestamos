<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Docente;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;
use DB;
use Auth;

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
        $prestamos = DB::table('prestamos')->orderBy('created_at', 'DESC')->get();
        $usuarios = User::all();
        $equipos = Equipo::all();
        $docentes = Docente::all();
        return view('prestamo.index',compact('prestamos', 'equipos', 'docentes', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes = DB::table('docentes')->paginate(5);
        $equipos =  DB::table('equipos')->paginate(5);
        return view('prestamo.create', compact('docentes', 'equipos'));
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
            'usuarioID' => 'required',
            'equipoID' => 'required',
            'docenteID' => 'required',
            'detalle' => 'required',
            'estado' => 'required'
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamo.index')
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
        return view('prestamo.show',compact('prestamo', 'user', 'docente', 'equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        $docentes = DB::table('docentes')->paginate(5);
        $equipos =  DB::table('equipos')->paginate(5);
        $userPrestamo = DB::table('users')->find($prestamo->usuarioID);
        $docentePrestamo = DB::table('docentes')->find($prestamo->docenteID);
        $equipoPrestamo = DB::table('equipos')->find($prestamo->equipoID);
        return view('prestamo.edit',compact('prestamo', 'userPrestamo', 'docentePrestamo', 'equipoPrestamo', 'docentes', 'equipos'));
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
            'usuarioID' => 'required',
            'equipoID' => 'required',
            'docenteID' => 'required',
            'detalle' => 'required',
            'estado' => 'required'
        ]);

        $prestamo->update($request->all());
        $equipo = Equipo::find($prestamo->equipoID);
        if($request->estado){
            $equipo['estado'] = 0;
        }else{
            $equipo['estado'] = 1;
        }
        \DB::table('equipos')->where('id', $equipo->id)->update(['estado' => $equipo['estado']]);

        return redirect()->route('prestamo.index')
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

        return redirect()->route('prestamo.index')
                        ->with('success','Prestamo eliminado correctamente');
    }
}
