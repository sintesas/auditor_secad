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
                                    <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->crear == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->actualizar == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->eliminar == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->activo == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-times-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                <div class="col-sm-6">
                                <form class="frmURol" method="POST">
                                     @csrf
                                     <input name="rol_privilegio_id" type="hidden" value="{{ $item->rol_privilegio_id }}">
                                     <button type="button" class="btn btn-danger btn-block btn-urol-delete editbutton"><div class="gui-icon"><i class="fa fa-times"></i></div></button>
                                    </form>
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
        <script src="{{ URL::asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#datatable1').DataTable();
          

                
                $('#datatable1').on('click', '.btn-urol-delete', function(e) {
        e.preventDefault();

        // Obtén el valor del campo oculto 'rol_privilegio_id' dentro del formulario
        var rolPrivilegioId = $(this).closest('form').find('input[name="rol_privilegio_id"]').val();

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
                $.ajax({
                    url: "{{ route('rolprivilegio.eliminar') }}",
                    type: 'POST',
                    data: { "_token": "{{ csrf_token() }}", "rol_privilegio_id": rolPrivilegioId },
                    dataType: 'json',
                    success: function (response) {
                                    if (response.tipo == 0) {  
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Asignar Rol',
                                            html: response.mensaje,
                                            confirmButtonText: 'Aceptar'
                                        }).then(result => {
                                            location.reload();
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
                });
            });

        </script>

    @endsection()
    
@endsection()