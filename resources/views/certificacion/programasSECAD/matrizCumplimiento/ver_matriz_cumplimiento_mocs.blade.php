@extends('partials.card')

@extends('layout')

@section('title')
	Asignar MoCs
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'mocsSupartes.store', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_personal')}} --}}
			Asignar MoCs
		@endsection()

		@section('card-content')

		 <div class="card-body floating-label">

            <div class="card">
                
	           <div class="card-body">
					<div class="row">
						<div class="col-sm-12">
	                      	{{-- <ul class="list divider-full-bleed"> --}}
	                            @foreach ($mocs as $moc)
	                               {{--  <li class="tile ui-sortable-handle">
	                                    <div class="checkbox checkbox-styled tile-text">
	                                        <label> --}}
	                                        	<div class="row">
	                                        		<div class="col-sm-4">
							                        </div> 
							                        <div class="col-sm-4">
		                                        		<div class="form-group">
		                                        			@if($moc->MocSelected == '0')
				                                            	<input id="moc_{{$moc->IdMOC}}" name="moc_{{$moc->IdMOC}}" type="checkbox" >
				                                            @else
				                                            	<input id="moc_{{$moc->IdMOC}}" name="moc_{{$moc->IdMOC}}" type="checkbox" checked disabled="true">
				                                            @endif
				                                            <span>
				                                                {{$moc->Numero}} | {{$moc->Medio}} | {{$moc->CodigoAC2324}} 
				                                            </span>
		                                            	</div>
		                                            </div> 
		                                            <div class="col-sm-4">
							                        </div>
	                                            </div>
	                                        {{-- </label>
	                                    </div>
	                                </li> --}}
	                            @endforeach
	                        {{-- </ul> --}}
						</div>
					</div>
				</div>

					<input type="hidden" id="IdSubParteMatriz" name="IdSubParteMatriz" value="{{$requisito->IdSubParteMatriz}}">
					<input type="hidden" id="IdRequsito" name="IdRequsito" value="{{$requisito->IdRequsito}}">
            </div><!--end .card-body -->

		  {{-- submit button --}}
		
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("requisitosMatrizCumpli.show", $requisito->IdSubParteMatriz) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
        </div>
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()