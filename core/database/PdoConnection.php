<?php

namespace core\database;

use core\MVC\imprimir;
use PDO;
//use PDOException;
use core\MVC\KernelException;
use Exception;

/* clase para conectar con nuestra bbdd */

class PdoConnection
{

    /**
     * Instancia de la clase
     *
     * @var PDOConnection
     */
    private static $instance = null;
    /**
     * conexión con la bbdd
     *
     * @var PDO
     */
    public $bbdd;

    /**
     * Constructor de la clase donde hacemos la conexión con nuestra bbdd
     * Los parámetros los leemos de la variable $config
     */
    private function __construct()
    {
        $dbConfig = $GLOBALS['config']['DB'];
        $connection = $dbConfig['CONNECTION'];
        $dbname = $dbConfig['NAME'];
        $host = $dbConfig['HOST'];
        $port = $dbConfig['PORT'];
        $username = $dbConfig['USERNAME'];
        $password = $dbConfig['PASSWORD'];
        try {
            $this->bbdd = new PDO("$connection:dbname=$dbname;host=$host:$port", "$username", "$password");
            $this->bbdd->exec("set names utf8");
            $this->bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<p>Error: Cannot connect to database server.</p>\n";
            echo $e;
            exit();
        }
    }

    /**
     * Patrón Singleton para tener sólo una instancia de bbdd
     *
     * @return void
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new PDOConnection();
        }
        return self::$instance;
    }


    /**
     * Ejecuta un select en la bbdd
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function select($query, $params = null)
    {
        return $this->execQuery($query, $params);
    }

    /**
     * Ejecuta un insert en la bbdd
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function insert($query, $params)
    {
       // imprimir::frase("entra inser pdoconection");
        
        try {
           
        //    imprimir::frase("sale inser pdoconection");
            return$this->execQueryNoResult($query, $params);
        }
            catch (\PDO $e) {
       //         imprimir::resalta("pdo error"); 
                throw new KernelException("Error Processing Request");
            
        }
       
    }

    /**
     * Devuelve el último id insertado
     *
     * @return void
     */
    public function lastInsertId()
    {
        return $this->bbdd->lastInsertId();
    }

    /**
     * Ejecuta un update en la bbdd
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function update($query, $params)
    { }


    /**
     * Ejecuta un delete en la bbdd
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function delete($query, $params)
    {
        return $this->execQueryNoResult($query, $params);
    }

    /**
     * Ejecuta una query devolviendo las filas afectadas
     *
     * @param [type] $query
     * @param [type] $params
     * @return array
     */
    private function execQuery($query, $params)
    {
        $ps = $this->bbdd->prepare($query);
        $ps->execute($params);
      
        return $ps->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Ejecuta una query devolviendo el resultado de la ejecución
     *
     * @param [type] $query
     * @param [type] $params
     * @return integer
     */
    private function execQueryNoResult($query, $params)
    {
        $ps = $this->bbdd->prepare($query);
        try {
          
            $A=$ps->execute($params);
            imprimir::resalta("hola");
            return $A;
        } catch (\PDOException $e) {
          //  imprimir::resalta("pd0 error");
          //  throw new KernelException("error en base de datos");   
        } catch (Exception $ex){
            throw new KernelException("error en base de datos");  
         //   imprimir::resalta($e);
        }
       
    }
};
