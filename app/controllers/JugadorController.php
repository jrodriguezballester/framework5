<?php
namespace app\controllers;

use app\models\ComentarioModel;
use core\MVC\Controller as Controller;
use app\models\JugadorModel;
use app\models\UserModel;
use core\MVC\imprimir;

class JugadorController extends Controller {


    public function DatosJugadorAction($params) {
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::find($idJugador);
        $campo=ComentarioModel::getjugadorField();
        $comentarios=ComentarioModel::BuscarCampoValor($campo,$idJugador);
       
        $_SESSION['idjugador']=$idJugador;
    //    $comentarios=ComentarioModel::get($campo,$idJugador); 
    //    imprimir::imprime("coment",$comentarios);
    //    imprimir::imprime('jugador',$jugador);
        $this->renderView('jugador', ['jugador' => $jugador,'comentarios'=> $comentarios]);
    }

}