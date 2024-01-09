@extends('partials.card')

@extends('layout')

@section('title')
	Crear Evidencia 
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'seguimientoEmp.store', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crearseguimientoEmp', $programa->IdPrograma, $actividad->IdActividad.'&'.$programa->IdPrograma)}} 
		@endsection()

		@section('card-content')
			 <div class="card-body floating-label">
                 <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Crear Evidencia
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="consecutivo" name="consecutivo" readonly value="{{$programa->Consecutivo}}">
                                    <label>Programa</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="{{$tipoPrograma->Tipo}}">
                                    <label>Tipo Programa</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" id="Observaciones" name="Observaciones" readonly value="{{$actividad->Actividad}}"> --}}
                                    <textarea class="form-control" id="actividad" name="actividad" readonly>{{$actividad->Actividad}}</textarea>
                                    <label>Actividad</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Fecha" name="Fecha" required value="{{$dcr}}" readonly>
                                    <label for="Fecha">Fecha</label>                                   
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="Observaciones" name="Observaciones"></textarea>
                                    <label for="Observaciones">Observaciones / Evidencia</label>
                                </div>
                            </div> 
                        </div> 
                        <h4>Documentos</h4>
                        <div class="row">
                           
                            <div class="col-sm-8">
                               <div class="form-group">
                                    {!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
                                     {{-- <label for="tipoDoc" >Documentos</label> --}}
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" value="{{$programa->IdPrograma}}" name="IdPrograma">
                        <input type="hidden" value="{{$actividad->IdActividad}}" name="IdActividad">
                        <input type="hidden" value="{{$tipoPrograma->IdTipoPrograma}}" name="IdTipoPrograma">

                    </div>
                </div>
            </div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route('seguimientoActividadesEmp.show', $actividad->IdActividad.'&'.$programa->IdPrograma) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		@endsection()

	@endsection()

@endsection()