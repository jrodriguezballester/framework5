<?php

namespace core\auth;

use app\models\UserModel;
use core\MVC\imprimir;
use core\JWT\JWT;

/**
 * Clase para validar usuarios
 */
class Auth
{

    /**
     * Devuelve la contraseña encriptada
     *
     * @param string $password
     * @return string
     */
    static function crypt($password)
    {
        //     imprimir::resalta("entra en encryptar");
        //if(defined('PASSWORD_ARGON2ID')) {
        //imprimir::resalta("1");
        //$hash = password_hash('password123', PASSWORD_ARGON2ID, array('time_cost' => 10, 'memory_cost' => '2048k', 'threads' => 6));
        // } else {
        //   imprimir::resalta("2");
        $hash = password_hash($password, PASSWORD_DEFAULT, array('time_cost' => 10, 'memory_cost' => '2048k', 'threads' => 6));
        //$hash = password_hash('password123', PASSWORD_DEFAULT);
        //}
        return $hash;
    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $userName)
    {
        //viene loginControler 25

        $user = UserModel::where('usuario', '=', $userName)->get();
        //   imprimir::resalta("aqui");
        //  imprimir::imprime("user",$user);

        $hash_pass = $user[0]->password;
        //   imprimir::imprime("valor:", $hash_pass);
        //   imprimir::imprime("valor:::::::",$usuariobuscado);
        if (password_verify($password, $hash_pass)) {
            $_SESSION['foto'] = $user[0]->foto;  //xq no lo puedo llamar desde setSession(Login Controller 80)
        }
        // if(password_verify($password, $idUser)){echo "cierto";}else{echo "falso";}
        return password_verify($password, $hash_pass);
    }

    /**
     * Comprueba si el usuario está logeado
     * si existe la cookie
     * si existe sesion logeada=true;
     * y ademas que coincida la sesion con la cuki
     * @return boolean
     */
    static function check()
    { //meter sesion id en la cookie y comprobar tambien.     
        if (isset($_COOKIE['DWS_framework'])) {
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                //    imprimir::frase("Entra en comprobar cookie");
                if ($_SESSION['userName'] == $_COOKIE['DWS_framework']) {
                    return ($_COOKIE['DWS_framework']);
                }
            }
           
        }
        return 0;
    }
}

        // //     if (isset($_COOKIE['DWS_framework2'])) {
        // //         imprimir::frase("Entra en comprobar cookie");
        // //         $token = $_COOKIE['DWS_framework2'];
        // //         imprimir::frase($token);
        // //         $secretKey="miclavesecreta";
        // //  //       $token = JWT::decode($token, $secretKey, array('HS512'));
        // //         $result = JWT::decode($token,"miclavesecreta");           
        // //         return ($_COOKIE['DWS_framework2']);
        // //     } else {
        // //         return 0;
        // //     }
