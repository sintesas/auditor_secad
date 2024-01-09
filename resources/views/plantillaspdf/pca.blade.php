<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title></title>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
<style media="screen">
  .salto{
    page-break-after: always;
    color: transparent;
    }
  .azul-bg {
    background-color: #002060;
  }
  .row {
    width: 100%;
  }

    /* For desktop: */
  .col-1 {width: 8.33%;}
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
      font-family: Helvetica;
  }
  p.cuadrotexto{
    border: solid 1px black;
    border: solid 2px black;
    min-height: 10rem;
    padding: 0.5rem;
  }
  .contenido a{
    color: black;
  }
  .contenido li, .contenido p {
    font-size: 0.9rem !important;
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
  table.table {
      width: 100%;
      border-spacing: 0;
      margin: 1rem auto;
  }
  tbody tr {
      height: 30px;
      min-height: 30px;
  }
  /*Estilos unicos*/

  .borde-azul {
    border-color: #4472c4;
    border-top-width: 3px;
    border-top-style: solid;
  }
  .subtitulo {
    font-weight: normal !important;
  }
  .titulos {
    text-align: center;
    text-decoration: underline;
  }
  .text-white {
    color: white;
  }
  .text-center {
    text-align: center;
  }
  .thead-blue{
    background-color: #002060;
    color: #fff;
  }
  img.imagenes {
    display: block;
    margin: auto;
  }
  td, th {
    border: solid 1px;
  }
  body {
    width: 100%;
    padding: 0;
  }
  main {
    z-index: 2;
  }
  .paginas {
    /*padding: 3cm 1cm;*/
  }
  .paginas h5 {
    font-size: 1rem;
    font-weight: 700;
  }
  .paginas p{
    font-size: 1rem;
  }
  .paginas h4 {
    text-decoration: underline;
    text-align: center;
    text-transform: uppercase;
    font-size: 1rem;
    font-weight: 700;
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
  border-bottom-style: solid;
  border-bottom-color: #7a7a7a7a;
  border-bottom-width: 1px;
}
p.texto {
  text-align: justify;
    line-height: 1;
    font-size: 0.8rem;
}
p.ppal-text{
  font-weight: 700;
}
ol.sub-text{
  margin-top: 1.5rem;
}
.table_productos th {
    background-color: #deeaf6;
    font-weight: bolder;
    text-align: center;
}
.table_productos th{
  border: solid 1px black !important;
}
.portada h6{
  font-size: 0.8rem;
  /* line-height: 1;
  margin: 0 auto; */
}
.portada h5{
  font-size: 1rem;
  /* line-height: 1;
  margin: 0 auto; */
}
.portada h3{
  font-size: 1.5rem;
  /* line-height: 1;
  margin: 0 auto; */
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
            <a href="#contenido">
              <img style="width:100%" src="https://d2r89ls1uje5rg.cloudfront.net/sites/all/themes/fac_theme/logo.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </header>
  <main style="padding: 3cm 1cm;">
    <div class="container-fluid" style="z-index: 3; background-color: #fff; margin-top:-8cm;margin-bottom: -8cm;">
      <div class="row portada">
        <div class="col-5 text-center" style="background-color: #fff;">
          <br><br><br><br>
          <br><br><br><br>
          <br><br><br><br>
          <br><br><br><br>
          <h6>REPÚBLICA DE COLOMBIA</h6>
          <h5>FUERZA AÉREA COLOMBIANA</h5>
          <img style="width:80%" src="https://d2r89ls1uje5rg.cloudfront.net/sites/all/themes/fac_theme/logo.png" alt="">
        </div>
        <div class="col-7 azul-bg text-white text-center" style="font-weight: bolder;">
          <br><br><br><br>
          <br><br><br><br>
          <br><br><br><br>
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
          <h6>{{$pca->edicion}} EDICIÓN - {{$pca->anio}}</h6>
          <br><br>
          <h6>IMPRENTA Y PUBLICACIONES</h6>
          <h6>FUERZAS MILITARES REPÚBLICA DE COLOMBIA</h6>
          <h6>FUERZA AÉREA COLOMBIANA</h6>
          <br><br><br><br>
        </div>
      </div>
    </div>

<!-- ACTUALIZACIONES -->
    <hr class="salto"> <!-- Salto de página -->

    <h5 class="titulos" id="sumario_actualizaciones">SUMARIO DE ACTUALIZACIONES</h5>

    <div class="col-lg-12">
    <div class="container-fluid paginas">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
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
                @php($i = 1)
                @foreach($notas as $nota)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$nota['fecha']}}</td>
                  <td style="text-align:center;">
                    {{$nota['concepto']}}<br>
                    {{$nota['nota']}}<br>
                    ({{$nota['usuario']}})
                  </td>
                  <td>{{$nota['aprobo']}}</td>
                </tr>
                @php($i = $i + 1)
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
<!-- TABLA DE CONTENIDO -->
<hr class="salto"> <!-- Salto de página -->

<div class="container-fluid paginas contenido">
  <div class="row">
    <div class="col-12">
      <h4 class="text-center" id="contenido">Contenido</h4>
      @php ($i = 1)
      <ol>
        <li><a href="#sumario_actualizaciones">
        <p class="ppal-text">{{$i}}.
          @php ($i = $i + 1)
          SUMARIO DE ACTUALIZACIONES
        </p></a>
        <span></span>
        </li>
        <li><a href="#preliminares">
        <p class="ppal-text">{{$i}}.
          PRLIMINARES
        </p></a>
        <span></span>
          <ol>
            <li><a href="#definiciones">
            <p>{{$i}}.1
              DEFINICIONES
            </p></a>
            </li>
          </ol>
          @php ($i = $i + 1)
        </li>
        <li><a href="#abreviaturas">
        <p class="ppal-text">{{$i}}.
          ABREVIATURAS
          @php ($i = $i + 1)
        </p></a>
        <span></span>
        </li>
        <li><a href="#introduccion">
        <p class="ppal-text">{{$i}}.
          INTRODUCCION
        </p></a>
        <span></span>
        <ol>
          <li><a href="#objeto">
          <p>{{$i}}.1
            OBJETO
          </p></a>
          </li>
          <li><a href="#alcance">
          <p>{{$i}}.2
            ALCANCE
          </p></a>
          </li>
        </ol>
        @php ($i = $i + 1)
        </li>
        <li><a href="#productos">
        <p class="ppal-text">{{$i}}.
          PRODUCTOS AERONAUTICOS DEMANDADOS
        </p></a>
        <span></span>
        @php ($j = 1)
          <ol>
            @foreach ($productos as $producto)
            <li><a href="#prod_{{$producto->IdDemandaPotencial}}">
              <p>{{$i}}.{{$j}}.
                {{$producto->Nombre}}</p></a>
              <span></span>
              <br>
              <ol class="sub-text">
                <li><a href="#prod_descripcion_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.1. DESCRIPCIÓN GENERAL</a></li>
                <li><a href="#prod_viabilidad_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.2. VIABILIDAD PARA DESARROLLO</a></li>
                <li><a href="#prod_imagen_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.3. IMAGEN DEL COMPONENTE</a></li>
                <li><a href="#prod_caracterizacion_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.4. CARACTERIZACIÓN DIMENSIONAL Y FUNCIONAL</a></li>
                <li><a href="#prod_diagrama_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.5. DIAGRAMA ELECTRÓNICO</a></li>
                <li><a href="#prod_especificaciones_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.6. ESPECIFICACIONES</a></li>
                <li><a href="#prod_catalogo_{{$producto->IdDemandaPotencial}}">{{$i}}.{{$j}}.7. CATÁLOGO ILUSTRADO DE PARTES</a></li>
                <li><br></li>
              </ol>
              @php ($j = $j + 1)
            </li>
            @endforeach
          </ol>
          @php ($i = $i + 1)
        </li>
        <li>
          <a href="#ofertados"><p>PRODUCTOS AERONAUTICOS OFERTADOS</p></a>
        </li>
        <li>
          <a href="#contactenos"><p>CONTÁCTENOS</p></a>
        </li>
      </ol>
    </div>
  </div>
</div>


<!-- PRELIMINARES -->

<hr class="salto"> <!-- Salto de página -->
<div class="container-fluid paginas">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <h4 id="preliminares">2. PRELIMINARES</h4>

        <p class="texto">
          {{$pca->Preliminar}}
        </p>
        <br>
        <h5 id="definiciones">2.1. DEFINICIONES</h5>

        @if($definiciones != null)
          @foreach($definiciones as $item)
          <p class="texto" style="border-bottom-style:none"><b>+ {{$item->titulo}}:</b> {{$item->texto}}</p>
          @endforeach
        @else
          <p class="texto" style="border-bottom-style:none"><b>No hay Definiciones</b></p>
        @endif
      </div>
    </div>
  </div>
</div>


<!-- ABREVIATURAS -->

<hr class="salto"> <!-- Salto de página -->
<div class="container-fluid paginas">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <h4 id="abreviaturas">3. ABREVIATURAS</h4>
        @if($abreviaturas != null)
          @foreach($abreviaturas as $item)
          <p class="texto" style="border-bottom-style:none"><b>{{$item->titulo}}:</b> {{$item->texto}}</p>
          @endforeach
        @else
          <p class="texto" style="border-bottom-style:none"><b>No hay Abreviaturas</b></p>
        @endif
      </div>
    </div>
  </div>
</div>


<!-- INTRODUCCION -->

<hr class="salto"> <!-- Salto de página -->
<div class="container-fluid paginas">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <h4 id="introduccion">4. INTRODUCCIÓN</h4>

          <p class="texto" style="border-bottom-style:none">
            {{$pca->introduccion}}</p>
          <br>
          <h5 id="objeto">4.1. OBJETO</h5>

          <p class="texto" style="border-bottom-style:none">{{$pca->objeto}}</p>
          <br>
          <h5 id="alcance">4.2. ALCANCE</h5>

          <p class="texto" style="border-bottom-style:none">{{$pca->alcance}}</p>
      </div>
    </div>
  </div>
</div>
</div>


<hr class="salto"> <!-- Salto de página -->

<h4 id="productos" style="text-align: center; font-size:1rem;text-decoration:underline;">5. PRODUCTOS AERONAUTICOS DEMANDADOS</h4>
<div class="col-lg-12">
  <div class="container-fluid paginas">
    <div class="row">
      <div class="col-12">
        @if($productos != null)
        @php ($i = 1)
        @foreach ($productos as $producto)

        <h5 id="prod_{{$producto->IdDemandaPotencial}}">5.{{$i}}. {{$producto->Nombre}}</h5>
        <h5 class="subtitulo" id="prod_descripcion_{{$producto->IdDemandaPotencial}}">5.{{$i}}.1. DESCRIPCIÓN GENERAL</h5>
    <div class="table-responsive">
      <table class="table table_productos">
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>NÚMERO DE PARTE ORIGINAL</th>
            <th>NÚMERO PARTE FAC</th>
            <th>CÓDIGO SAP</th>
            <th>EQUIPO DE APLICACIÓN</th>
            <th>UNIDAD MILITAR</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$producto->Nombre}}</td>
            <td>{{$producto->ParteNumero}}</td>
            <td></td>
            <td>{{$producto->NSN}}</td>
            <td>{{$producto->CodigoSAP}}</td>
            <td>{{$producto->NombreUnidad}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive">

      <table class="table table_productos">
        <thead>
          <tr>
            <th>CANTIDAD REQUERIDA</th>
            <th>PRIORIDAD UMA</th>
            <th>VALORACIÓN TÉCNICA</th>
            <th>FACTIBILIDAD TÉCNICA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if($producto->cant_requeridad != null || $producto->cant_requeridad != "")
                {{$producto->cant_requeridad}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->prio_UMA != null || $producto->prio_UMA != "")
                {{$producto->prio_UMA}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->val_tecnica != null || $producto->val_tecnica != "")
                {{$producto->val_tecnica}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->fact_tecnica != null || $producto->fact_tecnica != "")
                {{$producto->fact_tecnica}}
              @else
                No disponible
              @endif
            </td>
          </tr>
        </tbody>
      </table>

    </div>
    <div class="table-responsive">

      <table class="table table_productos">
        <thead>
          <tr>
            <th>PUBLICACIONES TECNICAS APLICABLES</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if($producto->publi_tec_apl != null || $producto->publi_tec_apl != "")
                {{$producto->publi_tec_apl}}
              @else
                No disponible
              @endif
              </td>
          </tr>
        </tbody>
      </table>

    </div>

    <div class="table-responsive">

      <table class="table table_productos">
        <thead>
          <tr>
            <th>FUNCIONAMIENTO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if($producto->Funcionamiento != null || $producto->Funcionamiento != "")
                {{$producto->Funcionamiento}}
              @else
                No disponible
              @endif

            </td>
          </tr>
        </tbody>
      </table>

    </div>

    <div class="table-responsive">

      <table class="table table_productos">
        <thead>
          <tr>
            <th>DESCRIPCIÓN DE LA FALLA TÍPICA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if($producto->Desc_fail_tec != null || $producto->Desc_fail_tec != "")
                {{$producto->Desc_fail_tec}}
              @else
                No disponible
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      <br>
      <h5 id="prod_viabilidad_{{$producto->IdDemandaPotencial}}">5.{{$i}}.2. VIABILIDAD PARA DESARROLLO</h5>
    <div class="table-responsive">
      <table class="table table_productos">
        <thead>
          <tr>
            <th>ROTACION</th>
            <th>MTBF</th>
            <th>TIEMPO APROVISIONAMIENTO</th>
            <th>EXISTENCIAS ALMACEN</th>
            <th>PROVISION FABRICANTE ORIGINAL</th>
            <th>FLOTA ANTIGUA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @if($producto->rotacion != null || $producto->rotacion != "")
                {{$producto->rotacion}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->mtbf != null || $producto->mtbf != "")
                {{$producto->mtbf}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->Tp_aprovmto != null || $producto->Tp_aprovmto != "")
                {{$producto->Tp_aprovmto}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->Exist_alm != null || $producto->Exist_alm != "")
                {{$producto->Exist_alm}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->prov_fab_orig != null || $producto->prov_fab_orig != "")
                {{$producto->prov_fab_orig}}
              @else
                No disponible
              @endif
            </td>
            <td>
              @if($producto->Flot_ant != null || $producto->Flot_ant != "")
                {{$producto->Flot_ant}}
              @else
                No disponible
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <hr class="salto"> <!-- Salto de página -->
    <h5 id="prod_imagen_{{$producto->IdDemandaPotencial}}">5.{{$i}}.3. IMAGEN DEL COMPONENTE</h5>
  <br>
  <div class="table-responsive">

      @if($producto->Imgen != null || $producto->Imgen != "")
          <img src="secad/Productos/{{$producto->Nombre.'-'.$producto->ParteNumero.'/'.$producto->Imgen}}">
      @else
        <p class="cuadrotexto">
          No disponible
        </p>
      @endif


  </div>
  <hr class="salto"> <!-- Salto de página -->
  <h5 id="prod_caracterizacion_{{$producto->IdDemandaPotencial}}">5.{{$i}}.4. CARACTERIZACIÓN DIMENSIONAL Y FUNCIONAL</h5>

  <div class="table-responsive">
    <p class="cuadrotexto">

      @if($producto->caract_dim_fun != null || $producto->caract_dim_fun != "")
        {{$producto->caract_dim_fun}}
      @else
        No disponible
      @endif
    </p>
  </div>

  <hr class="salto"> <!-- Salto de página -->
  <h5 id="prod_diagrama_{{$producto->IdDemandaPotencial}}">5.{{$i}}.5. DIAGRAMA ELECTRÓNICO</h5>
  <br>
  <div class="table-responsive">
    <img src="secad/Productos/Diagrama_Electrico_{{$producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$producto->diag_elect}}">
  </div>
  <div class="table-responsive">
    <img src="secad/Productos/Diagrama_Electronico_{{$producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$producto->diag_electronico}}">
  </div>

  <hr class="salto"> <!-- Salto de página -->
  <h5 id="prod_especificaciones_{{$producto->IdDemandaPotencial}}">5.{{$i}}.6. ESPECIFICACIONES</h5>

  <div class="table-responsive">
    <p class="cuadrotexto">
      @if($producto->especificaciones != null || $producto->especificaciones != "")
        {{$producto->especificaciones}}
      @else
        No disponible
      @endif
      </p>
  </div>

  <hr class="salto"> <!-- Salto de página -->
  <h5 id="prod_catalogo_{{$producto->IdDemandaPotencial}}">5.{{$i}}.7. CATÁLOGO DE PARTES</h5>
  <br>
  @if($producto->catalog_ilust_partes != null)
    @php($catalogo = json_decode($producto->catalog_ilust_partes))

    @foreach($catalogo as $img)
    <div class="table-responsive">
      <img src="secad/Productos/Catalogo_ilustrado_{{$producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$img}}">
    </div>
    @endforeach

    @else
    <div class="table-responsive">
      <p class="cuadrotexto">No disponible.</p>
    </div>

    @endif

    <!-- <p class="cuadrotexto">{{$producto->especificaciones}}</p> -->
    <hr class="salto"> <!-- Salto de página -->
    @php ($i = $i + 1)
    @endforeach
  @else
    <b>No hay productos seleccionados para el PCA</b>
  @endif
  <h5 class="titulos">PRODUCTOS AERONAUTICOS OFERTADOS</h5>
  <br>
  <p style="text-align:justify;">Desde el momento de su creación, el SECAD, ha generado las siguientes certificaciones, las
  cuales pueden ser validadas en la página del SECAD <a href="https://www.fac.mil.co/secad">https://www.fac.mil.co/secad</a> (MENÚ >
  Certificación Aeronáutica > Aprobaciones de Diseño de Producto Aeronáutico - Certificaciones
  Emitidas)<br><br>
  A continuación se presenta el listado de dichos productos aeronáuticos certificados por el
  SECAD.<br><br>
  </p>
  @if($productos != null)
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-blue">
        <tr>
          <th><b>No.</b></th>
          <th><b>PRODUCTO AERONAUTICO</b></th>
          <th><b>EQUIPO</b></th>
          <th><b>CLASE</b></th>
          <th><b>UNIDAD</b></th>
          <th><b>FABRICANTE</b></th>
          <th><b>CERTIFICADO EMITIDO</b></th>
        </tr>
      </thead>
      <tbody>
        @php ($i = 1)
        @foreach ($productos as $producto)
        <tr>
          <td>{{$i}}</td>
          <td>{{$producto->Nombre}}</td>
          <td>{{$producto->Equipo}}</td>
          <td>{{$producto->Clase}}</td>
          <td>{{$producto->NombreUnidad}}</td>
          <td>{{$producto->Fabricante}}</td>
          <td></td>
        </tr>
        @php ($i = $i + 1)
        @endforeach
      </tbody>
    </table>
  </div>
@else
  <b>No hay productos seleccionados para el PCA</b>
@endif

  <hr class="salto"> <!-- Salto de página -->
  <h5 class="titulos" id="contactenos">CONTÁCTENOS</h5>
  <br>
  <p style="text-align:justify;">Para obtener más información sobre el inicio del proyecto de la certificación de productos aeronáuticos y usted considera cuenta con las capacidades de fabricación lo invitamos a visitar nuestra página web <a href="https://www.fac.mil.co/secad">https://www.fac.mil.co/secad</a><br><br>
  O contactarse a los siguientes teléfonos.<br><br>
  Oficina: 8209040 EXT. 1625 / 3159500 EXT. 1600 / 1602<br><br>
  Celulares: 310-2115438 / 320-7883264<br><br>
  </p>

  </div>
</div>
</div>
</div><!--end .col -->

  </main>
    <footer class="borde-azul" style="font-size: 12px;text-align:right;">
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
