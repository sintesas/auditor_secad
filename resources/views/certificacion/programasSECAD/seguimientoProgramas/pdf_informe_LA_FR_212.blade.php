@extends('partials.card_big_no_h')

@extends('partials.pdf')

<body style="background-color: white;">

@section('content')

@section('card-content')


@section('card-content')       
<style>
  /* Auditorias > informes > PlanInspeccion.html */

/* General */
/*#content{
    background-color: #fff;
    
}*/
/*div{
    color:#000;
}
*/
.gris,
.blanco {
    background: #DBDBDB;
    font-size: 90%;
}

.gris {
    color: #00000;
    font-weight: 900;
}

.blanco {
    color: #FFF;
}

.gris57 {
    color: #575551;
}

.azul8080 {
    color: #008080;
}

.azul175 {
    color: #17365D;
}

.fondoAzulClaro {
    background: #D1EAF0;
}

.fondoAzulOscuro {
    background: #17365D;
}

.fondoGrisLAFR212 {
    background: #c0c0c0;
    padding-left: 5px;
}

.fondoWhith {
    background: #FFFFFF;
    padding-left: 5px;
}

.aqua {
    background-color: aquamarine;
}

.row {
    /*margin-top: 1%;  */
}

.none-space {
    margin: 0%;
    padding: 0%;
}

* {
    margin: 0%;
    padding: 0%;
}

.br-solid {
    border-right: solid 1px;
}

.circulo {
    width: 200px;
    height: 200px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    background: #DBDBDB;
    margin: auto;

}

/* Encabezado */
.encabezadoPlanInspeccion {
    height: 100px;

}

.logoFac,
.titulo,
.datosFormulario {
    border: solid 1px;
    height: 100%;
    text-align: center;
}

.logoFac>img {
    width: 50%;
}

.logoFacWOB {
    height: 50%;
    text-align: center;
}

.logoFacWOB>img {
    width: 50%;
}

.logoSecad {
    margin-top: 20px;
}

.logoSecad>img {
    width: 85%;
}

.datosFormulario {
    margin: 0%;
    padding: 0;
    background-color: #fff;
}

.caracterisicasFormulario {
    display: flex;
    width: 100%;
    list-style: none;
}

.caracterisicasFormulario li {
    width: 50%;
    border: solid 1px;
    height: 25px;
    ;
    font-size: 90%;
}

/* Fecha y primer bloque de datos */
.fecha {
    margin-top: 5px;
    margin-bottom: 15px;

}

.filaFormulario {
    font-weight: 100%;
    padding: 0;
    border: solid 1px #000;
}

/*.filaFormulario>div, .fecha>div{
    border: solid 1px #000;    
    font-weight: 900;        
}*/
.firstColDivider {
    border-right: solid 1px #000;
}

.filaFormularioTop {
    border-top: solid 1px #000;
}

.menuTipoInspeccion {
    list-style: none;
    height: 100%;
    font-size: 100%;
}

.menuTipoInspeccion li {
    height: 100%;
    font-size: 85%;

}

/* Segundo bloque de datos: Actividad de la inspeccion */
.r>div {
    padding: 0;
    height: 100%;
}

.menuActInsp {
    list-style: none;
    width: 100%;
    height: auto;
    font-size: 90%;
}

.menuActInsp li {
    width: 100%;
    height: 100%;
    border-left: solid 1px;
}

/* tercer bloque */
.esL>div {
    padding: 0%;
    margin: 0%;
}

/* ---------------------------------------------- */
/* Auditorias > informes > PlanMejoramiento.html */
/* ---------------------------------------------- */
.menu-tipoAcc {
    display: flex;
    list-style: none;
    padding: 0%;
    width: 100%;
    margin: 0;
}

.menu-tipoAcc>li {
    width: 34%;
    font-size: 80%;
    border-bottom: solid 1px #000;
    border-top: solid 1px #000;
}

.ptable {
    border-top: 1px solid #000;
}

/* ---------------------------------------------- */
/* Auditorias > informes > InformeInspeccion.html */
/* ---------------------------------------------- */
.radioTipoRep {
    width: 80%;
    margin-left: 10%;
    display: block;
    margin: 0%;
    padding: 0%;
}

.table-tipoReporte tr {
    height: 100%;
    ;
}

.table-tipoReporte tr td {
    max-height: 10%;
    font-size: 80%
}

.inputInforme {
    width: 100%;
    font-size: 80%;
    height: 100px;
}

.firmaFormulario>div {
    border: solid 1px #000;
    font-weight: 900;
    font-size: 90%;
    height: 100%;
}

/* ---------------------------------------------- */
/* Auditorias > informes > SEGUIMIENTO ACCIONES CORRECTIVAS PREVENTICAS Y DE MEJORA */
/* ---------------------------------------------- */
.table-segumiento tr {
    font-size: 90%;
    text-align: center;
}

.table-x {
    font-size: 88%;
}

.line-b {
    border-bottom: 2px solid;
}

.line-c {
    border-bottom: 2px dashed;
}

.line-bt {
    border-top: 2px solid;
}

.line-ct {
    border-top: 2px dashed;
}

.lighterFont {
    font-weight: lighter !important;
    line-height: normal !important;
}

.table-x tr th {
    /* border-right: 1px solid;    
    border-color:black;*/
}

.borderL {
    border-left: 1px solid !important;
    border-color: black;
}

.borderR {
    border-right: 1px solid !important;
    border-color: black;
}

.borderT {
    border-top: 1px solid !important;
    border-color: black;
}

.borderB {
    border-bottom: 1px solid !important;
    border-color: black;
}

.squeareB {
    border-left: 1px solid !important;
    border-right: 1px solid !important;
    border-top: 1px solid !important;
    border-bottom: 1px solid !important;
    border-color: black;

}


.seccionLAFR212 label {
    font-weight: 500;
    margin-bottom: 0px;
}

.seccionLAFR212 p {
    margin-bottom: 0px;
}

/* ---------------------------------------------- */
/* Auditorias > informes > INFORME VISITA ACOMPAÑAMIENTO */
/* ---------------------------------------------- */
.menuInformeVisAcom {
    list-style: none;
    height: 100%;
    padding: 0%;
    margin: 0%;
}

.menuInformeVisAcom>li {
    border: 1px solid;
    width: 100%;
    height: 33%;
}

.encabezadoPlanInspeccion>div {
    padding: 0%;
}

/* ---------------------------------------------- */
/* Auditorias > CREARPERSONAL */
/* ---------------------------------------------- */

/* ---------------------------------------------- */
/* SEGUIMIENTO PLAN MEJORAMIENTO_M */
/* ---------------------------------------------- */
.scroll {
    overflow-x: auto;
}

.content-escarapela {
    background-color: #FFF;
}

.escarapela img {
    /*height: 200px;*/
    width: 50%;
    margin-left: 25%;
}

.escarapela p {
    width: 80%;
    margin-left: 10%;
    font-size: 20px !important;
}

.letraGris {
    color: #808080;
}

.divFondoGris {
    color: #d9d9d9;
}

.negro {
    color: #000;
    font-weight: 400 !important;
}

.LetraBold {
    font-weight: bold !important;
}

.borderA {

    padding-left: 0px;
    padding-right: 0px;
}

.down {

    padding-top: 3px;
}

.downC {
    padding-top: 9px;
}

/*formulario joel*/

.table-header-3 {
    padding: 0;
    margin: 0;
    font-weight: 700;
    min-height: 25px;
    max-height: 25px;
}

.total-center {
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-fac {
    font-family: 'Arial', sans-serif';

}

.form-fac-subtitulo {
    border-top: 2px solid #000;
    border-bottom: 2px solid #000;
}

.form-fac-subtitulo p {
    font-weight: 700;
    font-size: 15.8px;
}

.form-fac p {
    margin: 0;
}

.form-fac-th {
    padding: 0 !important;
    min-height: 30px;
    max-height: 30px;
    text-align: center;
}

.form-fac-th p {
    font-size: 11px !important;
    font-weight: 700;
    line-height: 13px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 16px;
}

.form-fac-td {
    font-size: 12px;
    text-align: center !important;
    line-height: 13px !important;
    padding: 1px !important;
    min-height: 30px;
    max-height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-fac-parrafo {
    min-height: 53px;
    display: flex;
    align-items: center;
    padding: 3px 0 0 3px;
    max-height: 53px;
    line-height: 20px;
    font-weight: 700;
    font-size: 15px;
}

.form-fac-2 tr th,
.form-fac-2 tr td {
    border: 2px solid #000 !important;
}

.form-fac-row>div {
    font-weight: 700;
    text-align: center;
    padding: 3px 0;
}

.form-fac tr td {
    text-align: center;
    line-height: 15px !important;
}

.form-fac-2 .th-0 {
    font-weight: 700;
    padding: 4px 0 0 0 !important;
    vertical-align: top;
}

.form-fac-footer {
    text-align: center;
    font-size: 13px;    
    min-height: 75px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.main-th {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.th-1 {
    height: 29px;
}

.th-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 11px !important;
    width: 100%;
    border-top: 2px solid #000;
}

.th-2-2 {
    text-align: center;
    font-size: 11px;
    line-height: 13px;
    padding-top: 4rem !important;
    position: relative;
    width: 135px;
    line-height: 13px !important;
}

.espan:before {
    content: "4.1. Estado de Cumplimiento";
    background-color: #fff;
    position: absolute;
    top: 0px;
    width: 215px;
    left: 0;
    height: 35px;
    padding-top: 6px;
    font-size: 14px;
    border-bottom: 2px solid black;
    border-right: 1px solid black;
}

.th-2-2 span {
    display: block;
    font-weight: 400;
}

.div-border {
    padding: 3px 0 0 3px;
}

.styleA {
    padding-left: 5px;
    padding-top: 2px;
    border-top-width: 2px;
    padding-bottom: 2px;
}

.styleB {
    padding-top: 28px;
    border-top-width: 0px;
}

.styleC {
    padding-top: 33px;
}

.styleD {
    padding-top: 33px;
}

.styleE {
    padding-top: 34px;
}

.styleF {
    padding-top: 28px;
    border-top-width: 0px;
}

.styleG {
    padding-top: 175px;
}

.styleH {
    padding-top: 28px;
    border-top-width: 0px;
}

/* Modal > Loading */
/* ---------------------------------------------- */
.modalFAC {
    position: fixed;
    z-index: 999;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background-color: Black;
    filter: alpha(opacity=60);
    opacity: 0.6;
    -moz-opacity: 0.8;
}

.centerModalFAC {
    z-index: 1000;
    margin: 300px auto;
    width: 130px;
    background-color: transparent;
    border-radius: 10px;
    filter: alpha(opacity=100);
    opacity: 1;
    -moz-opacity: 1;
}

.centerModalFAC img {
    height: 128px;
    width: 128px;
}

/*Titulo Encabezado*/
.title-fac {
    float: left;
    width: 100%;
    position: absolute;
    text-align: center;
}

.div-img-right {
    text-align: right;
}

.div-img-left {
    text-align: left;
}

.title-fac img {
    height: 64px;
    padding-right: 15px;
}

.foto-personal {
    border: solid 1px #ccc;
    height: 160px;
    margin-left: 52.5px;
    margin-right: 52.5px;
}

.foto-personal img {
    width: 159px;
    height: 158px;
}

.foto-personalInf {
    border: solid 1px #ccc;
    height: 160px;
    margin-left: 26.5px;
    margin-right: 26.5px;
    top: 18px;
}

.foto-personalInf img {
    width: 172px;
    height: 175px;
}

.foto-diploma {
    border: solid 1px #ccc;
    height: 160px;
    margin-left: 27.5px;
    margin-right: 27.5px;
}

.foto-diploma img {
    width: 159px;
    height: 158px;
}

.foto-producto {
    border: solid 1px #ccc;
    height: 160px;
    margin-left: 52.5px;
    margin-right: 52.5px;
    text-align: center;
}

.foto-producto img {
    width: 159px;
    height: 158px;
}

@media (max-width: 769px) {
    .title-fac img {
        display: none;
    }
}

.encabezadoFR212 {
    height: auto;
    /*border: solid ;*/
    text-align: center;

}

.encabezadoFR212 h6 {
    font-size: 9px;
}

.encabezadoFR212 h5 {
    font-size: 11px;
}

/*modificado joel alvarez*/

.customChk {
    margin-top: 2px;
    margin-bottom: 2px;
    margin-left: 3px;
    display: flex;
    align-items: center;
}

.customChk input[type="checkbox"] {
    margin: 0;
    margin-right: 5px;
}

/*modificado joel alvarez*/

.headerFS {
    font-size: 14px !important;
}

/*EXTRA MARGINS*/
.mt-0 {
    margin-top: 0px !important;
}

.mt-5 {
    margin-top: 5px !important;
}

.mt-10 {
    margin-top: 10px !important;
}

.mt-15 {
    margin-top: 15px !important;
}

.mt-20 {
    margin-top: 20px !important;
}

.mt-25 {
    margin-top: 25px !important;
}

.mt-30 {
    margin-top: 30px !important;
}

.mt-40 {
    margin-top: 40px !important;
}

.mt-50 {
    margin-top: 50px !important;
}

.mt-60 {
    margin-top: 60px !important;
}

.mt-80 {
    margin-top: 80px !important;
}

.mb-0 {
    margin-bottom: 0px !important;
}

.mb-5 {
    margin-bottom: 5px !important;
}

.mb-10 {
    margin-bottom: 10px !important;
}

.mb-15 {
    margin-bottom: 15px !important;
}

.mb-20 {
    margin-bottom: 20px !important;
}

.mb-25 {
    margin-bottom: 25px !important;
}

.mb-30 {
    margin-bottom: 30px !important;
}

.mb-40 {
    margin-bottom: 40px !important;
}

.mb-50 {
    margin-bottom: 50px !important;
}

.mb-60 {
    margin-bottom: 60px !important;
}

.mb-80 {
    margin-bottom: 80px !important;
}

.pt-0 {
    padding-top: 0px !important;
}

.pt-5 {
    padding-top: 5px !important;
}

.pt-10 {
    padding-top: 10px !important;
}

.pt-15 {
    padding-top: 15px !important;
}

.pt-20 {
    padding-top: 20px !important;
}

.pt-25 {
    padding-top: 25px !important;
}

.pt-30 {
    padding-top: 30px !important;
}

.pt-40 {
    padding-top: 40px !important;
}

.pt-50 {
    padding-top: 50px !important;
}

.pt-60 {
    padding-top: 60px !important;
}

.pt-80 {
    padding-top: 80px !important;
}

.pb-0 {
    padding-bottom: 0px !important;
}

.pb-5 {
    padding-bottom: 5px !important;
}

.pb-10 {
    padding-bottom: 10px !important;
}

.pb-15 {
    padding-bottom: 15px !important;
}

.pb-20 {
    padding-bottom: 20px !important;
}

.pb-25 {
    padding-bottom: 25px !important;
}

.pb-30 {
    padding-bottom: 30px !important;
}

.pb-40 {
    padding-bottom: 40px !important;
}

.pb-50 {
    padding-bottom: 50px !important;
}

.pb-60 {
    padding-bottom: 60px !important;
}

.pb-80 {
    padding-bottom: 80px !important;
}

.pl-0 {
    padding-left: 0px !important;
}

.pl-5 {
    padding-left: 5px !important;
}

.pl-10 {
    padding-left: 10px !important;
}

.pl-15 {
    padding-left: 15px !important;
}

.pl-20 {
    padding-left: 20px !important;
}

.pl-25 {
    padding-left: 25px !important;
}

.pl-30 {
    padding-left: 30px !important;
}

.pl-40 {
    padding-left: 40px !important;
}

.pl-50 {
    padding-left: 50px !important;
}

.pl-60 {
    padding-left: 60px !important;
}

.pl-80 {
    padding-left: 80px !important;
}

.pr-0 {
    padding-right: 0px !important;
}

.pr-5 {
    padding-right: 5px !important;
}

.pr-10 {
    padding-right: 10px !important;
}

.pr-15 {
    padding-right: 15px !important;
}

.pr-20 {
    padding-right: 20px !important;
}

.pr-25 {
    padding-right: 25px !important;
}

.pr-30 {
    padding-right: 30px !important;
}

.pr-40 {
    padding-right: 40px !important;
}

.pr-50 {
    padding-right: 50px !important;
}

.pr-60 {
    padding-right: 60px !important;
}

.pr-80 {
    padding-right: 80px !important;
}



.tree {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #fbfbfb;
    border: 1px solid #999;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05)
}

.tree li {
    list-style-type: none;
    margin: 0;
    padding: 10px 5px 0 5px;
    position: relative
}

.tree li::before,
.tree li::after {
    content: '';
    left: -20px;
    position: absolute;
    right: auto
}

.tree li::before {
    border-left: 1px solid #999;
    bottom: 50px;
    height: 100%;
    top: 0;
    width: 1px
}

.tree li::after {
    border-top: 1px solid #999;
    height: 20px;
    top: 25px;
    width: 25px
}

.tree li span {
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border: 1px solid #999;
    border-radius: 5px;
    display: inline-block;
    padding: 3px 8px;
    text-decoration: none
}

.tree li.parent_li>span {
    cursor: pointer
}

.tree>ul>li::before,
.tree>ul>li::after {
    border: 0
}

.tree li:last-child::before {
    height: 30px
}

.tree li.parent_li>span:hover,
.tree li.parent_li>span:hover+ul li span {
    background: #eee;
    border: 1px solid #94a0b4;
    color: #000
}

.table input,
textarea {
    width: 100%
}

.table p {
    font-size: 9px;
}


/*Titulo header */
.tittleHeadFAC {
    margin-top: 10px;
    margin-bottom: 0;
    font-family: Eras Demi ITC;
    font-size: 24px;
    font-weight: 400;
    color: #fff;
}

.subTittleHeadFAC {
    margin: 0;
    font-family: Eras Demi ITC;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
}
</style>
<div class="">
    <!-- BEGIN BASE-->
    <div id="">

        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT -->

        <!-- BEGIN CONTENT-->
        <div id="">
            <section style="padding: 10px !important;">
              @if($informelafr212R)
               <div class="content">                        
                 <div class="row borderT borderL borderR">
                  <div class="row">
                     <div class="col-xs-3 logoFacWOB total-center" style="width: 18%; padding:0; height: 75px;"> 
           <img src="{{$logo}}" style="width: 25%"></div>
                     <div class="col-xs-6 borderL borderA" style="width: 60%;">
                        <div class="col-xs-12 borderA">
                           <div class="col-xs-12 borderB" style="padding: 0; margin: 0; text-align: center;">
                              <p style="margin: 0; font-family: 'Arial', sans-serif; font-weight: 700;">FUERZA AÉREA COLOMBIANA</p>
                           </div>
                           <div class="col-xs-12 total-center" style=" max-height: 50px; min-height: 50px;">
                              <p style="font-size: 24px; font-weight: 700;">SECAD: SEGUIMIENTO CERTIFICACIÓN AERONÁUTICA </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-3 borderL borderA" style="width: 22%;">
                        <div class="col-xs-5 borderA">
                           <div class="col-xs-12 borderB borderA borderR down table-header-3 text-right">Código:</div>
                           <div class="col-xs-12 borderB borderA borderR down table-header-3 text-right">Versión No:</div>
                           <div class="col-xs-12  borderA borderR down table-header-3 text-right">Vigencia:</div>
                        </div>
                        <div class="col-xs-6 borderA" style="
                           width: 133px;
                           ">
                           <div class="col-xs-12 borderB borderA downC table-header-3 text-center">GA-JELOG-FR-257</div>
                           <div class="col-xs-12 borderB borderA downC table-header-3 text-center">1</div>
                           <div class="col-xs-12 borderA downC table-header-3 text-center">28/09/2018</div>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-6"></div>
                </div>
                {{-- <br> --}}                
                <div class="row">
                   <div class="col-xs-9 borderT borderL borderR fondoGrisLAFR212 text-center">
                      <p  class="total-center"  style="font-weight: 700; font-size: 18px; min-height: 41px; max-height: 41px;">OFICINA CERTIFICACIÓN AERONAUTICA DE LA DEFENSA - SECAD</p>
                   </div>
                   <div class="col-xs-3 borderT borderR fondoGrisLAFR212 text-center">
                      <p class="total-center text-center" style="font-weight: 700; font-size: 14px; line-height: 20px; min-height: 41px; max-height: 41px;">1. NÚMERO DE CONTROL PROGRAMA DE CERTIFICACIÓN “SECAD”</p>
                   </div>
                </div>
                <div class="row">
                    <div class="col-xs-9 borderT borderL borderR text-center" style="height: 60px;">
                      <div class="col-xs-12"  style="text-align: left;">
                          <p style="font-weight: 400;    font-size: 17px;transform: translateY(24px);height: 58px;overflow: hidden;max-height: 58px;"><strong>{{$programa->Proyecto}}</strong></p>
                      </div>
                   </div>
                   <div class="col-xs-3 borderT borderR borderL" style="padding-top: 0px;">
                      <p style="transform: translateY(5px);font-size: 32px;  text-align: center; font-weight: 700;">{{$informelafr212R->Consecutivo}}</p>
                   </div>
                </div>
                <div class="row">
                       <div class="col-xs-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                          <p>2. DATOS GENERALES DEL PRODUCTO AERONÁUTICO</p>
                       </div>
                    </div>
                    <div class="row">
                   <div class="col-xs-2 borderT borderL borderR" style="width: 18%; padding: 0;">
                      <p class="form-fac-parrafo">2.1. Clasificación Producto Aeronáutico</p>
                      <div class="col-xs-12" style="padding: 0;">
                         <div class="customChk col-xs-12 borderA">
                            <input type="checkbox" {{($informelafr212R->Clase=='Clase I')? 'checked':''}} class="borderA"> Producto Aeronáutico Clase I
                         </div>
                         <div class="customChk  col-xs-12 borderA">
                            <input type="checkbox" {{($informelafr212R->Clase=='Clase II')? 'checked':''}} class="borderA">Producto Aeronáutico Clase II
                         </div>
                         <div class="customChk col-xs-12 borderA">
                            <input type="checkbox" {{($informelafr212R->Clase=='Clase III')? 'checked':''}} class="borderA">Producto Aeronáutico Clase III
                         </div>
                      </div>
                   </div>
                   <div class="col-xs-2 borderT borderA" style="width: 15%;">
                      <p class="form-fac-parrafo">2.2. Nombre Producto Aeronáutico</p>
                      <div class="col-xs-12 borderT borderA">
                         {{$informelafr212R->Nombre}}
                      </div>
                   </div>
                   <div class="col-xs-1 borderT borderL borderR borderA" style="width: 10%;">
                      <p class="form-fac-parrafo">2.3. Modelo/ Equipo</p>
                      <div class="col-xs-12 borderT" style="min-height: 84px;">
                         {{$informelafr212R->Equipo}}
                      </div>
                   </div>
                   <div class="col-xs-3 borderT borderA" style="width: 20%;">
                      <p class="form-fac-parrafo">2.4. Número de Parte (P/N)</p>
                      <div class="col-xs-6 borderA borderT">
                         <div class="col-xs-12 borderB borderA borderR down div-border">
                            Nuevo:
                         </div>
                         <div class="col-xs-12 borderB borderA borderR down div-border">
                            Original (OEM):
                         </div>
                         <div class="col-xs-12  borderA borderR down div-border">
                            Otro (¿Cuál):
                         </div>
                      </div>
                      <div class="col-xs-6 borderA borderT ">
                         <div class="col-xs-12 borderB borderA down div-border" style="max-height: 28px;overflow: hidden;">{{($informelafr212R->ParteNumero)?$informelafr212R->ParteNumero:'---'}}</div>
                         <div class="col-xs-12 borderB borderA down div-border" style="max-height: 28px;overflow: hidden;">{{($informelafr212R->NSN)?$informelafr212R->NSN:'---'}}</div>
                         <div class="col-xs-12  borderA down div-border" style="max-height: 28px;overflow: hidden;">---</div>
                      </div>
                   </div>
                   <div class="col-xs-2 borderT borderL borderR borderA" style="width: 22%;">
                      <p class="form-fac-parrafo">2.5. Bases de Certificación</p>
                      <div class="col-xs-12 borderT" style="min-height: 84px; max-height: 84px!important;">
                         @foreach($programa->programas as $certificacion)
                         {{$certificacion->Referencia}} /
                         @endforeach
                      </div>
                   </div>
                   <div class="col-xs-2 borderT borderR borderA" style="width: 15%;">
                      <p class="form-fac-parrafo">2.6. Solicitante / Titular</p>
                      <div class="col-xs-12 borderT" style="min-height: 84px;max-height: 84px!important;">
                         {{$informelafr212R->NombreEmpresa}} / {{$informelafr212R->NombreCertificaInfo}}
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                      <p>3. ALCANCE SOLICITADO PARA CERTIFICACIÓN AERONÁUTICA</p>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-4 borderL borderR borderA" style="width: 33%">
                      <div>
                         <p class="form-fac-parrafo" style="font-size: 13px; min-height: 50px; max-height: 50px;">3.1. Marque con "X" si se trata de un Producto Aeronáutico o Reconocimiento de Organización Aeronáutica</p>
                         <div class="customChk" style="padding: 2px 0 2px 0">
                            <input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Diseño Aeronáutico')? 'checked':''}} class="borderA"> Aprobación de Diseño de Producto Aeronáutico
                         </div>
                         <div class="customChk" style="padding: 2px 0 2px 0">
                            <input type="checkbox" {{($informelafr212R->Alcance=='Aprobación de Producción Aeronáutica')? 'checked':''}} class="borderA">Aprobación de Producción Aeronáutica
                         </div>
                         <div class="customChk" style="padding: 2px 0 2px 0">
                            <input type="checkbox" {{($informelafr212R->Alcance=='Reconocimiento Organización Aeronáutica')? 'checked':''}} class="borderA">Reconocimiento Organización Aeronáutica 
                         </div>
                      </div>
                      <div class="borderT ">
                         <p class="form-fac-parrafo"style="font-size: 13px; font-size: 13px; min-height: 37px; max-height: 37px;">3.2. Área SECAD Responsable (Marque con "X")</p>
                         <div class="customChk">
                            <input type="checkbox" {{($informelafr212R->AccionSECAD=='ACPA')? 'checked':''}} class="borderA"> ACPA - Área Certificación Productos Aeronáuticos
                         </div>
                         <div class="customChk">
                            <input type="checkbox" {{($informelafr212R->AccionSECAD=='AREV')? 'checked':''}} class="borderA"> AREV - Área Reconocimiento y Evaluación
                         </div>
                      </div>
                   </div>
                   <div class="col-xs-8 borderL borderR borderA" style="width: 67%">
                      <div class="col-xs-12 borderR fondoGrisLAFR212">
                         <p class="form-fac-parrafo" style="font-size: 13px; min-height: 50px; max-height: 50px; justify-content: center;">3.4. Equipo de Certificación SECAD</p>
                      </div>
                      <div class="col-xs-12 borderT  borderR fondoWhith" style="
                         padding-left: 0px;
                         padding-right: 0px;">
                         <table class="table table-responsive-md table-bordered" style="margin: 0;">
                            <tbody>
                               <tr class="fondoGrisLAFR212">
                                  <th class="form-fac-th" height="30"><p>Cargo</p></th>
                                  <th class="form-fac-th" height="30"><p>Grado</p></th>
                                  <th class="form-fac-th" height="30"><p>Nombres y Apellidos</p></th>
                                  <th class="form-fac-th" height="30"><p>Especialidad Aeronáutica <br>de Certificación (EAC)</p></th>
                                  <th class="form-fac-th" height="30"><p>Nivel de Competencia</p></th>
                               </tr>
                               <tr>
                                  <td class="fondoGrisLAFR212 form-fac-td" height=30 style="margin:0!important;padding:0px!important;font-size: 12px!important">Responsable Programa <br> Certificación</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->grado->Abreviatura}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->Nombres}} {{$jefe->Apellidos}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->EAC->Especialidad}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$jefe->NivelCompetencia->Denominacion}}</td>
                               </tr>
                               <tr>
                                  <td class="fondoGrisLAFR212 form-fac-td" height=30 style="margin:0!important;display: table-cell;padding: 1px;font-size: 12px!important">Suplente</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->grado != "N/A" ? $suplente->grado->Abreviatura : $suplente->grado}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->Nombres}} {{$suplente->Apellidos}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->EAC != "N/A" ? $suplente->EAC->Especialidad : $suplente->EAC}}</td>
                                  <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important">{{$suplente->NivelCompetencia->Denominacion}}</td>
                               </tr>
                              
                                <tr>
                                    <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 1</td>
                                    @if(count($especialistas)>0)
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->grado != "N/A" ? $especialistas[0]->grado->Abreviatura : $especialistas[0]->grado}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->Nombres}} {{$especialistas[0]->Apellidos}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->EAC != "N/A" ? $especialistas[0]->EAC->Especialidad : $especialistas[0]->EAC}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[0]->NivelCompetencia->Denominacion}} </td>
                                    @else
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 2</td>
                                    @if(count($especialistas)>1)
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->grado != "N/A" ? $especialistas[1]->grado->Abreviatura : $especialistas[1]->grado}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->Nombres}} {{$especialistas[1]->Apellidos}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->EAC != "N/A" ? $especialistas[1]->EAC->Especialidad : $especialistas[1]->EAC}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[1]->NivelCompetencia->Denominacion}} </td>
                                    @else
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="fondoGrisLAFR212 form-fac-td"  height=30>Especialista No. 3</td>
                                    @if(count($especialistas)>2)
                                        <td height="30"> {{$especialistas[2]->grado != "N/A" ? $especialistas[2]->grado->Abreviatura : $especialistas[2]->grado}} </td>
                                        <td height="30"> {{$especialistas[2]->Nombres}} {{$especialistas[2]->Apellidos}} </td>
                                        <td height="30"> {{$especialistas[2]->EAC != "N/A" ? $especialistas[2]->EAC->Especialidad : $especialistas[2]->EAC}} </td>
                                        <td height="30" style="margin:0!important;padding:0px!important;font-size: 12px!important"> {{$especialistas[2]->NivelCompetencia->Denominacion}} </td>
                                    @else
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                        <td height="30"></td>
                                    @endif
                                </tr>
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                      <p>4. SEGUIMIENTO PROGRAMA DE CERTIFICACIÓN AERONÁUTICA "SECAD"</p>
                   </div>
                </div>
           
           
                <div class="row borderT borderR borderL borderB">
                   <table class="table table-bordered table-responsive-md" style="margin: 0; font-size: 13px!important">
                      <tbody class="form-fac-2">
                         <tr>
                            <th class="fondoGrisLAFR212 th-0">
                  <div class="main-th">No.<div>
                </th>
                            <th class="fondoGrisLAFR212 th-0">
                  <div class="main-th">Actividad (Según aplique al tipo de certificación solicitada)<div>
                </th>
                            <th class="fondoGrisLAFR212 th-0">
                  <div class="main-th">Responsable<div>
                </th>                     
                    <th class="th-2-2 espan" style="width:108px!important">Condición <span>(Pendiente / Proceso / Cumplido)</span></th>
                  <th class="th-2-2" style="width:108px!important">Porcentaje de Avance (%)</th>                                      
                <th class="fondoGrisLAFR212 th-0">
                  <div class="main-th" style=" width: 90px!important;">
                    <div class="th-1">4.2. Fecha</div>
                    <div class="th-2"><span>aaaa-mm-dd</span>
                    </div>
                  </div>
                </th>
                
                            <th class="fondoGrisLAFR212 th-0">
                  <div class="main-th">4.3. Observaciones
                  </div>
                </th>
                      @forelse ($informeHistorialPrograma as $informeHistorialProgramaR)
                         <tr>
                            <th>{{str_replace('.0', '', number_format($informeHistorialProgramaR->Orden, 1))}}</th>
                            <th>{{$informeHistorialProgramaR->Actividad}}</th>
                            <th>{{$informeHistorialProgramaR->Responsable}}</th>
                            <th class="fondoGrisLAFR212">{{$informeHistorialProgramaR->Situacion}}</th>
                            <td class="fondoGrisLAFR212">{{($informeHistorialProgramaR->Porcentaje)?$informeHistorialProgramaR->Porcentaje.'%':''}}</td>
                            <td>{{$informeHistorialProgramaR->Fecha}}</td>
                            <td>{{$informeHistorialProgramaR->Evidencias}}@if($informeHistorialProgramaR->Documentos != null)
                                <a href="{{asset($informeHistorialProgramaR->Documentos)}}" target="_blank"><strong>Ver documento</strong></a>
                                @endif</td>
                         </tr>
                      @empty
                         <tr>
                            <th colspan="7" align="center">

                               <p>No hay datos para mostrar informe</p>
                            </th>
                         </tr>
                      @endforelse
                      </tbody>
                   </table>
              </div>
               <div class="row">
                   <div class="borderT borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                      <p>5. PORCENTAJE DE AVANCE DEL PROGRAMA</p>
                   </div>
                   <div class="col-xs-6 borderT  borderL borderR fondoGrisLAFR212" style="font-weight: 700; font-size: 13px; text-align: center;">
                      <p>Criterio</p>
                   </div>
                   <div class="col-xs-6 borderT  borderR fondoGrisLAFR212" style="font-weight: 700; font-size: 13px; text-align: center;">
                      <p>5.1. Valor Porcentual de Avance (%)</p>
                   </div>
                   <div class="col-xs-6 borderT borderL borderR" style="text-align: center; font-weight: 700;     font-size: 14px;">
                      <p>Relación del  <u>Número de Actividades Cumplidas </u> con respecto al  <u>Número Total de Actividades del Procedimiento</u></p>
                   </div>
                   <div class="col-xs-6 borderT  borderR">
                      <p style="padding-top: 6px; padding-bottom: 8px;font-size:20px;  text-align: center; font-weight: 700;">
                         {{$porcentajeTotal}}%
                      </p>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 borderT borderL borderR fondoGrisLAFR212 form-fac-subtitulo">
                      <p>6. ESPACIO EXCLUSIVO "SECAD"</p>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 borderT borderL borderR fondoGrisLAFR212">
                      <p>La autoridad representada por SECAD se reserva el derecho de aceptación de los datos registrados en el presente documento.</p>
                   </div>
                </div>
                <div class="row form-fac-row">
                   <div class="col-xs-3 borderT  borderR borderL fondoGrisLAFR212">
                      <p>Marcar con una "X"</p>
                   </div>
                   <div class="col-xs-3 borderT  borderR borderB fondoGrisLAFR212">
                      <p>Dependencia SECAD</p>
                   </div>
                   <div class="col-xs-2 borderT  borderR borderB fondoGrisLAFR212">
                      <p>Firma</p>
                   </div>
                   <div class="col-xs-2 borderT  borderR borderB fondoGrisLAFR212">
                      <p>&nbsp;</p>
                   </div>
                   <div class="col-xs-2 borderT  borderR borderB fondoGrisLAFR212">
                      <p>Fecha</p>
                   </div>
                </div>
           
           
                <div class="row">
                   <div class="col-xs-3 borderT  borderR borderL borderA">
                      <div class="col-xs-3 borderR borderB borderA" style="padding: 6px;">
                         &nbsp;
                      </div>
                      <div class="col-xs-9 borderB borderA" style="padding: 6px;">
                         Aceptado
                      </div>
                      <div class="col-xs-3 borderR borderB borderA" style="padding: 6px;">
                         &nbsp;
                      </div>
                      <div class="col-xs-9 borderB borderA" style="padding: 6px;">
                         Denegado
                      </div>
                   </div>
                   <div class="col-xs-3 borderR borderB form-fac-footer">
                      <p>Responsable Programa de Certificación SECAD</p>
                   </div>
                   <div class="col-xs-2 borderR borderB form-fac-footer" >
                      <p style="
                         padding-top: 14px;
                         ">&nbsp;</p>
                   </div>
                   <div class="col-xs-2 borderR borderB form-fac-footer">
                      <p>&nbsp;</p>
                   </div>
                   <div class="col-xs-2 borderR borderB form-fac-footer">
                      <p>&nbsp;</p>
                   </div>
                </div>
           <div class="row">
                   <div class="col-xs-3 borderT  borderR borderL borderA">
                      <div class="col-xs-3 borderR borderB borderA" style="padding: 6px;">
                         &nbsp;
                      </div>
                      <div class="col-xs-9 borderB borderA" style="padding: 6px;">
                         Aceptado
                      </div>
                      <div class="col-xs-3 borderR borderB borderA" style="padding: 6px;">
                         &nbsp;
                      </div>
                      <div class="col-xs-9 borderB borderA" style="padding: 6px;">
                         Denegado
                      </div>
                   </div>
                   <div class="col-xs-3 borderR borderB form-fac-footer">
                      <p>Jefe Área SECAD (ACPA / AREV)</p>
                   </div>
                   <div class="col-xs-2 borderR borderB form-fac-footer">
                      <p style="
                         padding-top: 14px;
                         ">&nbsp;</p>
                   </div>
                  <div class="col-xs-2 borderR borderB form-fac-footer">
                      <p>&nbsp;</p>
                   </div>
                   <div class="col-xs-2 borderR borderB form-fac-footer">
                      <p>&nbsp;</p>
                   </div>
                </div>
                <div class="row borderT  borderR borderL borderT">
                   <div class="col-xs-12" style="height: 200px;">
                      <p>Observaciones:</p>
                      @if($obervaciones != null)
                      <p>{{$obervaciones->Observacion}}</p>
                      @else
                      <p></p>
                      @endif
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 borderT borderR borderL borderB" style="font-weight: 700; font-size: 15px; text-align: center; font-style: italic;">
                      <p>Fuerza Aérea Colombiana (FAC) - Autoridad Aeronáutica de la Aviación de Estado (AAAE) - Decreto No. 2937 del 05-Agosto-2010</p>
                   </div>
                </div>
              </div>
    </div> 
    @else
    <div class="section-body">
        <div class="text-center">
            <h3>No hay datos para mostrar informe</h3>
        </div>
    </div>
    @endif      
</div><!--end .section-body -->               
</section>
</div><!--end #content-->
<!-- END CONTENT -->

</div>
</div>

@endsection()

@endsection()

@endsection()

</body>