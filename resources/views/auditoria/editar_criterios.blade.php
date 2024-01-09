@extends('partials.card')

@extends('layout')

@section('title')
	Editar Criterio
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($criterios, ['route' => ['criteriosAuditoria.update', $criterios->IdCriterio], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('edit_criterio')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="Norma" name="Norma" required value="{{old('Norma', $criterios->Norma)}}">
                    <label for="Norma">Norma*</label>
                    </div>
               </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" id="Proceso" name="Proceso" rows="4" >{{old('Proceso', $criterios->Proceso)}}</textarea>
                        <label for="Proceso">Proceso</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" id="SubProceso" name="SubProceso" rows="4" >{{old('SubProceso', $criterios->SubProceso)}}</textarea>
                        <label for="SubProceso">Sub Proceso</label>
                    </div>
                </div>
            </div>

		</div>
	
		{{-- submit button --}}
			
		<div class="form-group">
			<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("criteriosAuditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}
		
		@endsection()


	@endsection()


@endsection()