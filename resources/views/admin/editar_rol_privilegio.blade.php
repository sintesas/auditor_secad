@extends('partials.card')

@extends('layout')

@section('title')
	Actualizar Rol Privilegio
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')

            {!! Form::model($rolprivilegio, ['route' => ['rolprivilegio.update', $rolprivilegio->rol_privilegio_id], 'method' => 'PUT' ]) !!}

            {{ csrf_field()}}

        @endsection

        @section('card-title')
			
            {{ Breadcrumbs::render('editar_rol_privilegio') }}

		@endsection()

        @section('card-content')

            <div class="card-body floating-label">
                <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Actualizar Rol Privilegio
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Selecciona..." value="{{old('modulo', $rolprivilegio->modulo)}}" required>
                                    <label for="modulo">Módulo</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre_pantalla" name="nombre_pantalla" value="{{old('nombre_pantalla', $rolprivilegio->nombre_pantalla)}}" required>
                                    <label for="nombre_pantalla">Nombre Pantalla</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="consultar" name="consultar" @if($rolprivilegio->consultar == 1) checked @endif>
                                    <label for="consultar">Consultar</label>                            
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="crear" name="crear" @if($rolprivilegio->crear == 1) checked @endif>
                                    <label for="crear">Crear</label>                            
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="actualizar" name="actualizar" @if($rolprivilegio->actualizar == 1) checked @endif>
                                    <label for="actualizar">Actualizar</label>                            
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="eliminar" name="eliminar" @if($rolprivilegio->eliminar == 1) checked @endif>
                                    <label for="eliminar">Eliminar</label>                            
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" @if($rolprivilegio->activo == 1) checked @endif>
                                    <label for="activo">Activo</label>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="window.location='{{ route("rolprivilegio.indice", $rolprivilegio->rol_id) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" id="num_pantalla" name="num_pantalla" value="{{old('num_pantalla', $num_pantalla)}}">
            </div>

            <div id="moduloModal" class="modal" style="padding-top:100px;">
                <div class="modal-content">
                    <div class="card-head style-primary">
                        <header>Módulos</header>
                        <span style="margin-right: 20px;" onclick="document.getElementById('moduloModal').style.display='none'"	class="close">x</span>
                    </div>
                    <div class="card">
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Menu ID</th>
                                                    <th>Módulo</th>
                                                    <th>Pantalla</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modulos as $item)
                                                <tr>
                                                    <td>{{ $item->menu_id }}</td>
                                                    <td>{{ $item->modulo }}</td>
                                                    <td>{{ $item->pantalla }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="padding: 0 30px;">
                        <div class="row">
                            <button type="submit" style="width: 120px !important; float: right;" onclick="document.getElementById('moduloModal').style.display='none'" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endsection()

    @endsection()

    <style>
        .close {
            opacity: unset;
        }

        .dataTables_scrollHead .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        .dataTables_scrollHead .dataTables_scrollHeadInner .table {
            width: 100% !important;
        }

        .dataTables_scrollBody .table thead {
            display: none;
        }

        table.dataTable tbody tr {
            cursor: pointer;
        }
        
        table.dataTable tbody tr.even:hover,
        table.dataTable tbody tr.odd:hover,
        table.dataTable tbody tr.even:hover > .sorting_1,
        table.dataTable tbody tr.odd:hover > .sorting_1 {
            background-color: #367fa9;
            color: white;
        }
    </style>

    @section('addjs')

        <script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
        <script>
            $(document).ready(function() {

                var tbModulo = $('#datatable1').DataTable({
                    scrollY     : '300px',
                    paging      : true,
                    pageLength  : 10,
                    autoWidth   : true,
                    pageLength  : 10,
                    columns: [
                        { data: 'menu_id', visible: false },
                        { data: 'modulo' },
                        { data: 'pantalla' }
                    ]
                });

                $('#modulo').click(function (e) {
                    e.preventDefault();
                    document.getElementById('moduloModal').style.display = 'block';
                });

                $('#datatable1 tbody').on('click', 'tr', function () {
                    var data = tbModulo.row(this).data();
                    var num_pantalla = parseInt(data['menu_id']);

                    $('#num_pantalla').val(data['menu_id']);
                    $('#modulo').val(data['modulo']);
                    $('#nombre_pantalla').val(data['pantalla']);

                    if (num_pantalla == 0) {
                        $('#consultar').prop("checked", true);
                        $('#crear').prop("checked", true);
                        $('#actualizar').prop("checked", true);
                        $('#eliminar').prop("checked", true);
                    }
                    else {
                        $('#consultar').prop("checked", false);
                        $('#crear').prop("checked", false);
                        $('#actualizar').prop("checked", false);
                        $('#eliminar').prop("checked", false);
                    }

                    document.getElementById('moduloModal').style.display = 'none';
                });

            });            
        </script>

    @endsection()

@endsection()
