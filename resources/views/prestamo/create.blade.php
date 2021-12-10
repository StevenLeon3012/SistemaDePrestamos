@extends('layouts.app')
@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('prestamo.index') }}">Atrás</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay un inconveniente en los espacios, vuelva a intentar.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    @switch($error)
                        @case("The equipo i d field is required.")
                            <li>El equipo es un espacio necesario</li>
                            @break
                        @case("The docente i d field is required.")
                            <li>El docente es un espacio necesario</li>
                            @break
                        @case("The detalle field is required.")
                            <li>El detalle es un espacio necesario</li>
                            @break
                    @endswitch
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('prestamo.store') }}" method="POST" style="margin-left: 30vh">
        @csrf
        <div class="container">
          <div class="row" style="width: 100vh">
            <div class="col-6">
                <div class="mb-3">
                    <input type="hidden" name="usuarioID" class="form-control" value="{{ Auth::user()->id }}">
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
                                @if($docente->disponibilidad)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" value="{{ $docente->id }}" type="radio" name="docenteID">
                                        </td>
                                        <td>
                                            {{ $docente->name }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $docentes->links() !!}
                    </div>
                </div>
                <input type="hidden" name="estado" value="1">
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
                                @if($equipo->disponibilidad)
                                    @if ($equipo->estado == 1)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" value="{{ $equipo->id }}" type="radio" name="equipoID">
                                            </td>
                                            <td>
                                                {{ $equipo->nombre }}
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $equipos->links() !!}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Detalle</label>
                    <textarea class="form-control"  name="detalle" id="" cols="10" rows="4"></textarea>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
                </div>
            </div>
          </div>
        </div>
    </form>
@endsection
