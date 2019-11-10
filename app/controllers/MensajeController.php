<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use core\MVC\imprimir;
class MensajeController extends Controller {
    protected $redirect_to='';
    
    private function setRedirect_to($redirect_to){
        $this->redirect_to=$redirect_to;
    }
   /**
    * Muestra la vista mensaje;
    * redirige a otras paginas en funcion del mensaje mostrado
    *
    * @param [type] $params
    * @return void
    */
    public function MensajeAction($params) {
        if (isset($_POST['confirmar'])) {
            $this->setRedirect_to($_POST['nombre']);
            header('Location: ' . $GLOBALS['config']['site']['root'] .$this->redirect_to);
     //       echo "Tu nombre es {$_POST['nombre']}";
     //       imprimir::imprime("S_post", $_POST);
     //       $this->setRedirect_to($_POST['nombre']);
     //       echo $this->redirect_to;
     //       echo  $GLOBALS['config']['site']['root'] .$this->redirect_to;
           // header('Location: ' . $GLOBALS['config']['site']['root'] . $POST['nombre']);
     //      header('Location: ' . $GLOBALS['config']['site']['root'] .$this->redirect_to);
        }
   //     echo "entra en mensaje action";
        $this->renderView('mensaje',['mensaje'=> $params]);
      //  $this->renderView('jugador', ['jugador' => $jugador,'comentarios'=> $comentarios]);
    }
}