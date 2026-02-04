    <style>
        @page {
           size: letter;
            /*margin: 1in;*/
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }           
        th, td {
            /*border: 1px solid #ccc;
            padding: 8px;
            */
            
        }
        th {
            background-color: #000000;
            color: #fafafa;
            font-weight: bold;
        }    

        .td-borde {
             border: 1px solid #ccc;
            padding: 8px;
        }

       
        
        tr {
            height: 60px;
        }

       

        td {
            vertical-align: middle;
        }

        

        .centrar-texto {
            text-align: center;
        }

        .container-pagina {
            border: 3px solid #000000;
            border-radius: 10px;
            padding: 10px;
        }

        .container-encabezado {
            border: 1px solid #6b6a6a;
            border-radius: 5px;
            padding-top: 20px;
            padding-left: 10px;
            padding-right: 10px;
            
        }

        .container-convocatoria {
            
            padding: 50px;
            margin-bottom: 10px;
        }

        .texto-titulo {
            font-size: 16pt;
            font-weight: bold;
        }

        .texto-subtitulo {
            font-size: 12pt;

        }


        .texto-principal {
            text-align: justify;
            line-height: 1.2;
        }

        .texto-negritas {
            font-weight: bold;
            
        }

        .texto-sm {
            font-size: 7pt;
        }

        .texto-md {
            font-size: 10pt;
        }
        .texto-lg {
            font-size: 14pt;
        }

        .texto-derecha {
            text-align: right;
        }

        .texto-italicas {
            font-style: italic;
        }

        .texto-gris{
            color: #888888;
        }
        
        .recuadro-fondo {
            /* border: .5px solid #555555; */
            background-color: #000000;
            padding-left: 10px;
            padding-right: 10px;
            padding-top : 3px;
            padding-bottom : 3px;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .recuadro-sinfondo {
            border: .5px solid #dfdddd;
            /*background-color: #e0e0e0;*/
            padding-left: 10px;
            padding-right: 10px;
            padding-top : 3px;
            padding-bottom : 3px;
            color: #c3c0c0;
            border-radius: 5px;
            /*font-weight: bold;*/
        }

        






    </style>

    <div class="container">

        <div class="container-encabezado">
            {{-- encabezados de la hoja  --}}
            <table>
                <tr class="">
                    <td class="centrar-texto " style="width: 20%;"><img src="img/logo_seisp.jpeg"  style="height: 80px; width: auto;"></td>
                    <td class="centrar-texto " style="width: 60%;">
                         <h2>Folio:<b> {{ $convocatorias->id }}</h2></p>
                         Hermosillo Sonora, a {{  \Carbon\Carbon::parse($convocatorias->fecha)->format('d/m/Y') }} 
                    </td>
                    <td class="centrar-texto " style="width: 20%;"><img src="{{ public_path('img/logo_pesp.jpeg')}}"  style="height: 80px; width: auto;"></td>    
                </tr>
            </table>
        </div> 
            <br>

            <table>
                <tr>
                    <td class="texto-negritas texto-subtitulo" style="width: 70%;"> {{ $convocatorias->periodo->nombre_comision }}</td>
                    <td class="texto-negritas" style="width: 30%;"></td>
                </tr>
                <tr>
                    <td>Presente.-</td>
                </tr>
            </table>
 


            <div class="container-convocatoria">
                <div class="texto-principal">
                    Quien suscribe, <u><b>{{ $convocatorias->empleado->nombre_completo }}</b></u>, con número de empleado <u><b>{{ $convocatorias->empleado->num_empleado }}</b></u>, 
                    aspirante a ocupar el grado de <u><b>{{ $convocatorias->puesto_solicitado }}</b></u>, a traves de la convocatoria emitida por éste organo colegiado.
                </div>
                

                <br><br>
                <div class="centrar-texto texto-negritas">
                    De acuerdo a las bases de Participación de la Convocatoria, hago constar y declaro bajo protesta de decir verdad que:
                </div>
                <br>
                <br>
                              
                <div>
                    <ol>
                        <li class="texto-italicas">
                            Presenté los documentos para participar como aspirante en la convocatoria del proceso de promoción {{ \Carbon\Carbon::parse($convocatorias->fecha)->format('Y') }}
                            en los términos del Reglamento del Servicio Profesional de Carrera Policial de la Policía Estatal de Seguridad Pública.
                        </li>
                        <br>
                        <li class="texto-italicas">
                            Que la documentación que presento es auténtica.
                        </li>
                        <br>
                        <li class="texto-italicas">
                            Que he leído y aceptado los términos y condiciones de participación en la convocatoria, así como sus resultados definitivos e inapelables.
                        </li>
                        <br>
                        <li class="texto-italicas">
                            No existe alguna situación o supuesto que pudiera generar conflicto de intereses.
                        </li>
                    </ol>    
                </div>

                <br><br><br>
                <div class="texto-negritas centrar-texto">ATENTAMENTE</div>
                <br>
                
                <div  class="container-convocatoria centrar-texto">
                    <hr>
                    <div class="texto-negritas ">{{$convocatorias->empleado->nombre_completo}}</div>
                </div>
                
                
                {{-- <div style="padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px; font-size: 10px;"> {{ $convocatorias->empleado->nombre_completo }}</div> --}}
            </div> 
            
            <div>
                {{-- pie de pagina --}}
                <br><br>
                <table>
                    <tr class="texto-gris texto-italicas">
                        <td style="width: 70%; text-align: left; font-size: 7pt;">
                            SISTEMA INTEGRAL DE DESARROLLO POLICIAL DEL ESTADO DE SONORA
                        </td>
                        <td style="width: 30%; text-align: right; font-size: 7pt;">
                            {{ $convocatorias->periodo->nombre }}
                        </td>
                    </tr>
                </table>

            </div>   
        
        


        <div style="page-break-before: always;"></div>

        <div class="container-encabezado">
             <table>
                <tr class="">
                    <td class="centrar-texto " style="width: 20%;"><img src="img/logo_seisp.jpeg"  style="height: 80px; width: auto;"></td>
                    <td class="centrar-texto " style="width: 60%;">
                         <h2>Folio:<b> {{ $convocatorias->id }}</h2></p>
                         Hermosillo Sonora, a {{  \Carbon\Carbon::parse($convocatorias->fecha)->format('d/m/Y') }} 
                    </td>
                    <td class="centrar-texto " style="width: 20%;"><img src="{{ public_path('img/logo_pesp.jpeg')}}"  style="height: 80px; width: auto;"></td>    
                </tr>
            </table>
        </div>

        <br>
      
         <div class="texto-sm texto-derecha texto-italicas"><b>Elaboró:</b> {{ $convocatorias->user->name }}</div>

         <div class="container-convocatoria">
            <div class="texto-principal">
                El {{$convocatorias->puesto_actual}} <u><b>{{ $convocatorias->empleado->nombre_completo }}</b></u>, con número de empleado <u><b>{{ $convocatorias->empleado->num_empleado }}</b></u>,
                realizó las siguientes evaluaciones que integra el Certificado Único Policial (CUP) con los resultados que a continuación se describen:
            </div>

            <br><br><br>
            <div class="recuadro-fondo texto-md">EVALUACION DE CONTROL Y CONFIANZA - C3</div>
            <table>
                <tr>
                    <td style="width: 20%;" class="texto-negritas">Estatus</td>
                    <td style="width: 20%;" class="texto-negritas">Evaluacion</td>
                    <td style="width: 20%;" class="texto-negritas">Vigencia</td>
                </tr>
                <tr>
                    <td class="texto-sm">{{ $convocatorias->acreditacion_c3_vigencia > $convocatorias->fecha ? 'APROBADO' : '' }}</td>    
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_c3_fecha)->format('d/m/Y') }}</td>
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_c3_vigencia)->format('d/m/Y') }}</td>
                </tr>
            </table>

            <br><br>
            <div class="recuadro-fondo texto-md">COMPETENCIAS BÁSICAS</div>
            <table>
                <tr>
                    <td style="width: 20%;" class="texto-negritas">Estatus</td>
                    <td style="width: 20%;" class="texto-negritas">Evaluacion</td>
                    <td style="width: 20%;" class="texto-negritas">Vigencia</td>
                </tr>
                <tr>
                    <td class="texto-sm">{{ $convocatorias->acreditacion_competencias_vigencia > $convocatorias->fecha ? 'VIGENTE' : '--' }}</td>    
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_competencias_fecha)->format('d/m/Y') }}</td>
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_competencias_vigencia)->format('d/m/Y') }}</td>
                </tr>
            </table>

            <br><br>
            <div class="recuadro-fondo texto-md">EVALUACIÓN DEL DESEMPEÑO</div>
            <table>
                <tr>
                    <td style="width: 20%;" class="texto-negritas">Estatus</td>
                    <td style="width: 20%;" class="texto-negritas">Evaluacion</td>
                    <td style="width: 20%;" class="texto-negritas">Vigencia</td>
                </tr>
                <tr>
                    <td class="texto-sm">{{ $convocatorias->acreditacion_desempeno_vigencia > $convocatorias->fecha ? 'VIGENTE' : '--' }}</td>    
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_desempeno_fecha)->format('d/m/Y') }}</td>
                    <td class="texto-sm">{{ \Carbon\Carbon::parse($convocatorias->acreditacion_desempeno_vigencia)->format('d/m/Y') }}</td>
                </tr>
            </table>

            <br><br>
            <div class="texto-italicas texto-negritas texto-sm centrar-texto">
                {{ $convocatorias->acreditacion_cup_vigencia < $convocatorias->fecha ? 
                    ' * LA SOLICITUD DEL CERTIFICADO ÚNICO POLICIAL SE ENCUENTRA EN TRÁMITE ANTE LA INSTANCIA CORRESPONDIENTE' : ''
                 }}
            </div>

             <br><br><br>
            <div class="texto-principal ">
               Lo anterior se hace constar para los fines legales a que haya lugar.
            </div>

                <br><br><br><br>
                <div class="texto-negritas centrar-texto">ATENTAMENTE</div>
                <br>
                <div class="texto-negritas texto-lg centrar-texto">Departamento de Carrera Policial</div>
    
         </div>



    </div>


