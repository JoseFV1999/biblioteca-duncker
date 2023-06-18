<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mostrando Libros</h1>
    
    <table class="table">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Abreviacion</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Mueble</th>
            <th>Observacion</th>
            <th>Asignatura_id</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->codigo }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->year }}</td>
                <td>{{ $libro->mueble }}</td>
                <td>{{ $libro->observacion }}</td>
                <td>{{ $libro->asignatura_id }}</td>
            </tr>
        @empty
            <li>Sin datos</li>
        @endforelse
        </tbody>
    </table>
</body>
</html>