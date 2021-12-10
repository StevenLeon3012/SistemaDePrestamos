@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a class="btn btn-primary" style="margin-bottom: 10px; margin-left: 30vh;" href="{{ route('equipo.index') }}">Atrás</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Hay un inconveniente en los espacios, vuelva a intentar.<br><br>
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
<form action="{{ route('equipo.store') }}" method="POST" style="margin-left: 30vh">
    @csrf
    <div class="container">
      <div class="row" style="width: 100vh">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="form-label">Nombre Equipo</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del equipo">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tipo De Dispositivo</label>
                    <input type="text" class="form-control" name="tipoDispositivo" placeholder="Ej. Teclado, Mouse, Laptop, etc...">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" placeholder="Modelo del dispositivo">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca del dispositivo">
                    <input type="hidden" class="form-control" name="estado" value="1">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Color del dispositivo">
                </div>
                    <div class="form-group mb-3">
                    <label class="form-label" style="padding-bottom: 5px;">Detalle</label>
                    <textarea class="form-control"  name="detalle" id="" cols="10" rows="8" placeholder="Escriba detalles del dispositivo aquí"></textarea>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn" style="background-color: #94c83d;">Guardar</button>
                </div>
            </div>
        </div>
    </div>
  </form>
@endsection
