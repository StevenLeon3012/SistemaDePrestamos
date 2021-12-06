@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4">
    <div class="row m-5">
        <div class="col-12">
            <div class="row">
                <div class="offset-2 col-1">
                    <h5>EQUIPOS</h5>
                </div>
                <div class="offset-6 col-3">
                    <a href="{{ route('equipo.create') }}" type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Equipo
                    </a>
                </div>
                <div class="offset-2 col-11">
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
                                <th scope="col">Fecha Registro</th>
                                <th scope="col">Opciones</th>
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
                                <td>
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
