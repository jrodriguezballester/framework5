<?php
namespace core\MVC;
/**
 * Clase para crear nuestras propias excepciones
 */
class KernelException extends \Exception{
    public function __construct($mensaje)
    {
        echo "entra en constructor error";
    }
    function default_exception_handler(Exception $e){
        // show something to the user letting them know we fell down
        echo "<h2>Something Bad Happened</h2>";
        echo "<p>We fill find the person responsible and have them shot</p>";
        // do some logging for the exception and call the kill_programmer function.
}
//set_exception_handler("default_exception_handler($e)");
}