@extends('partials.card')

@extends('layout')

@section('title')
	Actualizar Listas Valores
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')
            {!! Form::model($lista, ['route' => ['listasvalores.update', $lista->lista_dinamica_id], 'method' => 'PUT' ]) !!}

            {{ csrf_field()}}
		
        @endsection()				

        @section('card-title')
			
            {{ Breadcrumbs::render('actualizar_lista_dinamica') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Actualizar Listas Valores
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lista_dinamica" name="lista_dinamica" value="{{old('lista_dinamica', $lista->lista_dinamica)}}" required>
                                    <label for="lista_dinamica">Lista Valor</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{old('codigo', $lista->codigo)}}">
                                    <label for="codigo">Código</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion', $lista->descripcion)}}">
                                    <label for="descripcion">Descripción</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select id="lista_dinamica_padre_id" name="lista_dinamica_padre_id" class="form-control" value="{{old('lista_dinamica_padre_id', $lista->lista_dinamica_padre_id)}}">
                                        <option value="0">Seleccione...</option>
                                        @foreach ($listas as $item)
                                        <option value="{{ $item->lista_dinamica_id }}">{{ $item->lista_dinamica }}</option>
                                        @endforeach
                                    </select>
                                    <label for="lista_dinamica_padre_id">Lista Padre</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" @if ($lista->activo == 1) checked @endif>
                                    <label for="activo">Activo</label>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="window.location='{{ route("listasvalores.indice", $lista->nombre_lista_id) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

@endsection()