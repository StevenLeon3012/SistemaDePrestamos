@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4">
    <div class="row m-4">
    <div class="col-12">
        <div class="row">
            <div class="offset-3 col-1">
                <h5>DOCENTES</h5>
            </div>
            <div class="offset-5 col-3">
                <a href="{{ route('docente.create') }}" type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Docente
                </a>
            </div>
            <div class="offset-3 col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($docentes as $docente)
                                <tr>
                                    <th scope="row">{{ $docente->id }}</th>
                                    <td>{{ $docente->name }}</td>
                                    <td>{{ $docente->telefono }}</td>
                                    <td>{{ $docente->email }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="{{ route('docente.edit', $docente->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                EDITAR
                                            </a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['docente.destroy', $docente->id],'style'=>'display:inline']) !!}
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
