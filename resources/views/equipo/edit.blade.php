@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('equipo.index') }}">Atrás</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Hay un inconveniente en los input, vuelva a intentar.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                @switch($error)
                    @case("The nombre field is required.")
                        <li>El nombre es un espacio necesario</li>
                        @break
                    @case("The tipo dispositivo field is required.")
                        <li>El tipo de dispositivo es un espacio necesario</li>
                        @break
                    @case("The modelo field is required.")
                        <li>El modelo es un espacio necesario</li>
                        @break
                    @case("The marca field is required.")
                        <li>La marca es un espacio necesario</li>
                        @break
                    @case("The color field is required.")
                        <li>El color es un espacio necesario</li>
                        @break
                    @case("The detalle field is required.")
                        <li>El detalle es un espacio necesario</li>
                        @break
                @endswitch
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('equipo.update', $equipo->id) }}" method="POST" style="margin-left: 30vh;">
    @csrf
    @method('PUT')
    <div class="container">
      <div class="row" style="width: 100vh">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="form-label">Nombre Equipo</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $equipo->nombre }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tipo De Dispositivo</label>
                    <input type="text" class="form-control" name="tipoDispositivo" value="{{ $equipo->tipoDispositivo }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" value="{{ $equipo->modelo }}">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marca" value="{{ $equipo->marca }}">
                    <input type="hidden" class="form-control" name="estado" value="1">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" name="color" value="{{ $equipo->color }}">
                </div>
                <label class="form-check-label" for="flexRadioDefault1">
                    Estado
                </label>
                <div class="mb-3">
                    <label class="form-check-label">
                        Disponible
                    </label>
                    @if ($equipo->estado == 1)
                        <input class="form-check-input" value="1" type="radio" name="estado" checked>
                    @else
                        <input class="form-check-input" value="1" type="radio" name="estado">
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-check-label">
                        En préstamo
                    </label>
                    @if ($equipo->estado == 0)
                        <input class="form-check-input" value="0" type="radio" name="estado" checked>
                    @else
                        <input class="form-check-input" value="0" type="radio" name="estado">
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Detalle</label>
                    <textarea class="form-control"  name="detalle" id="" cols="10" rows="4">{{ $equipo->detalle }}</textarea>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
