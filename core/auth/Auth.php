<?php
namespace core\auth;
use app\models\UserModel;
use core\MVC\imprimir;
/**
 * Clase para validar usuarios
 */
class Auth {

    /**
     * Devuelve la contraseña encriptada
     *
     * @param string $password
     * @return string
     */
    static function crypt($password) {
        imprimir::resalta("entra en encryptar");
        if(defined('PASSWORD_ARGON2ID')) {
            imprimir::resalta("1");
            $hash = password_hash('password123', PASSWORD_ARGON2ID, array('time_cost' => 10, 'memory_cost' => '2048k', 'threads' => 6));
        } else {
            imprimir::resalta("2");
            $hash = password_hash('password123', PASSWORD_DEFAULT, array('time_cost' => 10, 'memory_cost' => '2048k', 'threads' => 6));
        }
        return $hash;
    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $idUser) {
        //viene loginControler 25
         
      // password_verify($password, $hashed_password) linea internet
      
        return password_verify($password, $idUser); //linea de cesar ¿compara pass con user???
    }

    /**
     * Comprueba si el usuario está logeado
     *si el idsesion cookie 
     * @return boolean
     */
    static function check() {
  //  imprimir::frase("entra en check Auth");
    
    return ($_SESSION!=null);
        
    }

}
