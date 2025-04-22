<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe LA-FR-212</title>
    <style>
        @page {
		    margin: 0cm 0cm;
            size: letter portrait;
            font-family: "Helvetica Neue", Helvetica;
	    }
        body {
            margin: 1cm 1cm 2cm;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .header, .footer {
            position: fixed;
            left: 0cm;
            right: 0cm;
            width: 100%;
            text-align: center;
        }
        .header {
            top: 0cm;
            height: 2.5cm;
        }
        .footer {
            bottom: 0cm;
            height: 2cm;
        }
        .center {
            text-align: center;
        }
        .checkboxes label {
            display: inline-block;
            padding-right: 10px;
            white-space: nowrap;
            font-size: 9px;
        }
        .checkboxes input {
            vertical-align: middle;
        }
        .checkboxes label span {
            vertical-align: middle;
        }
        .fac_encabezado {
            width: 100%;
        }
        .top {
            vertical-align: top;
        }
        .table1, .table2, .table3 {
            width: 100%;
            border-collapse: collapse;
        }
        .table1, .table2, .table3 {
            border: 1px solid black;
        }
        .table1 td, .table2 td, .table3 td {
            padding: 0px;
            margin: 0px;
        }
        .table1 td {
            text-align: center;
            border: 1px solid black;
        }        
        .table1 img {
            width: 30%;
            vertical-align: middle;
        }
        .table4 {
            width: 100%;
        }
        .d1 {
            border-bottom: 1px solid black;
        }
        .d1 {
            font-size: 12px;
            font-family: Arial,sans-serif;
            font-weight: 700;
        }
        .d2 {
            font-size: 12px;
            font-family: Roboto,sans-serif,Helvetica,Arial;
            font-weight: 700;
        }
        .d3 {
            font-size: 11px;
            font-family: Roboto,sans-serif,Helvetica,Arial;
            font-weight: 700;
        }
        .border-b {
            border-bottom: 1px solid black;
        }
        .border-r {
            border-right: 1px solid black;
        }
        .col-td-4 {
            float: left;
            width: 33.33333333333333%;;
        }
        .col-td-6 {
            float: left;
            width: 50%;
        }
        .col-td-8 {
            float: left;
            width: 66.66666666666666%;
        }
        .col-td-12 {
            float: left;
            width: 100%;
        }
        .table2 th {
            background: #c0c0c0;
            text-align: left;
        }
        .table2 td {
            border: 1px solid black;
        }
        .table3 th {
            background: #c0c0c0;
        }
        .th1 {
            font-size: 13px;
            border: 1px solid black;
            padding: 5px;
        }
        .th1-1 {
            font-size: 11px;
            border: 1px solid black;
            padding: 5px;
            background: #c0c0c0;
        }
        .th1-2 {
            font-size: 9px;
            border: 1px solid black;
            padding: 5px;
            background: #c0c0c0;
        }
        .th2 {
            font-size: 9px;
            border: 1px solid black;
            padding: 5px;            
        }
        .th2-2 {
            text-align: center;
            font-size: 11px;
            line-height: 13px;
            padding-top: 10px !important;
            position: relative;
            width: 135px;
            line-height: 13px !important;
            background: #fff !important;
        }
        .td1 {
            font-size: 12px;
            font-family: Roboto,sans-serif,Helvetica,Arial;
            font-weight: 700;
            padding: 15px;
        }
        .td1-2 {
            font-size: 11px;
            border: 1px solid black;
            padding: 5px !important;
        }
        .td1-3 {
            font-size: 11px;
            border: 1px solid black;
            padding: 5px !important;
            background: #c0c0c0;
        }
        .td2 {
            font-size: 18px;
            font-family: Roboto,sans-serif,Helvetica,Arial;
            font-weight: 700;
            padding: 15px;
        }
        .td2-2 {
            padding-top: 10px !important;
            font-size: 11px;
            border: 1px solid black;
            padding: 5px !important;
            position: relative;
        }        
        .td3 {
            padding-left: 5px;
            padding-right: 5px;
            font-size: 9px;
        }
        .td3-1 {
            padding-left: 5px;
            padding-right: 5px;
            font-size: 9px;
            background: #c0c0c0;
        }
        .table4 td {
            padding: 2px;
        }
        .table2 p {
            font-size: 11px;
        }
        .espan {
            position: absolute;
            top: 0;
            left: 0;
            background: #c0c0c0;
            font-size: 9px;
            padding: 5px;
            width: 170px;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            width: 171.5px;
            height:13px;
        }
        div.table {
            border: 1px solid black;
            display: table; width: 100%;
        }
        div.tr {
            border: 1px solid black;
            display: table-row;            
        }
        div.td {
            border: 1px solid black;
            display: table-cell;
            padding: 5px;
        }
        div.th {
            border: 1px solid black;
            display: table-cell;
            padding: 5px;
            background: #c0c0c0;
        }
        .table5 {
    width: 100%;
    border-collapse: collapse;
}

.table5 {
    border-top: 0px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    border-bottom: 1px solid black;
}

.table5 tr:first-child th {
    border-top: 0px solid black;
}

.table5 th {
    page-break-before: always;
}
.table5 th {
            background: #c0c0c0;
            text-align: left;
        }
.table5 td {
            border: 1px solid black;
            padding: 0px;
            margin: 0px;
}

    </style>
</head>
<body>
    <div class="header"></div>
    <div class="fac_encabezado">
        <table class="table1">
            <tbody>
                <tr>
                    <td style="width: 15%;"><div class="logo" style="padding: 5px 0px;"><img src="img/logo_fac.png"></div></td>
                    <td style="width: 55%;">
                        <div class="d1" style="padding: 5px 0px">FUERZA AEROESPACIAL COLOMBIANA</div>
                        <div class="d2" style="padding: 5px 0px">FORMATO SEGUIMIENTO CERTIFICACIÓN AERONÁUTICA Y/O RECONOCIMIENTO ORGANIZACIONES</div>
                    </td>
                    <td>
                        <div class="col-td-4">
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Código:</div>
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Versión:</div>
                            <div class="d3 border-r" style="padding: 2px; text-align: right; height: 24px !important;">Vigencia:<br/></div>
                        </div>
                        <div class="col-td-8">
                            <div class="d3 border-b" style="padding: 2px">GA-JELOG-FR-257</div>
                            <div class="d3 border-b" style="padding: 2px">04</div>
                            <div class="d3" style="padding: 2px;">14-12-2023<br/></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table class="table2">
        <thead>
            <tr>
                <th class="th1 center" style="text-align:center">SUBSECCIÓN CERTIFICACIÓN PRODUCTOS AERONÁUTICOS - SUCPA</th>
                <th class="th1 center">1. NÚMERO DE CONTROL PROGRAMA DE CERTIFICACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td1 center" style="background: #c0c0c0;">SEGUIMIENTO CERTIFICACIÓN AERONÁUTICA Y/O RECONOCIMIENTO ORGANIZACIONES</td>
                <td class="td2 center">{{$informelafr212R->Consecutivo}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table5" style="width: 100%; border-collapse: collapse;">
    <thead style="border-top: none; border-bottom: none;">
        <tr style="border-top: none; border-bottom: none;">
            <th class="th1" style="border-top: none; border-bottom: none; font-size: 13px; padding: 5px;">
                2. DESCRIPCIÓN GENERAL PRODUCTO AERONÁUTICO O COMPONENTE
            </th>
        </tr>
    </thead>
</table>
   
                <table class="table5">
                    <thead>
                        <tr>
                            <!--<th class="th2" style="width: 2%;">2.1. Clasificación Producto Aeronáutico</th>-->
                            <th class="th2" style="width: 30%; text-align: center; border-top: none;">2.1. Nombre Producto Aeronáutico o Componente</th>
                            <th class="th2" style="width: 7%; text-align: center; border-top: none;">2.2. Modelo</th>
                            <th class="th2" style="width: 15%; text-align: center; border-top: none;">2.3. Número de Parte (P/N)</th>
                            <th class="th2" style="width: 15%; text-align: center; border-top: none;">2.4. Bases de Certificación o Criterios de Evaluación</th>
                            <th class="th2" style="width: 10%; text-align: center; border-top: none;">2.5. Solicitante / Titular</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!--<td>
                                    <div class="checkboxes">
                                        <label><input type="checkbox" {{($informelafr212R->Clase=='Clase I')? 'checked':''}}><span>Producto Aeronáutico Clase I</span><label>
                                    </div>
                                    <div class="checkboxes">
                                        <label><input type="checkbox" {{($informelafr212R->Clase=='Clase II')? 'checked':''}}><span>Producto Aeronáutico Clase II</span><label>
                                    </div>
                                    <div class="checkboxes">
                                        <label><input type="checkbox" {{($informelafr212R->Clase=='Clase III')? 'checked':''}}><span>Producto Aeronáutico Clase III</span><label>
                                    </div>
                            </td>-->
                            <td class="td3 center" style="border-top: none; border-bottom: none;">{{ $informelafr212R->Nombre }}</td>
                            <td class="td3 center" style="border-top: none; border-bottom: none;">{{ $informelafr212R->Equipo }}</td>
                            <td class="td3">
                                <div class="table" style="display: table; width: 100%; border: none;">
                                    <div class="tr" style="display: table-row; border: none;">
                                        <div class="td" style="display: table-cell; border-top: none; border-left:none; padding: 5px;">Nombre:</div>
                                        <div class="td" style="display: table-cell; border-top: none; border-right:none; padding: 5px;">
                                            {{ ($informelafr212R->ParteNumero) ? $informelafr212R->ParteNumero : '---' }}
                                        </div>
                                    </div>
                                    <div class="tr" style="display: table-row; border: none;">
                                        <div class="td" style="display: table-cell; border-top: none; border-left:none; padding: 5px;">Original (OEM):</div>
                                        <div class="td" style="display: table-cell; border-top: none; border-right:none; padding: 5px;">
                                            {{ ($informelafr212R->NSN) ? $informelafr212R->NSN : '---' }}
                                        </div>
                                    </div>
                                    <div class="tr" style="display: table-row; border: none;">
                                        <div class="td" style="display: table-cell; border-top: none; border-left:none;border-bottom: none; padding: 5px;">Otro (¿Cuál?):</div>
                                        <div class="td" style="display: table-cell; border-top: none; border-right:none;border-bottom: none; padding: 5px;">---</div>
                                    </div>
                                </div>
                            </td>
                            <td class="td3" style="border-top: none; border-bottom: none;">
                                @foreach($programa->programas as $certificacion)
                                    {{ $certificacion->Referencia }} /
                                @endforeach
                            </td>
                            <td class="td3" style="border-top: none; border-bottom: none;">
                                {{ $informelafr212R->NombreEmpresa }} / {{ $informelafr212R->NombreCertificaInfo }}
                            </td>
                        </tr>
                    </tbody>
</table>

<table class="table5" style="border-collapse: collapse; width: 100%; border-right: none; border-bottom: none;">
    <thead>
        <tr>
            <th colspan="2" class="th1" style="border-bottom: none;">
                3. ALCANCE SOLICITADO PARA CERTIFICACIÓN AERONÁUTICA O RECONOCIMIENTO DE ORGANIZACIONES
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 25%; vertical-align: top; border: none;">
            <div class="table" style="border: none;">
    <div class="tr" style="border: none;">
        <div class="th" style="font-size: 11px; border-left: 0.1px solid black; border-right: none;">
            <b>3.1. Marque con "X" si se trata de un Producto Aeronáutico o Reconocimiento de Organización Aeronáutica</b>
        </div>
    </div>
    <div class="tr" style="border: none;">
        <td style="padding: 5px; border: none;">
            <br>
            <div class="checkboxes">
                <label><input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Diseño Aeronáutico')? 'checked':''}}>
                    <span>Aprobación de Diseño Aeronáutico o Componente</span></label>
            </div>
            <div class="checkboxes">
                <label><input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Producción Aeronáutica')? 'checked':''}}>
                    <span>Aprobación de Producción Aeronáutica</span></label>
            </div>
            <div class="checkboxes">
                <label><input type="checkbox" {{($informelafr212R->Alcance=='Reconocimiento Organización Aeronáutica')? 'checked':''}}>
                    <span>Reconocimiento Organización Aeronáutica</span></label>
            </div>
            <br>
        </td>
    </div>
    <!--<div class="table">
                        <div class="tr">
                            <div class="th" style="font-size: 11px;"><b>3.2. Área SECAD Responsable (Marque con "X")</b></div>
                        </div>
                        <div class="tr">
                            <td>
                                <br>
                                <div class="checkboxes">
                                    <label><input type="checkbox" {{($informelafr212R->AccionSECAD=='ACPA')? 'checked':''}}><span>ACPA - Área Certificación Productos Aeronáuticos</span><label>
                                </div>
                                <div class="checkboxes">
                                    <label><input type="checkbox" {{($informelafr212R->AccionSECAD=='AREV')? 'checked':''}}><span>AREV - Área Reconocimiento y Evaluación</span><label>
                                </div>                                
                                <br>
                            </td>
                        </div>
        </div>-->
</div>

            </td>
            <td style="width: 75%; vertical-align: top; border-top: none; border-bottom: none; border-left: none;border-right: none;">
                <table class="table2" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="5" class="th1-1 center" style="border-top: none;">3.3. Equipo de Certificación SUCPA</th>
                        </tr>
                        <tr>
                            <th class="th1-1 center" height="30" style="text-align:center;">Cargo</th>
                            <th class="th1-1 center" height="30" style="text-align:center;">Grado</th>
                            <th class="th1-1 center" height="30" style="text-align:center;">Nombres y Apellidos</th>
                            <th class="th1-1 center" height="30" style="text-align:center;">Especialidad Aeronáutica</th>
                            <th class="th1-1 center" height="30" style="text-align:center;">Nivel de Competencia</th>
                        </tr>
                    </thead>
                    <tbody style="border-bottom: none;">
                        <tr>
                            <td class="td3-1 center" height="30">Responsable Programa</td>
                            <td class="td3 center" height="30">{{ $jefe->grado->Abreviatura ?? '' }}</td>
                            <td class="td3 center" height="30">{{ $jefe->Nombres }} {{ $jefe->Apellidos }}</td>
                            <td class="td3 center" height="30">{{ $jefe->EAC->Especialidad ?? '' }}</td>
                            <td class="td3 center" height="30">{{ $jefe->NivelCompetencia->Denominacion ?? '' }}</td>
                        </tr>
                        <tr>
                            <td class="td3-1 center" height="30">Responsable Suplente</td>
                            <td class="td3 center" height="30">
                                @if($suplente && is_object($suplente->grado) && isset($suplente->grado->Abreviatura))
                                    {{ $suplente->grado->Abreviatura }}
                                @endif
                            </td>
                            <td class="td3 center" height="30">
                                @if($suplente)
                                    {{ $suplente->Nombres }} {{ $suplente->Apellidos }}
                                @endif
                            </td>
                            <td class="td3 center" height="30">
                                @if($suplente && $suplente->EAC && $suplente->EAC != "N/A")
                                    {{ $suplente->EAC->Especialidad }}
                                @elseif(isset($suplente->EAC) && $suplente->EAC != "N/A")
                                    {{ $suplente->EAC }}
                                @endif
                            </td>
                            <td class="td3 center" height="30">
                                @if($suplente && $suplente->NivelCompetencia)
                                    {{ $suplente->NivelCompetencia->Denominacion }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="td3-1 center">Especialista No. 1</td>
                            @if(count($especialistas) > 0)
                                <td class="td3 center" height="30">{{ $especialistas[0]->grado != "N/A" ? $especialistas[0]->grado->Abreviatura : $especialistas[0]->grado }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[0]->Nombres }} {{ $especialistas[0]->Apellidos }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[0]->EAC != "N/A" ? $especialistas[0]->EAC->Especialidad : $especialistas[0]->EAC }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[0]->NivelCompetencia->Denominacion }}</td>
                            @else
                                <td height="30"></td><td height="30"></td><td height="30"></td><td height="30"></td>
                            @endif
                        </tr>
                        <tr>
                            <td class="td3-1 center">Especialista No. 2</td>
                            @if(count($especialistas) > 1)
                                <td class="td3 center" height="30">{{ $especialistas[1]->grado != "N/A" ? $especialistas[1]->grado->Abreviatura : $especialistas[1]->grado }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[1]->Nombres }} {{ $especialistas[1]->Apellidos }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[1]->EAC != "N/A" ? $especialistas[1]->EAC->Especialidad : $especialistas[1]->EAC }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[1]->NivelCompetencia->Denominacion }}</td>
                            @else
                                <td height="30"></td><td height="30"></td><td height="30"></td><td height="30"></td>
                            @endif
                        </tr>
                        <tr style="border-bottom: none;">
                            <td class="td3-1 center">Especialista No. 3</td>
                            @if(count($especialistas) > 2)
                                <td class="td3 center" height="30">{{ $especialistas[2]->grado != "N/A" ? $especialistas[2]->grado->Abreviatura : $especialistas[2]->grado }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[2]->Nombres }} {{ $especialistas[2]->Apellidos }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[2]->EAC != "N/A" ? $especialistas[2]->EAC->Especialidad : $especialistas[2]->EAC }}</td>
                                <td class="td3 center" height="30">{{ $especialistas[2]->NivelCompetencia->Denominacion }}</td>
                            @else
                                <td height="30"></td><td height="30"></td><td height="30"></td><td height="30"></td>
                            @endif
                        </tr>
                        <tr>
                            <td class="td3-1 center" style="border-bottom: 1px solid #c0c0c0">Especialista No. 4</td>
                            @if(count($especialistas) > 3)
                                <td class="td3 center" height="30" style="border-bottom: 1px solid #c0c0c0">{{ $especialistas[3]->grado != "N/A" ? $especialistas[3]->grado->Abreviatura : $especialistas[3]->grado }}</td>
                                <td class="td3 center" height="30" style="border-bottom: 1px solid #c0c0c0">{{ $especialistas[3]->Nombres }} {{ $especialistas[3]->Apellidos }}</td>
                                <td class="td3 center" height="30" style="border-bottom: 1px solid #c0c0c0">{{ $especialistas[3]->EAC != "N/A" ? $especialistas[3]->EAC->Especialidad : $especialistas[3]->EAC }}</td>
                                <td class="td3 center" height="30" style="border-bottom: 1px solid #c0c0c0">{{ $especialistas[3]->NivelCompetencia->Denominacion }}</td>
                            @else
                                <td height="30" style="border-bottom: 1px solid #c0c0c0"></td><td height="30" style="border-bottom: 1px solid #c0c0c0"></td><td height="30" style="border-bottom: 1px solid #c0c0c0"></td><td height="30" style="border-bottom: 1px solid #c0c0c0"></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

    <table class="table2">
        <thead>
            <tr>
                <th colspan="7" class="th1 center">4. SEGUIMIENTO DEL PROGRAMA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="th1-1 top">No.</th>
                <th class="th1-1 top">4.1. Actividad (Según aplique al tipo de certificación o reconocimiento)</th>
                <th class="th1-1 top">4.2. Responsable</th>
                <td colspan="2" class="td2-2 center" style="position: relative;background: #fff !important;font-size: 9px !important;width: 160px !important;padding: 0 !important; margin: 0 !important;">
                    <div class="espan"><b>4.3. Representante / Responsable</b></div>
                    <div style="position: absolute;width:90px;top: 24px; left: 0; border-right: 1px solid black;height: 93px;">
                        <div style="width: 80px;float: left;padding: 20px 5px 5px !important; border-top: none;"><strong>Condición</strong> (Pendiente / Proceso / Cumplido)</div>
                    </div>
                    <div style="position: absolute;width:80px;top: 24px; left: 0;height: 92px;">
                        <div style="width: 80px;float: left;margin-top: 30px; padding: 5px !important;"><b>Porcentaje de Avance (%)<b></div>
                    </div>
                </td>                
                <th class="th1-1 top" style="width: 60px !important;">4.4 Fecha<span style="font-size: 9px !important;">(DD/MM/AA)<span></th>
                <th class="th1-1 top" style="width: 20px !important;">4.5 Observaciones</th>
            </tr>
            @forelse ($informeHistorialPrograma as $informeHistorialProgramaR)
            <tr>
                <td class="td1-2 center"><strong>{{str_replace('.0', '', number_format($informeHistorialProgramaR->Orden, 1))}}</strong></td>
                <td class="td1-2"><strong>{{$informeHistorialProgramaR->Actividad}}</strong></td>
                <td class="td1-2"><strong>{{$informeHistorialProgramaR->Responsable}}</strong></td>
                <td class="td1-3 center" style="width: 80px !important;"><strong>{{$informeHistorialProgramaR->Situacion}}</strong></td>
                <td class="td1-3 center" style="width: 80px !important;">{{($informeHistorialProgramaR->Porcentaje)?$informeHistorialProgramaR->Porcentaje.'%':''}}</td>                
                <td class="td1-2 center" style="width: 60px !important;">{{ date('d/m/Y', strtotime($informeHistorialProgramaR->Fecha)) }}</td>
                <td class="td1-2 center" style="width: 20px !important;padding-left: 5px !important; padding-right: 5px !important;">
                    <p>{{$informeHistorialProgramaR->Evidencias}}</p>
                    @if($informeHistorialProgramaR->Documentos != null)
                    <a href="{{asset($informeHistorialProgramaR->Documentos)}}" target="_blank"><strong>Ver documento</strong></a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="center">No hay datos para mostrar informe</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <table class="table2">
        <thead>
            <th colspan="2" class="th1">5. PORCENTAJE DE AVANCE DEL PROGRAMA</th>
        </thead>
        <tbody>
            <tr>
                <th class="th1-1 center">5.1. Criterio</th>
                <th class="th1-1 center">5.2. Valor Porcentual de Avance (%)</th>
            </tr>
            <tr>
                <td class="center"><p style="padding: 5px !important;font-size: 10px;">Relación del <u>Número de Actividades Cumplidas </u> con respecto al <u>Número Total de Actividades del Procedimiento</u></p></td>
                <td class="center"><p style="padding: 5px !important;font-size: 10px;">{{$porcentajeTotal}}%</p></td>
            </tr>
        </tbody>
    </table>
    <table class="table2">
        <thead>
            <tr>
                <th colspan="6" class="th1">6. ESPACIO EXCLUSIVO SUCPA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td colspan="6" style="background: #c0c0c0;font-size: 10px; padding: 5px !important;">La Autoridad Aeronáutica Colombiana Aviación de Estado (AAAES) representada por SUCPA, se reserva el derecho de aceptación de los datos registrados en el presente documento.</td>
            </tr>
            <tr>
                <td class="center" style="background: #c0c0c0;font-size: 11px; padding: 5px !important;"><strong>Marcar con una "X"</strong></td>
                <td class="center" style="background: #c0c0c0;font-size: 11px; padding: 5px !important;"><strong>GRADO NOMBRES Y APELLIDOS</strong></td>
                <td class="center" style="background: #c0c0c0;font-size: 11px; padding: 5px !important;"><strong>CARGO</strong></td>
                <td colspan="2" class="center" style="background: #c0c0c0;font-size: 11px; padding: 5px !important;"><strong>FIRMA</strong></td>
                <td class="center" style="background: #c0c0c0;font-size: 11px; padding: 5px !important;"><strong>FECHA</strong></td>
            </tr>
            <tr>                    
                <td style="font-size: 12px; padding: 5px 5x 5px 10px !important;">
                    <div class="checkboxes">
                        <label><input type="checkbox"><span>Aceptado</span><label>
                    </div>
                    <div class="checkboxes">
                        <label><input type="checkbox"><span>Denegado</span><label>
                    </div>
                </td>
                <td class="center" style="font-size: 11px; padding: 5px !important;">{{$jefe->grado->Abreviatura ?? ''}}. {{ $jefe->Nombres }} {{ $jefe->Apellidos }}</td>
                <td class="center" style="font-size: 9px; padding: 5px !important;">Responsable Programa de Certificación SECAD</td>
                <td colspan="2" class="center" style="font-size: 11px; padding: 5px !important;"></td>
                <td class="center" style="font-size: 11px; padding: 5px !important;">{{ date('d-m-Y') }}</td>
            </tr>
            <tr>                    
                <td style="font-size: 12px; padding: 5px 5x 5px 10px !important;">
                    <div class="checkboxes">
                        <label><input type="checkbox"><span>Aceptado</span><label>
                    </div>
                    <div class="checkboxes">
                        <label><input type="checkbox"><span>Denegado</span><label>
                    </div>
                </td>
                <td class="center" style="font-size: 11px; padding: 5px !important;">&nbsp;</td>
                <td class="center" style="font-size: 9px; padding: 5px !important;">Jefe Subsección Certificación Productos Aeronáuticos <br/>(SUCPA)</td>
                <td colspan="2" class="center" style="font-size: 11px; padding: 5px !important;">&nbsp;</td>
                <td class="center" style="font-size: 11px; padding: 5px !important;">{{ date('d-m-Y') }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table2">
        <thead>
            <tr>
                <th class="th1-1 center" style="width: 500px;">6.1 Observaciones</th>
                <th class="th1-1 center">6.2 Sello SUCPA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-size: 11px; padding: 0px 5px !important;height:100px;">
                    @if($obervaciones != null)
                    <p>{{$obervaciones->Observacion}}</p>
                    @else
                    <p></p>
                    @endif
                </td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <table class="table2">
        <tbody>
            <tr>
                <td style="font-weight: 700; font-size: 11px; text-align: center; font-style: italic;">
                    <p>Fuerza Aeroespacial Colombiana (FAC) - Autoridad Aeronáutica de la Aviación de Estado (AAAE) - Decreto No. 2937 del 05-Agosto-2010</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>