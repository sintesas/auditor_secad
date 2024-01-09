@extends('partials.card')

@extends('layout')

@section('title')
	Informe Funcionario
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			
			{{ Breadcrumbs::render('informeFuncionarioAuditoriaVer') }}

		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Funcionario </b></th>
							<th><b>Total Tiempo</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dataFuncionarios as $item)
						<tr>
							<td>{{$item->Nombres." ".$item->Apellidos}}</td>
							<td>
								<?php
									$dataAuditorias = DB::table('AU_Reg_Personal')
									->join('AU_Reg_Auditorias', 'AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_Auditorias.IdPersonalInsp')
									->where('AU_Reg_Personal.IdPersonal', '=',$item->IdPersonal)
									->get();

									$tmp = 0;
									$year = array();
									$dia = array();
									$mes = array();
									$hora = array();
									$minuto = array();
								?>
								@forelse ($dataAuditorias as $val)
									<?php
										$dteStart = new DateTime($val->FechaAperAudit." ".$val->HoraIni);
										$dteEnd   = new DateTime($val->FechaTermino." ".$val->HoraTermi); 

										$difference = $dteStart->diff($dteEnd);

										if($difference->y > 0){
											$year[$tmp] = $difference->format('%Y');
										}
										if($difference->m > 0){
											$mes[$tmp] = $difference->format('%m');
										}
										if($difference->d > 0){
											$dia[$tmp] = $difference->format('%d');
										}
										if($difference->h > 0){
											$hora[$tmp] = $difference->format('%H');
										}
										if($difference->i > 0){
											$minuto[$tmp] = $difference->format('%i');
										}
										$tmp++;
									?>
								@empty
									<span>No tiene fecha asignadas</span>
								@endforelse
								
								<span>
									<?php
										if(array_sum($year) > 0){
											echo array_sum($year)." Años, ";
										}
										if(array_sum($mes) > 0){
											echo array_sum($mes)." Meses, ";
										}
										if(array_sum($dia) > 0){
											echo array_sum($dia)." Días, ";
										}
										if(array_sum($hora) > 0){
											echo array_sum($hora)." Horas, ";
										}
										if(array_sum($minuto) > 0){
											echo array_sum($minuto)." Minutos";
										}
									?>
								</span>
							</td>
							<td>
								<div class="col-sm-6">
									<a href="{{route('VistaHHAuditorias.show', $item->IdPersonal) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->

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