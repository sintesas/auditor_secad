@extends('partials.card')

@extends('layout')

@section('title')
	Programas - Informe Contratos por Año
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('programa') }} --}}
		<!-- Begin Modal -->
		{{-- <button type="button" onclick="window.location='{{ route("informelafr212.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> --}}
		{{-- End modal --}}


		@endsection()

		@section('card-content')
			<div class="col-lg-12 text-center" >
			 <div class="row encabezadoPlanInspeccion">
                            
				<div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>CONTRATACIÓN ANUAL</h4>
                        </div>                        
				</div>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-hover" border="1">
					<thead>
						<tr>
							<th class="text-center"><b>AÑO</b></th>
							<th class="text-center"><b>CANTIDAD CONTRATOS</b></th>
							<th class="text-center"><b>PRESUPUESTO ANUAL</b></th>
							<th class="text-center"><b>ACCIÓN</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($contrat as $vwcontra)
						<tr>
							<td class="text-center">{{$vwcontra->Vigencia}}</td>
							<td class="text-center">{{$vwcontra->CANT}}</td>
							<td class="text-center">{{$vwcontra->VATOPRE }}</td>
							@role('jefe-area-certificacion|administrador') 
							<td class="text-right">
								<div class="col-lg-6 text-right">

									<a href="{{route('InformeContratosA.show', $vwcontra->Vigencia) }}" class="btn btn-primary btn-block editbutton text-center" alt="Ir al Detalle"><div class="gui-icon" ><i class="fa fa-search"></i></div></a>

								</div>
							</td>
							@endrole 
						 </tr>
						 @endforeach
					</tbody>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->

		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable({
			"order": [[ 0, "desc" ]]
		});
		
	});
</script>

@endsection()
	

@endsection()