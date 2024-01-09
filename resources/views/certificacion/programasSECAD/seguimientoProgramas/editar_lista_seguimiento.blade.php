@extends('partials.card')

@extends('layout')

@section('title')
	Editar Evidencia 
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')
            {!! Form::model($seguimiento, ['route' => ['seguimiento.update', $seguimiento->IdListaSeguimiento , 'files' =>true], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crearseguimiento')}} 
		@endsection()

		@section('card-content')
			 <div class="card-body floating-label">
                 <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Efecturar Seguimiento a un Programa
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="{{$programa->Consecutivo}}">
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
                                    <textarea class="form-control" readonly>{{$actividad->Actividad}}</textarea>
                                    <label>Actividad</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <div class="input-group date" id="demo-date-format">
                                        <div class="input-group-content">
                                            <input type="text" class="form-control" id="Fecha" name="Fecha" required value="{{$dcr}}" readonly>
                                            <label for="Fecha">Fecha</label>
                                        </div>
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::select('Situacion', [
                                                        '' => '',
                                                        'Pendiente' => 'Pendiente',
                                                        'Proceso' => 'Proceso',
                                                        'Cumplido' => 'Cumplido'
                                                    ], null, ['class' => 'form-control', 'id' => 'Situacion'])}}
                                    <label for="Situacion">Situación</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="Evidencias" name="Evidencias">{{old('Evidencias', $seguimiento->Evidencias)}}</textarea>
                                    <label for="Evidencias">Observaciones / Evidencia</label>
                                </div>
                            </div> 
                        </div> 
                        
                        <div class="row">
                            <div class="col-sm-12">
                               <div class="form-group">
                                    <label for="foto">Documentos</label>
                                    {!! Form::file('docs', array('class' => 'form-control', 'id' => 'inputFile', '')) !!}
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
						<button type="submit" style="" class="btn btn-info btn-block">Editar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route('seguimientoActividades.show', $actividad->IdActividad.'&'.$programa->IdPrograma) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		@endsection()

	@endsection()

@endsection()