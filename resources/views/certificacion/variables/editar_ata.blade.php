@extends('partials.card')

@extends('layout')

@section('title')
	Modificar ATA
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('editar_ata') }}
		@endsection()

		@section('card-content')


<div class="row">
	{!! Form::model($ata, ['route' => ['ata.update', $ata->IdATA], 'method' => 'PUT' ]) !!}
		<div class="col-md-8">

		{!!Form::label('ATA','ATA')!!}
		{{Form::text('ATA', null, ["class" => 'form-control input-lg', 'required' => 'required']) }}	
		
		{!!Form::label('CodATA', 'Codigo ATA')!!}	
		{{Form::text('CodATA',null, ['class' => 'form-control', 'required' => 'required']) }}
		
		{!!Form::label('General', 'General')!!}	
		{{Form::text('General',null, ['class' => 'form-control', 'required' => 'required']) }}

		</div>	
	
	
	<div class="col-md-4" style="margin-top: 100px;>
		<div class="well">
			
			
			<div class="row">
					
					
					<div class="col-sm-12">	
						
						{{Form::submit('Guardar', ['class' => 'btn btn-success btn-block'])}}

						<!-- {!!Html::linkRoute('ata.update', 'Save', 'array($ata->IdATA)', array('class' => 'btn btn-success btn-block')) !!} -->

					</div>
	
				</div>
	
			</div>
	</div>
	{!! Form::close()!!}
</div>




		@endsection()


	@endsection()


@endsection()