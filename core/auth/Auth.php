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
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $idUser) {
        return password_verify($password, $idUser); //
    }

    /**
     * Comprueba si el usuario está logeado
     *si el idsesion cookie 
     * @return boolean
     */
    static function check() {
        
    }

}
