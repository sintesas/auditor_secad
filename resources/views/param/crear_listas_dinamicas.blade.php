@extends('partials.card')

@extends('layout')

@section('title')
	Crear Listas Valores
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')
			{!! Form::open(['route' => 'listasvalores.store']) !!}

            {{ csrf_field()}}
		
        @endsection()				

        @section('card-title')
			
            {{ Breadcrumbs::render('crear_lista_dinamica') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Crear Listas Valores
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lista_dinamica" name="lista_dinamica" required>
                                    <label for="lista_dinamica">Lista Valor</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="codigo" name="codigo">
                                    <label for="codigo">Código</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                    <label for="descripcion">Descripción</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select id="lista_dinamica_padre_id" name="lista_dinamica_padre_id" class="form-control">
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
                                    <input type="checkbox" id="activo" name="activo" checked>
                                    <label for="activo">Activo</label>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" style="" class="btn btn-info btn-block">Crear</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="window.location='{{ route("listasvalores.indice", $nombre_lista_id) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

@endsection()