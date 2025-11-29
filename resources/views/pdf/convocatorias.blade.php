<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #1e7a20ff;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 5px 0;
            border-bottom: 1px solid #11cd24ff;
        }
    </style>
</head>
<body>
    <h1>{{ $titulo }}</h1>

    <p class="text-sm text-gray-500">
        Convocatoria creada por:  {{ $convocatorias->user->name }}
    </p>

    <div>
    Yo {{ $convocatorias->empleado->primer_apellido }} {{ $convocatorias->empleado->segundo_apellido }} {{ $convocatorias->empleado->nombre}}  me permito postularme para el cargo de {{ $convocatorias->cargo }}  en la dependencia de {{ $convocatorias->dependencia }} , de acuerdo a la convocatoria N° {{ $convocatorias->numero_convocatoria }}  emitida el día {{ $convocatorias->fecha_emision }} con fecha de cierre el día {{ $convocatorias->fecha_cierre }}.
    </div>

        
        
    
</body>
</html>
