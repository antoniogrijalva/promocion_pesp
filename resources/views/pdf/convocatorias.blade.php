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
        
        .jaga_titulo {
            text-align: center;
            margin-bottom: 20px;
        }
        .jaga_tabla {
            width: 100%;
            border-collapse: collapse;
        }
        .jaga_tabla_titulo {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .jaga_tabla_detalle {
         
            padding: 8px;
        }

        .jaga_tabla_detalle_border {
            border: 1px solid #ddd;
            padding: 8px;
        }


    </style>
</head>
<body>
    <h1>{{ $titulo }}</h1>

    <table>
        <th>
            <td>
                <strong>Empleado:</strong> {{ $convocatorias->empleado->primer_apellido }} {{ $convocatorias->empleado->segundo_apellido }} {{ $convocatorias->empleado->nombre }} <br>
                <strong>Cargo:</strong> {{ $convocatorias->empleado->cargo }} <br>
                <strong>Fecha de Convocatoria:</strong> {{ $convocatorias->fecha_convocatoria }} <br>
                <strong>Motivo:</strong> {{ $convocatorias->motivo }} <br>
                <strong>Detalles:</strong> {{ $convocatorias->detalles }} <br>
                <strong>Creado por:</strong> {{ $convocatorias->user->name }} <br>
            </td>
        </th>
    </table>

        
        
    
</body>
</html>
