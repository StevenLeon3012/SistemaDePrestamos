@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('docente.index') }}">Atrás</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Hay un inconveniente en los espacios, vuelva a intentar.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                @switch($error)
                    @case("The name field is required.")
                        <li>El nombre es un espacio necesario</li>
                        @break
                    @case("The email field is required.")
                        <li>El correo es un espacio necesario</li>
                        @break
                @endswitch
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('docente.store') }}" method="POST" style="margin-left: 30vh">
        @csrf
        <div class="container">
            <div class="row" style="width: 100vh">
                <div class="mb-3">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre del Docente">
                    <input type="hidden" name="disponibilidad" value="1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo del Docente">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control" pattern="[0-9]{4}[-][0-9]{4}" title="Un número de telefono válido consiste en los primeros 4 dígitos del número de teléfono, un guión (-), y los últimos cuatros dígitos del número de teléfono" placeholder="Ej. 8888-8888" required>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
