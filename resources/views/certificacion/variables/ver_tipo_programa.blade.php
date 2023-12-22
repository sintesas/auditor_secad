@extends('partials.card')

@extends('layout')

@section('title')
	Tipos Programa
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('tiposprograma')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>Tipo</b></th>
                            <th><b>H/H</b></th>
                            <th style="width: 100px;"><b>Actividades</b></th>
                            <th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($tipoprogramas as $item)
                            <tr>
                                <td>{{ $item->Tipo }}</td>
								<td>{{ $item->HH }}</td>
                                <td>
						            <div class="col-sm-1">
							            <a href="javascript:void(0)" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						            </div>
					            </td>
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