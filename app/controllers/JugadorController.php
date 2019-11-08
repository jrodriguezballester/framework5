<?php
namespace app\controllers;

use app\models\ComentarioModel;
use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use core\MVC\imprimir;

class JugadorController extends Controller {


    public function DatosJugadorAction($params) {
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::find($idJugador);
        $campo=ComentarioModel::getjugadorField();
        $comentarios=ComentarioModel::find2($campo,$idJugador); 
    //    $comentarios=ComentarioModel::get($campo,$idJugador); 
//        imprimir::imprime("coment",$comentarios);
        $this->renderView('jugador', ['jugador' => $jugador,'comentarios'=> $comentarios]);
    }

}