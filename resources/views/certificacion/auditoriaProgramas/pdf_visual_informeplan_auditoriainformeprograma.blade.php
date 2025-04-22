<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Auditoría</title>
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
            table-layout: fixed;
            border-collapse: collapse;
        }
        .table1, .table2, .table3 {
            border: 1px solid black;
        }
        .table1 td, .table2 td, .table3 td {
            padding: 0px;
            margin: 0px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .table4 {
    width: 100%;
    border-collapse: collapse;
}

.table4 {
    border-top: 0.1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    border-bottom: 1px solid black;
}

.table4 tr:first-child td {
    border-top: 0.1px solid black;
}

.table4 td {
    padding: 0px;
    margin: 0px;
    border-top: none; 
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
        .table4 td {
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
            border-bottom: 2px solid black;
            border-right: 1px solid black;
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
        .footer::after {
            content: "Página " counter(page) " de [[total_pages]]";
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
        }
    </style>
</head>
<body>
    <div class="header"></div>
    <div class="fac_encabezado">
        <table class="table1">
            <tbody>
                <tr>
                    <td style="width: 15%;"><div class="logo" style="padding: 7px 0px;"><img src="img/logo_fac.png"></div></td>
                    <td style="width: 55%;">
                        <div class="d1" style="padding: 7px 0px">FUERZA AEROESPACIAL COLOMBIANA</div>
                        <div class="d2" style="padding: 7px 0px">FORMATO INFORME AUDITORÍA</div>
                    </td>
                    <td>
                        <div class="col-td-4">
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Código:</div>
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Versión:</div>
                            <div class="d3 border-r" style="padding: 2px; text-align: right; height: 20px !important;">Vigencia:<br/></div>
                        </div>
                        <div class="col-td-8">
                            <div class="d3 border-b" style="padding: 2px">GA-JELOG-FR-402</div>
                            <div class="d3 border-b" style="padding: 2px">03</div>
                            <div class="d3" style="padding: 2px;">20-01-2025<br/></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; border-top: 0px solid black; margin-top: 0.2px">
    <thead>
        <tr>
            <th style="background-color: #d3d3d3; text-align: center; font-weight: bold; width: 313px; font-size: 12px" colspan="3">
                OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD
            </th>
            <th style="text-align: center; font-weight: bold; border: 1px solid black; border-top: 0px; font-size: 10px; padding: 0;" rowspan="1">
                <div style="background-color: #d3d3d3; padding: 5px 0; width: 99.8%; display: block;border-bottom:1px solid black;margin-top:0.2px ">
                    1. NÚMERO DE PROGRAMA
                </div>
                <div style="font-weight: normal; font-size: 12px; padding: 5px 0;">
                    {{$auditoriaProgramas->Consecutivo}}
                </div>
            </th>
        </tr>
    </thead>
</table>


<table style="width: 100%; border-collapse: collapse; border: 1px solid black; border-bottom: 0px; margin-top: -1px;">
    <thead>
        <tr>
        <th style="width:70%;background-color: #d3d3d3; text-align: center; font-weight: bold;width:346px;vertical-align: middle;font-size:14px" colspan="3">
        INFORME AUDITORÍA
            </th>
            <th style="width: 30%; text-align: center; font-weight: bold; border: 1px solid black; border-bottom: 0px; font-size: 10px; padding: 0;">
                <div style="background-color: #d3d3d3; padding: 5px 0; width: 99.8%; display: block;border-bottom:1px solid black">
                    1.1. Fecha Informe Auditoría
                </div>
                <div style="font-weight: normal; font-size: 12px; padding: 5px 0;">
                {{$informe->fecha_informe_auditoria}}
                </div>
            </th>
        </tr>
    </thead>
</table>
<div class="footer">
    </div>


    <table class="table2">
    <thead>
        <tr>
            <th class="th1" colspan="5">2. DATOS DE LA ORGANIZACIÓN</th>
        </tr>
    </thead>
    <tbody>
        <!-- Fila de encabezados -->
    <tr>
            <th class="th2" style="width: 20%;text-align:center">2.1. Organización / Razón Social</th>
            <th class="th2" style="width: 20%;text-align:center">2.2. N.I.T</th>
            <th class="th2" style="width: 20%;text-align:center">2.3. País</th>
            <th class="th2" style="width: 20%;text-align:center">2.4. Ciudad - Departamento</th>
            <th class="th2" style="width: 20%;text-align:center">2.5. Dirección</th>
        </tr>
        <!-- Fila con los datos -->
        <tr>
            <td class="td3 center" style="height:25px;">{{$Empresa->NombreEmpresa}}</td>
            <td class="td3 center">{{$Empresa->Nit}}</td>
            <td class="td3 center">{{$Empresa->NombreListaPais}}</td>
            <td class="td3 center">{{$Empresa->NombreListaCiudad}} - {{$Empresa->NombreListaDepartamento}}</td>
            <td class="td3 center">{{$Empresa->Direccion}}</td>
        </tr>
    </tbody>
    <tbody>
       <tr>
            <th class="th2" style="width: 20%;text-align:center">2.6. Representante Legal</th>
            <th class="th2" style="width: 20%;text-align:center">2.7. Identificación</th>
            <th class="th2" style="width: 20%;text-align:center">2.8. Cargo</th>
            <th class="th2" style="width: 20%;text-align:center">2.9. Correo Electrónico / Página Web</th>
            <th class="th2" style="width: 20%;text-align:center">2.10. Teléfono</th>
        </tr>
        <tr>
            <td class="td3 center" style="height:25px;">{{$Empresa->NombreCertificaInfo}}</td>
            <td class="td3 center">{{$Empresa->NumeroDocumento}}</td>
            <td class="td3 center">{{$Empresa->CargoCertificaInfo}}</td>
            <td class="td3 center">{{$Empresa->Email}} / {{$Empresa->PaginaWeb}}</td>
            <td class="td3 center">{{$Empresa->Telefono}}</td>
        </tr>
    </tbody>
</table>
    <table class="table5">
    <thead>
            <tr>
                <th colspan="12" class="th1">3. DATOS GENERALES DE LA AUDITORÍA</th>
            </tr>
        </thead>          <tr>
                                <th  colspan="3" class="th2" style="width: 185px;height:25px;text-align:center">3.1. Certificado Aplicable</th>
                                <th  colspan="3" class="th2" style="width: 100px;text-align:center">3.2. Auditoría</th>
                                <th  colspan="3" class="th2" style="width: 100px;text-align:center">3.3. Modalidad Auditoría</th>
                                <th  colspan="1" class="th2" style="width: 100px;text-align:center">3.4. Fecha Auditoría</th>
                                <th  colspan="2" class="th2" style="width: 200px;text-align:center">3.5. Normas y/o Criterios de la Auditoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  colspan="3" class="td3 center" style="width: 185px; height:25px;">{{$planAuditoria->certificado_aplicable}}</td>
                                <td colspan="3" class="td3 center" style="width: 100px">{{$planAuditoria->plan_auditoria}}</td>
                                <td colspan="3" class="td3 center" style="width: 100px">{{$planAuditoria->modalidad}}</td>
                                <td colspan="1" class="td3 center" style="width: 100px">
                                {{$planAuditoria->fecha_auditoria}}
                                </td>
                                <td colspan="2" class="td3" style="width: 200px;">
                                @foreach ($criterios as $criterio) 
                                        {{$criterio->NombreCriterio}} ,
                                @endforeach
                                </td>
                            </tr>
                        </tbody>
            </tr>
    </table>
    <table class="table5">
    <thead>
        <tr>
            <th colspan="7" class="th1 center">4. OBJETIVO DE LA AUDITORÍA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7" class="td1-2" style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal; page-break-inside: auto; text-align: justify;">{{ $planAuditoria->objetivo_auditoria }}</td>
    
        </tr>
    </tbody>
</table>

<table class="table5">
    <thead>
        <tr>
            <th colspan="7" class="th1 center">5. ALCANCE DE LA AUDITORÍA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7" class="td1-2" style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal; page-break-inside: auto; text-align: justify;">{{ $planAuditoria->alcance_auditoria }}</td>
    
        </tr>
    </tbody>
</table>

<table class="table5">
    <thead>
        <tr>
            <th colspan="7" class="th1">6. EQUIPO AUDITOR</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th colspan="1" class="th2" style="text-align:center;width: 10%;height:25px;width:20px"> No.</th>
            <td colspan="3" class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>6.1. Nombres y Apellidos Integrantes Equipo Auditor</strong></td>
            <td colspan="3" class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>6.2. Rol</strong></td>
        </tr>
        
        @php $contador = 1; @endphp
        @foreach ($equipoAuditor as $equipoA) 
        <tr>
             <td colspan="1" class="td3 center">{{ $contador }}</td>
            <td colspan="3" class="center" style="font-size: 11px; padding: 5px !important;">{{ $equipoA->integrante }}</td>
            <td colspan="3" class="center" style="font-size: 9px; padding: 5px !important;">{{ $equipoA->Rol }}</td>
        </tr>
        @php $contador++; @endphp
        @endforeach
    </tbody>
</table>




                    <table class="table5">
    <thead>
        <tr>
            <th colspan="7" class="th1 center">7. DESARROLLO DE LA AUDITORÍA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td colspan="7" class="td1-2" style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal; page-break-inside: auto; text-align: justify;">
    {{ $informe->desarrollo_auditoria }}
</td>


    
        </tr>
    </tbody>
</table>

<table class="table5">
    <thead>
        <tr>
            <th colspan="12" class="th1">8. HALLAZGOS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th colspan="1" class="th2" style="text-align:center;height:25px;">No.</th>
            <td colspan="2" class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>8.1. Tipo de Hallazgo</strong></td>
            <td colspan="9" class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;width: 490px"><strong>8.2. Descripción del Hallazgo</strong></td>
        </tr>
        @php $contador = 1; @endphp
        @foreach ($hallazgosInforme as $hallazgosI) 
        <tr>
        <td colspan="1" class="td3 center">{{ $contador }}</td>
            <td colspan="2" class="center" style="font-size: 11px; padding: 5px !important;">{{ $hallazgosI->TipoHallazgo }}</td>
            <td colspan="9" class="td3" style="font-size: 9px; padding-left: 10px !important; padding-right: 10px !important; text-align: justify; line-height: 1.5; word-wrap: break-word; white-space: normal; overflow-wrap: break-word; max-width: 490px;">
    {{ $hallazgosI->descripcion }}
</td>
        </tr>
        @php $contador++; @endphp
        @endforeach
    </tbody>
</table>

<table class="table5">
    <tbody>
        <tr>
            <td  class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;width:45%; border-top:0px;"><strong>8.3. Total Conformidades</strong></td>
            <td  class="center" style="font-size: 11px; padding: 5px !important;width:5%;border-top:0px;">{{ $informe->total_conformidades }}</td>
            <td  class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;width:45%;border-top:0px;"><strong>8.4. Total Oportunidad de Mejora</strong></td>           
            <td  class="center" style="font-size: 9px; padding: 5px !important;width:5%;border-top:0px;">{{ $informe->total_oportunidad_mejora }}</td>
        </tr>
    </tbody>
</table>
<table class="table5">
    <tbody>
        <tr>
            <td class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;width:45%; border-top:0px"><strong>8.5 Total No Conformidades Menor</strong></td>
            <td class="center" style="font-size: 11px; padding: 5px !important;width:5%; border-top:0px">{{ $informe->total_no_conformidades_menor }}</td>
            <td  class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;width:45%; border-top:0px"><strong>8.6. Total No Conformidades Mayor</strong></td>           
            <td class="center" style="font-size: 9px; padding: 5px !important;width:5%; border-top:0px">{{ $informe->total_no_conformidades_mayor }}</td>
        </tr>
    </tbody>
</table>

<table class="table5">
    <thead>
        <tr>
            <th colspan="7" class="th1 center">9. CONCLUSIONES DEL INFORME</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td colspan="7" class="td1-2" style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; white-space: normal; page-break-inside: auto;text-align: justify;">
                {{ $informe->conclusiones_hallazgos }}
            </td>    
        </tr>
    </tbody>
</table>


<table class="table5">
                   <thead>
        <tr>
            <th colspan="9" class="th1">10. FIRMAS</th>
        </tr>
    </thead>
    </table>
                    <table class="table5">
    <tbody>
        <!-- ELABORÓ -->
        <tr>
            <th colspan="3" class="th2" style="width: 200px;text-align: center; height:10px;">ELABORÓ</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FIRMA</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FECHA</th>
        </tr>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
                {{ $planAuditoria->auditor_lider }} <br> 
                <strong>Auditor Líder</strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>

        <!-- REVISÓ -->
        <tr>
            <th colspan="3" class="th2" style="width: 200px;text-align: center; height:10px;">REVISÓ</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FIRMA</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FECHA</th>
        </tr>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
                {{ $planAuditoria->Firma1 }} <br> 
                <strong>{{ $planAuditoria->Cargo_Firma1 }}</strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
                {{ $planAuditoria->Firma2 }} <br> 
                <strong>{{ $planAuditoria->Cargo_Firma2 }}</strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>

        <!-- ACEPTÓ -->
        <tr>
            <th colspan="3" class="th2" style="width: 200px;text-align: center; height:10px;">ACEPTÓ</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FIRMA</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FECHA</th>
        </tr>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
                {{ $planAuditoria->representante_legal }} <br> 
                <strong>Representante Legal</strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>
    </tbody>
</table>

    
 

</body>
</html>