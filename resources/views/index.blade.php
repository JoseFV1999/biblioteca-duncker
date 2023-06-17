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
    <table border="1">
    @forelse ($asignaturas as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->abreviacion }}</td>
            </tr>
        
    @empty
        <li>Sin datos</li>
    @endforelse
    </table>
</body>
</html>