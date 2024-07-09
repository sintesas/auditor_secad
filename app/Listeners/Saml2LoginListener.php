<?php

namespace App\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Personal;
use App\Models\User;

class Saml2LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Saml2LoginEvent $event): void
    {
        $saml2User = $event->getSaml2User();
        $samlAttributes = $saml2User->getAttributes();
        $userData = array(
            'username' => $saml2User->getUserId(),
            'fullname' => strtoupper($samlAttributes['FullName'][0]),
            'email' => strtolowe($samlAttributes['Email'][0]),
            'assertion' => $saml2User->getRawSamlAssertion(),
            'sessionIndex' => $saml2User->getSessionIndex(),
            'nameId' => $saml2User->getNameId()
        );

        // Verificar si el usuario ya existe y obtener el usuario
        $user = Usuario::where('email', $userData['email'])->first();

        // Si el usuario no existe, crea nuevo usuario
        if ($user == null) {
            $p = new Personal;
            $p->Nombres = "";
            $p->Apellidos = "";            
            $p->Email = $userData['email'] == null ? null : strtolower($userData['email']);
            $p->Active = 1;
            $p->save();

            if ($persona->personal_id != 0) {
                $user = new User;
                $user->IdPersonal = $p->IdPersonal;
                $user->name = $userData['fullname'];
                $user->email = $userData['email'];
                $user->password = bcrypt('SECAD2022');
                $user->activated = 1;
                $user->created_at = \DB::raw('GETDATE()');
                $user->updated_at = \DB::raw('GETDATE()');
                $user->save();
            }
        }

        session(['nameId' => $userData['nameId']]);
        session(['sessionIndex' => $userData['sessionIndex']]);        

        // login usuario
        \Auth::login($user);
    }    
}
