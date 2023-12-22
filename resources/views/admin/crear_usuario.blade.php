@extends('partials.card')

@extends('layout')

@section('title')
	Crear Usuario
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')
			{!! Form::open(['route' => 'usuario.store']) !!}

            {{ csrf_field()}}
		
        @endsection()				

        @section('card-title')
			
            {{ Breadcrumbs::render('crear_usuario') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Crear Usuario
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                                    <label for="usuario">Usuario</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" style="text-transform:uppercase" required>
                                    <label for="nombre_completo">Nombre Completo</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" checked>
                                    <label for="activo">Activo</label>                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <label for="password">Contraseña</label>                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password_match" name="password_match" required>
                                    <label for="password_match">Verificar Contraseña</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info btn-block">Crear</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="window.location='{{ route("usuario.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

@endsection()
