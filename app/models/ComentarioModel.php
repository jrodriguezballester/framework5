<?php
namespace app\models;

use core\MVC\Model;


class ComentarioModel extends Model {
    protected $table = 'comentarios';
    protected $key = 'id';  
    protected static $jugadorField = 'idjugador';///************ */
    protected static $comentarioField = 'Comentario';
    protected static $nombreUsuarioField='idusuario';
   
    
    static function getComentarioField() {
        return self::$comentarioField;
    }
    static function getNombreUsuarioField() {
        return self::$nombreUsuarioField;
    }
    static function getjugadorField() {
        return self::$jugadorField;
    }

   

}