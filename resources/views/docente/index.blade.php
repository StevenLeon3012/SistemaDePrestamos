@extends('layouts.app')
@section('content')
<div id="content" class="container-fluid py-4">
    <div class="row m-4">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h5>DOCENTES</h5>
                <button type="button" class="btn modal-btn" style="background-color: #94c83d">
                    Nuevo Docente
                </button>
            </div>
            <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>123456</td>
                            <td>nelson@gmail.com</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button type="button" class="btn" style="background-color: #94c83d">
                                        EDITAR
                                    </button>
                                    <button class="btn btn-danger" type="button">ELIMINAR</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
