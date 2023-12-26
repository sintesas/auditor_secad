@extends('partials.card')

@extends('layout')

@section('title')
	Crear Nombre Lista
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')
			{!! Form::open(['route' => 'nombrelista.store']) !!}

            {{ csrf_field()}}
		
        @endsection()				

        @section('card-title')
			
            {{ Breadcrumbs::render('crear_nombre_lista') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Crear Nombre Lista
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre_lista" name="nombre_lista" style="text-transform:uppercase" required>
                                    <label for="nombre_lista">Nombre Lista</label>
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
                            <button type="button" onclick="window.location='{{ route("nombrelista.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

@endsection()