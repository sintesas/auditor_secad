@extends('partials.card_big')

@extends('layout')

@section('title')
Roles Personal
@endsection()

@section('addcss')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('lista_personal') }}


@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Email</b></th>
				
						<th style="width: 160px;"><b>Acción</b></th>
					
				</tr>
			</thead>
			<tbody>
				@foreach ($personal as $persona)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$persona->Abreviatura}} | {{$persona->Nombres . $persona->Apellidos}}</td>

					<td>{{$persona->Email}}</td>

					
						<td>
						@if ($permiso->eliminar == 1)
							<div class="col-sm-4">

								{!! Form::open(['route' => ['asignarusuario.destroy', $persona->IdPersonal], 'method' => 'DELETE']) !!}

								{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

								{!! Form::close() !!}
							</div>
						@endif

						@if ($permiso->actualizar == 1)
							{{--<div class="col-sm-4">

								<a href="{{route('asignarusuario.edit', $persona->Idpersonal) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

							</div>--}}
						@endif

						@if ($permiso->crear == 1)
						
							<div class="col-sm-4">

								<button type="button" onclick="window.location='{{ route("asignarusuario.show", $persona->IdPersonal) }}'" class="btn btn-info ink-reaction btn-primary" id="myBtn"><span class="fa fa-plus"></span></button>

							</div>
						@endif
						</td>
				
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>

	</div><!--end .table-responsive -->
</div><!--end .col -->



{{-- END EDIT MODAL --}}

@endsection()

@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('js/edit.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});




</script>



@endsection()


@endsection()
