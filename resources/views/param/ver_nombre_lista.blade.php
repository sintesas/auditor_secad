@extends('partials.card')

@extends('layout')

@section('title')
	Nombres Listas
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('nombre_lista')}}

            @if ($permiso->crear == 1)
            <button type="button" onclick="window.location='{{ route("nombrelista.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> 
            @endif 
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Nombre</b></th>
                            <th><b>Descripción</b></th>
                            <th><b>Estado</b></th>
                            <th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($listas as $item)
                            <tr>
                                <td>{{ $item->nombre_lista }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td style="text-align: center;">
                                    @if ($item->activo == 1)
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: green;"></i></div>
                                    @else
                                    <div class="gui-td-icon"> <i class="fa fa-check-circle" style="color: red;"></i></div>
                                    @endif
                                </td>
                                <td>
                                    @if ($permiso->actualizar == 1)
                                   {{--<div class="col-sm-6">
                                        <a href="{{ route('nombrelista.edit', $item->nombre_lista_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
                                    </div> --}}
                                    @endif
                                    <div class="col-sm-6">
                                        <a href="{{ route('listasvalores.indice', $item->nombre_lista_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-list"></i></div></a>
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
            $(document).ready(function(){
            $('#datatable1').DataTable();
        });
        </script>

    @endsection()
    
@endsection()