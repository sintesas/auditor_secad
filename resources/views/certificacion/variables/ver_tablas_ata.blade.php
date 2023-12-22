@extends('partials.card')

@extends('layout')

@section('title')
	Sistema ATA
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
			{{Breadcrumbs::render('ata')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

        @section('card-content')

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <th><b>ATA</b></th>
					        <th style="width: 100px"><b>Codigo ATA </b></th>
					        <th><b>General</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
                        </thead>
                        <tbody>
                            @foreach ($atas as $item)
                            <tr>
                                <td>{{ $item->ATA }}</td>
								<td>{{ $item->CodATA }}</td>
								<td>{{ $item->General }}</td>
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