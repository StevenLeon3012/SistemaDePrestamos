@extends('layouts.app')
@section('content')
<script>

    function confirmarDelete()
    {
    var x = confirm("Estas seguro que quieres eliminar este prestamo" );
    if (x)
      return true;
    else
      return false;
    }
    function mostrarPopUp(){
        document.getElementById("popup-1").classList.toggle("active");
    }

  </script>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay un inconveniente en los input, vuelva a intentar.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="contenido">
        <div class="cerrarBtn" onclick="mostrarPopUp()">&times;</div>
        <form action="{{ route('reporte.index') }}" method="POST">
            @csrf
            <label>
                <strong>Generar reporte del día:</strong>
            </label>
            <input class="mt-3" type="date" name="reporte">
            <div>
                <button type="submit" class="btn" style="background-color: #94c83d; margin-top:5vh;">Guardar</button>
            </div>
        </form>
    </div>
</div>
<div id="content" class="container-fluid py-4" style="margin-left: 30vh">
    <div class="row m-4" style="width:60vw;">
        <div class="col-12">
            <div class="row">
                <div class="col-1" style="margin-right: 70vh">
                    <h5>PRÉSTAMO</h5>
                </div>
                <div class="col-4">
                    <button onclick="mostrarPopUp()" type="button" class="btn" style="background-color: #94c83d">
                         Generar Reporte
                    </button>
                    <a href="{{ route('prestamo.create') }}" type="button" class="btn" style="background-color: #94c83d">
                        Nuevo Préstamo
                   </a>
                </div>
                <div class="col-11">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Encargado</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col" style="text-align: center;">Opciones</th>
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
                                    @if ($prestamo->estado == 1)
                                        <td>En prestamo</td>
                                    @else
                                        <td>Finalizado</td>
                                    @endif
                                    <td style="width: 40vh; text-align: center;">
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="{{ route('prestamo.edit', $prestamo->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                EDITAR
                                            </a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['prestamo.destroy', $prestamo->id],'onsubmit' => 'confirmarDelete()','style'=>'display:inline']) !!}
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
