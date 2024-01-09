@extends('partials.card_big')

@extends('layout')

@section('title')
	Seguimiento Causa Raiz
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	.cal {
		  float: left;
		  width: 20px;
		  height: 20px;
		  margin: 5px;
		  border: 1px solid rgba(0, 0, 0, .2);
		}

		.green {
		  background: #00B050;
		}

		.orange {
		  background: #ff6b16;
		}

		.red {
		  background: #DA9694;
		}
		.btn-view{
			padding: 0;
			margin-left: 15px;
			margin-top: 10px;
		}
		#acciones-btn{
			padding: 0;
			margin: 0;
		}

</style>

@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('seguimientocausaraiz') }}

		@if ($rol)
			<!-- The Modal -->
			<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif


		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="table-responsive col-lg-12">
				@if($rolAdmin || $rol_IGEFA || $rol_CEOAF)
			<a href="{{url('exportSeguimientoCausaRaiz')}}" class="btn btn-md btn-info pull-left">Descargar EXCEL</a>
		@endif
				<table id="datatable1" class="table table-striped table-hover table-responsive">
					<thead style="font-size: 12px;">
						<tr>
							<th style="width: 50px;padding-left: 0px; padding-right: 0px; text-align: center;">Estado</th>
							<th style="width: 50px;padding-left: 0px; padding-right: 0px; text-align: center;" >Porcentaje</th>
							<th style="width: 50px;padding-left: 0px; padding-right: 0px; text-align: center;" >En curso</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Codigo Auditoria</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Responsable</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Anotación</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Actividad</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Acciones Mejora</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Fecha Seguimiento</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Dias Restantes</th>
							<th style="width: 120px;padding-left: 0px; padding-right: 0px; text-align: center;" >Acción</th>
						</tr>
					</thead>
					<tbody id="data_table" name="data_table">
						@foreach ($seguimientos as $seguimiento)
						<tr style="font-size: 12px;">
							<td>
								@if($seguimiento->Porcentaje < 100)
									<i class="cal red"></i>
								@else
									<i class="cal green"></i>
								@endif
							</td>
							<td>{{$seguimiento->Porcentaje}} %</td>
							<td>{{$seguimiento->NombreEstado}}</td>
							<td>{{$seguimiento->Codigo}}</td>
							<td>{{$seguimiento->Name}}</td>
							<td>{{$seguimiento->NoAnota}}</td>
							<td>{{$seguimiento->AccionTarea}}</td>
							<td>{{$seguimiento->AccionSeguimiento}}</td>
							<td>{{$seguimiento->FechaSeguimiento}}</td>
							<td>
								<?php
									$fecha_actual = date('Y-m-d');
									$s = strtotime($seguimiento->FechaFinal) - strtotime($fecha_actual);
									$d = intval($s/86400);
									echo $d . ' Dias'
								?>
							</td>
							<td id="acciones-btn">

								<div class="col">

									@if($rolAdmin)
										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary " ><div class="gui-icon-view"><i class="fa fa-pencil"></i></div></a>

										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary " ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>

										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success " ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

									@endif


									<!--RESPONSABLE-->
									@if ($seguimiento->IdEstadoSeguimiento == 1 || $seguimiento->IdEstadoSeguimiento == 4)

											@if (strcmp(trim($email),trim($seguimiento->Email)) == 0 && $rolAdmin == false)

											@if($rolAdmin)
												@break
											@endif

												<a href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-pencil"></i></div></>

												@break
											@endif
											@if(strcmp(trim($email),trim($seguimiento->Email)) == 1)

												@if($rolAdmin)
													@break
												@endif

												<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>

												@break
											@endif

									@else
										@if($rolAdmin!=true)
										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>
										@endif
									@endif

									@if($seguimiento->IdEstadoSeguimiento != 8)

										{{-- Responsable --}}
										@if ($seguimiento->IdEstadoSeguimiento == 1 || $seguimiento->IdEstadoSeguimiento == 4)

												@if (strcmp(trim($email),trim($seguimiento->Email)) == 0 && $rolAdmin != true)

													@if($rolAdmin)
														@break
													@endif

													<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

													@break
												@endif

										{{-- CEOAF --}}
										@elseif ($seguimiento->IdEstadoSeguimiento == 3 || $seguimiento->IdEstadoSeguimiento == 7)
											@if ($rol_CEOAF && $rolAdmin != true)

												<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

											@endif

										{{-- IGEFA --}}
									
										@elseif($seguimiento->IdEstadoSeguimiento == 5)
											@if ($rol_IGEFA && $rolAdmin != true)

													<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

											@endif
										@endif

									@endif

								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<h5 id="conteo"></h5>
				<input type="hidden" id="tablehtml">

				{{-- <div class="text-center">
				{!! $seguimientos->links(); !!}
				</div> --}}
			</div><!--end .table-responsive -->
		</div><!--end .col -->
		@endsection()

	@endsection()

	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/jszip.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/buttons.html5.min.js')}}"></script>

		<script>

			function aprobarSeguimiento(ev){
				var dato = confirm('Aprobar Seguimiento');
				if(dato){
					if(ev != ''){
						$.get("seguimientoCausaRaiz/AprobarSeguimiento/" + ev + "", function(response, state){
							if(response == 1){
								window.location = '{{ route("seguimientoCausaRaiz.index") }}';
							}else{
								alert('No fue posible actualizar el seguimiento');
							}
						});
					}
				}
			}
			/*setTimeout(function(){
                $('#datatable1').DataTable(
					{
						//Excel
						dom: 'Bfrtip',
						buttons: [
							{
								extend: 'excelHtml5',
								text: 'Excel',
								title: 'Seguimientos',
								download: 'open',
								orientation:'landscape',
								exportOptions: {
									columns: ':visible'
								},
								className: "btn btn-primary"
							}
						]
					}
				);
				//PDF
				//$('.dt-buttons').prepend('<button type="button" onclick="return exportFile(\'build\');" style="padding: 4.5px 14px; width: 60px; font-style: Roboto;" class="btn btn-primary pull-left"> PDF </button>&nbsp;');
            }, 100);	*/


			/*function exportFile(type){
                location.href='{{ url("filterDinamicCompanyReportCreator") }}' + '?data=' + dinamicDataConfig(type);
            }

			function dinamicDataConfig(type){
                var dt = {
                    "type" : type
                }
                return encodeURIComponent(JSON.stringify(dt));
            }*/

			var filtros = [];
			var pdfexport;
			$(document).ready(function() {

				$('#datatable1').DataTable({
					paging: false,
					info:false,
//					ordering: false,
					initComplete: function () {
						this.api().columns().every( function () {
							var column = this;
							if (column[0] != 11 && column[0] != 12) {
								var select = $('<br><select style="color:#000; width:90%;"><option value=""></option></select>')
								.appendTo( $(column.header()) )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val(),
										filtros.push($(this).val()));

									column.search( val ? '^'+val+'$' : '', true, false ).draw();
									var pdfexport = $('#data_table').html().trim();
									var cantidad = ($('#datatable1').rowCount());
									savedataPDf(pdfexport,cantidad);
									$('#conteo').html('Cantidad de seguimientos ' + $('#datatable1').rowCount());
								} );

								column.data().unique().sort().each( function ( d, j ) {
									select.append( '<option value="'+d+'">'+d+'</option>' )
									});
							}
					});
				},
				"order": [[ 1, "asc" ]],
				});
				if ( ! $('#datatable1').rowCount() ) {
					$('#conteo').html('0');
				}
				else
				{
					console.log($('#datatable1').rowCount());
					$('#conteo').html('Cantidad de seguimientos ' + $('#datatable1').rowCount());
				}
			});



			$(window).bind("load", function() {
			var pdfexport = $('#data_table').html().trim();
				var cantidad = ($('#datatable1').rowCount());
				//savedataPDf(pdfexport,cantidad);
			});

			$.fn.rowCount = function() {
				return $('tr', $(this).find('tbody')).length;
			};


			/*function savedataPDf(pdfexport,cantidad){
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
				});

				$.ajax({

					type: 'post',
					url: 'pdftodb',
					data: {
						'table' : pdfexport,
						'cantidad':cantidad,
					},
					success: function(data){
						// alert("Saved to db");
					}
				});
			}*/

		</script>

		@endsection()

@endsection()
