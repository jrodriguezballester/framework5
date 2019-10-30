<?php
namespace core\MVC;

/**
 * Clase para facilitar el debuger
 */
 class imprimir {
/**
 * Muestra por pantalla las variables pasadas
 *
 * @param [type] $string
 * Facilita la identificacion de $var
 * @param [type] $var
 * variable que queremos mostrar
 * @return void
 */
public static function imprime($string,$var)
{
    echo "<br>$string <pre>";
        print_r($var);
        echo "</pre>";
    
    echo "<br> ";
} 
public static function frase($string)
{
    echo "<br>$string <br>";
}
public static function resalta($string)
{
    echo "<br><h2>$string</h2><br>";
}
}  