@extends('layouts.app')
@section('content')
<script>

    function mostrarPopUp(){
        document.getElementById("popup-1").classList.toggle("active");
    }

</script>
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
                                @if($equipo->disponibilidad)
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
                                                <button onclick="mostrarPopUp()" type="button" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                                <div class="popup" id="popup-1">
                                                    <div class="overlay"></div>
                                                    <div class="contenido">
                                                        <h3 style="margin-bottom: 3vh">¿Deseas eliminar el equipo número {{ $equipo->id }}?</h3>
                                                        <form action="{{ route('equipo.update', $equipo->id) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="nombre" value="{{ $equipo->nombre }}">
                                                            <input type="hidden" value="0" name="disponibilidad">
                                                            <input type="hidden" name="tipoDispositivo" value="{{ $equipo->tipoDispositivo }}">
                                                            <input type="hidden" name="modelo" value="{{ $equipo->modelo }}">
                                                            <input type="hidden" name="marca" value="{{ $equipo->marca }}">
                                                            <input type="hidden" name="detalle" value="{{ $equipo->detalle }}">
                                                            <input type="hidden" name="color" value="{{ $equipo->color }}">
                                                            @if ($equipo->estado == 1)
                                                                <input value="1" type="hidden" name="estado" checked>
                                                            @else
                                                                <input value="0" type="hidden" name="estado" checked>
                                                            @endif
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                        <a type="button" style="background-color: #94c83d" class="btn" onclick="mostrarPopUp()">Cancelar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
