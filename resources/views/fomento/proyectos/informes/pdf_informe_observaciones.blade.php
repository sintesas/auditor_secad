@extends('partials.pdf')

<body style="background-color: white;">

  @extends('partials.card')

  {{-- @extends('layout') --}}

  @section('title')
  Informe Observaciones
  @endsection()

  @section('content')

  @section('card-content')

  @section('form-tag')

  {!! Form::model($dataObservaciones) !!}
  {{ csrf_field()}}

  @endsection

  @section('card-content')

  <div class="card-body floating-label">
    <!-- BEGIN BASE-->
    <div >

      <!--end .offcanvas-->
      <!-- END OFFCANVAS LEFT -->

      <!-- BEGIN CONTENT-->
      <div id="">
        <section>
          <div class="section-body">
            <div class="row encabezadoPlanInspeccion">

              <!-- titulo Formulario -->
              <div class="col-xs-12 text-center">
                <h2> FUERZA AÉREA COLOMBIANA </h2>
                <h4> Informe de Observaciones por Proyecto</h4>
              </div>

            </div>
            <!--end .row -->
            <!-- PRIMER BLOQUE DE INFOMACION -->
            <div class="row">
              <div class="col-xs-12 text-center">
                <h5> Proyecto:  <strong>{{$dataProyecto[0]->NombreProyecto}}</strong> </h5>
              </div>

              <!-- Responsable Proceso -->
              <div class="col-xs-12 ">
                <table class="table  table-x">
                  <tr>
                    <th class="th-x text-center" style="width: 120px;"> Fecha Creación</th>
                    <th class="th-x text-center"> Descripción</th>
                  </tr>
                  @forelse($dataObservaciones as $item)
                  <tr class="line-b">
                    <th class="text-center" style="width: 120px;">{{$item->Created_at}}</th>
                    <th class="text-center">{{$item->Descripcion}}</th>
                  </tr>
                  @empty
                  <div class="section-body">
                    <div class="text-center">
                      <h3>No hay datos para mostrar informe</h3>
                    </div>
                  </div>
                  @endforelse
                </table>
              </div>
            </div>
            <!--end .row -->
          </div>
          <!--end .section-body -->
        </section>
      </div>
      <!--end #content-->
      <!-- END CONTENT -->
    </div>
  </div>

  <script>
    function pdfToHTML() {
      $('html, body').animate({
        scrollTop: 0
      }, 'fast');
      setTimeout("pdfToHTML2()", 50);

    }

    function pdfToHTML2() {
      var pdf = new jsPDF('p', 'pt', 'letter');
      var options = {
        pagesplit: true
      };
      pdf.addHTML($('#contentReport')[0], options, function() {
        pdf.save('INFORME DE INSPECCION.pdf');
      });
    }
  </script>

  {!! Form::close() !!}
  @endsection()

  @endsection()

  @endsection()
</body>
