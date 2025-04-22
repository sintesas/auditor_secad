<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


use App\Models\DemandaPotencial;
use App\Models\PlanCertificacionAnual;
use App\Models\DetalleProductoAeronauticoPCA;
use App\Models\Ata;
use App\Models\Aeronave;
use App\Models\Unidad;
use App\Models\Tools;
use App\Models\NotasProductoAeronautico;
use App\Models\Permiso;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $p = new Permiso;
      $permiso = $p->getPermisos('CP');

        $productos = DemandaPotencial::demandaPotencialAll();
        $pca = PlanCertificacionAnual::get();
        return view ('certificacion.productosAeronauticos.ver_productos')
        ->with('pca', $pca)
        ->with('productos', $productos)->with('permiso', $permiso);
    }

    public function notas($IdDemandaPotencial)
    {
      $notas = NotasProductoAeronautico::where('id_ProductoAeronautico',$IdDemandaPotencial)->get();
      return view ('certificacion.productosAeronauticos.notas_productos')
      ->with('notas', $notas);
    }
    public function aprobarnota($id)
    {
      $usuario = \Auth::user()->name;
      $nota = NotasProductoAeronautico::find($id);
      $nota->aprobo = $usuario;
      $nota->save();

      $notas = NotasProductoAeronautico::where('id_ProductoAeronautico',$nota->id_ProductoAeronautico)->get();

      $notification = array(
        'message' => 'La nota para el Producto Aeronáutico se ha aprobado correctamente',
        'alert-type' => 'success'
      );

      //dd($producto);
      return redirect()->route('productos.notas', $nota->id_ProductoAeronautico)->with($notification);

      return view ('certificacion.productosAeronauticos.notas_productos')
      ->with('notas', $notas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dropdown Equipo
        $aeronaves = Aeronave::getAeronaves();
        $aeronaves->prepend('None');

        //dropdown Unidades
        $unidades = Unidad::all();
        $unidades->prepend('None');

        //dropdown ATA
        $atas = Ata::getAta();
        $atas->prepend('None');

        return view ('certificacion.productosAeronauticos.crear_productos')
            ->with('atas', $atas)
            ->with('aeronaves', $aeronaves)
            ->with('unidades', $unidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
        'IdUnidad' => 'required'
    ], [
        'IdUnidad.required' => 'El campo Unidad es obligatorio.'
    ]);
    

    

        $producto = new DemandaPotencial;

        $producto->Nombre = $request->input('Nombre');
        $producto->ParteNumero = $request->input('ParteNumero');
        $producto->IdAeronave = $request->input('IdAeronave');
        $producto->IdUnidad = $request->input('IdUnidad');
        $producto->NSN = $request->input('NSN');
        $producto->CodigoSAP = $request->input('CodigoSAP');
        $producto->PublicacionTecnica = $request->input('PublicacionTecnica');
        $producto->IdATA = $request->input('IdATA');
        $producto->Identificacion = $request->input('Identificacion');
        $producto->Funcionamiento = $request->input('Funcionamiento');
        $producto->Observaciones = $request->input('Observaciones');
        $producto->Fabricante = $request->input('Fabricante');
        $producto->PrecioCompra = $request->input('PrecioCompra');
        $producto->Anio = $request->input('Anio');
        $producto->TiempoEntrega = $request->input('TiempoEntrega');
        $producto->PeriodoTiempoEntrega = $request->input('PeriodoTiempoEntrega');
        $producto->Clase = $request->input('Clase');

        $producto->ParteNumero = str_replace("/", "-", $producto->ParteNumero);

        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->foto;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $producto->Imgen = $photo;

        }
        else
        {
            $producto->Imgen = 'engranaje.png';

        }

        $doct = "";
        if ($request->hasFile('doc'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->doc;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $doct = $fileName;
            $producto->DocTecnica = $doct;

        }
        else
        {
            $producto->DocTecnica = '';

        }


        $producto->Activo = 1;
        $producto->save();
        //dd($producto);
        
        $val_detalle = DetalleProductoAeronauticoPCA::where('id_producto', $producto->IdDemandaPotencial)
        ->first();

        if ($val_detalle) {
          $pca = DetalleProductoAeronauticoPCA::find($val_detalle->id);
        }
        else {
          $pca = new DetalleProductoAeronauticoPCA;
        }


        
        $pca->id_producto = $producto->IdDemandaPotencial;
        $pca->cant_requeridad = $request->input('CantidadRequerida');
        $pca->prio_UMA = $request->input('PrioridadUMA');
        $pca->val_tecnica = $request->input('ValoracionTecnica');
        $pca->fact_tecnica = $request->input('FactibilidadTecnica');
        $pca->publi_tec_apl = $request->input('PublicacionesTecnicasAplicables');
        $pca->Desc_fail_tec = $request->input('DescripcionFallaTipica');
        $pca->rotacion = $request->input('Rotacion');
        $pca->mtbf = $request->input('MTBF');
        $pca->Tp_aprovmto = $request->input('TiempoAprovisionamiento');
        $pca->Exist_alm = $request->input('ExistenciasAlmacen');
        $pca->prov_fab_orig = $request->input('ProvisionFabricanteOriginal');
        $pca->Flot_ant = $request->input('FlotaAntigua');
        $pca->caract_dim_fun = $request->input('CaracterizacionDimensionalFuncional');
        //$pca->diag_elect = $request->input('DiagramaElectronico');//foto
        $pca->especificaciones = $request->input('Especificaciones');
        //$pca->catalog_ilust_partes = $request->input('CatalogoImagenes');//foto
        
        $diaElectrico = '';
        if ($request->hasFile('DiagramaElectrico'))
        {
            $personalPath = public_path('secad\\Productos\\Diagrama_Electrico_' .$producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->DiagramaElectrico;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $diaElectrico = $fileName;
            $pca->diag_elect = $diaElectrico;

        }
        else
        {
            $producto->diag_elect = $pca->diag_elect;

        }
        
        $diaElectronico = '';
        if ($request->hasFile('DiagramaElectronico'))
        {
            $personalPath = public_path('secad\\Productos\\Diagrama_Electronico_' .$producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->DiagramaElectronico;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $diaElectronico = $fileName;
            $pca->diag_electronico = $diaElectronico;

        }
        else
        {
            $producto->diag_electronico = $pca->diag_electronico;

        }
        $catalogImg = array();
        //$catalogImg =json_decode($pca->catalog_ilust_partes);
        if ($request->hasFile('CatalogoImagenes'))
        {
            $personalPath = public_path('secad\\Productos\\Catalogo_ilustrado_' . $producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $files = $request->file('CatalogoImagenes');
            foreach ($files as $file ) {
              $fileName = tools::normalizeChars($file->getClientOriginalName());
              $file->move($personalPath, $fileName);
              $catalogImg[]=$fileName;
            }

            $pca->catalog_ilust_partes = json_encode($catalogImg);

        }
        else
        {
            $pca->catalog_ilust_partes = $pca->catalog_ilust_partes;

        }

        $pca->save();
        
        $notification = array(
          'message' => 'El producto se ha creado correctamente.',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // USING MODELS
        $producto = DemandaPotencial::find($id);
        $producto->activo = 1;
        $producto->save();

        $notification = array(
          'message' => 'El producto se ha activado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdDemandaPotencial)
    {
        //dropdown Equipo
        $aeronaves = Aeronave::getAeronaves();
        $aeronaves->prepend('None');

        //dropdown Unidades
        $unidades = Unidad::all();
        $unidades->prepend('None');

        //dropdown ATA
        $atas = Ata::getAta();
        $atas->prepend('None');


        //Get Model
        $producto = DemandaPotencial::find($IdDemandaPotencial);
        $producto2 = \DB::table('AU_Reg_DemandaPotencial')
        ->leftJoin('AU_Reg_DetalleProductoAeronauticoPCA', 'AU_Reg_DetalleProductoAeronauticoPCA.id_producto', '=', 'AU_Reg_DemandaPotencial.IdDemandaPotencial')
        ->where('AU_Reg_DemandaPotencial.IdDemandaPotencial',$IdDemandaPotencial)
        ->get();
        //dd($producto);
        //DetalleProductoAeronauticoPCA

        if($producto2[0]->catalog_ilust_partes != ''){
          $catalogoIlustrado = json_decode($producto2[0]->catalog_ilust_partes);
        }
        else {
          $catalogoIlustrado = '';
        }



        //dd($DetallePCA);

        return view ('certificacion.productosAeronauticos.editar_productos')
            ->with('atas', $atas)
            ->with('aeronaves', $aeronaves)
            ->with('unidades', $unidades)
            ->with('detalPCA', $producto2[0])
            ->with('catalogoilustrado',$catalogoIlustrado)
            ->withProducto($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdDemandaPotencial)
    {
        $producto = DemandaPotencial::find($IdDemandaPotencial);

        $producto->Nombre = $request->input('Nombre');
        $producto->ParteNumero = $request->input('ParteNumero');
        $producto->IdAeronave = $request->input('IdAeronave');
        $producto->IdUnidad = $request->input('IdUnidad');
        $producto->NSN = $request->input('NSN');
        $producto->CodigoSAP = $request->input('CodigoSAP');
        $producto->PublicacionTecnica = $request->input('PublicacionTecnica');
        $producto->IdATA = $request->input('IdATA');
        $producto->Identificacion = $request->input('Identificacion');
        $producto->Funcionamiento = $request->input('Funcionamiento');
        $producto->Observaciones = $request->input('Observaciones');
        $producto->Fabricante = $request->input('Fabricante');
        $producto->PrecioCompra = $request->input('PrecioCompra');
        $producto->Anio = $request->input('Anio');
        $producto->TiempoEntrega = $request->input('TiempoEntrega');
        $producto->PeriodoTiempoEntrega = $request->input('PeriodoTiempoEntrega');
        $producto->Clase = $request->input('Clase');

        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->foto;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $producto->Imgen = $photo;

        }
        else
        {
            $producto->Imgen = $producto->Imgen;

        }

        // dd($producto);
        $doct = "";
        if ($request->hasFile('doc'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->doc;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $doct = $fileName;
            $producto->DocTecnica = $doct;

        }
        else
        {
            $producto->DocTecnica = $producto->DocTecnica;

        }

        $producto->save();

        //DETALLES DEL pca

        $val_detalle = DetalleProductoAeronauticoPCA::where('id_producto', $IdDemandaPotencial)
        ->first();



        if ($val_detalle) {
          $pca = DetalleProductoAeronauticoPCA::find($val_detalle->id);
        }
        else {
          $pca = new DetalleProductoAeronauticoPCA;
        }


        $pca->id_producto = $IdDemandaPotencial;
        $pca->cant_requeridad = $request->input('CantidadRequerida');
        $pca->prio_UMA = $request->input('PrioridadUMA');
        $pca->val_tecnica = $request->input('ValoracionTecnica');
        $pca->fact_tecnica = $request->input('FactibilidadTecnica');
        $pca->publi_tec_apl = $request->input('PublicacionesTecnicasAplicables');
        $pca->Desc_fail_tec = $request->input('DescripcionFallaTipica');
        $pca->rotacion = $request->input('Rotacion');
        $pca->mtbf = $request->input('MTBF');
        $pca->Tp_aprovmto = $request->input('TiempoAprovisionamiento');
        $pca->Exist_alm = $request->input('ExistenciasAlmacen');
        //$pca->prov_fab_orig = $request->input('ProvisionFabricanteOriginal');
        $pca->Flot_ant = $request->input('FlotaAntigua');
        $pca->caract_dim_fun = $request->input('CaracterizacionDimensionalFuncional');
        
        $pca->especificaciones = $request->input('Especificaciones');
        

        $diaElectrico = '';
        if ($request->hasFile('DiagramaElectrico'))
        {
            $personalPath = public_path('secad\\Productos\\Diagrama_Electrico_' .$producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->DiagramaElectrico;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $diaElectrico = $fileName;
            $pca->diag_elect = $diaElectrico;

        }
        else
        {
            $producto->diag_elect = $pca->diag_elect;

        }

        $diaElectronico = '';
        if ($request->hasFile('DiagramaElectronico'))
        {
            $personalPath = public_path('secad\\Productos\\Diagrama_Electronico_' .$producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $file = $request->DiagramaElectronico;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $diaElectronico = $fileName;
            $pca->diag_electronico = $diaElectronico;

        }
        else
        {
            $producto->diag_electronico = $pca->diag_electronico;

        }
        $catalogImg = array();
        //$catalogImg =json_decode($pca->catalog_ilust_partes);
        if ($request->hasFile('CatalogoImagenes'))
        {
            $personalPath = public_path('secad\\Productos\\Catalogo_ilustrado_' . $producto->Nombre.'-'.$producto->ParteNumero.'-'.$IdDemandaPotencial);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }

            $files = $request->file('CatalogoImagenes');
            foreach ($files as $file ) {
              $fileName = tools::normalizeChars($file->getClientOriginalName());
              $file->move($personalPath, $fileName);
              $catalogImg[]=$fileName;
            }

            $pca->catalog_ilust_partes = json_encode($catalogImg);

        }
        else
        {
            $pca->catalog_ilust_partes = $pca->catalog_ilust_partes;

        }

        $pca->save();

        //dd($pca, $request, $request->input('ProvisionFabricanteOriginal'));

        $usuario = \Auth::user()->name;

        $nota = new NotasProductoAeronautico;
        $nota->usuario = $usuario;
        $nota->id_ProductoAeronautico = $producto->IdDemandaPotencial;
        $nota->nota = $request->input('Nota');
        $nota->fecha = date('d/m/Y');
        $nota->save();

        $notification = array(
          'message' => 'El producto se ha actualizado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);

    }

    public function pca(Request $request){

      //dd($request);
      $producto = \DB::table('AU_Reg_DetalleProductoAeronauticoPCA')
      ->where('id_producto',$request->input('producto'))
      ->first();

      if ($producto) {
        $detallePCA = DetalleProductoAeronauticoPCA::find($producto->id);
      }
      else {
        $detallePCA = new DetalleProductoAeronauticoPCA;
        $detallePCA->id_producto = $request->input('producto');
      }

      //dd($producto, $request);


      $detallePCA->id_pca = $request->input('pca');
      $detallePCA->save();

      if ($detallePCA) {
        $notification = array(
          'message' => 'Se ha asignado PCA al Producto correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);
      }
      else {
        $notification = array(
          'message' => 'No se pudo asignar PCA al producto',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdDemandaPotencial)
    {
        // USING MODELS
        $producto = DemandaPotencial::find($IdDemandaPotencial);
        $producto->activo = 0;
        $producto->save();

        $notification = array(
          'message' => 'El producto se ha inactivado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);

        $exists1 = \DB::table('AU_Reg_DemandaPotencialValoracionEconomica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists2 = \DB::table('AU_Reg_DemandaPotencialOfertaAeronautica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists3 = \DB::table('AU_Reg_DemandaPotencialConsumoRotacion')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists4 = \DB::table('AU_Reg_DemandaPotencialFactibilidadTecnica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists5 = \DB::table('AU_Reg_DemandaPotencialPrioridadUMA')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists6 = \DB::table('AU_Reg_ProductosOfrecidos')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists7 = \DB::table('AU_Reg_ConsumosDemPotencial')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists8 = \DB::table('AU_Reg_DemandaPotencialValoracionTecnica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists9 = \DB::table('AU_Reg_OfertasFabrica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();

        $exists = $exists1 + $exists2 + $exists3 + $exists4 + $exists5 + $exists6 + $exists7 + $exists8 +$exists9;

        // dd($exists);
        if($exists == 0){
            // USING MODELS
            $producto = DemandaPotencial::find($IdDemandaPotencial);
            $producto->delete();

            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar el Producto ya que contiene datos en la Matriz de Impacto o como Producto Ofrecido.',
            'alert-type' => 'warning'
          );
        }


        return redirect()->route('productos.index')->with($notification);

        /*FALTA que valide y borre las tablas anidadas FK_AU_Reg_ProductosOfrecidos_AU_Reg_DemandaPotencial*/
    }
}
