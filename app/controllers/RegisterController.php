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
class RegisterController extends Controller {
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
    public function RegisterAction() {
        // imprimir::frase("entra en RegisterAction");
        
        $userName = input::str($_POST['user']);
        $password = auth::crypt($_POST['password']);

        
        if (input::check(['user', 'password'], $_POST)) {
                  
            $idUser = $this->createUser($userName, $password);
            imprimir::linea("idUser",$idUser);
            if ($idUser>0) {              
                $this->uploadAvatar($_FILES['avatar']['name'], $_FILES["avatar"]["tmp_name"], $idUser);
                header('Location: '.$GLOBALS['config']['site']['root'].$this->redirect_to);
            } else echo 'ALGO HA FALLADO';
        } else {
            echo '<br>Usuario o password vacío';
        }
    }

    /**
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createUser($userName, $password) {
        imprimir::frase("crea el usuario");
        $user = new UserModel();
        $userNameField = $user->getUserNameField(); 
        $passwordField = $user->getPasswordField(); 
        $user->$userNameField = $userName;
        $user->$passwordField = $password;
        if ($user->save()) {
        imprimir::frase("lo ha save__ado");
            return $user->lastInsertId();
          }  else return -1;
    }

    /**
     * Sube una imagen a la carpeta /public/images/avatares
     *
     * @param string $fileName
     * @param string $tmpFileName
     * @return boolean
     */
    private function uploadAvatar($fileName, $tmpFileName, $idUser) {
        //viene de registerAction RegisterControler 43
        if (input::checkImage($fileName)) {
            $avatar = 'avatar'.$idUser.'.'.pathinfo($fileName)['extension'];      
            $path = $GLOBALS['basedir'].ds.'public'.ds.'images'.ds.'avatares'.ds.$avatar;
            if (move_uploaded_file($tmpFileName, $path))
                return true;
                else return false;
        }
    }

}