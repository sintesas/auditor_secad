@extends('partials.card')
@extends('layout')

@section('title')
    Informe
@endsection()

@section('content')

    @section('card-content')
    @section('card-title')
    <div style="display: flex; align-items: center;">
        <!-- BreadCrumbs y número consecutivo en una sola línea -->
        <span>
            {{ Breadcrumbs::render('auditoriaprogplanauditoria') }}
        </span>

        @if(isset($programaEspecifico))
            <span style="margin-left: 2px; margin-top: -3px; font-size: 20px; color:#b7bcc2">
            - Programa {{ $programaEspecifico->Consecutivo }}
            </span>
        @endif
    </div>
    @endsection()

    @section('card-content')
    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center">Generar Reportes</h4>
            </div>
            <div class="card-body">
                <!-- Plan de Auditoría -->
                <div class="mb-3 row">
                    <label class="col-md-6 col-form-label">Plan de Auditoría</label>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary w-100">Generar</a>
                    </div>
                </div>

                <!-- Informe Auditoría -->
                <div class="mb-3 row" style="margin-top:10px">
                    <label class="col-md-6 col-form-label">Informe Auditoría</label>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary w-100">Generar</a>
                    </div>
                </div>

                <!-- Plan Acción Hallazgos -->
                <div class="mb-3 row" style="margin-top:10px">
                    <label class="col-md-6 col-form-label">Plan Acción Hallazgos</label>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary w-100">Generar</a>
                    </div>
                </div>

                <!-- Plan Seguimiento -->
                <div class="mb-3 row" style="margin-top:10px">
                    <label class="col-md-6 col-form-label">Plan Seguimiento</label>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary w-100">Generar</a>
                    </div>
                </div>

                <!-- General -->
                <div class="mb-3 row" style="margin-top:10px">
                    <label class="col-md-6 col-form-label">General</label>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary w-100">Generar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection()

    @endsection()

@section('addjs')
<script src="{{ URL::asset('js/libs/DataTables/jquery.dataTables.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#datatable1').DataTable();
    });
</script>
@endsection()
