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

    <form action="{{ route('createAsignatura') }}" method="POST">

        @csrf

        <input type="text" placeholder="Nombre de la asignatura" name="nombre_asignatura">
        @error('nombre_asignatura')
            {{ 'Se requiere un nombre' }}
        @enderror
        <input type="text" placeholder="Abreviacion de la asignatura" name='abreviacion_asignatura'>
        @error('abreviacion_asignatura')
            {{ 'Se requiere una abreviacion' }}
        @enderror
        <input type="submit" value="Completar">
        <a href="{{ URL::route('Asignaturas') }}" class="button">Cancelar</a>
    </form>

</body>
</html>