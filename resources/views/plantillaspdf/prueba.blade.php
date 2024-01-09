<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style media="screen">
  .salto{
    page-break-after: always;
    }
  /*.col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
  .col {width: auto;}
  .row::after {
    content: "";
    clear: both;
    display: table;
  }
  [class*="col-"] {
    float: left;
    padding: 15px;
  }
  table {
    border: black solid 1px;
  }
  body {
    background-color: #fff;
  }

  }*/
  .azul-bg {
    background-color: #002060;
  }
  .row {
    width: 100%;
  }
  [class*="col-"] {
    float: left;
    padding: 15px;
  }
  @page {
      margin: 0cm 0cm;
  }

  /** Define now the real margins of every page in the PDF **/
  body {
      margin-top: 3cm;
      margin-left: 0cm;
      margin-right: 0cm;
      margin-bottom: 0cm;
  }

  /** Define the header rules **/
  header {
      position: fixed;
      top: 0cm;
      left: 1cm;
      right: 1cm;
      height: 2cm;
      border-bottom: solid 3px #4472c4;
      font-weight: bolder;
      z-index: 0;
  }

  /** Define the footer rules **/
  footer {
      position: fixed;
      bottom: 0cm;
      left: 1cm;
      right: 1cm;
      height: 2cm;
      z-index: 0;
  }
  /*Estilos unicos*/

  .borde-azul {
    border-color: #4472c4;
    border-top-width: 3px;
    border-top-style: solid;
  }
  .titulos {
    text-align: center;
    text-decoration: underline;
  }
  .text-white {
    color: white;
  }
  .thead-blue{
    background-color: #002060;
    color: #fff;
  }
  td, th {
    border: solid 1px;
  }
  body {
    width: 100%;
  }
  main {
    z-index: 2;
  }
  .paginas {
    /*padding: 3cm 1cm;*/
  }
  .paginas h4 {
    text-decoration: underline;
    text-align: center;
    text-transform: uppercase;
  }
  .paginas li {
    width: 100%;
  }
  .paginas li span {
    display: inline-block;
}
.paginas li p {
  display: inline-block;
  width: 90%;
  border-bottom-style: dotted;
}
ol {
  list-style-type: none;
}
</style>


  </head>
  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-9 text-center" style="font-size: 10px">
            FUERZA AÉREA COLOMBIANA<br>
            OFICINA DE CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD<br>
            PLAN DE CERTIFICACIÓN ANUAL PRODCTOS AERONÁUTICOS
          </div>
          <div class="col-2">
            <img class="w-100" src="https://d2r89ls1uje5rg.cloudfront.net/sites/all/themes/fac_theme/logo.png" alt="">
          </div>
        </div>
      </div>
    </header>
    <div class="container-fluid" style="z-index: 3; background-color: #fff;">
      <div class="row">
        <div class="col-5 text-center" style="background-color: #fff;">
          <br><br><br><br>
          <br><br><br><br>
          <h6>REPÚBLICA DE COLOMBIA</h6>
          <h5>FUERZA AÉREA COLOMBIANA</h5>
        </div>
        <div class="col-6 azul-bg text-white text-center" style="font-weight: bolder;">
          <br><br><br><br>
          <br><br><br><br>          
          <h3>PLAN DE CERTIFICACIÓN</h3>
          <h3>ANUAL FAC</h3>
          <br><br>
          <h6>DEMANDA Y OFERTA DE PRODUCTOS AERONAUTICOS PARA LA</h6>
          <h6>AVIACIÓN DE ESTADO COLOMBIANA</h6>
          <br><br>
          <h6>Jefatura Logística</h6>
          <h6>Oficina Certificaón Aeronáutica de la Defensa</h6>
          <h6>(SECAD)</h6>
          <br><br>
          <h6>SEGUNDA EDICIÓN - 2020</h6>
          <br><br>
          <h6>IMPRENTA Y PUBLICACIONES</h6>
          <h6>FUERZAS MILITARES REPÚBLICA DE COLOMBIA</h6>
          <h6>FUERZA AÉREA COLOMBIANA</h6>
          <br><br><br><br>
        </div>
      </div>
    </div>
  <main style="padding: 3cm 1cm;">
<!-- ACTUALIZACIONES -->
    <hr class="salto"> <!-- Salto de página -->
    <div class="container-fluid paginas">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <h4>1. Sumario de actualizaciones</h4>
            <table class="table">
              <thead class="thead-blue">
                <tr>
                  <th><b>No. de<br>Revisión</b></th>
                  <th><b>Fecha</b></th>
                  <th><b>Descripción</b></th>
                  <th><b>Aprobada por</b></th>
                </tr>
              </thead>
              <tbody>

                @for ($i = 1; $i <=10; $i++)
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
<!-- TABLA DE CONTENIDO -->
<hr class="salto"> <!-- Salto de página -->

<div class="container-fluid paginas">
  <div class="row">
    <div class="col-12">
      <h4 class="text-center">Contenido</h4>
      @php ($i = 1)
      <ol>
        <li>
        <p>{{$i}}.
          @php ($i = $i + 1)
          SUMARIO DE ACTUALIZACIONES
        </p>
        <span>2</span>
        </li>
        <li>
        <p>{{$i}}.
          PRODUCTOS AERONAUTICOS DEMANDADOS
        </p>
        <span>2</span>
        @php ($j = 1)
          <ol>
            @foreach ($productos as $producto)
            <li>
              <p>{{$i}}.{{$j}}.
                @php ($j = $j + 1)
                {{$producto->Nombre}}</p>
              <span>##</span>
              <ol>
                <li>{{$i}}.{{$j}}.1. DESCRIPCIÓN GENERAL</li>
                <li>{{$i}}.{{$j}}.2. VIABILIDAD PARA DESARROLLO</li>
                <li>{{$i}}.{{$j}}.3. IMAGEN DEL COMPONENTE</li>
                <li>{{$i}}.{{$j}}.4. CARACTERIZACIÓN DIMENSIONAL Y FUNCIONAL</li>
                <li>{{$i}}.{{$j}}.5. DIAGRAMA ELECTRÓNICO</li>
                <li>{{$i}}.{{$j}}.6. ESPECIFICACIONES</li>
                <li>{{$i}}.{{$j}}.7. CATÁLOGO ILUSTRADO DE PARTES</li>
              </ol>
            </li>
            @endforeach
          </ol>
          @php ($i = $i + 1)
        </li>
      </ol>
    </div>
  </div>
</div>
<!-- PRODUCTO -->
    <hr class="salto"> <!-- Salto de página -->

    <h1 id="tercero">productos</h1>
    <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th><b>Año</b></th>
            <th><b>Nombre</b></th>
            <th><b>ParteNumero</b></th>
            <th><b>NSN</b></th>
            <th><b>CodigoSAP</b></th>
            <th><b>Unidad</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
          <tr>
            <td>{{$producto->Anio}}</td>
            <td>{{$producto->Nombre}}</td>
            <td>{{$producto->ParteNumero}}</td>
            <td>{{$producto->NSN}}</td>
            <td>{{$producto->CodigoSAP}}</td>
            <td>{{$producto->NombreUnidad}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!--end .table-responsive -->
  </div><!--end .col -->

  </main>
    <footer class="text-right borde-azul" style="font-size: 12px;">
        Original 2020
    </footer>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(30, 760, "$PAGE_NUM de $PAGE_COUNT SEGUNDA EDICION", $font, 8);
            ');
        }
	</script>
  </body>
</html>
