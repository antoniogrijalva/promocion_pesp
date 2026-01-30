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

        .tabla-total {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        tr {
            height: 60px;
        }

       

        td {
            vertical-align: middle;
        }

        .voto-letras {
            text-transform: uppercase;
            font: 11px Arial, sans-serif;
            color: #333;
            text-align: center;
        }
        .voto-numeros {
            font: 20px Arial, sans-serif;
            font-weight: bold;
            color: #333;
            text-align: right;
        }
        .boleta-numeros {
            font: 15px Arial, sans-serif;
            /*font-weight: bold;*/
            color: #333;
            text-align: right;
        }

        .centrar-texto {
            text-align: center;
        }

        .container-pagina {
            border: 3px solid #000000;
            border-radius: 10px;
            padding: 10px;
        }

        .texto-titulo {
            font-size: 16pt;
            font-weight: bold;
            text-align: center;
            /*margin-bottom: 20px;*/
        }

        .texto-negritas {
            font-weight: bold;
            
        }
        .recuadro-fondo {
            border: .5px solid #555555;
            background-color: #e0e0e0;
            padding-left: 10px;
            padding-right: 10px;
            padding-top : 3px;
            padding-bottom : 3px;

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

        .texto_sin_boletas {
            font-size: 20pt;
            font-style: italic;
            color: #842525;
        }






    </style>

    <div class="container">

        <div class="container-pagina">
             {{-- encabezados de la hoja  --}}
                <table>
                    <tr class="">
                        <td class="centrar-texto " style="width: 20%;"><img src="images/logos/tn_iee.png"  style="height: 80px; width: auto;"></td>
                        <td class="centrar-texto " style="width: 60%;"></td>
                        <td class="centrar-texto " style="width: 20%;"><img src="{{ public_path('images/logos/tn_2024.png')}}"  style="height: 80px; width: auto;"></td>    
                    </tr>
                </table>
            <div class="centrar-texto texto-titulo">ACTA DE RECUENTO</div>
            <div class="centrar-texto">ELECCIÓN DEL AYUNTAMIENTO DE HERMOSILLO</div>

             <strong>Empleado:</strong> {{ $convocatorias->empleado->primer_apellido }} {{ $convocatorias->empleado->segundo_apellido }} {{ $convocatorias->empleado->nombre }} <br>
                <strong>Cargo:</strong> {{ $convocatorias->empleado->cargo }} <br>
                <strong>Fecha de Convocatoria:</strong> {{ $convocatorias->fecha_convocatoria }} <br>
                <strong>Motivo:</strong> {{ $convocatorias->motivo }} <br>
                <strong>Detalles:</strong> {{ $convocatorias->detalles }} <br>
                <strong>Creado por:</strong> {{ $convocatorias->user->name }} <br>
            
            <br>
            <table>
                <tr class="">
                    {{-- <td class="" style="width: 33%;"><b>FECHA:</b> {{ \Carbon\Carbon::parse($generar_acta[0]->fecha_inicio)->format('d/m/Y') }}</td>    
                    <td class="" style="width: 33%;"><b>HORA INICIO:</b> {{ \Carbon\Carbon::parse($generar_acta[0]->fecha_inicio)->format('H:i') }} hrs</td>
                    <td class="" style="width: 33%;"><b>HORA FIN:</b> {{ \Carbon\Carbon::parse($generar_acta[0]->fecha_fin)->format('H:i') }} hrs</td>     --}}
                </tr>
            </table>
            
            <br>
            <div class="texto-negritas">1. DATOS DE IDENTIFICACION DE LA CASILLA</div>
            <br>
            <table>
                <tr class="">
                    <td class="" style="width: 30%;"><b>ENTIDAD :</b>SONORA</td>    
                    <td class="" style="width: 70%;"><b>DISTRITO ELECTORAL LOCAL:</b> {{ $generar_acta[0]->distrito_local }}</td>    
                </tr>
                <tr class="">
                    <td class="" style="" colspan="2"><b>MUNICIPIO: </b> {{ $generar_acta[0]->municipio }}</td>    
                </tr>
            </table>
            {{-- <div>
                <b>MUNICIPIO: </b> {{ $generar_acta[0]->municipio }}
            </div> --}}
            
            <div>
                <table>
                    <tr class="">
                        <td class="" style="width: 20%;"><b>SECCION: </b> {{ $generar_acta[0]->seccion }}</td>    
                        <td class="centrar-texto" style="width: 80%;"><b>MARQUE EL TIPO DE CASILLA:</b> </td>    
                    </tr>
                    <tr class="">
                        <td>
                            {{-- <b>CASILLA: </b> {{ $generar_acta[0]->tipo_casilla }} --}}
                        </td>    
                        <td class="centrar-texto">


                            <span class="{{ f_tipo_casilla($generar_acta[0]->tipo_casilla) =="Básica" ? "recuadro-fondo" : "recuadro-sinfondo" }}">Básica</span>  
                            <span class="{{ f_tipo_casilla($generar_acta[0]->tipo_casilla) =="Contigua" ? "recuadro-fondo" : "recuadro-sinfondo" }}">Contigua</span>  
                            <span class="{{ f_tipo_casilla($generar_acta[0]->tipo_casilla) =="Extraordinaria" ? "recuadro-fondo" : "recuadro-sinfondo" }}">Extraordinaria</span>  
                            <span class="{{ f_tipo_casilla($generar_acta[0]->tipo_casilla) =="Extraordinaria Contigua" ? "recuadro-fondo" : "recuadro-sinfondo" }}">Extraordinaria Contigua</span> 
                            <span class="{{ f_tipo_casilla($generar_acta[0]->tipo_casilla) =="Especial" ? "recuadro-fondo" : "recuadro-sinfondo" }}">Especial</span> 

                            <br><br>
                            <b>CASILLA: </b> {{ $generar_acta[0]->tipo_casilla }}
                        </td>    
                    </tr>
                    {{-- <tr class="">
                        <td class="" style="" colspan="2"><b>MUNICIPIO: </b> {{ $generar_acta[0]->municipio }}</td>    
                    </tr> --}}
                </table>
            </div>

            <br>
            <div class="texto-negritas">2. LA CASILLA SE INSTALÓ EN:</div>
            <div style="padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px; font-size: 10px;"> {{ $generar_acta[0]->domicilio }}</div>
            
            <br><br>
            <div class="texto-negritas">3. NOMBRE DE LAS PERSONAS FUNCIONARIAS DEL RECUENTO:</div><br>
            <table>
                <tr>
                    <th class="centrar-texto " style="width: 20%; height: 30px;" >CARGO</th>
                    <th class="centrar-texto " style="width: 50%;" >NOMBRE COMPLETO</th>
                    <th class="centrar-texto " style="width: 30%;" >FIRMA</th>
                </tr>
                <tr >
                    <td class="td-borde"   style="height: 40px;" >Escrutador 1</td>    
                    <td class="td-borde">{{ $generar_acta[0]->escrutador1 }}</td>   
                    <td class="td-borde"></td> 
                </tr>
                 <tr >
                    <td class="td-borde" style="height: 40px;" >Escrutador 2</td>    
                    <td class="td-borde"> {{ $generar_acta[0]->escrutador2 }}</td>    
                    <td class="td-borde"></td>
                </tr>
            </table>

          
         
            <table>
                <tr>
                    <td><b>BOLETAS ENTREGADAS:</b> <span class="recuadro-fondo">{{ $generar_acta[0]->boletasentregadas }}</span></td>
                    <td><b>FOLIO INICIAL:</b> <span class="recuadro-fondo">{{ $generar_acta[0]->folio_inicial }}</span></td>
                    <td><b>FOLIO FINAL:</b> <span class="recuadro-fondo">{{ $generar_acta[0]->folio_final }}</span></td>
                </tr>
            </table>

         
             <table>
                <tr>
                    <td class="td-borde" style="width: 40%; height: 30px;"><b>BOLETAS SOBRANTES:</b></td> 
                    <td class="boleta-numeros td-borde tabla-total" style="width: 10%;">
                         @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                            {{ $generar_acta[0]->boletasobrantes }}
                        @endif
                    </td>
                    <td class="" rowspan="3" style="width: 50%; vertical-align: middle; text-align: center;">
                        <!-- Aquí puedes poner tu mensaje -->
                        @if($generar_acta[0]->votosvalidos+$generar_acta[0]->votosnulos == 0)
                            <span class="texto_sin_boletas">Casilla sin <b> Boletas</b></span>
                        @endif
                        
                    </td>
                </tr>
                <tr>
                    <td class="td-borde" ><b>TOTAL DE VOTOS VALIDOS DEPOSITADOS EN LA URNA:</b></td>
                    <td class="boleta-numeros td-borde tabla-total">
                        @if($generar_acta[0]->votosvalidos +$generar_acta[0]->votosnulos > 0)
                            {{ $generar_acta[0]->votosvalidos }}
                        @endif
                    </td>
                    <!-- No se incluye td aquí porque está combinado con rowspan -->
                </tr>
                <tr>
                    <td class="td-borde"><b>TOTAL DE VOTOS NULOS DEPOSITADOS EN LA URNA:</b></td>
                    <td class="boleta-numeros td-borde tabla-total">
                        @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                            {{ $generar_acta[0]->votosnulos }}
                        @endif
                        </td>
                    <!-- No se incluye td aquí porque está combinado con rowspan -->
                </tr>    
            </table>

            
        </div>
        

        <div style="page-break-before: always;"></div>       
       

          <div class="container-pagina">
              
                {{-- encabezados de la hoja  --}}
                <table>
                    <tr class="">
                        <td class="centrar-texto " style="width: 20%;"><img src="images/logos/tn_iee.png"  style="height: 80px; width: auto;"></td>
                        <td class="centrar-texto " style="width: 60%;"><b>HOJA DE RECUENTO</b> <BR> Elección del Ayuntamiento de Hermosillo <br><b>Paquete Electoral:</b> {{ $generar_acta[0]->casilla }}</td>
                        <td class="centrar-texto " style="width: 20%;"><img src="{{ public_path('images/logos/tn_2024.png')}}"  style="height: 80px; width: auto;"></td>    
                    </tr>
                </table>
                
                <div><b>TOTAL DE VOTOS EN EL MUNICIPIO</b></div>
                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos == 0)
                    <div class="texto_sin_boletas centrar-texto">Casilla sin <b> Boletas</b></div>
                @endif

                <table class="">
                    <thead>
                        <tr class="">
                            <th class="centrar-texto " style="width: 30%; height: 40px;">COALICIÓN O CANDIDATO(A)</th>
                            <th class="centrar-texto " style="width: 60%;">Votacion (letras)</th>
                            <th class="centrar-texto " style="width: 15%;">TOTAL DE VOTOS</th>    
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($generar_acta as $acta)
                        
                        <tr>
                           
                            @if($acta->rutalogo)
                            <td class="centrar-texto td-borde">
                                <img src="{{ public_path('images/logos/' . $acta->rutalogo) }}" alt="{{ $acta->rutalogo }}" style="height: 32px; width: auto;">
                            </td>
                            @else
                            <td class="centrar-texto td-borde">
                                <b>{{ $acta->descripcion }}</b>
                            </td> 
                            @endif
                               
                            <td class="voto-letras td-borde">
                                @if($generar_acta[0]->votosvalidos +$generar_acta[0]->votosnulos > 0)
                                    {{ f_letras($acta->votos) }}
                                @endif
                            </td>
                            <td class="voto-numeros td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                    {{ $acta->votos }}
                                @endif
                            </td>
                        </tr>

                        @endforeach
                        <tr class="tabla-total">
                            <td class="centrar-texto td-borde"><strong>TOTAL</strong></td>
                            <td class="voto-letras td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                    {{ f_letras($generar_acta->sum('votos')) }}
                                @endif
                            </td>
                            <td class="voto-numeros td-borde">
                                @if($generar_acta[0]->votosvalidos+ $generar_acta[0]->votosnulos > 0)
                                <strong>{{ $generar_acta->sum('votos') }}</strong>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>    
            </div>

             
            <div style="page-break-before: always;"></div>
            <div class="container-pagina">
              
                {{-- encabezados de la hoja  --}}
                <table>
                    <tr class="">
                        <td class="centrar-texto " style="width: 20%;"><img src="images/logos/tn_iee.png"  style="height: 80px; width: auto;"></td>
                        <td class="centrar-texto " style="width: 60%;"><b>ACTA DE RECUENTO</b> <br> Elección del Ayuntamiento de Hermosillo <br><b>Paquete Electoral:</b> {{ $generar_acta[0]->casilla }}</td>
                        <td class="centrar-texto " style="width: 20%;"><img src="{{ public_path('images/logos/tn_2024.png')}}"  style="height: 80px; width: auto;"></td>    
                    </tr>
                </table>
                
                <div><b>VOTACION FINAL OBTENIDA POR LOS/LAS CANDIDATURAS</b></div>
                {{-- {{$suma_casilla}} --}}
                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos == 0)
                    <div class="texto_sin_boletas centrar-texto">Casilla sin <b> Boletas</b></div>
                @endif

                <table class="">
                    <thead>
                        <tr class="">
                            <th class="centrar-texto " style="width: 30%; height: 40px;">PARTIDO O COALICION</th>
                            <th class="centrar-texto " style="width: 60%;">(Con letra)</th>
                            <th class="centrar-texto " style="width: 15%;">(Con número)</th>    
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($suma_casilla as $acta)
                        
                        <tr>
                           
                            @if($acta->rutalogo)
                            <td class="centrar-texto td-borde">
                                <img src="{{ public_path('images/logos/' . $acta->rutalogo) }}" alt="{{ $acta->rutalogo }}" style="height: 50px; width: auto;">
                            </td>
                            @else
                            <td class="centrar-texto td-borde">
                                <b>{{ $acta->descripcion_p }}</b>
                            </td> 
                            @endif
                               
                            <td class="voto-letras td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                {{ f_letras($acta->total) }}
                                @endif
                            </td>
                            <td class="voto-numeros td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                {{ $acta->total }}
                                @endif
                            </td>
                        </tr>

                        @endforeach
                        <tr class="tabla-total">
                            <td class="centrar-texto td-borde"><strong>TOTAL </strong></td>
                            <td class="voto-letras td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                    {{ f_letras($suma_casilla->sum('total')) }}
                                @endif
                            </td>
                            <td class="voto-numeros td-borde">
                                @if($generar_acta[0]->votosvalidos + $generar_acta[0]->votosnulos > 0)
                                    <strong>{{ $suma_casilla->sum('total') }}</strong>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>    
            </div>

    </div>

    <?php
        function f_letras($num)
        {
            $f = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
            return ucfirst($f->format($num));
        }

        function f_tipo_casilla($tipo)
        {
           //$tipo  puede contener letras y numeros, pero me interesa saber... si $tipo contienen la lebre "B"  entonces la indicamos como BASICA, si contiene "C" entonces CONTIGUA, si contiene "E" entonces EXTRAORDINARIA, si contiene "E" preguntar si también contiene la letra C entocos serie EXTRAORDINARIA CONTIGUA
        $tipo_casilla = "";
            if (strpos($tipo, 'B') !== false) {
                $tipo_casilla = "Básica";
            } elseif (strpos($tipo, 'E') !== false && strpos($tipo, 'C') !== false) {
                $tipo_casilla = "Extraordinaria Contigua";
            } elseif (strpos($tipo, 'E') !== false) {
                $tipo_casilla = "Extraordinaria";
            } elseif (strpos($tipo, 'S') !== false) {
                $tipo_casilla = "Especial";
            } elseif (strpos($tipo, 'C') !== false ) {
                $tipo_casilla = "Contigua";
            }    
            return $tipo_casilla;    
        }
    ?>
