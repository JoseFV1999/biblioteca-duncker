<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mostrando asignaturas</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Abreviacion</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($asignaturas as $asignatura)
            <tr>
                <td>{{ $asignatura->id }}</td>
                <td>{{ $asignatura->nombre }}</td>
                <td>{{ $asignatura->abreviacion }}</td>
                <td><a href="{{ route('viewEditAsignatura', $asignatura->id) }}">Editar</a></td>
            </tr>
        @empty
            <li>Sin datos</li>
        @endforelse
        </tbody>
    </table>

    <a href="{{ URL::route('viewCreateAsignatura') }}" class="button">Añadir asignatura</a>

</body>
</html>