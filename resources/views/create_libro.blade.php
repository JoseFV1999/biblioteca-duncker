<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Crear asignatura</title>
</head>
<body>
    <h1>Formulario para asignatura</h1>

    <form action="{{ route('createLibro') }}" method="POST">

        @csrf

        <input type="text" placeholder="Codigo del libro" name="codigo_libro"><br>
        <input type="text" placeholder="Titulo del libro" name='titulo_libro'><br>
        <input type="text" placeholder="Autor del libro" name='autor_libro'><br>
        <input type="number" placeholder="Año del libro" min="1900" max="2099" step="1" value="2016" name='year_libro'/><br>
        <input type="text" placeholder="Mueble del libro" name='mueble_libro'><br>

        <select name="asignatura_libro">
            <option value="" disabled="disabled" selected="true">--Escoja una asignatura--</option>
            @forelse ($asignaturas as $asignatura)
                <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
            @empty
                <option value="" disabled="disabled">Sin datos</option>
            @endforelse
        </select><br>

        <select name="observacion_libro">
            <option value="" disabled="disabled" selected="true">--Escoja una observacion--</option>
            <option value="O">Original</option>
            <option value="C">Copia</option>
        </select><br>

        <input type="submit" value="Completar">
        
    </form>

</body>
</html>