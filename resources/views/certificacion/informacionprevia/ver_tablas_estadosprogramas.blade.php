@extends('partials.card')

@extends('layout')

@section('title')
	Estados Programa
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('estadosprograma')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
							<th><b>Descripción</b></th>
							<th><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($estadosprograma as $item)
                            <tr>
                                <td>{{ $item->Descripcion }}</td>
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