@extends('partials.card')

@extends('layout')

@section('title')
	Crear Ata
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Creación de codigos ATA
		@endsection()

		
			{{-- <form action="{{route('ata.create')}}" method="POST"> --}}
			
			@section('form-tag')
				{!! Form::open(['route' => 'ata.store']) !!}
			@endsection()

				{{ csrf_field()}}

			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="codigo_ata">Codigo Ata</label>
						<input type="text" class="form-control" id="codigo_ata" name="codigo_ata" >
					</div>

					<div class="form-group">
						<label for="capitulo">Capitulo</label>
						<input type="text" class="form-control" id="capitulo" name="capitulo" >
					</div>

					<div class="form-group">
						<label for="general">General</label>
						<textarea type="textarea" class="form-control" id="general" name="general" ></textarea>
					</div>
				</div>
			</div>

				{{-- submit button --}}
				
				<div class="form-group">
					<button type="submit" style="" class="btn btn-primary">Crear Codigo</button>
				</div>	

			
			
				


				
			{!! Form::close() !!}
		


    		{{-- {!! Form::open(array('route' => 'ata.store')) !!}	 --}}	
    				

			




		
		

		

{{-- override --}}
{{-- 
		@section('button')
			Imprimir Tabla
		@endsection() --}}


{{-- 
	Name	Info
    ID	    int, not null
    ATA	    nvarchar(255), null
    CODATA	nvarchar(255), null
    GENERAL	nvarchar(255), null
    Campo4  nvarchar(255), null
 --}}


	@endsection()

@endsection()