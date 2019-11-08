<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;
use core\MVC\imprimir;
use core\JWT\JWT;

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
    // // public function ValidateAction() //logearse
    // // {
    // //     //    imprimir::frase("validando....");
    // //     if (input::check(['user', 'password'], $_POST)) {
    // //         //      imprimir::frase("usuario, contraseña distinto null ......");
    // //         $userName = input::str($_POST['user']);
    // //         $password = input::str($_POST['password']);
    // //         if (auth::passwordVerify($password,  $userName)) {
    // //             //      imprimir::frase("ha verificado correcto");
    // //             $this->setSession($userName);
    // //             header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
    // //         } else {
    // //             echo "Usuario o password incorrectos";
    // //         }
    // //     }
    // // }
    public function ValidateAction() //logearse
    {
        //    imprimir::frase("validando....");
        if (input::check(['user', 'password'], $_POST)) {
            //      imprimir::frase("usuario, contraseña distinto null ......");
            $userName = input::str($_POST['user']);
            $password = input::str($_POST['password']);
            if (auth::passwordVerify($password,  $userName)) {
                //      imprimir::frase("ha verificado correcto");
                $this->setSession($userName);
          //      header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
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
    // // // private function setSession($userName)
    // // // {//viene validateaction
    // // //     //meter sesion id o token
    // // //     $_SESSION['logged_in'] = true;
    // // //     $_SESSION['userName'] = $userName;
    // // //     //   $_SESSION['foto'] =$use[0]->id;	
    // // //     setcookie('DWS_framework', base64_encode($userName), time() + (60 * 60 * 24 * 5)); //5 dias
    // // // }

    private function setSession($userName)
    {//viene validateaction
        //meter sesion id o token
        $_SESSION['logged_in'] = true;
        $_SESSION['userName'] = $userName;
        $token=$userName;
        $jwt=JWT::encode($token,"miclavesecreta");
        //   $_SESSION['foto'] =$use[0]->id;	
       imprimir::imprime("jwt",$jwt);
        setcookie('DWS_framework', base64_encode($userName),$token, time() + (60 * 60 * 24 * 5)); //5 dias
    }
}///////////////////////////////////////////////
//     use ReallySimpleJWT\Token;

//     // Generate a token
//     $token = Token::getToken('userIdentifier', 'secret', 'tokenExpiryDateTimeString', 'issuerIdentifier');
    
//     // Validate the token
//     $result = Token::validate($token, 'secret');

//     create token (username){
//         $time=time()
//         $token=array(
//             ...
//             data=<{
//                 lo que quiero guardar nombre... no muchos campos
//             }
//         )
       
      
//         }
//         validate Accion{
//         crea token, guardo en la cookie
//         }
//         check{
//         si existe cookie,
//         comprueba si los el token pasado por nosotros es el mismo decode
//         luego si queremos comprobamos los campos que hemos metido
//         }
       
       

// }
