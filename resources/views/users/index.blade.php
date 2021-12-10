@extends('layouts.app')
@section('content')
<script>

    function mostrarPopUp(){
        document.getElementById("popup-1").classList.toggle("active");
    }

</script>
    <div id="content" class="container-fluid py-4" style="margin-left: 30vh">
        <div class="row m-4" style="width:60vw;">
            <div class="col-12">
                <div class="row">
                    <div class="col-1" style="margin-right: 85vh">
                        <h5>USUARIOS</h5>
                    </div>
                    <div class="col-2">
                        <a type="button" href="{{ route('users.create') }}" class="btn modal-btn" style="background-color: #94c83d">
                            Nuevo Usuario
                        </a>
                    </div>
                    <div class="col-11">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Correo</th>
                                <th scope="col" style="text-align: center;">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->disponibilidad)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td style="width: 40vh; text-align: center;">
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn" style="background-color: #94c83d">
                                                        EDITAR
                                                    </a>
                                                    <button onclick="mostrarPopUp()" type="button" class="btn btn-danger">
                                                        Eliminar
                                                    </button>
                                                    <div class="popup" id="popup-1">
                                                        <div class="overlay"></div>
                                                        <div class="contenido">
                                                            <h3 style="margin-bottom: 3vh">¿Deseas eliminar el usuario número {{ $user->id }}?</h3>
                                                            <form action="{{ route('users.update', $user->id) }}" style="display: inline;" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="name" class="form-control" value="{{ $user->name }}">
                                                                <input type="hidden" name="disponibilidad" value="0">
                                                                <input type="hidden" name="email" class="form-control" value="{{ $user->email }}">
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </form>
                                                            <a type="button" style="background-color: #94c83d" class="btn" onclick="mostrarPopUp()">Cancelar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
