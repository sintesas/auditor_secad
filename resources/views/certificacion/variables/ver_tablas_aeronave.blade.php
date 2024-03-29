@extends('partials.card')

@extends('layout')

@section('title')
	Aeronaves
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('aeronaves')}}

            @if ($permiso->crear == 1)
            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
            @endif
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
							<th><b>Equipo</b></th>
							<th><b>Aeronave</b></th>
							<th><b>Grupo</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($aeronaves as $item)
                            <tr>
                                <td>{{ $item->Equipo }}</td>
								<td>{{ $item->Aeronave }}</td>
								<td>{{ $item->Grupo }}</td>
                                <td>
                                    @if ($permiso->eliminar == 1)
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block editbutton" ><div class="gui-icon"><i class="fa fa-times"></i></div></a>
                                    </div>
                                    @endif
                                    @if ($permiso->actualizar == 1)
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-edit"></i></div></a>
                                    </div>
                                    @endif
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