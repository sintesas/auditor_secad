@extends('partials.card')

@extends('layout')

@section('title')
    Tablas Base Certificación
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('basecertificacion')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Origen</b></th>
							<th><b>Autoridad</b></th>
							<th><b>Clase</b></th>
							<th><b>Referencia</b></th>
							<th><b>Nombre</b></th>
							<th><b>Aplicación</b></th>
							<th><b>Fecha Enmienda</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($basesCertifica as $item)
                            <tr>
                                <td>{{ $item->Origen }}</td>
                                <td>{{ $item->Autoridad }}</td>
                                <td>{{ $item->Clase }}</td>
                                <td>{{ $item->Referencia }}</td>
                                <td>{{ $item->Nombre }}</td>
                                <td>{{ $item->Aplicacion }}</td>
                                <td>{{ $item->FechaEnmienda }}</td>
                                <td>
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block editbutton" ><div class="gui-icon"><i class="fa fa-times"></i></div></a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-edit"></i></div></a>
                                    </div>
                                </td>                                                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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