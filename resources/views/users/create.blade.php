@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('users.index') }}">Atrás</a>
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
                    @case("The password field is required.")
                        <li>La contraseña es un espacio necesario</li>
                        @break
                    @case("The roles field is required.")
                        <li>El rol es un espacio necesario</li>
                        @break
                @endswitch
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('users.store') }}" method="POST" style="margin-left: 30vh">
        @csrf
        <div class="container">
            <div class="row" style="width: 100vh">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del usuario">
                        <input type="hidden" name="disponibilidad" value="1">
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
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
