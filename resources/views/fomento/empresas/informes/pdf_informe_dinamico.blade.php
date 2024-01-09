@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">

@section('title')
    Áreas claves de Cooperación de Empresas
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($empresas) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            Informe CIIU
        @endsection()

@section('card-content')
    <div class="card-body floating-label">
        <!-- BEGIN BASE-->
        <div id="">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->
            <!-- BEGIN CONTENT-->
            <div id="">
                <section>
                    <div class="section-body">
                        <div class="total-card">
                            <div class="row encabezadoPlanInspeccion">
                                <!-- titulo Formulario -->
                                <div class="col-xs-12 text-center">
                                    <h3>OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD</h3>
                                    <div>
                                        <h4>Listado de Información de Empresas</h4>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .row -->

                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                      
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12  table-fixed">
                                <table class="table  table-x ">
                                        <tr class="fondoAzulOscuro" style="color:white; font-size:15px">
                                            <th class="th-x"> Nombre Empresa</th>

                                            <th class="th-x" >  Nit</th>

                                            <th class="th-x" > Ciudad </th>

                                            <th class="th-x" > Teléfono </th>

                                            @if($data->TipoOrganizacion != '')
                                                <th class="th-x" >Tipo Org.</th>
                                            @endif

                                            @if($data->IdEstadoEmpresa != '')
                                                <th class="th-x">Estado</th>
                                            @endif

                                            @if($data->IdDominioIndustrial != '')
                                                <th class="th-x">D. Industrial</th>
                                            @endif

                                            @if($data->IdAreasCooperacionIndustrial != '')
                                                <th class="th-x">Área</th>
                                                <th class="th-x"> Subárea </th>
                                            @endif

                                            @if($data->IdActividadEconomica != '')
                                                <th class="th-x">Act. Económica</th>
                                            @endif
                                        </tr>
                                        @if(isset($empresas))
                                                @if(!is_null(json_decode($empresas)))
                                                    @foreach($empresas as $empresasR)
                                                        <tr class="line-a" >
                                                            <td class="th-x" style="padding:20px;">{{$empresasR->NombreEmpresa}}</td>
                                                            <td class="th-x">{{$empresasR->Nit}}</td>
                                                            <td class="th-x">{{$empresasR->Ciudad}}</td>
                                                            <td class="th-x">{{$empresasR->Telefono}}</td>
                                                            @if($data->TipoOrganizacion != '')
                                                                <td class="th-x">{{$empresasR->TipoOrganizacion}}</td>
                                                            @endif
                                                            @if($data->IdEstadoEmpresa != '')
                                                                <td class="th-x">{{$empresasR->STATUS}}</td>
                                                            @endif
                                                            @if($data->IdDominioIndustrial != '')
                                                                <td class="th-x">{{$empresasR->DIDescripcion}}</td>
                                                            @endif
                                                            @if($data->IdAreasCooperacionIndustrial != '')
                                                                <td class="th-x">{{$empresasR->ACIDescipcion}}</td>
                                                                <td class="th-x">{{$empresasR->SACIDescipcion}}</td>
                                                            @endif
                                                            @if($data->IdActividadEconomica != '')
                                                                <td class="th-x">{{$empresasR->AEDescripcion}}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <div class="section-body">
                                                        <div class="text-center">
                                                            <h3>No hay datos para mostrar informe</h3>
                                                        </div>
                                                    </div>
                                                @endif
                                        @endif
                                </table>
                            </div>
                        </div><!--end .row -->                                            
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->



		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()

</body>