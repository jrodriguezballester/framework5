<?php
namespace core\MVC;

/**
 * Clase para crear nuestras propias excepciones
 */
class KernelException extends \Exception{
    public function __construct($mensaje)
    {
       // echo "entra en constructor error<br>";
        echo $mensaje;
      //  echo "sale constructor error<br>";
    }

}