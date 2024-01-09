@extends('partials.card')

@extends('layout')

@section('title')
Modificar Empresa
@endsection()

@section('content')

@section('card-title')
	{{ Breadcrumbs::render('editar_moc') }}
@endsection()

@section('card-content')

@section('form-tag')


{!! Form::model($moc, ['route' => ['moc.update', $moc->IdMOC], 'method' => 'PUT' ]) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{ Breadcrumbs::render('moc') }}
@endsection()

@section('card-content')

<div class="card-body floating-label">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" id="numero" name="numero" value="{{old('numero', $moc->Numero)}}"    required>
				<label for="numero">Numero</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" id="medio" name="medio" value="{{old('medio', $moc->Medio)}}" required>
				<label for="medio">Medio</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" id="codigo" name="codigo" required value="{{ old('codigo', $moc->CodigoAC2324) }}">
				<label for="codigo">Código AC 23- 24</label>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-group">
				<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required> {{old('descripcion', $moc->DescripcionAC2324)}} </textarea>
				<label for="descripcion">Descripción </label>
			</div>
		</div>

	</div>
</div>
</div>	



<div class="form-group">
	<center><button type="submit" class="btn btn-info">Editar Empresa</button></center>
</div>


{!! Form::close() !!}

@endsection()




@endsection()

@endsection()