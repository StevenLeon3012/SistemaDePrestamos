@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('prestamo.index') }}">Atrás</a>
</div>
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
<form action="{{ route('prestamo.update', $prestamo->id) }}" method="POST" style="margin-left: 30vh">
    @csrf
    @method('PUT')
    <div class="container">
      <div class="row" style="width: 100vh">
        <div class="col-6">
            <div class="mb-3">
                <input type="hidden" name="usuarioID" class="form-control" value="{{ $userPrestamo->id }}">
                <label class="form-label">
                   <strong>Docente:</strong>
                </label>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                Elegir
                            </th>
                            <th scope="col">
                                Nombre
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docentes as $docente)
                            <tr>
                                <td>
                                    @if ($docente->id == $docentePrestamo->id)
                                    <input class="form-check-input" value="{{ $docente->id }}" type="radio" name="docenteID" checked>
                                    @else
                                    <input class="form-check-input" value="{{ $docente->id }}" type="radio" name="docenteID">
                                    @endif
                                </td>
                                <td>
                                    {{ $docente->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <label style="margin-bottom: 3%;" class="form-check-label">
                Estado
            </label>
            @if ($prestamo->estado == 1)
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="estado" value="1" checked>
                <label class="form-check-label">
                    En prestamo
                </label>
            </div>
            @else
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="estado" value="1">
                <label class="form-check-label">
                    En prestamo
                </label>
            </div>
            @endif
            @if ($prestamo->estado == 0)
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="estado" value="0" checked>
                <label class="form-check-label">
                    Finalizado
                </label>
            </div>
            @else
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="estado" value="0">
                <label class="form-check-label">
                    Finalizado
                </label>
            </div>
            @endif
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label">
                   <strong>Equipo:</strong>
                </label>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                Elegir
                            </th>
                            <th scope="col">
                                Nombre
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>
                                    @if ($equipo->id == $equipoPrestamo->id)
                                        <input class="form-check-input" value="{{ $equipo->id }}" type="radio" name="equipoID" checked>
                                    @else
                                        <input class="form-check-input" value="{{ $equipo->id }}" type="radio" name="equipoID">
                                    @endif
                                </td>
                                <td>
                                    {{ $equipo->nombre }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Detalle</label>
                <textarea class="form-control"  name="detalle" id="" cols="10" rows="4">{{ $prestamo->detalle }}</textarea>
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
            </div>
        </div>
      </div>
    </div>
</form>
@endsection
