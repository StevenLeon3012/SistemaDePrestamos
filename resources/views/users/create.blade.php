@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px;" href="{{ route('users.index') }}">Atrás</a>
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
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre Completo</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del usuario">
        </div>
        <label class="form-check-label" for="flexRadioDefault1">
            Rol
        </label>
        @foreach ($roles as $rol)
            <div class="mb-3">
                <label class="form-check-label">
                    @if ($rol->name == "Admin")
                        Usuario Administrador
                    @else
                        {{ $rol->name }}
                    @endif
                </label>
                <input class="form-check-input" value="{{ $rol->id }}" type="radio" name="roles">
            </div>
        @endforeach
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="email" class="form-control" placeholder="Ej. ejemplo@ulatina.net">
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña del usuario">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmar Contraseña</label>
            <input type="password" name="confirmPassword" class="form-control" placeholder="Contraseña del usuario">
        </div>
        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
        </div>
    </form>
</div>
@endsection
