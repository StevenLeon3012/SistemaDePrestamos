@extends('layouts.app')
@section('content')
    <div id="content" class="container-fluid py-4">
        <div class="row m-4">
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-1">
                        <h5>USUARIOS</h5>
                    </div>
                    <div class="offset-4 col-3" style="margin-left: 200px;">
                        <a type="button" href="{{ route('users.create') }}" class="btn modal-btn" style="background-color: #94c83d">
                            Nuevo Usuario
                        </a>
                    </div>
                    <div class="offset-4 col-11">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                    EDITAR
                                                </a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
