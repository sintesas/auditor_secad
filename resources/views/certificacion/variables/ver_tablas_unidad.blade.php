@extends('partials.card')

@extends('layout')

@section('title')
	Unidades
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('unidades')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Nombre Unidad</b></th>
							<th><b>Denominacion</b></th>
							<th><b>Ciudad</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($unidades as $item)
                            <tr>
                                <td>{{ $item->NombreUnidad }}</td>
								<td>{{ $item->Denominacion }}</td>
								<td>{{ $item->Ciudad }}</td>
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