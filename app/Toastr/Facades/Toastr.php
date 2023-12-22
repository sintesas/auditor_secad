<?php 

namespace App\Toastr\Facades;

use Illuminate\Support\Facades\Facade;

class Toastr extends Facade {

    public static function getFacadeAccessor()
    {
        return 'App\Toastr\Toastr';
    }

}