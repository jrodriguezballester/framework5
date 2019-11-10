<?php

namespace app\controllers;

use app\models\ComentarioModel;
use core\MVC\Controller as Controller;
use core\form\Input;
use core\auth\Auth;
use core\MVC\imprimir;

/**
 * Clase para el registro de nuevos usuarios
 */
class ComentarioController extends Controller
{
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/' ;


    /**
     * Registra un nuevo usuario
     *
     * @return boolean
     */
    public function ComentarioAction()
    {
     //   imprimir::frase("ComentarioAction  saber si esta logeado si lo esta guardar comentario");
        //  imprimir::imprime("jugador",$_POST['idjugador']);
        $CampoRelleno = true;
        if ($_POST['comentario'] == null) {
      //      imprimir::frase("comentario null");
            $CampoRelleno = false;
        }
        if ($CampoRelleno) {
            //     $this->RecogerComentario();
            $logeado = Auth::check();
            if ($logeado) {
             //   imprimir::linea("1logeado= ", $logeado);
             //   imprimir::imprime("jugador",$_POST['idjugador']);
                $this->RecogerComentario();           
            } else {
              //  imprimir::linea("2logeado= ", $logeado);
                $mensaje = 9;
                header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);        
            }
        } else {
            $mensaje=4; ///informar campo vacio//
           
            header('Location: ' . $GLOBALS['config']['site']['root'] ."/mensaje/" . $mensaje);
        }
    }
   
   /**
    * Recoge los datos del formulario y llama crearComentario
    *
    * @return void
    */
    private function RecogerComentario()
    {
       // imprimir::frase("entra en RecogerComentario");
        $comentario = input::str($_POST['comentario']);
        $idjugador = $_POST['idjugador'];
        $userName = $_SESSION['userName'];
      //  imprimir::resalta("RC");
      // imprimir::frase($_POST['idjugador']);
      //  imprimir::linea("comentario", $comentario);
      //  imprimir::linea("usuario", $_SESSION['userName']);
      //  imprimir::imprime("jugador", $_POST['idjugador']);
      //  $userName = input::str($_POST['user']);
      //  $password = auth::crypt(input::str($_POST['password']));
      //  if (input::check(['user', 'password'], $_POST)) {

        $idComentario = $this->createComentario($userName, $idjugador, $comentario);
      //  imprimir::linea("idComentario", $idComentario);
        if ($idComentario > 0) {
    //        imprimir::frase("Ha guardado el comentario");
            $mensaje = 7;
            header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
        } else {
            $mensaje = 8;
            header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
        }
    }
   /**
    * Guarda los datos pasados por parametros en la BD
    * en la tabla de comentarios
    *
    * @param [type] $userName
    * @param [type] $idjugador
    * @param [type] $micomentario
    * @return void
    */
    private function createComentario($userName, $idjugador, $micomentario)
    {
     //    imprimir::frase("crea el comentario");
         $comentario = new ComentarioModel();
     //    imprimir::frase("crea el comentario");
         $userNameField=$comentario->getNombreUsuarioField();
     //    imprimir::imprime("campo usuario",$userNameField);
         $comentarioField = $comentario->getComentarioField();
     //    imprimir::imprime("campo comentario",$comentarioField);
         $idjugadorField=$comentario->getjugadorField();
     //    imprimir::frase("crea el comentario");
        // $passwordField = $user->getPasswordField();

         $comentario->$comentarioField = $micomentario;
         $comentario->$userNameField=$userName;
         $comentario->$idjugadorField=$idjugador;
        // $user->$passwordField = $password;
    //    imprimir::imprime("usuario",$userName);
    //    imprimir::frase("crea el comentario");
         if ($comentario->save()) {
     //           imprimir::frase("lo ha save__ado");
             return $comentario->lastInsertId();
         } else return -1;
    }

}
