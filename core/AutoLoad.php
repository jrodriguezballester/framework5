<?php
namespace AutoLoad;
use \core\MVC\KernelException;
/**
 * Autoload de clases
 */
class AutoLoad {

    /**
     * Carga la clase según su namesapce
     *
     * @param string $classNameSpace
     * @return void
     */
    public function load($classNameSpace) {
        $basedir = dirname(dirname(__FILE__));
        $classPath = str_replace("\\", ds, $classNameSpace);
        $classToLoad = $basedir . ds . $classPath . ".php";
        $className = substr($classNameSpace, strrpos($classNameSpace, "\\") + 1);
        if(!@include_once $classToLoad) {
            throw new KernelException("Can't load $classPath <br>");
        }
        if (!class_exists($classNameSpace, false) && !interface_exists($classNameSpace, false)) {
          
            throw new KernelException('Class ' . $classNameSpace . ' not found');
        }
    }
    
    /**
     * Registro de nuestro autoload
     *
     * @return void
     */
    public function registerAutoLoad() {
        spl_autoload_register(array($this, "load"), true, true);
    }
}

$autoLoad = new AutoLoad();
$autoLoad->registerAutoLoad();