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

		@section('card-content')

		
			{{-- WHAT IS GRILLA? --}}


		@endsection()

		@section('button')
			Imprimir Tabla
		@endsection()


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