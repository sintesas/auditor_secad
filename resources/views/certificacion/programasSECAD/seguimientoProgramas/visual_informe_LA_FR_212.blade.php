@extends('partials.card_big')
@extends('layout')
@section('title')
Informe LA-FR-212
@endsection()
@section('content')
@section('card-content')
@section('form-tag')
{!! Form::model($informelafr212) !!}
{{ csrf_field()}}
@endsection
@section('card-title')
{{-- Informe Inspección IC FR 08 --}}
{{ Breadcrumbs::render('lafr212') }}
@endsection()
@section('card-content')       
<div class="">
   <!-- BEGIN BASE-->
   <div id="">
      <!-- BEGIN OFFCANVAS LEFT -->
      <div >
      </div>
      <!--end .offcanvas-->
      <!-- END OFFCANVAS LEFT -->
      <!-- BEGIN CONTENT-->
      <div id="">
         <section style="padding: 10px !important;"  class="form-fac">
            @if($informelafr212R)
            <div class="content">


            <div class="row borderT borderL borderR">
                  <div class="row">
                     <div class="col-sm-3 logoFacWOB total-center" style="width: 18%; padding:0; height: 75px;"> 
					 <img src="../img/logo_fac.png" style="width: 25%"></div>
                     <div class="col-sm-6 borderL borderA" style="width: 60%;">
                        <div class="col-sm-12 borderA">
                           <div class="col-sm-12 borderB" style="padding: 0; margin: 0; text-align: center;">
                              <p style="margin: 0; font-family: 'Arial', sans-serif; font-weight: 700;">FUERZA AÉREA COLOMBIANA</p>
                           </div>
                           <div class="col-sm-12 total-center" style=" max-height: 50px; min-height: 50px;">
                              <p style="font-size: 24px; font-weight: 700;">SECAD: SEGUIMIENTO CERTIFICACIÓN AERONÁUTICA </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-3 borderL borderA" style="width: 22%;">
                        <div class="col-sm-5 borderA">
                           <div class="col-sm-12 borderB borderA borderR down table-header-3 text-right">Código:</div>
                           <div class="col-sm-12 borderB borderA borderR down table-header-3 text-right">Versión No:</div>
                           <div class="col-sm-12  borderA borderR down table-header-3 text-right">Vigencia:</div>
                        </div>
                        <div class="col-sm-6 borderA" style="
                           width: 133px;
                           ">
                           <div class="col-sm-12 borderB borderA downC table-header-3 text-center">GA-JELOG-FR-257</div>
                           <div class="col-sm-12 borderB borderA downC table-header-3 text-center">1</div>
                           <div class="col-sm-12 borderA downC table-header-3 text-center">28/09/2018</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-9 borderT borderL borderR fondoGrisLAFR212 total-center">
                  <p  class="total-center"  style="font-weight: 700; font-size: 18px; min-height: 41px; max-height: 41px;">OFICINA CERTIFICACIÓN AERONAUTICA DE LA DEFENSA - SECAD</p>
               </div>
               <div class="col-sm-3 borderT borderR fondoGrisLAFR212 total-center">
                  <p class="total-center text-center" style="font-weight: 700; font-size: 15px; line-height: 20px; min-height: 41px; max-height: 41px;">1. NÚMERO DE CONTROL PROGRAMA DE CERTIFICACIÓN “SECAD”</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-9 borderT borderL borderR text-center" style="height: 60px;">
                  <div class="col-xs-12"  style="text-align: left;">
                      <p style="font-weight: 400;    font-size: 17px;transform: translateY(24px);height: 58px;overflow: hidden;max-height: 58px;"><strong>{{$programa->Proyecto}}</strong></p>
                  </div>
               </div>
               <div class="col-sm-3 borderT borderR borderL" style="padding-top: 0px;">
                  <p style="transform: translateY(5px);font-size: 32px;  text-align: center; font-weight: 700;">{{$informelafr212R->Consecutivo}}</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                  <p>2. DATOS GENERALES DEL PRODUCTO AERONÁUTICO</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-2 borderT borderL borderR" style="width: 18%; padding: 0;">
                  <p class="form-fac-parrafo">2.1. Clasificación Producto Aeronáutico</p>
                  <div class="col-xs-12" style="padding: 0;">
                     <div class="customChk col-xs-12 borderA">
                        <input type="checkbox" {{($informelafr212R->Clase=='Clase I')? 'checked':''}} class="borderA"> Producto Aeronáutico Clase I
                     </div>
                     <div class="customChk  col-xs-12 borderA">
                        <input type="checkbox" {{($informelafr212R->Clase=='Clase II')? 'checked':''}} class="borderA">Producto Aeronáutico Clase II
                     </div>
                     <div class="customChk col-xs-12 borderA">
                        <input type="checkbox" {{($informelafr212R->Clase=='Clase III')? 'checked':''}} class="borderA">Producto Aeronáutico Clase III
                     </div>
                  </div>
               </div>
               <div class="col-sm-2 borderT borderA" style="width: 15%;">
                  <p class="form-fac-parrafo">2.2. Nombre Producto Aeronáutico</p>
                  <div class="col-xs-12 borderT borderA">
                     {{$informelafr212R->Nombre}}
                  </div>
               </div>
               <div class="col-sm-1 borderT borderL borderR borderA" style="width: 10%;">
                  <p class="form-fac-parrafo">2.3. Modelo/ Equipo</p>
                  <div class="col-xs-12 borderT" style="min-height: 84px;">
                     {{$informelafr212R->Equipo}}
                  </div>
               </div>
               <div class="col-sm-3 borderT borderA" style="width: 20%;">
                  <p class="form-fac-parrafo">2.4. Número de Parte (P/N)</p>
                  <div class="col-sm-6 borderA borderT">
                     <div class="col-sm-12 borderB borderA borderR down div-border">
                        Nuevo:
                     </div>
                     <div class="col-sm-12 borderB borderA borderR down div-border">
                        Original (OEM):
                     </div>
                     <div class="col-sm-12  borderA borderR down div-border">
                        Otro (¿Cuál):
                     </div>
                  </div>
                  <div class="col-sm-6 borderA borderT ">
                     <div class="col-sm-12 borderB borderA down div-border" style="max-height: 28px;overflow: hidden;">{{($informelafr212R->ParteNumero)?$informelafr212R->ParteNumero:'---'}}</div>
                     <div class="col-sm-12 borderB borderA down div-border" style="max-height: 28px;overflow: hidden;">{{($informelafr212R->NSN)?$informelafr212R->NSN:'---'}}</div>
                     <div class="col-sm-12  borderA down div-border" style="max-height: 28px;overflow: hidden;">---</div>
                  </div>
               </div>
               <div class="col-sm-2 borderT borderL borderR borderA" style="width: 22%;">
                  <p class="form-fac-parrafo">2.5. Bases de Certificación</p>
                  <div class="col-xs-12 borderT" style="min-height: 84px; max-height: 84px!important;">
                     @foreach($programa->programas as $certificacion)
                     {{$certificacion->Referencia}} /
                     @endforeach
                  </div>
               </div>
               <div class="col-sm-2 borderT borderR borderA" style="width: 15%;">
                  <p class="form-fac-parrafo">2.6. Solicitante / Titular</p>
                  <div class="col-xs-12 borderT" style="min-height: 84px;max-height: 84px!important;">
                     {{$informelafr212R->NombreEmpresa}} / {{$informelafr212R->NombreCertificaInfo}}
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                  <p>3. ALCANCE SOLICITADO PARA CERTIFICACIÓN AERONÁUTICA</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-4 borderL borderR borderA" style="width: 33%">
                  <div>
                     <p class="form-fac-parrafo" style="font-size: 13px; min-height: 50px; max-height: 50px;">3.1. Marque con "X" si se trata de un Producto Aeronáutico o Reconocimiento de Organización Aeronáutica</p>
                     <div class="customChk" style="padding: 2px 0 2px 0">
                        <input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Diseño Aeronáutico')? 'checked':''}} class="borderA"> Aprobación de Diseño de Producto Aeronáutico
                     </div>
                     <div class="customChk" style="padding: 2px 0 2px 0">
                        <input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Producción Aeronáutica')? 'checked':''}} class="borderA">Aprobación de Producción Aeronáutica
                     </div>
                     <div class="customChk" style="padding: 2px 0 2px 0">
                        <input type="checkbox" {{($informelafr212R->Alcance=='Reconocimiento Organización Aeronáutica')? 'checked':''}} class="borderA">Reconocimiento Organización Aeronáutica 
                     </div>
                  </div>
                  <div class="borderT ">
                     <p class="form-fac-parrafo"style="font-size: 13px; font-size: 13px; min-height: 37px; max-height: 37px;">3.2. Área SECAD Responsable (Marque con "X")</p>
                     <div class="customChk">
                        <input type="checkbox" {{($informelafr212R->AccionSECAD=='ACPA')? 'checked':''}} class="borderA"> ACPA - Área Certificación Productos Aeronáuticos
                     </div>
                     <div class="customChk">
                        <input type="checkbox" {{($informelafr212R->AccionSECAD=='AREV')? 'checked':''}} class="borderA"> AREV - Área Reconocimiento y Evaluación
                     </div>
                  </div>
               </div>
               <div class="col-sm-8 borderL borderR borderA" style="width: 67%">
                  <div class="col-sm-12 borderR fondoGrisLAFR212">
                     <p class="form-fac-parrafo" style="font-size: 13px; min-height: 50px; max-height: 50px; justify-content: center;">3.4. Equipo de Certificación SECAD</p>
                  </div>
                  <div class="col-sm-12 borderT  borderR fondoWhith" style="
                     padding-left: 0px;
                     padding-right: 0px;">
                     <table class="table table-responsive-md table-bordered" style="margin: 0;">
                        <tbody>
                           <tr class="fondoGrisLAFR212">
                              <th class="form-fac-th" height="30"><p>Cargo</p></th>
                              <th class="form-fac-th" height="30"><p>Grado</p></th>
                              <th class="form-fac-th" height="30"><p>Nombres y Apellidos</p></th>
                              <th class="form-fac-th" height="30"><p>Especialidad Aeronáutica <br>de Certificación (EAC)</p></th>
                              <th class="form-fac-th" height="30"><p>Nivel de Competencia</p></th>
                           </tr>
                           <tr>
                              <td class="fondoGrisLAFR212 form-fac-td" height=30 style="margin:0!important;padding:0px!important;font-size: 12px!important">Responsable Programa <br> Certificación</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->grado->Abreviatura}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->Nombres}} {{$jefe->Apellidos}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->EAC->Especialidad}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->NivelCompetencia->Denominacion}}</td>
                           </tr>
                           <tr>
                              <td class="fondoGrisLAFR212 form-fac-td" height=30 style="margin:0!important;display: table-cell;padding: 1px;font-size: 12px!important">Suplente</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->grado != "N/A" ? $suplente->grado->Abreviatura : $suplente->grado}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->Nombres}} {{$suplente->Apellidos}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->EAC != "N/A" ? $suplente->EAC->Especialidad : $suplente->EAC}}</td>
                              <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->NivelCompetencia->Denominacion}}</td>
                           </tr>
                          
                           <tr>
                              <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 1</td>
                              @if(count($especialistas)>0)
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->grado != "N/A" ? $especialistas[0]->grado->Abreviatura : $especialistas[0]->grado}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->Nombres}} {{$especialistas[0]->Apellidos}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->EAC != "N/A" ? $especialistas[0]->EAC->Especialidad : $especialistas[0]->EAC}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->NivelCompetencia->Denominacion}} </td>
                              @else
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                              @endif
                           </tr>
                           <tr>
                              <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 2</td>
                              @if(count($especialistas)>1)
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->grado != "N/A" ? $especialistas[1]->grado->Abreviatura : $especialistas[1]->grado}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->Nombres}} {{$especialistas[1]->Apellidos}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->EAC != "N/A" ? $especialistas[1]->EAC->Especialidad : $especialistas[1]->EAC}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->NivelCompetencia->Denominacion}} </td>
                              @else
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                              @endif
                           </tr>
                           <tr>
                              <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 3</td>
                              @if(count($especialistas)>2)
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[2]->grado != "N/A" ? $especialistas[2]->grado->Abreviatura : $especialistas[2]->grado}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[2]->Nombres}} {{$especialistas[2]->Apellidos}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[2]->EAC != "N/A" ? $especialistas[2]->EAC->Especialidad : $especialistas[2]->EAC}} </td>
                                 <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[2]->NivelCompetencia->Denominacion}} </td>
                              @else
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                                 <td height="30"></td>
                              @endif
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                  <p>4. SEGUIMIENTO PROGRAMA DE CERTIFICACIÓN AERONÁUTICA "SECAD"</p>
               </div>
            </div>
			 
			 
            <div class="row borderT borderR borderL borderB">
               <table class="table table-bordered table-responsive-md" style="margin: 0;">
                  <tbody class="form-fac-2">
                     <tr>
                        <th class="fondoGrisLAFR212 th-0">
							<div class="main-th">No.<div>
						</th>
                        <th class="fondoGrisLAFR212 th-0">
							<div class="main-th">Actividad (Según aplique al tipo de certificación solicitada)<div>
						</th>
                        <th class="fondoGrisLAFR212 th-0">
							<div class="main-th">Responsable<div>
						</th >											
   							<th class="th-2-2 espan" style="width:108px!important">Condición <span>(Pendiente / Proceso / Cumplido)</span></th>
							<th class="th-2-2"style="width:108px!important">Porcentaje de Avance (%)</th>                        							
						<th class="fondoGrisLAFR212 th-0">
							<div class="main-th" style="width: 90px!important;">
								<div class="th-1">4.2. Fecha</div>
								<div class="th-2"><span>aaaa-mm-dd</span>
								</div>
							</div>
						</th>
						
                        <th class="fondoGrisLAFR212 th-0">
							<div class="main-th">4.3. Observaciones
							</div>
						</th>
                  @forelse ($informeHistorialPrograma as $informeHistorialProgramaR)
                     <tr>
                        <th>{{str_replace('.0', '', number_format($informeHistorialProgramaR->Orden, 1))}}</th>
                        <th>{{$informeHistorialProgramaR->Actividad}}</th>
                        <th>{{$informeHistorialProgramaR->Responsable}}</th>
                        <th class="fondoGrisLAFR212">{{$informeHistorialProgramaR->Situacion}}</th>
                        <td class="fondoGrisLAFR212">{{($informeHistorialProgramaR->Porcentaje)?$informeHistorialProgramaR->Porcentaje.'%':''}}</td>
                        <td>{{$informeHistorialProgramaR->Fecha}}</td>
                        <td>{{$informeHistorialProgramaR->Evidencias}} @if($informeHistorialProgramaR->Documentos != null)
                                <a href="{{asset($informeHistorialProgramaR->Documentos)}}" target="_blank"><strong>Ver documento</strong></a>
                                @endif
                        </td>
                     </tr>
                  @empty
                     <tr>
                        <th colspan="7" align="center">

                           <p>No hay datos para mostrar informe</p>
                        </th>
                     </tr>
                  @endforelse
                  </tbody>
               </table>
        	</div>
			 
           <div class="row">
               <div class="borderT borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                  <p>5. PORCENTAJE DE AVANCE DEL PROGRAMA</p>
               </div>
               <div class="col-sm-6 borderT  borderL borderR fondoGrisLAFR212" style="font-weight: 700; font-size: 13px; text-align: center;">
                  <p>Criterio</p>
               </div>
               <div class="col-sm-6 borderT  borderR fondoGrisLAFR212" style="font-weight: 700; font-size: 13px; text-align: center;">
                  <p>5.1. Valor Porcentual de Avance (%)</p>
               </div>
               <div class="col-sm-6 borderT borderL borderR" style="text-align: center; font-weight: 700;     font-size: 14px;">
                  <p>Relación del  <u>Número de Actividades Cumplidas </u> con respecto al  <u>Número Total de Actividades del Procedimiento</u></p>
               </div>
               <div class="col-sm-6 borderT  borderR">
                  <p style="padding-top: 6px; padding-bottom: 8px;font-size: 20px;  text-align: center; font-weight: 700;">
                     {{$porcentajeTotal}}%
                  </p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderT borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                  <p>6. ESPACIO EXCLUSIVO "SECAD"</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderT borderL borderR fondoGrisLAFR212">
                  <p>La autoridad representada por SECAD se reserva el derecho de aceptación de los datos registrados en el presente documento.</p>
               </div>
            </div>
            <div class="row form-fac-row">
               <div class="col-sm-3 borderT  borderR borderL fondoGrisLAFR212">
                  <p>Marcar con una "X"</p>
               </div>
               <div class="col-sm-3 borderT  borderR borderB fondoGrisLAFR212">
                  <p>Dependencia SECAD</p>
               </div>
               <div class="col-sm-2 borderT  borderR borderB fondoGrisLAFR212">
                  <p>Firma</p>
               </div>
               <div class="col-sm-2 borderT  borderR borderB fondoGrisLAFR212">
                  <p>&nbsp;</p>
               </div>
               <div class="col-sm-2 borderT  borderR borderB fondoGrisLAFR212">
                  <p>Fecha</p>
               </div>
            </div>
			 
			 
            <div class="row">
               <div class="col-sm-3 borderT  borderR borderL borderA">
                  <div class="col-sm-3 borderR borderB borderA" style="padding: 6px;">
                     &nbsp;
                  </div>
                  <div class="col-sm-9 borderB borderA" style="padding: 6px;">
                     Aceptado
                  </div>
                  <div class="col-sm-3 borderR borderB borderA" style="padding: 6px;">
                     &nbsp;
                  </div>
                  <div class="col-sm-9 borderB borderA" style="padding: 6px;">
                     Denegado
                  </div>
               </div>
               <div class="col-sm-3 borderR borderB form-fac-footer">
                  <p>Responsable Programa de Certificación SECAD</p>
               </div>
               <div class="col-sm-2 borderR borderB form-fac-footer" >
                  <p style="
                     padding-top: 14px;
                     ">&nbsp;</p>
               </div>
               <div class="col-sm-2 borderR borderB form-fac-footer">
                  <p>&nbsp;</p>
               </div>
               <div class="col-sm-2 borderR borderB form-fac-footer">
                  <p>&nbsp;</p>
               </div>
            </div>
			 <div class="row">
               <div class="col-sm-3 borderT  borderR borderL borderA">
                  <div class="col-sm-3 borderR borderB borderA" style="padding: 6px;">
                     &nbsp;
                  </div>
                  <div class="col-sm-9 borderB borderA" style="padding: 6px;">
                     Aceptado
                  </div>
                  <div class="col-sm-3 borderR borderB borderA" style="padding: 6px;">
                     &nbsp;
                  </div>
                  <div class="col-sm-9 borderB borderA" style="padding: 6px;">
                     Denegado
                  </div>
               </div>
               <div class="col-sm-3 borderR borderB form-fac-footer">
                  <p>Jefe Área SECAD (ACPA / AREV)</p>
               </div>
               <div class="col-sm-2 borderR borderB form-fac-footer">
                  <p style="
                     padding-top: 14px;
                     ">&nbsp;</p>
               </div>
            	<div class="col-sm-2 borderR borderB form-fac-footer">
                  <p>&nbsp;</p>
               </div>
               <div class="col-sm-2 borderR borderB form-fac-footer">
                  <p>&nbsp;</p>
               </div>
            </div>
            <!-- 
               <div class="row">
                  <div class="col-sm-3 borderT  borderR borderL borderA">
                     <div class="col-sm-3 borderR borderB">
                        &nbsp;
                     </div>
                     <div class="col-sm-9 borderB">
                        Aceptado
                     </div>
                     <div class="col-sm-3 borderR borderB">
                        &nbsp;
                     </div>
                     <div class="col-sm-9 borderA borderB">
                        Denegado
                     </div>
                  </div>
                  <div class="col-sm-3 borderR">
                     <p>Responsable Programa de Certificación SECAD</p>
                  </div>
                  <div class="col-sm-2 borderR">
                     <p>Firma</p>
                  </div>
                  <div class="col-sm-2 borderR">
                     <p>&nbsp;</p>
                  </div>
                  <div class="col-sm-2 borderR">
                     <p>Fecha</p>
                  </div>
               </div>
               
               -->
            <div class="row borderT  borderR borderL borderT">
               <div class="col-sm-12" style="height: 200px;">
                  <p>Observaciones:</p>
                  @if($obervaciones != null)
                  <p>{{$obervaciones->Observacion}}</p>
                  @else
                  <p></p>
                  @endif
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12 borderT borderR borderL borderB" style="font-weight: 700; font-size: 15px; text-align: center; font-style: italic;">
                  <p>Fuerza Aérea Colombiana (FAC) - Autoridad Aeronáutica de la Aviación de Estado (AAAE) - Decreto No. 2937 del 05-Agosto-2010</p>
               </div>
            </div>
            <a href="{{route('informelafr212.edit', $programa->IdPrograma) }}" style="width: 150px; font-family: Roboto; margin-top: 30px;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download"></span> Descargar PDF</a>
      </div>
      @else
      <div class="section-body">
      <div class="text-center">
      <h3>No hay datos para mostrar informe</h3>
      </div>
      </div>
      @endif      
   </div>
   <!--end .section-body -->               
   </section>
</div>
<!--end #content-->
<!-- END CONTENT -->
</div>
</div>
{!! Form::close() !!}
@endsection()
@endsection()
@endsection()