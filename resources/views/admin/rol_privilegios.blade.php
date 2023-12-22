@extends('partials.card')

@extends('layout')

@section('title')
	Rol Privilegios
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('rolprivilegio')}}

            <button type="button" onclick="window.location='{{ route("rol.index") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn" style="margin-right: 50px;"><span class="fa fa-arrow-left"></span></button>
            <button type="button" onclick="window.location='{{ route("rolprivilegio.crear", $rol_id) }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>            
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <h3>Rol: {{ $rol }}</h3>
                <hr>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th>Módulo</th>
                            <th>Nombre Pantalla</th>
                            <th>Consulta</th>
                            <th>Crear</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                            <th>Activo</th>
                            <th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($privilegios as $item)
                            <tr>
                                <td>{{ $item->modulo }}</td>
                                <td>{{ $item->nombre_pantalla }}</td>
                                <td>
                                    @if ($item->consultar == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->crear == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->actualizar == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->eliminar == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->activo == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block editbutton" ><div class="gui-icon"><i class="fa fa-times"></i></div></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('rolprivilegio.edit', $item->rol_privilegio_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
                                    </div>
                                </td>                                                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            

        @endsection()
    
    @endsection()

    @section('addjs')

        <script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#datatable1').DataTable();
            });
        </script>

    @endsection()
    
@endsection()