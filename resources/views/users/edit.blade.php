@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('users.index') }}">Atrás</a>
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
    <form action="{{ route('users.update', $user->id) }}" method="POST" style="margin-left: 30vh">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row" style="width: 100vh">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        <input type="hidden" name="disponibilidad" value="{{ $user->disponibilidad }}">
                    </div>
                    @foreach ($roles as $rol)
                        <div class="mb-3">
                            <label class="form-check-label">
                                @if ($rol->name == "Admin")
                                    Usuario Administrador
                                @else
                                    {{ $rol->name }}
                                @endif
                            </label>
                            @if ($rol->name == $userRole)
                                <input class="form-check-input" value="{{ $rol->id }}" type="radio" name="roles" checked>
                            @else
                                <input class="form-check-input" value="{{ $rol->id }}" type="radio" name="roles">
                            @endif
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
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
@endsection
