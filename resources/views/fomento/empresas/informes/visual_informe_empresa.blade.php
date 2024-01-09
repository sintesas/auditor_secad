@extends('partials.card')

@extends('layout')

@section('title')
    Informe Empresa
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')

        {!! Form::model($empresa) !!}
        {{ csrf_field()}}

        @endsection

        @section('card-title')
            {{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('informe_empresa') }}
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
                            <div class="row">
                                <div class="total-card">
	                                <div class="row encabezadoPlanInspeccion">
	                                <!-- titulo Formulario -->
		                            <div class="col-xs-12 text-center">
                	                    <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                                        <div>
                                            <h4>Listado de empresas Colombianas Capacidad Aeronáutica</h4>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card">
                                        <div class="card-head text-center fondoAzulOscuro blanco">
                                            <header class="">
                                                Información Empresa <samp></samp>
                                            </header>
                                        </div><!--end .card-head -->
                                        @if(count($empresa) == 1)
                                        @foreach($empresa as $empresaR)
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="Cedula">Nombre Empresa:</label>
                                                        <p id="Cedula">{{$empresaR->NombreEmpresa}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="Nombre">Siglas:</label>
                                                        <p id="Nombre">{{$empresaR->SiglasNombreClave}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="Apellidos">Nit:</label>
                                                        <p id="Apeliidos">{{$empresaR->Nit}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="CargoFuncion"> Email:</label>
                                                        <p id="CargoFuncion">{{$empresaR->Email}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="Celular"> Ciudad:</label>
                                                        <p id="Celular">{{$empresaR->Ciudad}}</p>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">

                                                        <label for="Correo_Elect"> Telefono</label>
                                                        <p id="Correo_Elect">{{$empresaR->Telefono}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">

                                                        <label for="Representante"> Representante:</label>
                                                        <p id="Representante">{{$empresaR->NombreCertificaInfo}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">

                                                        <label for="Telefono2"> Dirección:</label>
                                                        <p id="Telefono2">{{$empresaR->Direccion}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                       <label for="Grado"> RazonSocial: </label>
                                                       <p id="Grado">{{$empresaR->RazonSocial}}</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <a href="{{route('informeempresas.edit', $empresaR->IdEmpresa) }}" class="btn btn-primary btn-block editbutton"><i class="fa fa-download"></i></a>

                                        </div><!--end .card-body -->
                                         @endforeach
                                            @else
                                              <div class="section-body">
                                                <div class="text-center">
                                                    <h3>No hay datos para mostrar informe</h3>
                                                </div>
                                              </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                    </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

        </div>
    </div>
</div>

        {!! Form::close() !!}
        @endsection()

    @endsection()

@endsection()
