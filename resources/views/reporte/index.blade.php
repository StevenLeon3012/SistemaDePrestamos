<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #tabla{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100;
        }
        #tabla td, #tabla th{
            border: 1px solid #4e4e50;
            padding: 25px;
        }
        #tabla th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #94c83d;
            color: #4e4e50;
        }

    </style>
</head>
<body>
    <div id="tabla" class="container-fluid py-4">
        <div class="row m-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Encargado</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr>
                                        <td scope="row">{{ $prestamo->id }}</td>
                                        @foreach ($usuarios as $usuario)
                                            @if ($usuario->id == $prestamo->usuarioID)
                                                <td>{{ $usuario->name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($docentes as $docente)
                                            @if ($docente->id == $prestamo->docenteID)
                                                <td>{{ $docente->name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($equipos as $equipo)
                                            @if ($equipo->id == $prestamo->equipoID)
                                                <td>{{ $equipo->nombre }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $prestamo->created_at }}</td>
                                        @if ($prestamo->estado)
                                            <td>En prestamo</td>
                                        @else
                                            <td>Finalizado</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
