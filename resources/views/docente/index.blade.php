@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4" style="margin-left: 30vh">
    <div class="row m-4" style="width:60vw;">
    <div class="col-12">
        <div class="row">
            <div class="col-1" style="margin-right: 85vh">
                <h5>DOCENTES</h5>
            </div>
            <div class="col-2">
                <a href="{{ route('docente.create') }}" type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Docente
                </a>
            </div>
            <div class="col-11">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col" style="text-align: center;">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($docentes as $docente)
                                <tr>
                                    <th scope="row">{{ $docente->id }}</th>
                                    <td>{{ $docente->name }}</td>
                                    <td>{{ $docente->telefono }}</td>
                                    <td>{{ $docente->email }}</td>
                                    <td style="width: 40vh; text-align: center;">
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
