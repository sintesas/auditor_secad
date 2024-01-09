@extends('partials.card')

@extends('layout')

@section('title')
	Editar Requisito
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($requesito, ['route' => ['requisitosMatrizCumpli.update', $requesito->IdRequsito], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('editar_auditoria')}} --}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="CodigoRequisito" name="CodigoRequisito" required value="{{old('CodigoRequisito', $requesito->CodigoRequisito)}}">
								<label for="CodigoRequisito">Código Requisito</label>
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="NombreRequisito" name="NombreRequisito" required value="{{old('NombreRequisito', $requesito->NombreRequisito)}}">
								<label for="NombreRequisito">Nombre Requisito</label>
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea name="DescripcioRequisito" id="DescripcioRequisito"  class="form-control">{{old('DescripcioRequisito', $requesito->DescripcioRequisito)}}</textarea>
								<label for="DescripcioRequisito">Descripción Requisito</label>
							</div>
						</div>	
						
					</div>		
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="GuiaAplicable" name="GuiaAplicable" required value="{{old('GuiaAplicable', $requesito->GuiaAplicable)}}">
								<label for="GuiaAplicable">Guia Aplicable</label>
							</div>
						</div>	
					</div>

					<input type="hidden" id="IdSubParteMatriz" name="IdSubParteMatriz" value="{{$requesito->IdSubParteMatriz}}">
			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{route('requisitosMatrizCumpli.show', $requesito->IdSubParteMatriz) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
		</script>
		@endsection()

	@endsection()

@endsection()