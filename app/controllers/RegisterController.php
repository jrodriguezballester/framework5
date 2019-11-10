<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;
use core\MVC\imprimir;

/**
 * Clase para el registro de nuevos usuarios
 */
class RegisterController extends Controller
{
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/mensaje/:mensaje';


    /**
     * Registra un nuevo usuario
     *
     * @return boolean
     */
    public function RegisterAction()
    {
        //Obteniendo los datos de "formulario"
        if (isset($_POST['register'])) {
            $error = false;
            if ($_POST['user'] == null) {
                $error = true;
            }
            if ($_POST['password'] != $_POST['password2']) {
                echo "contraseñas distintas";
                $error = true;
            }
            if (!$error) {
                //      imprimir::frase("entra en RegisterAction");
                $userName = input::str($_POST['user']);
                $password = auth::crypt(input::str($_POST['password']));
                if (input::check(['user', 'password'], $_POST)) {

                    $idUser = $this->createUser($userName, $password);
                    //          imprimir::linea("idUser", $idUser);
                    if ($idUser > 0) {
                        $this->uploadAvatar($_FILES['avatar']['name'], $_FILES["avatar"]["tmp_name"], $userName);
                        //    $this->user->getAvatarField() = $_FILES['avatar']['name'];
                        //    $this->user->save();
                        //  imprimir::imprime("file:", $_FILES["avatar"]["tmp_name"]);
                        $mensaje = 1;
                        header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
                    } else {
                        $mensaje = 2;
                        header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
                    }
                } else {
                    $mensaje = 3;
                    header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
                }
            }
        }
    }

    /**
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createUser($userName, $password)
    {
    //    imprimir::frase("crea el usuario");
        $user = new UserModel();
        $userNameField = $user->getUserNameField();
        $passwordField = $user->getPasswordField();
        $avatarField = $user->getAvatarField();
        ///////////  
        $user->$userNameField = $userName;
        $user->$passwordField = $password;
        $user->$avatarField = 'avatar' . $userName . '.' . pathinfo($_FILES['avatar']['name'])['extension'];
        
        if ($user->save()) {
            //        imprimir::frase("lo ha save__ado");
            return $user->lastInsertId();
        } else return -1;
    }

    /**
     * Guarda la imagen recogida $fileName en /.../avatares
     *
     * @param [type] $fileName
     * @param [type] $tmpFileName
     * @param [type] $userName
     * @return void
     */ 
    private function uploadAvatar($fileName, $tmpFileName, $userName)
    {
        //viene de registerAction RegisterControler 43
        if (input::checkImage($fileName)) {

            //  $avatar = 'avatar' . $idUser . '.' . pathinfo($fileName)['extension'];
            $avatar = 'avatar' . $userName . '.' . pathinfo($fileName)['extension'];

            $path = $GLOBALS['basedir'] . ds . 'public' . ds . 'images' . ds . 'avatares' . ds . $avatar;
           
          //  imprimir::imprime("tmp", $tmpFileName);
          //  imprimir::imprime("avatar", $avatar);
          //  imprimir::imprime("nombre", $userName);
            if (move_uploaded_file($tmpFileName, $path))
                return true;
            else return false;
        }
    }
}
