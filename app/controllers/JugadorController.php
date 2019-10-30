<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel;


class JugadorController extends Controller {


    public function DatosJugadorAction($params) {
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::find($idJugador);
        $this->renderView('jugador', ['jugador' => $jugador]);
    }

}