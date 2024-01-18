@extends('partials.card')

@extends('layout')

@section('title')
	Asignar Rol
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('asignar_rol')}}

            <button type="button" onclick="window.location='{{ route("usuario.index") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn" style="margin-right: 50px;"><span class="fa fa-arrow-left"></span></button>
            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="btn_priv"><span class="fa fa-plus"></span></button>            
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <h3>Usuario: {{ $usuario }}</h3>
                <hr>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>Módulo</th>
                                <th>Pantalla</th>
                                <th>Consultar</th>
                                <th>Crear</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uroles as $item)
                            <tr>
                                <td>{{ $item->rol }}</td>
                                <td>{{ $item->modulo }}</td>
                                <td>{{ $item->nombre_pantalla }}</td>
                                <td style="text-align: center;">
                                    @if ($item->consultar == 1)
                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->crear == 1)
                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->actualizar == 1)
                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->eliminar == 1)
                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->activo == 1)
                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-times-circle" style="color: red;"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="col-sm-12">
                                        <button type="button" onclick="eliminarAsignar({{ $item->usuario_rol_id }})" class="btn btn-danger btn-block editbutton"><div class="gui-icon"><i class="fa fa-times"></i></div></button>                                      
                                        {{--<form id="frmURol" name="frmURol" method="POST">
                                            @csrf
                                            <input name="usuario_rol_id" type="hidden" value="{{ $item->usuario_rol_id }}">
                                            <button type="button" id="btn-urol-delete" class="btn btn-danger btn-block editbutton"><div class="gui-icon"><i class="fa fa-times"></i></div></button>
                                        </form>--}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="uprivModal" class="modal" style="padding-top:100px;">
                <div class="modal-content">
                    <div class="card-head style-primary">
                        <header>Privilegios</header>
                        <span style="margin-right: 20px;" onclick="document.getElementById('uprivModal').style.display='none'" class="close">x</span>
                    </div>
                    <div class="card">
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive1">
                                        <table id="tb_upriv" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>X</th>
                                                    <th>ID Usuario</th>
                                                    <th>ID Rol</th>
                                                    <th>ID Privilegio</th>
                                                    <th>ID Menu Padre</th>
                                                    <th>ID Menu</th>
                                                    <th>Rol</th>
                                                    <th>Módulo</th>
                                                    <th>Pantalla</th>
                                                    <th>Consultar</th>
                                                    <th>Crear</th>
                                                    <th>Actualizar</th>
                                                    <th>Eliminar</th>
                                                    <th>Activo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($upriv as $item)
                                                <tr>
                                                    <td><input type="checkbox" class="chkMenu"></td>
                                                    <td>{{ $usuario_id }}</td>
                                                    <td>{{ $item->rol_id }}></td>
                                                    <td>{{ $item->rol_privilegio_id }}</td>
                                                    <td>{{ $item->menu_padre_id }}</td>
                                                    <td>{{ $item->menu_id }}</td>                                                    
                                                    <td>{{ $item->rol }}</td>
                                                    <td>{{ $item->modulo }}</td>
                                                    <td>{{ $item->nombre_pantalla }}</td>
                                                    <td style="text-align: center;">
                                                        @if ($item->consultar == 1)
                                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                                        @else
                                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($item->crear == 1)
                                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                                        @else
                                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($item->actualizar == 1)
                                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                                        @else
                                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($item->eliminar == 1)
                                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                                        @else
                                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($item->activo == 1)
                                                        <i class="fa fa-check-circle" style="color: green;"></i>
                                                        @else
                                                        <i class="fa fa-times-circle" style="color: red;"></i>
                                                        @endif
                                                    </td>
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
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-info btn-block" id="btn-upriv">Crear</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" onclick="document.getElementById('uprivModal').style.display='none'" class="btn btn-danger btn-block">Cancelar</button>
                            </div>
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

        .table-responsive1 .dataTables_scrollHead .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        .table-responsive1 .dataTables_scrollHead .dataTables_scrollHeadInner .table {
            width: 100% !important;
        }

        .table-responsive1 .dataTables_scrollBody .table thead {
            display: none;
        }

        .table-responsive1 table.dataTable tbody tr {
            cursor: pointer;
        }
        
        .table-responsive1 table.dataTable tbody tr.even:hover,
        .table-responsive1 table.dataTable tbody tr.odd:hover,
        .table-responsive1 table.dataTable tbody tr.even:hover > .sorting_1,
        .table-responsive1 table.dataTable tbody tr.odd:hover > .sorting_1 {
            background-color: #367fa9;
            color: white;
        }

    </style>

    @section('addjs')

        <script src="{{ URL::asset('js/libs/DataTables/jquery.dataTables.js') }}"></script>
        <script src="{{ URL::asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#datatable1').DataTable();

                $('#tb_upriv').DataTable({
                    paging      : false,
                    lengthChange: false,
                    searching   : false,
                    ordering    : false,
                    info        : false,
                    autoWidth   : false,
                    columns: [
                        { data: "" },
                        { data: "usuario_id" },
                        { data: "rol_id" },
                        { data: "rol_privilegio_id" },
                        { data: "menu_padre_id" },
                        { data: "menu_id" },                        
                        { data: "rol" },
                        { data: "modulo" },
                        { data: "nombre_pantalla" },
                        { data: "consultar" },
                        { data: "crear" },
                        { data: "actualizar" },
                        { data: "eliminar" },
                        { data: "activo" },
                    ]
                });

                var dtUPriv = $('#tb_upriv').DataTable();
                dtUPriv.columns([1,2,3,4,5]).visible(false);

                $('#btn_priv').click(function (e) {
                    e.preventDefault();
                    document.getElementById('uprivModal').style.display = 'block';
                });

                var menu_selected = [];
                var urol_selected = [];
                var usuario_id = 0;

                $('#tb_upriv tbody').on('click', 'input[type="checkbox"]', function (e) {
                    var $row = $(this).closest('tr');
                    var data = dtUPriv.row($row).data();

                    usuario_id = parseInt(data['usuario_id']);

                    var rowId = data['menu_id'];
                    var rol_id = parseInt(data['rol_id']);
                    var rol_privilegio_id = parseInt(data['rol_privilegio_id']);
                    var menu_id = data['menu_id'];
                    var menu_padre_id = data['menu_padre_id'];

                    idUsuario = usuario_id;

                    var index = $.inArray(rowId, menu_selected);

                    if (this.checked && index === -1) {
                        menu_selected.push(menu_id);
                        if (menu_padre_id != 0) {
                            menu_selected.push(menu_padre_id);
                        }
                        urol_selected.push({ usuario_id: usuario_id, rol_id: rol_id, rol_privilegio_id: rol_privilegio_id });
                        console.log(menu_selected);
                    }
                    else if (!this.checked && index !== -1) {
                        menu_selected.splice(index, 1);
                        urol_selected.splice(index, 1);
                    }

                    e.stopPropagation();
                });

                $('#btn-upriv').click(function (e) {
                    // $.ajaxSetup({
                    //     headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     }
                    // });

                    e.preventDefault();

                    if (urol_selected.length > 0) {
                        var menus = menu_selected.join(",");

                        $.ajax({
                            url: "{{ route('crear.asignar') }}",
                            type: "POST",
                            data: {
                                usuario_id: usuario_id,
                                menu_id: menus == "" || menus == 0 ? null : menus,
                                uroles: JSON.stringify(urol_selected)
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == true) {                                    
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Asignar Rol',
                                        html: response.mensaje,
                                        confirmButtonText: 'Aceptar',
                                        confirmButtonColor: "#3085d6"
                                    }).then(result => {
                                        document.getElementById('uprivModal').style.display = 'none';
                                        var ruta = '{{ route("asignar.rol", ":id") }}';
                                        ruta = ruta.replace(':id', usuario_id);
                                        window.location = ruta;
                                    });
                                }
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'ERROR',
                                        html: response.mensaje,
                                        confirmButtonText: 'Aceptar',
                                        confirmButtonColor: "#3085d6"
                                    });
                                }
                            }
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            html: 'Por favor seleccione una o más.',
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: "#3085d6"
                        });
                    }
                });                
            });
        </script>
        <script>
            function eliminarAsignar(id) {
                Swal.fire({
                    icon: 'question',
                    title: 'Eliminar Rol',
                    text: '¿Estás seguro que quieres eliminar?',
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: "#ed1c24",
                }).then(result => {
                    if (result.dismiss != "cancel") {
                        var url = '{{ route("eliminar.asignar", ":id") }}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: 'json',
                            success: function (response) {
                                if (response.tipo == 0) {  
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Asignar Rol',
                                        html: response.mensaje,
                                        confirmButtonText: 'Aceptar'
                                    }).then(result => {
                                        var ruta = '{{ route("asignar.rol", ":id") }}';
                                        ruta = ruta.replace(':id', response.id);
                                        window.location = ruta;
                                    });  
                                }
                                else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'ERROR',
                                        html: response.mensaje,
                                        confirmButtonText: 'Aceptar'
                                    });
                                }
                            }
                        });
                    }
                }); 
            }
        </script>

    @endsection()

@endsection()