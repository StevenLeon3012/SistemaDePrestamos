@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4" style="margin-left: 30vh">
    <div class="row m-5" style="width:60vw;">
        <div class="col-12">
            <div class="row">
                <div class="col-1" style="margin-right: 85vh">
                    <h5>EQUIPOS</h5>
                </div>
                <div class="col-2">
                    <a href="{{ route('equipo.create') }}" type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Equipo
                    </a>
                </div>
                <div class="col-11">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Equipo</th>
                                <th scope="col">Tipo de Dispositivo</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Color</th>
                                <th scope="col">Estado</th>
                                <th scope="col" style="width: 15vh;">Fecha Registro</th>
                                <th scope="col" style="text-align: center;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo)
                            <tr>
                                <th scope="row">{{ $equipo->id }}</th>
                                <td>{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->tipoDispositivo }}</td>
                                <td>{{ $equipo->modelo}}</td>
                                <td>{{ $equipo->marca}}</td>
                                <td>{{ $equipo->color}}</td>
                                @if ($equipo->estado)
                                    <td>Disponible</td>
                                @else
                                    <td>En prestamo</td>
                                @endif
                                <td>{{ $equipo->created_at }}</td>
                                <td style="width: 40vh; text-align: center;">
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="{{ route('equipo.edit', $equipo->id ) }}" type="button" class="btn" style="background-color: #94c83d">
                                            EDITAR
                                        </a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['equipo.destroy', $equipo->id],'style'=>'display:inline']) !!}
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
