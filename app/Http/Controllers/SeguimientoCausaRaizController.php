<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\SeguimientoCausaRaiz;
use App\Models\Anotacion;
use App\Models\CausaRaiz;
use App\Models\EstadoSeguimiento;
use App\Models\Auditoria;
use App\Models\SeguimientoFiles;
use App\Models\CausasRaizTareas;
use App\Models\Rol;
use App\Models\UsersLDAP;

class SeguimientoCausaRaizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rol = UsersLDAP::perteneceIGEFA_CEOAF();
        $rol_IGEFA = UsersLDAP::perteneceIGEFA();
        $rol_CEOAF = UsersLDAP::perteneceCEOAF();

        // $rolAdmin = false;

        $seguimientos = SeguimientoCausaRaiz::getAll();

        // if (Auth::user()->hasRole('administrador')) {
        //   $rolAdmin = true;
        // }

        $email = Auth::user()->email;

        // if($rol || $rol_IGEFA || $rol_CEOAF || $rolAdmin){
        //     $seguimientos = SeguimientoCausaRaiz::getAll();
        // }else{
        //     $seguimientos = SeguimientoCausaRaiz::getByUser($email);
        // }
        //dd($seguimientos);


        return view('auditoria.ver_seguimiento_causa_raiz')
            ->with('rol_IGEFA', $rol_IGEFA)
            ->with('rol_CEOAF', $rol_CEOAF)
            ->with('email', $email)
            ->with('seguimientos', $seguimientos);

        $result = File::makeDirectory('/certifi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = UsersLDAP::perteneceIGEFA_CEOAF();

        if ($rol) {
            //Set Dropdown Auditoria
            $auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditorias->prepend('None');

        }else{
            //Set Dropdown Auditoria
            $auditorias = Auditoria::getByUser();
            //$auditorias = Auditoria::all();
            $auditorias->prepend('None');
        }

        return view('auditoria.crear_seguimiento_causa_raiz')
                ->with('auditorias', $auditorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Consultar estado del seguimiento
        $seguimientoEstado = SeguimientoCausaRaiz::where('IdTareaCausa',$request->input('IdTareaCausa'))
        ->take(1)
        ->orderby('IdSeguimiento', 'desc')
        ->get();
        $estado = 0;
        if(count($seguimientoEstado) > 0){
            $estado = $seguimientoEstado[0]->IdEstadoSeguimiento;
        }


        //Fecha Actual
        $hoy = getdate();

        if($estado == 1 || $estado == 4 || $estado == 0){

            $seguimiento = new SeguimientoCausaRaiz;

            $seguimiento->IdAuditoria = $request->input('IdAuditoria');//Id Auditoria
            $seguimiento->FechaSeguimiento = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];//Fecha Seguimiento
            $seguimiento->IdAnotacion = $request->input('IdAnotacion');//No Anotación
            $seguimiento->IdCausaRaiz = $request->input('IdCausaRaiz');//No Causa Raiz
            $seguimiento->IdTareaCausa = $request->input('IdTareaCausa');//Acción tarea
            $seguimiento->AccionSeguimiento = $request->input('AccionSeguimiento');//Acción Seguimiento
            $seguimiento->Fortalezas = $request->input('Fortalezas');//Fortalezas
            $seguimiento->Limitaciones = $request->input('Limitaciones');//Limitaciones
            $seguimiento->Codigo = $request->input('Codigo');//Codigo Auditoria
            $seguimiento->Auditor = $request->input('Auditor');//Auditors
            $seguimiento->IdEstadoSeguimiento = 1;//Estado Seguimiento
            $seguimiento->Porcentaje = 10;//Auditors
            $seguimiento->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']; //Fecha Creación
            $seguimiento->Activo = 1; //Estado insert
            $seguimiento->save();

            $IdSeguimiento = $seguimiento->getKey();

            $files = $request->file('docs');
            if(!empty($files)){
                $seguiemientoPath = public_path('secad\Seguimiento\\'. $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday']);
                $documentos = '';
                foreach ($files as $file){
                    $fileName = $file->getClientOriginalName();
                    $documentos = 'secad\Seguimiento\\' . $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday'].'\\'.$fileName;
                    $file->move($seguiemientoPath, $fileName);
                    $regSeguimientoFiles = new SeguimientoFiles;
                    $regSeguimientoFiles->IdSeguimiento = $IdSeguimiento;
                    $regSeguimientoFiles->FileNameDoc = $fileName;
                    $regSeguimientoFiles->PathDoc = $documentos;
                    $regSeguimientoFiles->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regSeguimientoFiles->save();
                }
            }

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }else{
           if($estado == 8){
               $notification = array(
                   'message' => 'No se puede crear seguimiento, el seguimiento se encuntra completado',
                   'alert-type' => 'warning'
               );
           }else{
                $notification = array(
                    'message' => 'No se puede crear seguimiento, ya que existe un seguimiento mismo en proceso',
                    'alert-type' => 'warning'
                );
           }
        }
        return redirect()->route('seguimientoCausaRaiz.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdSeguimiento)
    {

        $seguimiento = SeguimientoCausaRaiz::getInfoSeguimiento($IdSeguimiento);

        $seguimientosHistoricos = SeguimientoCausaRaiz::getSeguimientosByActividad($seguimiento[0]->IdTareaCausa);

        $estadosSeguimiento = EstadoSeguimiento::all(['IdEstadoSeguimiento', 'NombreEstado']);
        $estadosSeguimiento->prepend('None');

        return view('auditoria.porcentaje_seguimiento')
                ->with('seguimiento', $seguimiento)
                ->with('seguimientosHistoricos', $seguimientosHistoricos)
                ->with('estadosSeguimiento', $estadosSeguimiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdSeguimiento)
    {
        $name = Auth::user()->name;
        $seguimientos = SeguimientoCausaRaiz::find($IdSeguimiento);

        $descSeguimiento = CausasRaizTareas::getActividad($seguimientos['IdTareaCausa']);

        $seguimientosHistoricos = SeguimientoCausaRaiz::getSeguimientosByActividad($seguimientos['IdTareaCausa']);


        $fileSeguimeinto = SeguimientoFiles::where('IdSeguimiento', '=', $IdSeguimiento)->get();

        return view('auditoria.editar_seguimiento_causa_raiz')
                ->withSeguimientoCausaRaiz($seguimientos)
                ->with('descSeguimiento', $descSeguimiento)
                ->with('seguimiento', $seguimientos)
                ->with('fileSeguimeinto', $fileSeguimeinto)
                ->with('name', $name)
                ->with('seguimientosHistoricos', $seguimientosHistoricos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdSeguimiento)
    {

        //Fecha Actual
        $hoy = getdate();

        $seguimiento = SeguimientoCausaRaiz::find($IdSeguimiento);

        $seguimiento->IdAuditoria = $request->input('IdAuditoria');//Id Auditoria
        $seguimiento->FechaSeguimiento = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];//Fecha Seguimiento
        $seguimiento->IdAnotacion = $request->input('IdAnotacion');//No Anotación
        $seguimiento->IdCausaRaiz = $request->input('IdCausaRaiz');//No Causa Raiz
        $seguimiento->IdTareaCausa = $request->input('IdTareaCausa');//Acción tarea
        $seguimiento->AccionSeguimiento = $request->input('AccionSeguimiento');//Acción Seguimiento
        $seguimiento->Fortalezas = $request->input('Fortalezas');//Fortalezas
        $seguimiento->Limitaciones = $request->input('Limitaciones');//Limitaciones
        $seguimiento->Codigo = $request->input('Codigo');//Codigo Auditoria
        $seguimiento->Auditor = $request->input('Auditor');//Auditors
        $seguimiento->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes']; //Fecha Creación
        $seguimiento->Activo = 1; //Estado insert
        $seguimiento->save();

        /*$files = $request->file('docs');
        if(!empty($files)){
            SeguimientoFiles::where('IdSeguimiento', '=', $IdSeguimiento)->delete();
            $seguiemientoPath = public_path('secad\Seguimiento\\'. $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday']);
            $documentos = '';
            foreach ($files as $file){
                $fileName = $file->getClientOriginalName();
                $documentos = 'secad\Seguimiento\\' . $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday'].'\\'.$fileName;
                $file->move($seguiemientoPath, $fileName);
                $regSeguimientoFiles = new SeguimientoFiles;
                $regSeguimientoFiles->IdSeguimiento = $IdSeguimiento;
                $regSeguimientoFiles->FileNameDoc = $fileName;
                $regSeguimientoFiles->PathDoc = $documentos;
                $regSeguimientoFiles->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regSeguimientoFiles->save();
            }
        }*/

        /*$totalUsers = \DB::table('AU_Reg_Seguimiento')
                    ->whereRaw('Created_at = getdate()')
                    ->count();
        Mail::to('brandolvargas9@gmail.com')->send(new SendMailable($totalUsers));*/

        //phpinfo();die;

        // $mail = new PHPMailer;

        // date_default_timezone_set('Etc/UTC');
        // $mail = new PHPMailer;
        // $mail->isSMTP();
        // $mail->Host = gethostbyname('ssl: //smtp.googlemail.com');
        // $mail->Port = 465;
        // $mail->SMTPAuth = true;
        // $mail->Username = "brandolvargas9@gmail.com";
        // $mail->Password = "evavargas";
        // $mail->setFrom('brandolvargas9@gmail.com', 'First Last');
        // $mail->addAddress('brandolvargas9@outlook.es', 'First Last');
        // $mail->Subject = 'PHPMailer SMTP test';
        // $mail->AltBody = 'This is a plain-text message body';
        // $mail->IsHTML(true);
        // $mail->Body='mensaje';
        // if (!$mail->send()) {
        //     echo "Mailer Error: " . $mail->ErrorInfo;
        // } else {
        //     echo "Message sent!";
        // }

        // die;


        // $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        // try {
        //     // Server settings
        //     $mail->SMTPDebug = 0;                                	// Enable verbose debug output
        //     $mail->isSMTP();                                     	// Set mailer to use SMTP
        //     $mail->Host = 'smtp.gmail.com';												// Specify main and backup SMTP servers
        //     $mail->SMTPAuth = true;                              	// Enable SMTP authentication
        //     $mail->Username = 'brandolvargas9@gmail.com';             // SMTP username
        //     $mail->Password = 'evavargas';              // SMTP password
        //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        //     $mail->Port = 465;                                    // TCP port to connect to

        //     //Recipients
        //     $mail->setFrom('brandolvargas9@gmail.com', 'Mailer');
        //     $mail->addAddress('brandolvargas9@gmail.com', 'Optional name');	// Add a recipient, Name is optional
        //     $mail->addReplyTo('brandolvargas9@gmail.com', 'Mailer');
        //     $mail->addCC('brandolvargas9@gmail.com');
        //     $mail->addBCC('brandolvargas9@gmail.com');

        //     //Attachments (optional)
        //     // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
        //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

        //     //Content
        //     $mail->isHTML(true); 																	// Set email format to HTML
        //     $mail->Subject = 'Request::input';
        //     $mail->Body    = 'Request::input(';						// message

        //     $mail->send();
        // } catch (Exception $e) {
        //     die('Message could not be sent.'. $e);
        // }

        $notification = array(
            'message' => 'Datos actualizados correctamente',
            'alert-type' => 'success'
        );

       return redirect()->route('seguimientoCausaRaiz.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdSeguimiento)
    {
        $seguimiento = SeguimientoCausaRaiz::find($IdSeguimiento);

        $file = SeguimientoFiles::find($IdSeguimiento);
        // delete
        $file->delete();
        $seguimiento->delete();

        $notification = array(
            'message' => 'Seguimiento eliminado',
            'alert-type' => 'success'
        );

        return redirect()->route('seguimientoCausaRaiz.index')->with($notification);;
    }

    public function getAuditor(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $auditoria = Auditoria::getAuditor($IdAuditoria);
            return response()->json($auditoria);
        }
    }

    public function getAnotacionesAuditoria(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $anotaciones = Anotacion::getAnotacionesAuditoria($IdAuditoria);
            return response()->json($anotaciones);
        }
    }

    public function getCausaRaizaAnotacion(Request $request, $IdAnotacion)
    {
        if($request->ajax())
        {
            $causasRaiz = CausaRaiz::getCausaRaizaAnotacion($IdAnotacion);
            return response()->json($causasRaiz);
        }
    }

    public function getTareasCausasRaiz(Request $request, $IdCausaRaiz)
    {
        if($request->ajax())
        {
            $tareasCausasRaiz = CausasRaizTareas::getTareasCausasRaiz($IdCausaRaiz);
            return response()->json($tareasCausasRaiz);
        }
    }

    public function exportSeguimientos(){


       /* $rol = UsersLDAP::perteneceIGEFA_CEOAF();

        if($rol){
            $seguimientos = SeguimientoCausaRaiz::getAll();
        }else{
            $name = Auth::user()->name;
            $idPersonal = Auth::user()->IdPersonal;
            $seguimientos = SeguimientoCausaRaiz::getByUser($idPersonal, $name);
        }*/
        return Excel::download(new SeguimientosExport, 'seguimientos.xlsx');
    }

    public function aprobarSeguimiento(Request $request, $IdSeguimiento){
        $seguimiento = SeguimientoCausaRaiz::aprobarSeguimiento($IdSeguimiento);
        if($seguimiento){
            return '1';
        }else{
            return '2';
        }
    }
}
