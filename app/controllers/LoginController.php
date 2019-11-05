<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;
use core\MVC\imprimir;

/**
 * Clase para el login de usuarios
 */
class LoginController extends Controller
{
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/';

    /**
     * Comprueba si los datos son correctos
     *
     * @return void
     */
    public function ValidateAction()
    {
        //    imprimir::frase("validando....");
        if (input::check(['user', 'password'], $_POST)) {
            //      imprimir::frase("usuario, contraseña distinto null ......");
            $userName = input::str($_POST['user']);
            $password = input::str($_POST['password']);
            if (auth::passwordVerify($password,  $userName)) {
                //      imprimir::frase("ha verificado correcto");
                $this->setSession($userName);
                header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
            } else {
                echo "Usuario o password incorrectos";
            }
        }
    }

    /**
     * Destruye la sesión y borra la cookie
     *
     * @return void
     */
    public function LogoutAction()
    {
        //   imprimir::frase("entra en logout");
        session_unset();
        session_destroy();
        setcookie('DWS_framework', '', -1);
        header('Location: ' . $GLOBALS['config']['site']['root']); ///.$this->redirect_to
    }

    /**
     * Guarda en la sessión el userName y crea la cookie
     *
     * @param [type] $userId
     * @return void
     */
    private function setSession($userName)
    {
        //meter sesion id
        $_SESSION['logged_in'] = true;
        $_SESSION['userName'] = $userName;
        //   $_SESSION['foto'] =$use[0]->id;	
        setcookie('DWS_framework', base64_encode($userName), time() + (60 * 60 * 24 * 5)); //5 dias
    }
}
