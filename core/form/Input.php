<?php

namespace core\form;

use core\MVC\imprimir;

/**
 * Clase para validar los campos de un formulario
 */
class Input {
    
    /**
     * Archivos de imagen permitidos
     */
    static $whiteList = array ('jpg', 'png', 'bmp');


    /**
     * Comprueba si se han pasado los campos correctos del formulario
     *
     * @param array $fields
     * @param boolean $on
     * @return boolean
     */
    static function check($fields, $on = false) {
        imprimir::frase("entra en check");
        $chekeado=true;
        foreach ($fields as $valor){
            if($on[$valor]==null){
                $chekeado==false;
            }
        }
        imprimir::imprime("check",$chekeado);
        return $chekeado;

    }


    /**
     * Devuelve el valor de un string sanitizado
     *
     * @param string $value
     * @return string
     */
    static function str($value) {

    }

    /**
     * Comprueba si la extensión de la imagen es valida
     *
     * @param [type] $path
     * @return boolean
     */
    static function checkImage($path) {
        
    }

}
