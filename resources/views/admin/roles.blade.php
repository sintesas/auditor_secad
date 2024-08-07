@extends('partials.card')

@extends('layout')

@section('title')
    Roles
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
            {{Breadcrumbs::render('rol')}}
            @if ($permiso->crear == 1)
            <button type="button" onclick="window.location='{{ route("rol.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
            @endif        
            @endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Rol</b></th>
                            <th><b>Estado</b></th>
                            <th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                            @if ($permiso->consultar == 1)
                                <tr>
                                    <td>{{ $item->rol }}</td>
                                    <td style="text-align: center;">
                                        @if ($item->activo == 1)
                                            <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                        @else
                                            <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->rol != 'ROL_ADMINISTRADOR')
                                        @if ($permiso->actualizar == 1)
                                            <div class="col-sm-6">
                                                <a href="{{ route('rol.edit', $item->rol_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
                                            </div>
                                        @endif
                                            <div class="col-sm-6">
                                                <a href="{{ route('rolprivilegio.indice', $item->rol_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-shield"></i></div></a>
                                            </div>
                                        @endif
                                    </td>                                                              
                                </tr>
                            @endif
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
            $(document).ready(function(){
                $('#datatable1').DataTable();
            });
        </script>

    @endsection()
    
@endsection()
