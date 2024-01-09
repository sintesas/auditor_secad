@extends('partials.card_big')

@extends('layout')

@section('title')
Informacion Produccion 
@endsection()

@section('addcss')
<link type="text/css" rel="stylesheet" href="{{URL::asset('css/theme-default/libs/wizard/wizard.css')}}" />
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .checkboxes{
        list-style: none;
        } 
    .test
    {
        width: auto;
    }
</style>

@endsection()

@section('content')

@section('card-content')

@section('card-title')
    {{ Breadcrumbs::render('detalle_informacion_produccion') }}
@endsection()

@section('card-content')
    
    <style>
    .checkboxes{
        list-style: none;
        } 
    .test
    {
        width: auto;
    }
</style>
    <h4><strong>Empresa: </strong>{{$empresa->NombreEmpresa}}</h4>
    <br>
    
    <div class="card floating-label">
    {{-- TABS HEADERS --}}
    <ul class="nav nav-tabs" data-toggle="tabs">
      <li><a  href="#home">Características<br>Empresa</a></li>
      <li><a  href="#menu1">Productos<br>FF.MM</a></li>
      <li><a  href="#menu2">Mercado</a></li>
      <li><a  href="#menu3">Tecnología<br>Empresa</a></li>
      <li><a  href="#menu4">Materia<br>Prima</a></li>
      <li><a  href="#menu5">Producción<br>Empresa</a></li>
      <li><a  href="#menu6">Productos<br>Ofrecidos</a></li>
    </ul>
    {{-- END TABS HEADERS --}}
    {{-- TABS CONTENT --}}
    <div class="card-body tab-content">
        {{-- Características Empresa Content --}}
      <div id="home" class="tab-pane active">
            
        <div class="card-body">


        <form name="caracteristicasempresa" id="caracteristicasempresa">
        {{-- WIZARD STARTS HERE --}}

        <input type="hidden" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">

            <div id="rootwizard1" class="form-wizard form-wizard-horizontal">
                
                    <div class="form-wizard-nav">
                        <div class="progress" style="width: 75%;"><div class="progress-bar progress-bar-primary" style="width: 0%;"></div></div>
                        <ul class="nav nav-justified nav-pills">
                            <li class="active"><a href="#tab1" data-toggle="tab"><span class="step">1</span> <span class="title">CARACTERISTICAS</span></a></li>
                            <li><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">CARACTERISTICAS</span></a></li>
                        </ul>
                    </div><!--end .form-wizard-nav -->
                        


                    <div class="tab-content clearfix">

                        <div class="tab-pane active" id="tab1">
                            
                            <br><br>

                        <input type="hidden" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">

                        <div class="col-xs-4"> 
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('CantidadFuncionarios',  isset($caracteristica->CantidadFuncionarios) ? $caracteristica->CantidadFuncionarios : null) }}" id="CantidadFuncionarios"  name="CantidadFuncionarios" required>
                                <label for="CantidadFuncionarios">2.1 Numero de empleados: </label>
                            </div>
                        </div>
                        
                        <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ old('Areaconstruida',  isset($caracteristica->Areaconstruida) ? $caracteristica->Areaconstruida : null) }}" id="Areaconstruida"  name="Areaconstruida" required>
                                    <label for="Areaconstruida">2.2 Infraestructura (m2): </label>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" value="{{ old('Areaconstruida',  isset($caracteristica->Areaconstruida) ? $caracteristica->Areaconstruida : null) }}" class="form-control"  id="AreaTerreno" name="AreaTerreno" required>
                                    <label for="AreaTerreno">2.3 Area de Terreno (m2) </label>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="form-group">
                                    <input type="text" value="{{ old('Areaconstruida',  isset($caracteristica->Areaconstruida) ? $caracteristica->Areaconstruida : null) }}" class="form-control"  id="ActividadEconomica" name="ActividadEconomica" required>
                                    <label for="ActividadEconomica">2.4 Actividad Economica:</label>
                                </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                {{ Form::select('IdTamanoEmpresa', $tamanoempresa->where('Activo', '1')->pluck('TamanoDescripcion', 'IdTamanoEmpresa'), old('IdTamanoEmpresa',  isset($caracteristica->IdTamanoEmpresa) ? $caracteristica->IdTamanoEmpresa : null), ['class' => 'form-control', 'id' => 'IdTamanoEmpresa']) }}
                                <label for="IdTamanoEmpresa">Tamaño de la Empresa (Por número de Empleados)</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                 {{ Form::select('IdCriterioFinanciero', $criteriofinanciero->pluck('IngresosAnuales', 'IdCriterioFinanciero'), old('IdCriterioFinanciero',  isset($caracteristica->IdCriterioFinanciero) ? $caracteristica->IdCriterioFinanciero : null), ['class' => 'form-control', 'id' => 'IdCriterioFinanciero']) }}
                                <label for="IdCriterioFinanciero">Ingresos anuales</label>
                            </div>
                        </div> 
                        <br>
                        <div class="col-xs-12" style="margin-bottom: 50px;">
                            <H3 class= "text-center"> Composición del Capital</H3>
                        </div>
                        <br>
                        
                       

                        <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('Areaconstruida',  isset($caracteristica->Areaconstruida) ? $caracteristica->Areaconstruida : null) }}" class="form-control" id="CapitalMonedaNacional"  name="CapitalMonedaNacional" required>
                                    <label for="CapitalMonedaNacional">% Capital Moneda Nacional: </label>
                                </div>
                        </div>
                        <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" value="{{ old('CapitalMonedaExtranjera',  isset($caracteristica->CapitalMonedaExtranjera) ? $caracteristica->CapitalMonedaExtranjera : null) }}"  class="form-control" id="CapitalMonedaExtranjera" name="CapitalMonedaExtranjera" required>
                                    <label for="CapitalMonedaExtranjera">% Capital Moneda Extranjera: </label>
                                </div>
                        </div>
                        </div><!--end #tab1 -->

                        <div class="tab-pane" id="tab2">
                            <br><br>
                            
                            <div style="text-align: center;" class="col-xs-12">
                                <div class="row">
                                    <div class="form-group">                
                                        <h3>2.5 Número de Empleados por Nivel Academico: </h3> 
                                    </div>
                                </div>                            
                            </div>
                            <div style="margin-bottom: 100px; " class="row">
                                <H4 class= "text-center"> Distribución por nivel de Educación </H4>
                            </div>

                            <div class="col-xs-6">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text"  value="{{ old('EmpleadosPrimaria',  isset($caracteristica->EmpleadosPrimaria) ? $caracteristica->EmpleadosPrimaria : null) }}" class="form-control"  id="EmpleadosPrimaria" name="EmpleadosPrimaria" required>
                                                <label for="EmpleadosPrimaria">Educación Primaria: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosSecundaria',  isset($caracteristica->EmpleadosSecundaria) ? $caracteristica->EmpleadosSecundaria : null) }}"  class="form-control" id="EmpleadosSecundaria" name="EmpleadosSecundaria" required>
                                                <label for="EmpleadosSecundaria">Educación Secundaria: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosTecnica',  isset($caracteristica->EmpleadosTecnica) ? $caracteristica->EmpleadosTecnica : null) }}" class="form-control" id="EmpleadosTecnica" name="EmpleadosTecnica" required>
                                                <label for="EmpleadosTecnica">Educación Ténica </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosSuperior',  isset($caracteristica->EmpleadosSuperior) ? $caracteristica->EmpleadosSuperior : null) }}" class="form-control" id="EmpleadosSuperior" name="EmpleadosSuperior" required>
                                                <label for="EmpleadosSuperior">Educación Superior </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{--  end-col-6 --}} 

                                <div class="col-xs-6">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosPostgrado',  isset($caracteristica->EmpleadosPostgrado) ? $caracteristica->EmpleadosPostgrado : null) }}" class="form-control" id="EmpleadosPostgrado" name="EmpleadosPostgrado" required>
                                                <label for="EmpleadosPostgrado">Postgrado: </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosMagister',  isset($caracteristica->EmpleadosMagister) ? $caracteristica->EmpleadosMagister : null) }}" class="form-control" id="EmpleadosMagister" name="EmpleadosMagister" required>
                                                <label for="EmpleadosMagister">Magíster  </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('EmpleadosDoctorado',  isset($caracteristica->EmpleadosDoctorado) ? $caracteristica->EmpleadosDoctorado : null) }}" class="form-control" id="EmpleadosDoctorado" name="EmpleadosDoctorado" required>
                                                <label for="EmpleadosDoctorado">Doctorado </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <br>
                                    <br>

                        <input type="button" name="submitcaracteristicasempresa" id="submitcaracteristicasempresa" class="btn btn-info btn-block" value="Guardar" />

                        
                        <div class="alert alert-danger print-error-msg-caracteristicas" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg-caracteristicas" style="display:none">
                        <ul></ul>
                        </div>
                                    
                        
                        </div><!--end #tab2 -->
                    </div><!--end .tab-content -->
                    {{-- wizard pager --}}
                    <ul class="pager wizard">
                        <li class="previous first disabled"><a class="btn-raised" href="javascript:void(0);">Inicio</a></li>
                        <li class="previous disabled"><a class="btn-raised" href="javascript:void(0);">Anterior</a></li>        
                        <li class="next last"><a class="btn-raised" href="javascript:void(0);">Ultimo</a></li>
                        <li class="next"><a class="btn-raised" href="javascript:void(0);">Siguiente</a></li>
                    </ul>
                    {{-- end wizard pager --}}

            </div><!--end #rootwizard -->

        </form>

        </div>
     </div> {{-- home --}}
    {{-- END Características Empresa Content --}}

    {{-- Productos FF.MM Content --}}
      <div id="menu1" class="tab-pane fade">
        <div class="card-body floating-label">
           <div class="row">
                
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Producto / item:</th>
                                <th>Ventas(Directa / Indirecta)</th>
                                <th>Cliente FF/MM</th>
                                <th>x</th>
                            </thead>
                            <tbody>
                                @foreach($productosffmm as $productoffmm)
                                <tr class="productoffmm{{$productoffmm->IdProductosFM}}">
                                    <td>
                                        {{$productoffmm->ProductoItem}}
                                    </td>
                                    <td>
                                        {{$productoffmm->Ventas}}
                                    </td>
                                    <td>
                                        {{$productoffmm->clienteFfmmListado->NombreCliente}}
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-delete delete-record-productoffmm" value="{{$productoffmm->IdProductosFM}}"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>

                        <form name="productosffmm" id="productosffmm"> 
                            {{ csrf_field() }}
                            <table class="table table-striped table-hover" id="dynamic_field_productosffmm">
                                
                            </table>

                            {{-- End form --}}
                        <br>  
                        {{-- alerts --}}
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>
                        {{-- end alerts --}}
                        <button type="button" name="addProductoffmm" id="addProductoffmm" class="btn btn-success">Nuevo Campo</button>
                        <br>

                        </form>
                        
                    </div> {{-- end table responsive --}}
                
            </div> {{-- end row --}}
            <br>

            <div class="form-group">
                <div class="row">
                        <div class="col-sm-6">
                            <input type="button" name="submitproductosffmm" id="submitproductosffmm" class="btn btn-info btn-block" value="Guardar" />
                        </div>
                        <div class="col-sm-6">
                            <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                </div>
            </div>                    
        </div> {{-- card-body floating-label --}}          
      </div>{{-- END Productos FF.MM Content --}}

{{-- Mercado Content --}}  



<div id="menu2" class="tab-pane fade">
    
    <form name="mercado" id="mercado"> 
        {{ csrf_field() }}

    <div class="card-body floating-label">
            
                <div class="col-xs-12"> 
                <!-- TABLA SUPERIOR-->                           
                    <div class="col-xs-12">
                        <h4> 4.1 </h4> 
                        <h5> 
                           <b> Qué porcetanje de la facturación bruta anual originaria de ventas tiene la Empresa para los sectores aeronáutico, aeroespacial, bélico y otros </b>
                            </h5>
                            <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                
                                <div class="row">
                                    <div class="card-body"> 
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="dynamic_field_mercado1">
                                                <thead>
                                                    <th>Sector Mercado</th>
                                                    <th>Participacion %</th>
                                                    <th>x</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($infomercado as $info)
                                                    <tr>
                                                        <td>
                                                            {{$info->sectorMercado->NombreSector}}
                                                        </td>
                                                        <td>
                                                            {{$info->ParticipacionPorcentual}}
                                                        </td>
                                                        <td>
                                                            {{-- x --}}
                                                        </td>

                                                    </tr>
                                                    @endforeach()
                                                </tbody>
                                            </table>
                                            <br>  
                                        </div>
                                    </div>
                                </div>
                    <br>
                    <!-- TABLA AU_Reg_Divisiones-->

                    <div class="row">
                        <div class="card-body"> 
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dynamic_field_mercado2">
                                    <thead>
                                        <th>Categoría</th>
                                        <th>Subcategoría</th>
                                        <th>x</th>
                                    </thead>
                                    <tbody>
                                        @foreach($infomercado as $info)
                                        <tr>
                                            <td>
                                                {{$info->categoria->Categoria}}
                                            </td>
                                            <td>
                                                {{$info->subcategoria->NombreSubcategoria}}
                                            </td>
                                            <td>
                                                {{-- x --}}
                                            </td>
                                        </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                                <br>  
                            </div> {{-- End table responsive --}}
                        </div> {{-- end card body --}}
                    </div> {{-- end row --}}
                    <br>
                 </div> {{-- .col-12  --}}
            </div>  {{-- .col-12  --}}                  
            <!-- DERECHA -->                                         
            
                <div class="col-xs-12"> 
                <!-- TABLA SUPERIOR-->                           
                    <div class="col-xs-12">
                        <h4> 4.2 </h4> 
                        <h5> 
                            <b>Especificación Clientes del Sector Aeronáuticco, Aeroespacial y Bélico</b>
                        </h5>
                    

                    {{-- TABLA AU_Reg_EspecificacionCliente --}}
                    <div class="row">
                        <div class="card-body"> 
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dynamic_field_mercado3">
                                    <thead>
                                        <th>Empresa/Gobierno</th>
                                        <th>País</th>
                                        <th>principales productos</th>
                                        <th>% Participación ventas</th>
                                        <th>x</th>
                                    </thead>
                                    <tbody>
                                        @foreach($infomercado as $info)
                                        <tr>
                                            <td>
                                                {{$info->NombreEmpresa}}
                                            </td>
                                            <td>
                                                {{$info->Pais}}
                                            </td>
                                            <td>
                                                {{$info->PrincipalesProductos}}
                                            </td>
                                            <td>
                                                {{$info->PorcentajeVentas}}
                                            </td>
                                            <td>
                                                {{-- x --}}
                                            </td>
                                        </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                                <br>
                            </div> {{-- End table responsive --}}
                        </div> {{-- end card body --}}
                    </div> {{-- end row --}}
                    </div> {{-- col-12 --}}
                    <br>


                    <!-- TABLA AU_Reg_Exportaciones-->                           
                    <div class="col-xs-12">  
                
                    <div class="row">
                        <div class="card-body"> 
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dynamic_field_mercado4">
                                    <thead>
                                        <th>Ha exportado?</th>
                                        <th>producto(s)</th>
                                        <th>Pais Destino</th>
                                        <th>x</th>
                                    </thead>
                                    <tbody>
                                        @foreach($infomercado as $info)
                                        <tr>
                                            <td>
                                                @if($info->HaExportado == 1)
                                                    <div class="si">si</div>
                                                    @else
                                                    <div class="no">no</div>
                                                @endif
                                            </td>
                                            <td>
                                                {{$info->Producto}}
                                            </td>
                                            <td>
                                                {{$info->PaisDestino}}
                                            </td>
                                            <td>
                                                {{-- x --}}
                                            </td>
                                        </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                                <br>  
                                <button type="button" name="addMercado4" id="addMercado4" class="btn btn-success">Nuevo Campo</button>
                                <br>
                            </div> {{-- End table responsive --}}
                        </div> {{-- end card body --}}
                    </div> {{-- end row --}}
                </div> {{-- end col-12 --}}                           
            </div> {{-- end col-12 --}}   
            
            <br>

            <div class="col-xs-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="button" name="submitmercado" id="submitmercado" class="btn btn-info btn-block" value="Guardar" />
                        </div>
                        <div class="col-sm-6">
                            <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>                    
            </div>  
      </div>

    </form> {{-- form mercado --}}

    </div> {{-- tab pane --}}

      {{-- Tecnología Empresa Content --}}
      <div id="menu3" class="tab-pane fade">
        <form name="tecnologias" id="tecnologias">
            {{ csrf_field() }}
         <div class="card-body floating-label">                    
                <br>   
                <!-- IZQUIERDA-->
                    <div class="col-xs-6"> 
                    <!-- TABLA SUPERIOR-->                           
                        <div class="col-xs-12">                                
                            <div class="row">
                                <span> 5.1.1 Productos o Procesos Patentados:  </span>
                                    <label class="checkbox-inline checkbox-styled pull-right">
                                        {!! Form::checkbox('ProductosProcesosPatentados', 1, old('ProductosProcesosPatentados', isset($tecnologia->ProductosProcesosPatentados) ? $tecnologia->ProductosProcesosPatentados : null))!!}
                                    </label>
                            </div>
                            <div class="row">
                                    
                                <span> 5.1.2 Actividades de Investigación y Desarrollo</span>
                                    <label class="checkbox-inline checkbox-styled pull-right">
                                        {!! Form::checkbox('ActividadesInvestigacion', 1, old('ActividadesInvestigacion', isset($tecnologia->ActividadesInvestigacion) ? $tecnologia->ActividadesInvestigacion : null)) !!}
                                    </label>

                            </div>
                            <div class="row">
                               <span for="RecibidoTecnologia"> 5.2 Ha Recibido Tecnología de <br> Transferencia o Know-how de proceso o de producto:  </span>
                                    <label class="checkbox-inline checkbox-styled pull-right">
                                        {!! Form::checkbox('TransferenciaTecnologiaKnowHow', 1, old('TransferenciaTecnologiaKnowHow', isset($tecnologia->TransferenciaTecnologiaKnowHow) ? $tecnologia->TransferenciaTecnologiaKnowHow : null)); !!}
                                    </label>
                            </div>
                            <div class="row">
                                <h4> 5.2.1 En caso Afirmativo relacione la tecnología y los respectivos antecendes </h4>
                            </div>
                        </div>  {{-- col-xs-12 --}}
                        <br>
                        <!-- TABLA INFERIOR-->                           
                        <div class="col-xs-12">                                
                            <div class="col-xs-12"> 
                                <div class="row">

                                   <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dynamic_field_antecedentes">
                                            <thead>
                                                <th>tecnologia</th>
                                                <th>Antecedentes <br>autores </th>
                                                <th>x</th>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                                @foreach($antecedentesautor as $antecedente)
                                                <tr>
                                                    <td>{{$antecedente->Tecnologia}}</td>
                                                     <td>{{$antecedente->AntecedentesAutores}}</td>
                                                </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <br>  
                                        <button type="button" name="addantecedentes" id="addantecedentes" class="btn btn-success">Nuevo Campo</button>
                                        <br>
                                    </div> {{-- End table responsive --}}
                                </div> {{-- end card body --}}
                            </div> {{-- end row --}}
                        </div> {{-- end col-12 --}}                              
                        </div> {{-- end col-12 --}}

                        <div class="col-xs-12">
                            <h4> 5.5 En la siguiente tabla indique la combinación que mejor retrata la participación de la empresa y su cliente en el desarrollo de dichos productos </h4>
                            <div class="col-xs-12"> 
                                <div class="row">

                                   <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dynamic_field_tecnologiassucliente">
                                            <thead>
                                                <th>Cliente/ <br>socio</th>
                                                <th>Empresa</th>
                                                <th>x</th>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                                @foreach($tecnologiassucliente as $tecnologia)
                                                <tr>
                                                    <td>{{$tecnologia->ClienteSocio}}</td>
                                                    <td>{{$tecnologia->SuEmpresa}}</td>
                                                </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <br>  
                                        <button type="button" name="addtecnologiasucliente" id="addtecnologiasucliente" class="btn btn-success">Nuevo Campo</button>
                                        <br>
                                    </div> {{-- End table responsive --}}
                                </div> {{-- end card body --}}
                            </div> {{-- end row --}}
                            </div> {{-- col-xs-12 --}}

                        </div>  {{-- col-xs-12 --}}

                    </div>  {{-- col-xs-6  --}}
                                   
                <!-- DERECHA -->                                         
                    <div class="col-xs-6"> 
                    <!-- TABLA SUPERIOR-->                           
                        <div class="col-xs-12">                                
                            <div class="row">
                                    <span for="RecibidoTecnologia"> 5.1.3 Participa en actividades con universidades o Instituciones de Investigación: </span>
                                    <label class="checkbox-inline checkbox-styled pull-right">
                                        {!! Form::checkbox('ConveniosInteruniversidadesInvestigacion', 1, old('ConveniosInteruniversidadesInvestigacion', isset($tecnologia->ConveniosInteruniversidadesInvestigacion) ? $tecnologia->ConveniosInteruniversidadesInvestigacion : null)) !!}
                                    </label>
                            </div>
                            <div class="row">
                               <div class="form-group">
                                    <input type="text" class="form-control" value="{{ old('DetalleConveniosParticipacion',  isset($tecnologia->DetalleConveniosParticipacion) ? $tecnologia->DetalleConveniosParticipacion : null) }}" id="DetalleConveniosParticipacion" name="DetalleConveniosParticipacion" required>
                                    <label for="DetalleConveniosParticipacion"> 5.1.4 En caso afirmativo, detalle con que Instituciones de investigación </label>
                                </div>
                            </div>
                            <div class="row">
                                    <span for="RecibidoTecnologia">5.3 Paticipación en Desarrollo Tecnologico</span>
                                    <label class="checkbox-inline checkbox-styled pull-right">
                                        {!! Form::checkbox('ParticipacionDesarrolloTecnolgico', 1, old('ParticipacionDesarrolloTecnolgico', isset($tecnologia->ParticipacionDesarrolloTecnolgico) ? $tecnologia->ParticipacionDesarrolloTecnolgico : null)) !!}
                                    </label>
                            </div>     
                            <div class="row">
                                <h4> 5.4 Principales productos desarrollados por sectores de actividad  </h4>
                            </div>                           
                        </div>
                        <br>
                        <!-- TABLA INFERIOR-->                           
                        <div class="col-xs-12">                                
                            <div class="col-xs-12"> 

                                <div class="row">

                                   <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dynamic_field_productossector">
                                            <thead>
                                                <th>Sector <br>Mercado</th>
                                                <th>Productos</th>
                                                <th>x</th>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                                @foreach($productossector as $productosector)
                                                <tr>
                                                    <td>{{$productosector->sectorMercado->NombreSector}}</td>
                                                    <td>{{$productosector->ProductoSector}}</td>
                                                </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <br>  
                                        <button type="button" name="addproductossector" id="addproductossector" class="btn btn-success">Nuevo Campo</button>
                                        <br>
                                    </div> {{-- End table responsive --}}
                                </div> {{-- end card body --}}
                            </div> {{-- end row --}}
                        </div> {{-- end col-12 --}}                                
                        </div>{{-- end col-12 --}}  
                        <div class="col-xs-12">
                            <h4> 5.6 Este producto fue desarrollado y fabricado por </h4>
                                                           
                            <div class="col-xs-12"> 
                                

                                <div class="row">

                                   <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dynamic_field_desarrollado">
                                            <thead>
                                                <th>Agente <br>Desarrollador</th>
                                                <th>Sector <br> Mercado</th>
                                                <th>x</th>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                                @foreach($desarrollados as $desarrollado)
                                                <tr>
                                                    <td>{{$desarrollado->agente->NombreAgente}}</td>
                                                    <td>{{$desarrollado->sector->NombreSector}}</td>
                                                </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                        <br>  
                                        <button type="button" name="adddesarrollado" id="adddesarrollado" class="btn btn-success">Nuevo Campo</button>
                                        <br>
                                    </div> {{-- End table responsive --}}
                                </div> {{-- end card body --}}
                            </div> {{-- end row --}}
                        </div> {{-- end-col12 --}}
                </div> {{-- end-col12 --}} 
            </div> {{--  col-xs-6 --}}

                <br>
                <div class="col-xs-12">
                    <div class="form-group">
                <div class="row">
                        <div class="col-sm-6">
                            <input type="button" name="submittecnologias" id="submittecnologias" class="btn btn-info btn-block" value="Guardar" />
                        </div>
                        <div class="col-sm-6">
                            <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                        
                        <div class="alert alert-danger print-error-msg-tecnologias" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg-tecnologias" style="display:none">
                        <ul></ul>
                        </div>
                </div>
            </div>                    
                </div>
              
         </div> {{-- floating-label --}}  
    </form>   


      </div> {{-- END Tecnología Empresa Content --}}

      {{-- Materia Prima Content --}}
      <div id="menu4" class="tab-pane fade">
        
        <div class="card-body floating-label">
            <div class="row">
                <b> Citar los Materiales principales que la Empresa utiliza (incluido el material proporcionado por el cliente)</b>
            </div>
            <br>

            <div class="row">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th><!--Materia Prima-->Actividad Económica</th>
                                <th>Principal Proveedor</th>
                                <th>País de Origen</th>
                                <th>Observaciones</th>
                                <th>x</th>
                            </thead>
                            <tbody>
                                @foreach($materiasprimas as $materia)
                                <tr class="materiaprima{{$materia->IdActividadEconomica}}">
                                    <td>
                                       {{-- $materia->materiaPrimaListado->NombreMateriaPrima --}}
                                        {{$materia->actividadEconomicaListado->Clase}} {{$materia->actividadEconomicaListado->Descripcion}}
                                    </td>
                                    <td>
                                       {{--$materia->PrincipalProveedor--}}
                                       {{$materia->PrincipalProveedor}}
                                    </td>
                                    <td>
                                       {{--$materia->PaisOrigen--}}
                                       {{$materia->PaisOrigen}}
                                    </td>
                                    <td>
                                       {{--$materia->Observaciones--}}
                                       {{$materia->Observaciones}}
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-delete delete-record-materiaprima" value="{{--$materia->IdMateriaPrimaComponentes--}}{{$materia->IdActividadEconomica}}"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                        
                    <form name="materiaprima" id="materiaprima"> 
                        {{ csrf_field() }}
                        <table class="table table-striped table-hover" id="dynamic_field_materiaprima">
                            

                        </table>
                            
                        <div class="alert alert-danger print-error-msg-materiaprima" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg-materiaprima" style="display:none">
                            <ul></ul>
                        </div>

                        <br>  
                        <button type="button" name="addmateriaprima" id="addmateriaprima" class="btn btn-success">Nuevo Campo</button>
                        <br>

                        <br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="button" name="submitmateriaprima" id="submitmateriaprima" class="btn btn-info btn-block" value="Guardar" />
                                </div>
                                <div class="col-sm-6">
                                    <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                                </div>
                            </div>
                        </div>

                    </form> {{-- form close --}}
                    </div> 
                </div>
            </div>

            

                                
        </div>           
      </div>    
      {{-- END Materia Prima Content --}}

      {{-- Producción Empresa Content --}}
      <div id="menu5" class="tab-pane fade">
        <div class="card-body floating-label">
            
            <form name="produccionempresa" id="produccionempresa">
                {{ csrf_field() }}
            <div class="row">   
                <h4> 8.1 Maquinaria y Equipo de Producción </h4>                     
            </div>
            <br>

            <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">

            <div class="row">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dynamic_field_maquinaria">
                            <thead>
                                <th>Máquinas y Equipos</th>
                                <th>% Nacional</th>
                                <th>% Importado </th>
                                <th>% Total</th>
                                <th>x</th>
                            </thead>
                            <tbody>
                                @foreach($maquinarias as $maquinaria)
                                <tr>
                                    <td>
                                        {{$maquinaria->NombreMaquinaria}}    
                                    </td>
                                    <td>
                                        {{$maquinaria->PorcentajeNacional}}    
                                    </td>
                                    <td>
                                        {{$maquinaria->PorcentajeImportado}}    
                                    </td>
                                    <td>
                                        {{$maquinaria->PorcentajeTotal}}    
                                    </td>
                                    <td>
                                        {{-- x --}}
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                        <br>  
                        <button type="button" name="addmaquinaria" id="addmaquinaria" class="btn btn-success">Nuevo Campo</button>
                        <br>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">   
                <h4> 8.2 Indicar cuales de los procesos siguientes son empleados por la Empresa: </h4> 
            </div>
            <br>
            <div class="row">

                <div class="col-xs-12">                                
                        <ul class="col-xs-4">
                            <li class="checkboxes"> 
                                <div class="row">     
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('MecanizadoCNC', 1, old('MecanizadoCNC', isset($produccionempresa->MecanizadoCNC) ? $produccionempresa->MecanizadoCNC : null), ['id' => 'MecanizadoCNC', 'class' => 'checkbox_check'])!!}
                                    </label><span for="MecanizadoCNC">1- Mecanizado CNC</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                        <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('Forjamiento', 1, old('Forjamiento',  isset($produccionempresa->Forjamiento) ? $produccionempresa->Forjamiento : null)) !!}
                                        </label><span for="Forjamiento">2- Forjamiento </span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('Tratamientostermicos', 1, old('Tratamientostermicos',  isset($produccionempresa->Tratamientostermicos) ? $produccionempresa->Tratamientostermicos : null) ) !!}
                                        </label><span for="Tratamientostermicos">3- Tratamientos térmicos</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('MetalizacionVacio', 1, old('MetalizacionVacio',  isset($produccionempresa->MetalizacionVacio) ? $produccionempresa->MetalizacionVacio : null) ) !!}
                                        </label><span for="MetalizacionVacio">4- Metalización al vacio</span>
                                </div>
                            </li>
                            <li  class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('TratamientosProteccionSuperficies', 1, old('TratamientosProteccionSuperficies',  isset($produccionempresa->TratamientosProteccionSuperficies) ? $produccionempresa->TratamientosProteccionSuperficies : null) ) !!}
                                        </label><span for="TratamientosProteccionSuperficies"> 5- Tratamiento protección de superficies</span>
                                </div>
                            </li>
                            <li  class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('MontajeComponentesME', 1,old('MontajeComponentesME',  isset($produccionempresa->MontajeComponentesME) ? $produccionempresa->MontajeComponentesME : null) ) !!}
                                        </label><span for="MontajeComponentesME">6- Montaje componentes mecánicos o electrónicos</span>
                                </div>
                            </li>
                             <li  class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('CollageMetalesColmenas', 1, old('CollageMetalesColmenas',  isset($produccionempresa->CollageMetalesColmenas) ? $produccionempresa->CollageMetalesColmenas : null) ) !!}
                                        </label><span for="CollageMetalesColmenas">7- Collage de los metales y las colmenas</span>
                                </div>
                            </li>
                        </ul>

                        <ul class="col-xs-4">
                           
                            <li class="checkboxes" > 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('EnsayosNoDestructivos', 1, old('EnsayosNoDestructivos',  isset($produccionempresa->EnsayosNoDestructivos) ? $produccionempresa->EnsayosNoDestructivos : null) ); !!}
                                        </label><span for="EnsayosNoDestructivos">8- Ensayos no destructivos</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('Estampado', 1, old('Estampado',  isset($produccionempresa->Estampado) ? $produccionempresa->Estampado : null) ) !!}
                                        </label><span for="Estampado"> 9- Estampado</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('ShotPeenning', 1, old('ShotPeenning',  isset($produccionempresa->ShotPeenning) ? $produccionempresa->ShotPeenning : null) ) !!}
                                        </label><span for="ShotPeenning">10- Shot Peenning </span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('PeenningForming', 1, old('PeenningForming',  isset($produccionempresa->PeenningForming) ? $produccionempresa->PeenningForming : null) ) !!}
                                        </label><span for="PeenningForming">11- Peening Forming</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('MecanizadoQuimico', 1, old('MecanizadoQuimico',  isset($produccionempresa->MecanizadoQuimico) ? $produccionempresa->MecanizadoQuimico : null) ) !!}
                                        </label><span for="MecanizadoQuimico">12- Mecanizado químico</span>
                                </div>
                            </li>

                             <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('PruebasSistemas', 1, old('PruebasSistemas',  isset($produccionempresa->PruebasSistemas) ? $produccionempresa->PruebasSistemas : null) ) !!}
                                        </label><span for="PruebasSistemas">13- Pruebas sistemas eléctricos y electrónicos</span>
                                </div>
                            </li>

                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('SoldadurasSMD', 1, old('SoldadurasSMD',  isset($produccionempresa->SoldadurasSMD) ? $produccionempresa->SoldadurasSMD : null) ) !!}
                                        </label><span for="SoldadurasSMD">14- Soldaduras SMD</span>
                                </div>
                            </li>
                        </ul>

                        <ul class="col-xs-4">
                           <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('SoldadurasTIGMIG', 1, old('SoldadurasTIGMIG',  isset($produccionempresa->SoldadurasTIGMIG) ? $produccionempresa->SoldadurasTIGMIG : null) ) !!}
                                        </label><span for="SoldadurasTIGMIG">15- Soldadura TIG y/o MIG</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('CorteAguaPlasma', 1, old('CorteAguaPlasma',  isset($produccionempresa->CorteAguaPlasma) ? $produccionempresa->CorteAguaPlasma : null) ) !!}
                                        </label><span for="CorteAguaPlasma">16- Corte por chorro de agua o plasma</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('ConformacionFibraVidriol', 1, old('ConformacionFibraVidriol',  isset($produccionempresa->ConformacionFibraVidriol) ? $produccionempresa->ConformacionFibraVidriol : null) ) !!}
                                        </label><span for="ConformacionFibraVidriol">17- Conformación de fibra de vidrio</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('ConformacionFibraCarbono', 1, old('ConformacionFibraCarbono',  isset($produccionempresa->ConformacionFibraCarbono) ? $produccionempresa->ConformacionFibraCarbono : null) ) !!}
                                        </label><span for="ConformacionFibraCarbono">18- Conformación fibra de carbono</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="row">
                                    <label class="checkbox-inline checkbox-styled">
                                        {!! Form::checkbox('CorteSoldaduraLaser', 1, old('CorteSoldaduraLaser',  isset($produccionempresa->CorteSoldaduraLaser) ? $produccionempresa->CorteSoldaduraLaser : null) ) !!}
                                        </label><span for="CorteSoldaduraLaser"> 19- Corte o soldadura láser</span>
                                </div>
                            </li>
                            <li class="checkboxes"> 
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ old('Otros',  isset($produccionempresa->Otros) ? $produccionempresa->Otros : null) }}" id="Otros" name="Otros" required>
                                    <label for="Otros">Otros</label>
                                </div>
                            </li>
                        </ul>

                </div>   
            </div>

            <div class="row">   
                <h4> 8.3 Si terceriza procesos de producción, especifique a continuación </h4>         
            </div>
            <br>

            <div class="row">
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dynamic_field_tercerizacion">
                            <thead>
                                <th>Proceso Tercerizado</th>
                                <th>Empresa Tercerizada</th>
                                <th>x</th>
                            </thead>
                            <tbody>
                                @foreach($producciontercerizacion as $terceriza)
                                <tr>
                                    <td>
                                        {{$terceriza->ProcesoTercerizado}}
                                    </td>
                                    <td>
                                        {{$terceriza->EmpresaTercerizada}}
                                    </td>
                                    <td>
                                        {{-- x --}}
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                        <br>  
                        <button type="button" name="addtercerizacion" id="addtercerizacion" class="btn btn-success">Nuevo Campo</button>
                        <br>
                    </div>

                </div>
            </div>

            {{-- REMAININGS --}}
            <br><br>
            <div class="row">   
                      <div class="col-xs-12"> 
                        <div class="form-group">
                            <label for="PorcentajeDemandaRelativa"> <b> 8.4.1  Porcentaje de la demanda relativa VS Capacidad productiva instalada actual (%):</b></label>
                            <input type="number" name="PorcentajeDemandaRelativa" value="{{ old('CantidadFuncionarios',  isset($caracteristica->CantidadFuncionarios) ? $caracteristica->CantidadFuncionarios : null) }}" id="PorcentajeDemandaRelativa" placeholder="%" step="0.01" min="0" max="100" required>
                        </div>
                      </div> 

                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="NumeroTurnosTrabajo"> <b> 8.4.2 Numero turnos de trabajo</b> </label>
                          <input type="number" name="NumeroTurnosTrabajo" value="{{ old('NumeroTurnosTrabajo',  isset($produccionempresa->NumeroTurnosTrabajo) ? $produccionempresa->NumeroTurnosTrabajo : null) }}" id="NumeroTurnosTrabajo" placeholder="#" step="1" min="0" max="10000" required>
                        </div>
                      </div>
                      {{-- missing value --}}
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="TieneCapacidadAlojamiento"><b> 8.5 Dispone de Alojamiento cercano a la planta de produccion?</b></label>

                        {!! Form::select('TieneCapacidadAlojamiento', [
                               'n/a' => 'n/a',
                               'si' => 'Si',
                               'no' => 'No',
                        ], old('value',  isset($produccionempresa->TieneCapacidadAlojamiento) ? $produccionempresa->TieneCapacidadAlojamiento : null), [ 'class' =>  'form-control', 'id' => 'TieneCapacidadAlojamiento']) !!}

                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ old('CapacidadAlojamiento',  isset($produccionempresa->CapacidadAlojamiento) ? $produccionempresa->CapacidadAlojamiento : null) }}" placeholder="En caso afirmativo, ingrese la capacidad de alojamiento" name="CapacidadAlojamiento" id="CapacidadAlojamiento" >    
                            </div>
                        </div>
                        <br>
                      </div>
                        <br>
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="TieneGeneradorEnergia"><b> 8.6 La Empresa cuenta con generador de energia propio?</b></label>
                           <label class="checkbox-inline checkbox-styled">
                          {{ Form::checkbox('TieneGeneradorEnergia', 1, old('TieneGeneradorEnergia',  isset($produccionempresa->TieneGeneradorEnergia) ? $produccionempresa->TieneGeneradorEnergia : null), ['id' => 'TieneGeneradorEnergia', 'class' => 'checkbox_check']) }}
                           </label><span for="TieneGeneradorEnergia">Si</span>
                          <br>
                         <div class="col-md-6">
                          <input type="text" class="form-control" value="{{ old('CapacidadGenerador',  isset($produccionempresa->CapacidadGenerador) ? $produccionempresa->CapacidadGenerador : null) }}" placeholder="En caso afirmativo ingrese capacidad de generador" id="CapacidadGenerador" name="CapacidadGenerador">
                         </div> 
                          </div>        
                      </div>     
            </div>
            <br><br>
            <div class="alert alert-danger print-error-msg-produccionempresa" style="display:none">
                <ul></ul>
            </div>
            <div class="alert alert-success print-success-msg-produccionempresa" style="display:none">
                <ul></ul>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <div class="row">
                            <div class="col-sm-6">
                                <input type="button" name="submitproduccionempresa" id="submitproduccionempresa" class="btn btn-info btn-block" value="Guardar" />
                            </div>
                            <div class="col-sm-6">
                                <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                            </div>
                    </div>
                </div>                    
            </div> 
            </form>                   
        </div>           
      </div>    
      {{-- END Producción Empresa Content --}}

      {{-- Productos y servicios Ofrecidos--}}
      <div id="menu6" class="tab-pane fade">
        <div class="card-body floating-label">
            <div class="form-group">
                <select class="form-control" id="Pregunta" aria-required="true">
                    <option value="">Seleccione una opción</option>
                    <option value="Productos">Productos</option>
                    <option value="Servicios">Servicios</option>
                </select>
            </div>
            <div class="row">
                    <div class="table-responsive">
                    
                    <div class="productosofrecidostable" id="productosofrecidostable">

                        <div class="col-xs-12" style="margin-bottom: 50px;">
                            <h3 class="text-center"> Productos Ofrecidos</h3>
                        </div>
                         <form name="productosofrecidos" method="POST" action="{{url('/storeproductosofrecidos')}}" id="productosofrecidostable"> 
                            {{ csrf_field() }}
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>Producto</th>
                                    <th>Equipo</th>
                                    <th>P/N (Empresa)</th>
                                    <th>Producto LDP | P/N OEM</th>
                                    <th>Valor comercial <br>/unidad</th>
                                    <th>Tiempo Desarrollo</th>
                                    <th>Tiempo Entrega</th>
                                    <th>Certificado</th>
                                    <th>Observaciones</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="dynamic_field_productosofrecidos">
                                    <input type="hidden" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                                    @foreach($productosofrecidos as $productoOfrecido)
                                    <tr class="productoofrecido{{$productoOfrecido->IdProductosOfrecidos}}">
                                        <td>{{$productoOfrecido->Producto}}</td>
                                        <td>{{$productoOfrecido->Equipo}}</td>
                                        <td>{{$productoOfrecido->PNIntercambiable}}</td>
                                        <td>{{$productoOfrecido->demandaproducto->NombreParteNumero}}</td>
                                        <td>{{$productoOfrecido->ValorComercialUnidad}}</td>
                                        <td>{{$productoOfrecido->TiempoDesarrollo}}</td>
                                        <td>{{$productoOfrecido->TiempoEntrega}}</td>
                                        <td>{{($productoOfrecido->EstaCertificado)?'Si':'No'}}</td>
                                        <td>{{$productoOfrecido->Observaciones}}</td>
                                        <td><button class="btn btn-danger btn-delete delete-record-productoofrecido" type="button" value="{{$productoOfrecido->IdProductosOfrecidos}}"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>
                                    @endforeach()
                                </tbody>

                            </table>

                                <button type="button" name="addproductosofrecidos" id="addproductosofrecidos" class="btn btn-success">Nuevo Campo</button>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="submit" name="submitproductosofrecidos" id="submitproductosofrecidos" class="btn btn-info btn-block" value="Guardar" />
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                        
                            </form>
                    </div>    


                    <div class="serviciosofrecidostable" id="serviciosofrecidostable">

                        <div class="col-xs-12" style="margin-bottom: 50px;">
                            <h3 class="text-center"> Servicios Ofrecidos</h3>
                        </div>

                        <table class="table table-striped table-hover"">
                            <thead>
                                <th>Servicio</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Equipo</th>
                                <th>Codigo Servicio</th>
                                <th>V.Comercial/Unitario</th>
                                <th>Tiempo Ejecucion servicio</th>
                                <th>Certificado</th>
                                <th>Observaciones</th>
                                <th>x</th>
                            </thead>
                            <tbody>
                                @foreach($serviciosofrecidos as $servicio)
                                <tr class="servicioofrecido{{$servicio->IdServiciosOfrecidos}}">
                                    <td>{{$servicio->Servicio}}</td>
                                    <td>{{$servicio->NombreSericioOfrecido}}</td>
                                    <td>{{$servicio->DescripcionServicio}}</td>
                                    <td>{{$servicio->Equipo}}</td>
                                    <td>{{$servicio->CodigoServicio}}</td>
                                    <td>{{$servicio->ValorComercialUnitario}}</td>
                                    <td>{{$servicio->TiempoEjecucionServicio}}</td>
                                    <td>{{$servicio->Certificacion}}</td>
                                    <td>{{$servicio->Observacion}}</td>
                                    <td> <button class="btn btn-danger btn-delete delete-record-servicioofrecido" value="{{$servicio->IdServiciosOfrecidos}}"><span class="glyphicon glyphicon-trash"></span></button> </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>

                        <form name="serviciosofrecidos" id="serviciosofrecidos">
                            {{ csrf_field() }}

                            <table id="dynamic_field_serviciosofrecidos">             
                                 <input type="hidden" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">
                            </table>

                            <br>
                        <button type="button" name="addserviciosofrecidos" id="addserviciosofrecidos" class="btn btn-success">Nuevo Campo</button>
                        <br>
                        <br>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="button" name="submitserviciosofrecidos" id="submitserviciosofrecidos" class="btn btn-info btn-block" value="Guardar" />
                                </div>
                                <div class="col-sm-6">
                                    <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>   {{-- table wrapper end --}} 
                </div> {{-- table responsive --}}
            </div> {{-- row --}}
        </div>  {{-- card-body floating-label --}}
    </div> {{-- tab-pane fade in active --}}             
</div>{{-- card body --}}

</div>


@endsection()

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{URL::asset('js/core/demo/DemoFormWizard.js')}}"></script>



<script>


$(document).ready(function(){


        var postURLTECNOLOGIAS = "<?php echo url('/storetecnologias'); ?>";
        var i = 1;
        

        $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
        });


        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addantecedentes').click(function(){
               i++;  
               $('#dynamic_field_antecedentes').append('<tr id="row'+i+'" class="dynamic_field_antecedentes-added">'+
                 '<td><input type="text" name="Tecnologia[]"></td>'+
                 '<td><input type="text" name="AntecedentesAutores[]"></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });


        $('#addtecnologiasucliente').click(function(){
               i++;  
               $('#dynamic_field_tecnologiassucliente').append('<tr id="row'+i+'" class="dynamic_field_tecnologiassucliente-added">'+
                '<td><input type="text" name="ClienteSocio[]"></td>'+
                '<td><input type="text" name="SuEmpresa[]"></td>'+
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });

// 
// 
                                                   

        $('#addproductossector').click(function(){
               i++;  
               $('#dynamic_field_productossector').append('<tr id="row'+i+'" class="dynamic_field_productossector-added">'+
                 '<td><div class="form-group">{{ Form::select('IdSector[]', $sectoresMercado->pluck('NombreSector', 'IdSector'), null, ['class' => 'form-control', 'id' => 'IdSector']) }}</div></td>'+
                 '<td><input type="text" id="ProductoSector" name="ProductoSector[]" required></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });

        $('#adddesarrollado').click(function(){
               i++;  
               $('#dynamic_field_desarrollado').append('<tr id="row'+i+'" class="dynamic_field_desarrollado-added">'+
                 '<td><div class="form-group">{{ Form::select('IdAgente[]', $agentedesarrollador->pluck('NombreAgente', 'IdAgente'), null, ['class' => 'form-control', 'id' => 'IdAgente']) }}</div></td>'+
                 '<td><div class="form-group">{{ Form::select('IdSector2[]', $sectoresMercado->pluck('NombreSector', 'IdSector'), null, ['class' => 'form-control', 'id' => 'IdSector']) }}</div></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });

        

        $('#submittecnologias').click(function(){            
       $.ajax({  
        url:postURLTECNOLOGIAS,  
        method:"POST",  
        data:$('#tecnologias').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;

                $(".print-success-msg-tecnologias").find("ul").html('');
                $(".print-success-msg-tecnologias").css('display','block');
                $(".print-error-msg-tecnologias").css('display','none');
                $(".print-success-msg-tecnologias").find("ul").append("<center><li style='list-style: none;'>Información añadida </li> </center>");
                $('#tecnologias :input').attr("disabled", true);
            }
        }  
    });  
   
   }); 






});



</script>

 
{{-- AJAX  produccionempresa  --}}
<script type="text/javascript">

    $(document).ready(function(){

        $('#CapacidadAlojamiento').hide();
        $('#CapacidadGenerador').hide();

        $('#TieneCapacidadAlojamiento').change(function(){
                if($(this).val() == 'si'){
                    $('#CapacidadAlojamiento').show();
            }else{
                $('#CapacidadAlojamiento').hide();
            }
        });


        $('input').on('click',function () {
            var checkbox = $('#TieneGeneradorEnergia');

            if(checkbox.is(':checked')){
                    $('#CapacidadGenerador').show();
                }else{
                    $('#CapacidadGenerador').hide();
                }
        });

        var postURLPRODUCCIONEMPRESA = "<?php echo url('/storeproduccionempresa'); ?>";
        var i = 1;

        $('#addmaquinaria').click(function(){
               i++;  
               $('#dynamic_field_maquinaria').append('<tr id="row'+i+'" class="dynamic_field_maquinaria-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td><div class="form-group"><input type="text" id="NombreMaquinaria" name="NombreMaquinaria[]" required></div></td>'+
                 '<td><div class="form-group"><input type="number" name="PorcentajeNacional[]" id="PorcentajeNacional" placeholder="%" step="0.01" min="0" max="100" required></div></td>'+
                 '<td><div class="form-group"><input type="number" name="PorcentajeImportado[]" id="PorcentajeImportado" placeholder="%" step="0.01" min="0" max="100" required></div></td>'+
                 '<td><div class="form-group"><input type="number" name="PorcentajeTotal[]" id="PorcentajeTotal" placeholder="%" step="0.01" min="0" max="100" required></div></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });
        

        $('#addtercerizacion').click(function(){
               i++;  
               $('#dynamic_field_tercerizacion').append('<tr id="row'+i+'" class="dynamic_field_tercerizacion-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td><div class="form-group"><input type="text" id="ProcesoTercerizado" name="ProcesoTercerizado[]" required></div></td>'+
                 '<td><div class="form-group"><input type="text" id="EmpresaTercerizada" name="EmpresaTercerizada[]" required></div></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });




    $('#submitproduccionempresa').click(function(){            
       $.ajax({  
        url:postURLPRODUCCIONEMPRESA,  
        method:"POST",  
        data:$('#produccionempresa').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;

                $(".print-success-msg-produccionempresa").find("ul").html('');
                $(".print-success-msg-produccionempresa").css('display','block');
                $(".print-error-msg-produccionempresa").css('display','none');
                $(".print-success-msg-produccionempresa").find("ul").append("<center><li style='list-style: none;'>Información añadida </li> </center>");
                $('#caracteristicasempresa :input').attr("disabled", true);
            }
        }  
    });  
   
   }); 

});

</script>


{{-- AJAX (caracteristicasempresa)  --}}
<script type="text/javascript">

    $(document).ready(function(){

    var postURL = "<?php echo url('/storecaracteristicasempresa'); ?>";

    $('#submitcaracteristicasempresa').click(function(){            
       $.ajax({  
        url:postURL,  
        method:"POST",  
        data:$('#caracteristicasempresa').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;

                $(".print-success-msg-caracteristicas").find("ul").html('');
                $(".print-success-msg-caracteristicas").css('display','block');
                $(".print-error-msg-caracteristicas").css('display','none');
                $(".print-success-msg-caracteristicas").find("ul").append("<center><li style='list-style: none;'>Caracteristica  añadida satisfactoriamente</li> </center>");
                $('#caracteristicasempresa :input').attr("disabled", true);
            }
        }  
    });  
   
   }); 

});

    
    

</script>


{{-- Ajax (PRODUCTOS FFMM) --}}
<script type="text/javascript">
    $(document).ready(function(){      
    // setup variable to post to controller
      var postURL = "<?php echo url('/storeproductosffmm'); ?>";
      var i=1;  

      $('#addProductoffmm').click(function(){  

       i++;  

       $('#dynamic_field_productosffmm').append('<tr id="row'+i+'" class="dynamic_field_productosffmm-added">'+
        '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
         '<td><div class="form-group"><input name="ProductoItem[]" type="text" required/></div></td>'+
         '<td><select name="Ventas[]" class="form-control" required="" aria-required="true"><option value="">&nbsp;</option><option value="indirecta">indirecta</option><option value="directa">directa</option></select></td>'+
         '<td><div class="form-group">{{ Form::select('IdClienteFM[]', $clientesffmm->prepend('none')->pluck('NombreCliente', 'IdClienteFM'), null, ['class' => 'form-control', 'id' => 'IdClienteFM']) }}</div></td>'+
         '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   });  

        

      

      $('#submitproductosffmm').click(function(){            
       $.ajax({  
        url:postURL,  
        method:"POST",  
        data:$('#productosffmm').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;
                // $('.dynamic_field_productosffmm-added').remove();
                // $('#productosffmm')[0].reset();
                $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display','block');
                $(".print-error-msg").css('display','none');
                $(".print-success-msg").find("ul").append('<li style="text-align:center; list-style:none;">Producto añadido satisfactoriamente</li>');
                $('#productosffmm :input').attr("disabled", true);
            }
        }  
    });  
   });  

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
     }



     // delete productos ffmm

   $(document).on('click','.delete-record-productoffmm',function(){
        
        var idproductoffmm = $(this).val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type: "DELETE",
            url: '/deleteproductoffmm' + '/' + idproductoffmm,
            success: function (data) {
                console.log(data);
                $(".productoffmm" + idproductoffmm).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


 });  
</script>


{{-- AJAX (MERCADO) --}}
<script>
    
    $(document).ready(function(){

        $(document).on('click', '.btn_remove-mercado', function(){  
           var button_id = $(this).attr("id");   
           $('#rowmi'+button_id+'').remove();
           $('#rowmii'+button_id+'').remove();
           $('#rowmiii'+button_id+'').remove();
           $('#rowmiv'+button_id+'').remove();  
        });


        var postURLMERCADO = "<?php echo url('/storemercado'); ?>";
        var i=1;

        $('#addMercado4').click(function(){
               i++;  

               $('#dynamic_field_mercado1').append('<tr id="rowmi'+i+'" class="dynamic_field_mercado1-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td><div class="form-group">{{ Form::select('IdSector[]', $sectoresMercado->pluck('NombreSector', 'IdSector'), null, ['class' => 'form-control', 'id' => 'IdSector']) }}</div></td>'+
                 '<td><input type="text" name="ParticipacionPorcentual"></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-mercado">X</button></td></tr>');  
            
 

               $('#dynamic_field_mercado2').append('<tr id="rowmii'+i+'" class="dynamic_field_mercado2-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td>{{ Form::select('IdCategorias[]', $categoriasTipo->pluck('Categoria', 'IdCategorias'), null, ['class' => 'form-control', 'id' => 'IdCategorias']) }}</td>'+
                 '<td>{{ Form::select('IdSubcategorias[]', $subcategoriasTipo->pluck('NombreSubcategoria', 'IdSubcategoria'), null, ['class' => 'form-control', 'id' => 'IdSubcategorias']) }}</td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-mercado">X</button></td></tr>');
       

               $('#dynamic_field_mercado3').append('<tr id="rowmiii'+i+'" class="dynamic_field_mercado3-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td><input type="text" name="NombreEmpresa[]"></td>'+
                 '<td><input type="text" name="Pais[]"></td>'+
                 '<td><input type="text" name="PrincipalesProductos[]"></td>'+
                 '<td><input type="text" name="PorcentajeVentas[]"></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-mercado">X</button></td></tr>');
    

               $('#dynamic_field_mercado4').append('<tr id="rowmiv'+i+'" class="dynamic_field_mercado4-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 '<td><center>{!!Form::checkbox('HaExportado[]', '1') !!}</center></td>'+
                 '<td><input type="text" name="Producto[]"></td>'+
                 '<td><input type="text" name="PaisDestino[]"></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-mercado">X</button></td></tr>');

        });


    $('#submitmercado').click(function(){            
       $.ajax({  
        url:postURLMERCADO,  
        method:"POST",  
        data:$('#mercado').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;
                dynamic_field_mercado1
                // $('.dynamic_field_mercado1-added').remove();
                // $('#mercado')[0].reset();
                $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display','block');
                $(".print-error-msg").css('display','none');
                $(".print-success-msg").find("ul").append('<li>Producto añadido satisfactoriamente</li>');
            }
        }  
    });  

   });

 });




</script>

{{-- AJAX (MATERIA PRIMA) --}}
<script>
    
    $(document).ready(function(){

        var postURLMATERIAPRIMA = "<?php echo url('/storemateriaprima'); ?>";
        var i=1;

        $('#addmateriaprima').click(function(){

            setTimeout(function(){
                $("#IdMateriaPrima").select2( {
                    'placeholder': '',
                    'width': 'resolve',
                    'containerCssClass': ':all:'
                } );
            }, 100);

               i++;
               $('#dynamic_field_materiaprima').append('<tr id="row'+i+'" class="dynamic_field_materiaprima-added">'+
                '<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}">'+
                 //'<td>{{ Form::select('IdMateriaPrima[]', $listadomateriasprimas->pluck('NombreMateriaPrima', 'IdMateriaPrima'), null, ['class' => 'form-control', 'id' => 'IdMateriaPrima', 'style' => 'width:80%; margin-right:-50px;']) }}</td>'+
                 '<td>{{ Form::select('IdActividadEconomica', $secciones, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'IdMateriaPrima', 'name' => 'IdMateriaPrima[]']) }}</td>' +
                 '<td><div class="form-group"><input type="text"  id="PrincipalProveedor" name="PrincipalProveedor[]" required></div></td>'+
                 '<td><div class="form-group"><input type="text"  id="PaisOrigen" name="PaisOrigen[]" required></div></td>'+
                 '<td><div class="form-group"><input type="text"  id="Observaciones" name="Observaciones[]" required></div></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
             });


    $('#submitmateriaprima').click(function(){            
       $.ajax({  
        url:postURLMATERIAPRIMA,  
        method:"POST",  
        data:$('#materiaprima').serialize(),
        type:'json',
        success:function(data){
            if(data.error){
                printErrorMsg(data.error);
            }else{
                i=1;
                //('#productosofrecidos')[0].reset();
                $('#productosofrecidos').each(function() { this.reset() });
                $(".print-success-msg-materiaprima").find("ul").html('');
                $(".print-success-msg-materiaprima").css('display','block');
                $(".print-error-msg-materiaprima").css('display','none');
                $(".print-success-msg-materiaprima").find("ul").append('<li style="list-style:none; text-align:center;">Materia prima añadida satisfactoriamente</li>');
                $('#materiaprima :input').attr("disabled", true);
            }
        }  
    });  

   });

    $(document).on('click','.delete-record-materiaprima',function(){
        
        var idmateriaprima = $(this).val();

        $.ajax({
            type: "DELETE",
            url: '/deletemateriaprima' + '/' + idmateriaprima,
            success: function (data) {
                console.log(data);
                $(".materiaprima" + idmateriaprima).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    });




</script>


{{-- AJAX PRODUCTOS OFRECIDOS --}}

<script>


    $(document).ready(function(){

        // dropdown selection

        $('#productosofrecidostable').hide();
        $('#serviciosofrecidostable').hide();

        $('#Pregunta').change(function(){
                if($(this).val() == 'Productos'){
                    $('#productosofrecidostable').show();
                    $('#serviciosofrecidostable').hide();
            }else{
                $('#productosofrecidostable').hide();
                $('#serviciosofrecidostable').show();
            }
        });

    jQuery(document).ready(function() {
       jQuery("#Pregunta").change(function() {
          if(jQuery(this).find("option:selected").val() == "servicios") {
             jQuery(".productosofrecidostable").hide();
         }
     });
   });



        var postURLPRODUCTOSOFRECIDOS = "<?php echo url('/storeproductosofrecidos'); ?>";
        var i=1;

        $('#addproductosofrecidos').click(function(){
               i++;  
               $('#dynamic_field_productosofrecidos').append('<tr id="row'+i+'" class="dynamic_field_productosofrecidos-added">'+
                 '<td><input type="text"  id="Producto" name="Producto[]" required></td>'+
                 '<td><input type="text"  id="Equipo" name="Equipo[]" required></td>'+
                 '<td><input type="text"  id="PNIntercambiable" name="PNIntercambiable[]" required></td>'+
                 '<td><div class="form-group">{{ Form::select('IdDemandaPotencial[]', $demandapotencial->prepend('none')->pluck('NombreParteNumero', 'IdDemandaPotencial'), null, ['class' => 'form-control', 'id' => 'IdDemandaPotencial']) }}</div></td>'+
                 //'<td><input type="text"  id="OEM" name="OEM[]" required></td>'+
                 '<td><input type="text"  id="ValorComercialUnidad" name="ValorComercialUnidad[]" required></td>'+
                 '<td><input type="text"  id="TiempoDesarrollo" name="TiempoDesarrollo[]" required></td>'+
                 '<td><input type="text"  id="TiempoEntrega" name="TiempoEntrega[]" required></td>'+
                 '<td><center> {!!Form::checkbox('EstaCertificado[]', '1',null,['class'=>'test','style'=>'width:auto!important']) !!} </center></td>'+
                 '<td><input type="text"  id="Observaciones" name="Observaciones[]" required></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
             });


           /* $('#submitproductosofrecidos').click(function(){            
               $.ajax({  
                url:postURLPRODUCTOSOFRECIDOS,  
                method:"POST",  
                data:$('#productosofrecidos').serialize(),
                type:'json',
                success:function(data){
                    console.log(data)
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $(".print-success-msg-productosofrecidos").find("ul").html('');
                        $(".print-success-msg-productosofrecidos").css('display','block');
                        $(".print-error-msg-productosofrecidos").css('display','none');
                        $(".print-success-msg-productosofrecidos").find("ul").append('<li>Producto añadido</li>');
                    }
                }  
            });  
        });*/



            $(document).on('click','.delete-record-productoofrecido',function(){

                var idproductoofrecido = $(this).val();

                $.ajax({
                    type: "DELETE",
                    url: '/deleteproductoofrecido' + '/' + idproductoofrecido,
                    success: function (data) {
                        console.log(data);
                        $(".productoofrecido" + idproductoofrecido).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });


    });






  
    

</script>

{{-- SERVICIOS OFRECIDOS --}}

<script>

    $(document).ready(function(){

        var postURLSERVICIOSOFRECIDOS = "<?php echo url('/storeserviciosofrecidos'); ?>";
        var i=1;

        $('#addserviciosofrecidos').click(function(){
            i++;  
            $('#dynamic_field_serviciosofrecidos').append('<tr id="row'+i+'" class="dynamic_field_serviciosofrecidos-added">'+
                 '<td><input type="text"  id="Servicio" name="Servicio[]" required></td>'+
                 '<td><input type="text"  id="NombreSericioOfrecido" name="NombreSericioOfrecido[]" required></td>'+
                 '<td><input type="text"  id="DescripcionServicio" name="DescripcionServicio[]" required></td>'+
                 '<td><input type="text"  id="Equipo" name="Equipo[]" required></td>'+
                 '<td><input type="text"  id="CodigoServicio" name="CodigoServicio[]" required></td>'+
                 '<td><input type="text"  id="ValorComercialUnitario" name="ValorComercialUnitario[]" required></td>'+
                 '<td><input type="text"  id="TiempoEjecucionServicio" name="TiempoEjecucionServicio[]" required></td>'+
                 '<td><center>{!!Form::checkbox('Certificacion[]', '1') !!}</center></td>'+
                 '<td><input type="text"  id="Observacion" name="Observacion[]" required></td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
             });


            $('#submitserviciosofrecidos').click(function(){            
               $.ajax({  
                url:postURLSERVICIOSOFRECIDOS,  
                method:"POST",  
                data:$('#serviciosofrecidos').serialize(),
                type:'json',
                success:function(data){
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $(".print-success-msg-serviciosofrecidos").find("ul").html('');
                        $(".print-success-msg-serviciosofrecidos").css('display','block');
                        $(".print-error-msg-serviciosofrecidos").css('display','none');
                        $(".print-success-msg-serviciosofrecidos").find("ul").append('<li>Servicio añadido</li>');
                    }
                }  
            });  

        });


        $(document).on('click','.delete-record-servicioofrecido',function(){

                var idservicioofrecido = $(this).val();

                $.ajax({
                    type: "DELETE",
                    url: '/deleteservicioofrecido' + '/' + idservicioofrecido,
                    success: function (data) {
                        console.log(data);
                        $(".servicioofrecido" + idservicioofrecido).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });




    });
    

</script>


{{-- multiple inputs --}}


@endsection()

@endsection()