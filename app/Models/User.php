<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Spatie\Permission\Traits\HasRoles;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword,Notifiable, HasRoles;


    public $table = 'users';

    protected $primaryKey = 'id';

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getCompanyUsers()
    {
        return User::join('model_has_roles','model_has_roles.model_id','=','users.id')
                    ->leftjoin('AU_Reg_Empresas as empresa','empresa.IdEmpresa', '=', 'users.IdEmpresa')
                    ->where('role_id','=', 11)
                    ->get();
    }

    public static function getTopUserEmail($email, $name){
        return User::where('email', '=' , \DB::raw('\'' . $email . '\' or name = \''.$name.'\''))
                    ->take(1)
                    ->get();
    }
}
