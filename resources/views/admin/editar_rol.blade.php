@extends('partials.card')

@extends('layout')

@section('title')
	Actualizar Rol
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')

            {!! Form::model($rol, ['route' => ['rol.update', $rol->rol_id], 'method' => 'PUT' ]) !!}

            {{ csrf_field()}}

        @endsection

        @section('card-title')
			
            {{ Breadcrumbs::render('editar_rol') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Actualizar Rol
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="rol" name="rol" style="text-transform:uppercase" value="{{old('rol', $rol->rol)}}" required>
                                    <label for="usuario">Rol</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" @if($rol->activo == 1) checked @endif>
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
                            <button type="button" onclick="window.location='{{ route("rol.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

@endsection()
