@extends('partials.card')

@extends('layout')

@section('title')
Informe Empresa
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('informe_empresas') }}
@endsection()

@section('card-content')

<div class="total-card">
	<div class="row encabezadoPlanInspeccion">
	<!-- titulo Formulario -->
		<div class="col-xs-12 text-center">
                	<h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>Listado de empresas Colombianas</h4>
                        </div>                        
                   </div>                              
         </div>

    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="datatable1" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><b>Nombre Empresa</b></th>
                        <th><b>Sigla</b></th>
                        <th style="width: 120px;"><b>Acción</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $Empresas)
                    @if ($permiso->consultar == 1)
                    <tr>
                        <td>{{$Empresas->NombreEmpresa}}</td>
                        <td>{{$Empresas->SiglasNombreClave}}</td>

                        <td>
                            <div class="col-sm-6">
                                <a href="{{route('informeempresas.show', $Empresas->IdEmpresa) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
                            </div>
                            
                        </td>
                        {{-- <td>{{$ata->Activo}}</td> --}}
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div><!--end .table-responsive -->
    </div><!--end .col -->
</div>
@endsection()

@endsection()
@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
    $(document).ready(function(){
        $('#datatable1').DataTable();
    });
</script>

@endsection()
@endsection()