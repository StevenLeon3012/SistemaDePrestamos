@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4">
    <div class="row m-4">
        <div class="col-12">
            <div class="row">
                <div class="offset-2 col-1">
                    <h5>PRÉSTAMO</h5>
                </div>
                <div class="offset-5 col-2">
                    <a href="{{ route('reporte.index') }}" type="button" class="btn" style="background-color: #94c83d">
                         Generar Reporte
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{ route('prestamo.create') }}" type="button" class="btn" style="background-color: #94c83d">
                         Nuevo Préstamo
                    </a>
                </div>
                <div class="offset-2 col-11">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Encargado</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestamos as $prestamo)
                                <tr>
                                    <th scope="row">{{ $prestamo->id }}</th>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $prestamo->usuarioID)
                                            <td>{{ $usuario->name }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($docentes as $docente)
                                        @if ($docente->id == $prestamo->docenteID)
                                            <td>{{ $docente->name }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($equipos as $equipo)
                                        @if ($equipo->id == $prestamo->equipoID)
                                            <td>{{ $equipo->nombre }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $prestamo->created_at }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="{{ route('prestamo.edit', $prestamo->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                EDITAR
                                            </a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['prestamo.destroy', $prestamo->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
