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
    public function ValidateAction() //logearse  //completo y funcional
    {
        //    imprimir::frase("validando....");
        if (input::check(['user', 'password'], $_POST)) {
            //      imprimir::frase("usuario, contraseña distinto null ......");
            $userName = input::str($_POST['user']);
            $password = input::str($_POST['password']);
            if (auth::passwordVerify($password,  $userName)) {
                //      imprimir::frase("ha verificado correcto");
                $this->setSession($userName);
                $mensaje = 5;
           //     header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
                      header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
            } else {
                $mensaje = 6;
                header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
            }
        }
    }

    /**
     * Destruye la sesión y borra la cookie
     *
     * @return void
     */
    public function LogoutAction()//completo y funcional
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
     * @param [type] $userName
     * @return void
     */
    private function setSession($userName)
    {//viene validateaction
        //meter sesion id o token
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $userName;
      
        //   $_SESSION['foto'] =$use[0]->id;	
        setcookie('DWS_framework', $userName, time() + (60 * 60 * 24)); //segundos*minutos*horas=1 dia
        
    }
}
//     private function setSession($userName)
//     { //viene validateaction
//         //meter sesion id o token
//     $secretKey="miclave";
//     $tokenId    = base64_encode(mcrypt_create_iv(32));
//     $issuedAt   = time();
//     $notBefore  = $issuedAt + 10;             //Adding 10 seconds
//     $expire     = $notBefore + 60;            // Adding 60 seconds
//    // $serverName = $config->get('serverName'); // Retrieve the server name from config file
    
//         $data = [
//             'iat'  => $issuedAt,         // Issued at: time when the token was generated
//             'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
//          //   'iss'  => $serverName,       // Issuer
//             'nbf'  => $notBefore,        // Not before
//             'exp'  => $expire,           // Expire
//             'data' => [                  // Data related to the signer user
//                // 'userId'   => $rs['id'], // userid from the users table
//                 'userName' => $userName, // User name
//             ]
//         ];
//         $jwt = JWT::encode(
//             $data,      //Data to be encoded in the JWT
//             $secretKey, // The signing key
//             'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
//             );
            
//         $unencodedArray = ['jwt' => $jwt];
//         echo json_encode($unencodedArray);


//         $_SESSION['logged_in'] = true;
//         $_SESSION['userName'] = $userName;
//         $token = $userName;
//         $jwt = JWT::encode($token, "miclavesecreta");
//         //   $_SESSION['foto'] =$use[0]->id;	
//     //    imprimir::imprime("jwt", $jwt);
//         setcookie('DWS_framework', $userName, time() + (60 * 60 * 24 * 5)); //5 dias
//         setcookie('DWS_framework2', $jwt, time() + (60 * 60 * 24 * 5));
//         //  echo $_COOKIE;
//         print_r($_COOKIE);
//     }
///////////////////////////////////////////////
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
