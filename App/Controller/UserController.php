<?php 

namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Validator\stringValidator;
use Exception;


class UserController extends Controller{
    public function registerPage() {
        $this->render("inscription");

    }
    public function register(){
        $this->checkPostKeys($_POST, ["pseudo", "email", "password", "password-retype", "firstName", "lastName"]);

        $validatePseudo = new StringValidator($_POST['pseudo']);
        $validatePseudo->checkLength(2, 50);

        $validateEmail = new StringValidator($_POST['email']);
        $validateEmail
            ->checkLength(10, 150)
            ->isEmail();
    
        $validatePassword = new StringValidator($_POST['password']);
        $validatePassword->checkLength(10, 150);

        $validateRetype = new StringValidator($_POST['password-retype']);
        $validateRetype->checkRetype($_POST['password']);

        if($validatePseudo->getErrors() || $validateEmail->getErrors() || $validatePassword->getErrors() || $validateRetype->getErrors()){
            throw new Exception("Erreur lors de l'inscription");
        }

        $userModel = new UserModel();
        $existedUser = $userModel->findOne(["username" =>$_POST["pseudo"], "email" =>$_POST["email"]]);
        if(!$existedUser){
            $result = $userModel->save(
                $_POST["pseudo"],
                $_POST["email"],
                $_POST["password"],
                $_POST["firstName"],
                $_POST["lastName"]
            );
        }
    }
}