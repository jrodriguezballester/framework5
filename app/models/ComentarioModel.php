<?php

namespace app\models;

use core\MVC\Model;


class ComentarioModel extends Model
{
    protected $table = 'comentarios';
    protected $key = 'id';
    protected static $jugadorField = 'idjugador';
    protected static $comentarioField = 'Comentario';
    protected static $nombreUsuarioField = 'idusuario';

    /**
     * Devuelve el campo comentario de la tabla comentarios
     *
     * @return void
     */
    static function getComentarioField()
    {
        return self::$comentarioField;
    }
    /**
     * Devuelve el campo nombre usuario de la tabla comentarios
     *
     * @return void
     */
    static function getNombreUsuarioField()
    {
        return self::$nombreUsuarioField;
    }
   
   /**
     * Devuelve el campo jugador de la tabla comentarios
     *
     * @return void
     */
    static function getjugadorField()
    {
        return self::$jugadorField;
    }
}
