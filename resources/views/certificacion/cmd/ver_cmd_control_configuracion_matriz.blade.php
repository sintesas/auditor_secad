@extends('partials.card')

@extends('layout')

@section('title')
	Ver Niveles
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Niveles Control Configuración
		@endsection()

		@section('card-content')
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}} - {{$programa->Proyecto}}</h4>


<div class="card-body floating-label">
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="cadena" id="cadena" value="{{$cadena}}">
			<h4>Lista de niveles</h4>
			<ul id="lista">

			</ul>
		</div>
	</div>
	</div>

		<div class="col-sm-12" style="padding-top:1rem;">
			<a href="{{route('cmdProgramas.index') }}" class="btn btn-danger">Volver a lista de programas</a>
		</div>
@foreach($Niveles as $nivel)
		<div class="modal fade mdl_notas" id="mdl_{{$nivel->id_list}}" tabindex="-1" role="dialog" aria-labelledby="mdl_{{$nivel->id_list}}" aria-hidden="true">
			{!! Form::model($nivel, ['route' => ['cmdEvidencias.update', $nivel->IdNivelProgBaseCerti], 'method' => 'PUT', 'files' => true]) !!}
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">EVIDENCIA - {{$nivel->TituloNivel}}</h4>
					</div>
					<div class="modal-body">
						<div class="row">

							<div class="col-sm-6">
								<div class="form-group">
									<input class="form-control" id="elemento" type="text" name="elemento" value="{{$nivel->elemento}}">
									<label for="elemento">Elemento</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="parte" type="text" name="parte" value="{{$nivel->Parte}}">
								<label for="parte">Parte Número</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input class="form-control" id="cantidad" type="number" name="cantidad" value="{{$nivel->Cantidad}}">
							<label for="cantidad">Cantidad</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<select class="form-control" id="idATA" name="idATA">
							<option value="">Seleccionar</option>
							@foreach($atas as $ata)
							<option value="{{$ata->IdATA}}" @if($ata->IdATA == $nivel->IdATA) selected @endif>{{$ata->ATA}}</option>
							@endforeach
						</select>
						<label for="idATA">ATA</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" id="Version" type="text" name="Version" value="{{$nivel->Version}}">
					<label for="Version">Versión</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<input class="form-control" id="fecha" type="date" name="fecha" value="{{$nivel->Fecha}}">
				<label for="fecha">Fecha</label>
		</div>
	</div>

						</div>
						<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
						<input type="hidden" name="programa" value="{{$IdPrograma}}">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info btn-block">Confirmar</button>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		@endforeach

		<script type="text/javascript">

		$(document).on('ready', function(){
			cargar_lista();
		})


		function cargar_lista(){

			var cadena = $('#cadena');
			if (cadena.val() == '')
			{
					cadena = [];
			}
			else {
					cadena = JSON.parse(cadena.val());
			}
			$('#lista li').remove();

			for(var i = 1;i<=7;i++){
				$.each(cadena, function(index, value){
					var tx = value['titulo'];
					var nn = value['nn'];
					var nv = value['nivel'];
					var id = value['id'];
					var pd = value['padre'];
					if(parseInt(nv)==i){
						var item = '<li id="nivel_'+id+'" nivel="'+nv+'"><pre>'+tx+'</pre><a href="#" class="btn btn-primary remove_item" aria-label="Close" data-toggle="modal" data-target="#mdl_'+id+'"><span aria-hidden="true">Evidencias</span></a><ul id="list_'+id+'"></ul></li>';
						if(i==1){
							$('#lista').append(item);
							var dato = {nn: nn ,id:id, titulo:tx, nivel:nv, padre:pd};
							//new_list.push(dato);
						}
						else{
							if($('#list_'+pd).length > 0){
								$('#list_'+pd).append(item);
								var dato = {nn: nn ,id:id, titulo:tx, nivel:nv, padre:pd};
								//new_list.push(dato);
							}
						}
					}

				})
			}

		}
		</script>

		@endsection()


	@endsection()

@section('addjs')

@endsection()


@endsection()
