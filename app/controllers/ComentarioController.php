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
    private $redirect_to = '/';


    /**
     * Registra un nuevo usuario
     *
     * @return boolean
     */
    public function ComentarioAction()

    {
        imprimir::frase("ComentarioAction
        saber si esta logeado
        si lo esta guardar comentario");

        //  imprimir::imprime("jugador",$_POST['idjugador']);
        $CampoRelleno = true;
        if ($_POST['comentario'] == null) {
            imprimir::frase("comentario null");
            $CampoRelleno = false;
        }
        if ($CampoRelleno) {
            //     $this->RecogerComentario();

            $logeado = Auth::check();
            if ($logeado) {
                imprimir::linea("1logeado= ", $logeado);
                //     imprimir::imprime("jugador",$_POST['idjugador']);
                $this->RecogerComentario();
            } else {
                imprimir::linea("2logeado= ", $logeado);
            }
        } else {
            /////////////informar campo vacio////////////
            header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
        }
    }
    private function RecogerComentario()
    {
        imprimir::frase("entra en RecogerComentario");

        $comentario = input::str($_POST['comentario']);
        $idjugador = $_POST['idjugador'];
        $userName = base64_decode($_COOKIE['DWS_framework']);

        imprimir::linea("comentario", $comentario);
        imprimir::linea("usuario", $_SESSION['userName']);
        imprimir::imprime("jugador", $_POST['idjugador']);

        //     $userName = input::str($_POST['user']);
        //     $password = auth::crypt(input::str($_POST['password']));

        //     if (input::check(['user', 'password'], $_POST)) {

        $idComentario = $this->createComentario($userName, $idjugador, $comentario);
        imprimir::linea("idComentario", $idComentario);
        if ($idComentario > 0) {
            imprimir::frase("Ha guardado el comentario");
            //   header('Location: ' . $GLOBALS['config']['site']['root'] . $this->redirect_to);
        } else {
            echo 'ALGO HA FALLADO';
        }
    }
    /**
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createComentario($userName, $idjugador, $micomentario)
    {
         imprimir::frase("crea el comentario");
         $comentario = new ComentarioModel();
         imprimir::frase("crea el comentario");
         $userNameField=$comentario->getNombreUsuarioField();
         imprimir::imprime("campo usuario",$userNameField);
         $comentarioField = $comentario->getComentarioField();
         imprimir::imprime("campo comentario",$comentarioField);
         $idjugadorField=$comentario->getjugadorField();
         imprimir::frase("crea el comentario");
        // $passwordField = $user->getPasswordField();

         $comentario->$comentarioField = $micomentario;
         $comentario->$userNameField=$userName;
         $comentario->$idjugadorField=$idjugador;
        // $user->$passwordField = $password;
        imprimir::frase("crea el comentario");
         if ($comentario->save()) {
                imprimir::frase("lo ha save__ado");
             return $comentario->lastInsertId();
         } else return -1;
    }

    /**
     * Sube una imagen a la carpeta /public/images/avatares
     *
     * @param string $fileName
     * @param string $tmpFileName
     * @return boolean
     */
    // private function uploadAvatar($fileName, $tmpFileName, $idUser)
    // {
    //     //viene de registerAction RegisterControler 43
    //     if (input::checkImage($fileName)) {
    //         $avatar = 'avatar' . $idUser . '.' . pathinfo($fileName)['extension'];
    //         $path = $GLOBALS['basedir'] . ds . 'public' . ds . 'images' . ds . 'avatares' . ds . $avatar;
    //         //borrar todos avatar.iduser.*  en $path /////////////////////////////
    //         unlink($path . 'avatar' . $idUser);
    //         if (move_uploaded_file($tmpFileName, $path))
    //             return true;
    //         else return false;
    //     }
    // }

}
