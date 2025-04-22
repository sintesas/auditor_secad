<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Aprobación Horas Hombre Por Programa</title>
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


.table5 tr:first-child td {
    border-top: 0px solid black;
}
.table5 th {
    page-break-before: always;
}
.table5 th {
            background: #c0c0c0;
            text-align: left;
            border-top: 0px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    border-bottom: 1px solid black;
        }
        .table5 td {
            border-top: 0px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    border-bottom: 1px solid black;
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
                        <div class="d2" style="padding: 7px 0px">FORMATO REPORTE DE HORAS HOMBRE POR PROGRAMA DE CERTIFICACIÓN</div>
                    </td>
                    <td>
                        <div class="col-td-4">
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Código:</div>
                            <div class="d3 border-r border-b" style="padding: 2px; text-align: right;">Versión:</div>
                            <div class="d3 border-r" style="padding: 2px; text-align: right; height: 35px !important;">Vigencia:<br/></div>
                        </div>
                        <div class="col-td-8">
                            <div class="d3 border-b" style="padding: 2px">GA-JELOG-FR-439</div>
                            <div class="d3 border-b" style="padding: 2px">01</div>
                            <div class="d3" style="padding: 2px;">20-01-2025<br/></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; border-top:0px">
    <thead>
        <tr>
            <th style="background-color: #d3d3d3; text-align: center; font-weight: bold;width:318px;" colspan="3">
                OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD
            </th>
           
        </tr>
    </thead>
   
</table>

<table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: -1px;">
    <thead>
        <tr>
        <th style="background-color: #d3d3d3; text-align: center; font-weight: bold;width:346px;vertical-align: middle" colspan="3">
        REPORTE DE HORAS HOMBRE POR PROGRAMA
            </th>
            
        </tr>
    </thead>
    
</table>
<div class="footer">
    </div>


    <table class="table5">
        <thead>
            <tr>
                <th class="th1">1. DATOS DEL PROGRAMA DE CERTIFICACIÓN</th>
            </tr>
        </thead>
    </table>
                    <table class="table3">
                        <tbody>
                            <tr>
                            <td colspan="4" class="center" style="border-left: 1px solid black;background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>1.1. Numero de Programa</strong></td>
                             <td colspan="2" class="center" style="border-left: 1px solid black;font-size: 11px; padding: 5px !important;">{{ $programa->Consecutivo}} </td>
                             <td colspan="4" class="center" style="border-left: 1px solid black;background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>1.2. Empresa Solicitante del Certificado</strong></td>           
                             <td colspan="2" class="center" style="border-left: 1px solid black;font-size: 9px; padding: 5px !important;">{{$Empresa->NombreEmpresa}}</td>
                             <td colspan="4" class="center" style="border-left: 1px solid black;background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>1.3. Fecha de Reporte</strong></td>           
                             <td colspan="2" class="center" style="border-left: 1px solid black;font-size: 9px; padding: 5px !important;"><?php echo date('d-m-Y'); ?></td>
                            </tr>       
                        </tbody>
                    </table>
              


                    <table class="table2">
                    <tbody>
        <tr>
                            <td  colspan="4" class="center" style="background: #c0c0c0; font-size: 11px; padding: 5px !important;"><strong>1.4. Nombre del Programa</strong></td>
                            <td  colspan="14" class="center" style="font-size: 11px; padding: 5px !important;">{{ $programa->Proyecto}} </td>
                            </tr>     
    </tbody>
   
</table>


<table class="table2">
    <thead>
        <tr>
            <th colspan="19" class="th1">2. REGISTRO DE HORAS REALIZADAS</th>
        </tr>
        <tr>
            <th colspan="1" class="th2" style="width: 10px;height:25px;border-bottom: none;text-align:center">No.</th>
            <th colspan="2" class="th2" style="width: 100px;border-bottom: none;text-align:center">2.1. Identificación</th>
            <th colspan="2" class="th2" style="width: 100px;border-bottom: none;text-align:center">2.2. Nombres y Apellidos</th>
            <th colspan="12" class="th2" style="width: 100px;text-align:center">2.3. Roles</th>
            <th colspan="2" class="th2" style="width: 200px;border-bottom: none;text-align:center">2.4. Total Horas Por Persona</th>
        </tr>
        <tr>
            <th colspan="1" style="border-left: 1px solid black; border-right: 1px solid black;"></th>
            <th colspan="2" style="border-right: 1px solid black;"></th>
            <th colspan="2" style="border-top: none;"></th>

            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.1. Responsable de Programa</th>
            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.2. Especialista de Certificación</th>
            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.3. Técnico Especialista de Certificación</th>      
            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.4. Auditor Lider</th>            
            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.5. Auditor</th>            
            <th colspan="2" class="th2" style="text-align: center; border-right: 1px solid black;">2.3.6. Profesional Asesor</th>            
            <th colspan="2" style="border-top: none;"></th>
        </tr>
    </thead>
    @php
    // Inicializamos las variables para acumular las horas
    $totalResponsablePrograma = 0;
    $totalEspecialistaCertificacion = 0;
    $totalTecnicoEspecialista = 0;
    $totalAuditorLider = 0;
    $totalAuditor = 0;
    $totalProfesionalAsesor = 0;
    $totalHorasEspecialista = 0;
    $contador = 1;
@endphp

<tbody>
    @foreach ($personas as $personal)
        <tr>
            <td colspan="1" class="td3 center" style="width: 10px; height:25px;">{{ $contador }}</td> 
            <td colspan="2" class="td3 center" style="width: 100px">{{ $personal->Cedula }}</td> 
            <td colspan="2" class="td3 center" style="width: 100px">{{ $personal->Nombres }}</td> 

            <!-- Mostrar horas por rol -->
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Responsable de Programa'] ?? 0 }}</td> 
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Especialista de Certificacion'] ?? 0 }}</td> 
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Tecnico Especialista de Certificacion'] ?? 0 }}</td> 
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Auditor Lider'] ?? 0 }}</td>
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Auditor'] ?? 0 }}</td>
            <td colspan="2" class="td3 center">{{ $personal->rolesHoras['Profesional Asesor'] ?? 0 }}</td>
            <td colspan="2" class="td3 center" style="width: 200px">
                {{ $personal->totalHorasEspecialista ?? 0 }}
            </td>         
        </tr>

        <!-- Acumulamos las horas para cada rol -->
        @php
            $totalResponsablePrograma += $personal->rolesHoras['Responsable de Programa'] ?? 0;
            $totalEspecialistaCertificacion += $personal->rolesHoras['Especialista de Certificacion'] ?? 0;
            $totalTecnicoEspecialista += $personal->rolesHoras['Tecnico Especialista de Certificacion'] ?? 0;
            $totalAuditorLider += $personal->rolesHoras['Auditor Lider'] ?? 0;
            $totalAuditor += $personal->rolesHoras['Auditor'] ?? 0;
            $totalProfesionalAsesor += $personal->rolesHoras['Profesional Asesor'] ?? 0;
            $totalHorasEspecialista += $personal->totalHorasEspecialista ?? 0;
        @endphp

        @php $contador++; @endphp
    @endforeach
</tbody>

<!-- Mostrar las sumas totales de cada rol -->
<tfoot>
    <tr>
        <th colspan="5" class="th2" style="text-align: center; border-right: 1px solid black;">2.5. Total de Horas por Rol</th>
        <td colspan="2" class="td3 center">{{ $totalResponsablePrograma }}</td>
        <td colspan="2" class="td3 center">{{ $totalEspecialistaCertificacion }}</td>
        <td colspan="2" class="td3 center">{{ $totalTecnicoEspecialista }}</td>
        <td colspan="2" class="td3 center">{{ $totalAuditorLider }}</td>
        <td colspan="2" class="td3 center">{{ $totalAuditor }}</td>
        <td colspan="2" class="td3 center">{{ $totalProfesionalAsesor }}</td>
        <td colspan="2" class="td3 center" style="width: 200px">
            {{ $totalHorasEspecialista }}
        </td>
    </tr>
</tfoot>

    </table>

    <table class="table2">
    <thead>
        <tr>
            <th colspan="9" class="th1">3. FIRMAS</th>
        </tr>
       
    </thead>
    <thead>
        <tr>
            <th colspan="3" class="th2" style="width: 200px;text-align: center; height:10px;">REVISÓ</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FIRMA</th>
            <th colspan="3" class="th2" style="width: 200px;text-align: center">FECHA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
                 <br> 
                <strong></strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>
        <tr>
            <td colspan="3" class="td3 center" style="width: 200px; word-wrap: break-word; white-space: normal; overflow: hidden; height: 50px;">
               <br> 
                <strong></strong> 
            </td>
            <td colspan="3" class="td3 center" style="width:200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
            <td colspan="3" class="td3 center" style="width: 200px;word-wrap: break-word; white-space: normal; overflow: hidden;"></td>
        </tr>
    </tbody>

</table>



<div class="footer">
    </div>
</body>
</html>