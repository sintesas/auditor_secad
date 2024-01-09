<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UsersLDAP extends Model
{
    //busqueda tabla
    protected $primaryKey = 'IdUserLDAP';

    protected $table = 'AU_Reg_usersLDAP';

    protected $fillable = ['Name', 'Email', 'Dependencia', 'Created_at', 'Update_at'];

    public $timestamps = false;

    public static function perteneceIGEFA(){

        // if (Auth::user()->hasRole('administrador')) {
        //     $rol = true;
        // }else{
        //   $rol=false;
        //   $roles =\DB::table('Rol_User')
        //   ->join('roles', 'roles.id','=','Rol_User.IdRol')
        //   ->where('Rol_User.IdUser',intval(\Auth::user()->IdPersonal))->get();

        //   foreach ($roles as $rolx) {
        //     if($rolx->name == 'IGEFA' || $rolx->name =='administrador' || $rolx->name =='administrador - Jefe SECAD')
        //     {
        //       $rol=true;
        //     }
        //   }
/*

            $name = Auth::user()->name;

            $dependenciaUser = UsersLDAP::select('Dependencia')
                                ->where('Name','like',$name)
                                ->get();
            if($dependenciaUser->count()>0)
                if (strpos($dependenciaUser[0]->Dependencia, 'IGEFA') !== false) {
                    $rol = true;
                }else{
                    $rol = false;
                }
            else
                $rol = false;*/

        // }

        $rol = true;
        
        return $rol;
    }

    public static function perteneceCEOAF(){

        // if (Auth::user()->hasRole('administrador')) {
        //     $rol = true;
        // }else{
        //   $rol=false;
        //   $roles =\DB::table('Rol_User')
        //   ->join('roles', 'roles.id','=','Rol_User.IdRol')
        //   ->where('Rol_User.IdUser',intval(\Auth::user()->IdPersonal))->get();

        //   foreach ($roles as $rolx) {
        //     if($rolx->name == 'CEOAF' || $rolx->name =='administrador' || $rolx->name =='administrador - Jefe SECAD')
        //     {
        //       $rol=true;
        //     }
        //   }


        /*    $name = Auth::user()->name;

            $dependenciaUser = UsersLDAP::select('Dependencia')
                                ->where('Name','like',$name)
                                ->get();

            if (strpos($dependenciaUser[0]->Dependencia, 'CEOAF') !== false) {
                $rol = true;
            }else{
                $rol = false;
            }*/
        //}

        $rol = true;

        return $rol;
    }

    public static function perteneceIGEFA_CEOAF(){

        // if (Auth::user()->hasRole('administrador')) {
        //     $rol = true;
        // }else{

        //   $rol=false;
        //   $roles =\DB::table('Rol_User')
        //   ->join('roles', 'roles.id','=','Rol_User.IdRol')
        //   ->where('Rol_User.IdUser',intval(\Auth::user()->IdPersonal))->get();

        //   $ceoaf = false;
        //   $igefa = false;
        //   foreach ($roles as $rolx) {
        //     if($rolx->name == 'CEOAF'){
        //       $ceoaf = true;
        //     }
        //     if($rolx->name == 'IGEFA'){
        //       $igefa = true;
        //     }

        //     if($rolx->name == 'administrador' || $rolx->name =='administrador - Jefe SECAD'){
        //       $rol = true;
        //     }

        //     if($igefa && $ceoaf){
        //       $rol = true;
        //     }          

        //   }

        //   /*  $name = Auth::user()->name;

        //     $dependenciaUser = UsersLDAP::select('Dependencia')
        //                         ->where('Name','like',$name)
        //                         ->get();
        //     if($dependenciaUser->count()>0)
        //         if (strpos($dependenciaUser[0]->Dependencia, 'IGEFA') !== false) {
        //             $rol = true;
        //         }else if (strpos($dependenciaUser[0]->Dependencia, 'CEOAF') !== false){
        //             $rol = true;
        //         }else{
        //             $rol = false;
        //         }
        //     else
        //         $rol=false;*/
        // }

        $rol = true;

        return $rol;
    }

}
