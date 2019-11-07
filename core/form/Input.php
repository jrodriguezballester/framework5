<?php

namespace core\form;

use core\MVC\imprimir;

/**
 * Clase para validar los campos de un formulario
 */
class Input
{
    /**
     * Archivos de imagen permitidos
     */
    static $whiteList = array('jpg', 'png', 'bmp');


    /**
     * Comprueba si se han pasado los campos correctos del formulario y no son null
     *
     * @param array $fields
     * @param boolean $on
     * @return boolean
     */
    static function check($fields, $on = false)
    {
        //   imprimir::frase("entra en check");
        //        imprimir::imprime("field",$fields);
        //        imprimir::imprime("on",$on);
        $chekeado = true;
        foreach ($fields as $key) {
            //                imprimir::linea("field:",$key);
            //                imprimir::linea("on:",$on[$key]);

            if ($on[$key] == null) {
                $chekeado == false;
            }
        }
        //  imprimir::linea("Valor del check:", $chekeado);
        return $chekeado;
    }


    /**
     * Devuelve el valor de un string sanitizado
     *
     * @param string $value
     * @return string
     */
    static function str($value)
    {
         //    imprimir::frase("Sanitiza String");
        $value=trim($value); 
        $value=stripslashes($value);
        return $newstr = filter_var($value, FILTER_SANITIZE_STRING,);
    }

    /**
     * Comprueba si la extensión de la imagen es valida
     * (extension dentro del array whiteList)
     *
     * @param [type] $path
     * @return boolean
     */
    static function checkImage($path)
    {
   //     imprimir::frase("chekeando........");
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        // if (in_array($ext, self::$whiteList)) {
        //     imprimir::frase("extension chequeada true");
        // } else {
        //     imprimir::frase("extension chequeada false");
        // }
        return (in_array($ext, self::$whiteList));
    }
}
