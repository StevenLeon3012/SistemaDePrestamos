@extends('layouts.app')

@section('content')
<div class="container">
    <div id="content" class="container-fluid py-4">
        <div class="row m-4">
            <div class="col-12">
                <h5>SISTEMA DE PRESTAMO DE EQUIPOS DE COMPUTO</h5>
            </div>
            <div class="col-sm-6 my-4">
                <div class="card border-0">
                    <div class="card-body d-block">
                        <h5 class="card-title my-4">Gestionar Préstamos</h5>
                        <img src="/img/icons/report.svg"  style="height:100px" alt="...">
                        <a href="{{ route('prestamo.index') }}"class="btn btn-dark   btn-lg rounded-pill "style="width:100px">Visitar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-4">
                <div class="card border-0" >
                    <div class="card-body d-block">
                        <h5 class="card-title my-4">Gestionar Usuarios</h5>
                        <img src="/img/icons/users.svg"  style="height:100px" alt="...">
                        <a href="{{ route('users.index') }}"class="btn btn-dark   btn-lg rounded-pill" style="width:100px">Visitar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-4">
                <div class="card border-0">
                    <div class="card-body d-block">
                        <h5 class="card-title my-4">Gestionar Docentes</h5>
                        <img src="/img/icons/classroom.svg"  style="height:100px" alt="...">
                        <a href="{{ route('docente.index') }}"class="btn btn-dark   btn-lg rounded-pill" style="width:100px">Visitar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 my-4">
                <div class="card border-0">
                    <div class="card-body d-block">
                        <h5 class="card-title my-4">Gestionar Equipos</h5>
                        <img src="/img/icons/classroom.svg"  style="height:100px" alt="...">
                        <a href="{{ route('equipo.index') }}"class="btn btn-dark   btn-lg rounded-pill"style="width:100px">Visitar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
