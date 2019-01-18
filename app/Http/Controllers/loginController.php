<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class loginController extends Controller
{
    /**
     * Muestra la pagina de login.
     *
     */
    public function showLogin()
    {
        // show the form
        return view('login');
    }

    /**
     * Procesa el form para logear.
     *
     */
    public function doLogin()
    {
        //Aca iria la validacion SSO de DPSIT


        //Por ahora, solo valido que el nombre de usuario exista en la DB
        $postedUser= request('user');
        if (Usuario::where('cuit', '=', $postedUser)->exists()) {
            Usuario::where('cuit', '=', $postedUser)
                    ->update(['ultimoLogin' => date("Y-m-d H:i:s")]);
            /* El usuario existe, valido que pueda acceder (primer login o ban) */
            $user = new Usuario;
            $user = Usuario::where('cuit', $postedUser)->first();
            switch($user->estado){
                case 0:     //Primer loggin
                    $errors = new MessageBag([
                        'titulo' => ['AVISO'],
                        'motivo' => ['Este es su primer acceso, debe ser validado por un administrador'],
                        'motivo2' => ['Un pedido de validación ha sido generado']
                    ]);
                    return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
                    break;
                case 1:     //Puede acceder
                    echo 'SUCCESS!';
                    break;
                case 2:     //Bloqueado por admin, no puede acceder
                    $errors = new MessageBag([
                        'titulo' => ['ERROR'],
                        'motivo' => ['El usuario '. $postedUser .' tiene denegado el acceso al Sitio'],
                        'motivo2' => ['Si requiere acceso, comuníquese con un administrador']
                    ]);
                    return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
                    break;
            }
        }
        else{
            //Esto seria con el SSO, por ahora lo pongo aca
            $errors = new MessageBag([
                'titulo' => ['ERROR'],
                'motivo' => ['El usuario o la contraseña no corresponden a una cuenta GDEBA'],
                'motivo2' => ['Verifique sus datos de acceso']
            ]);

            return Redirect::back()->withErrors($errors)->withInput(Input::except('password')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
            /* return view('login'); */
        }
    }
}
