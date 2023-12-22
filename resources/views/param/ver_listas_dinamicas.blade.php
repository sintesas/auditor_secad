@extends('partials.card')

@extends('layout')

@section('title')
	Listas Valores
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('lista_dinamica')}}

            <button type="button" onclick="window.location='{{ route("nombrelista.index") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn" style="margin-right: 50px;"><span class="fa fa-arrow-left"></span></button>
            <button type="button" onclick="window.location='{{ route("listasvalores.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Lista Valor</b></th>
                            <th><b>Código</b></th>
                            <th><b>Descripción</b></th>
                            <th><b>Lista Valor Padre<b></th>
                            <th><b>Estado</b></th>
                            <th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($listas as $item)
                            <tr>
                                <td>{{ $item->lista_dinamica }}</td>
                                <td>{{ $item->codigo }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->lista_dinamica_padre }}</td>
                                <td style="text-align: center;">
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
                                        <a href="{{ route('listasvalores.edit', $item->lista_dinamica_id) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
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