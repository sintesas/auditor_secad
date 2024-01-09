@extends('partials.card_big_no_h')

@extends('partials.pdf')


<body style="background-color: white">
	


@section('content')

	@section('card-content')
		<div class="row encabezadoPlanInspeccion">

            <!-- titulo Formulario -->
            <div class="col-xs-12 text-center">
                {{-- <h3>SECCION DE CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3> --}}
                <div>
                    <h4>Observaciones del Programa</h4>
                    <h5>{{$programa->Consecutivo}}</h5>
                    <h5>{{$programa->Proyecto}}</h5>
                </div>                        
           </div>                              
        </div>
		<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
			<thead  style="font-size: 9.5px;">
				<tr>
					<th style="width:10%; padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha</b></th>
				<th style="width: 90%; padding-left: 0px; padding-right: 0px; text-align: center;"><b>Observacion</b></th>
				</tr>
			</thead>
			
			<tbody id="data_table" name="data_table">
				@foreach ($observaciones as $observacion)
				<tr>
					<td style="font-size: 8px;">{{$observacion->Fecha}}</td>
					<td style="font-size: 9px;">{{$observacion->Observacion}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
			 
	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>