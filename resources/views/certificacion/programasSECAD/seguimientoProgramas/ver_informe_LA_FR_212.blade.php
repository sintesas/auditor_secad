@extends('partials.card')

@extends('layout')

@section('title')
	Programas - Informe LA-FR 212
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('programa') }}
		<!-- Begin Modal -->
		{{-- <button type="button" onclick="window.location='{{ route("informelafr212.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> --}}
		{{-- End modal --}}


		@endsection()

		@section('card-content')

			<div class="col-lg-12 text-center" >
			 <div class="row encabezadoPlanInspeccion">
                            
				<div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div> 
                            <h4>SEGUIMIENTO PROGRAMAS </h4>
                        </div>                        
				</div>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Consecutivo</b></th>
							<th><b>Proyecto</b></th>
							<th><b>Observaciones</b></th>
							<th style="width: 120px;" colspan = "1 " class="text-center"><b>Ver Informe</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($programa as $programas)
						<tr>
							<td>{{$programas->Consecutivo}}</td>
							<td>{{$programas->Proyecto}}</td>
							<td>
								<div class="col-sm-6">

									<a href="{{route('obsercavionesfr212.show', $programas->IdPrograma) }}" class="btn btn-primary btn-block editbutton"><div class="gui-icon"><i class="fa fa-search"></i></div></a>

								</div>
							</td>
							<td>
								{{-- <div class="col-sm-6">

									{!! Form::open(['route' => ['programa.destroy', $programa->IdPrograma], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div> --}}


								<div class="col-sm-6">

									<a href="{{route('informelafr212.show', $programas->IdPrograma) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>

								</div>
							</td>
							{{-- <td>{{$ata->Activo}}</td> --}}
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
		$('#example').DataTable({
			"order": [[ 0, "desc" ]]
		});
		
	});
</script>

@endsection()
	

@endsection()