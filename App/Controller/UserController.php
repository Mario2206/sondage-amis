<?php 

namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Tools\Session;
use Core\Validator\stringValidator;
use Exception;


class UserController extends Controller{
    private $userModel;

    public function __construct(){
        $this->userModel = new UserModel();
    }   

    public function registerPage() {
        $error = Session::get("error");
        $this->render("inscription", compact("error"));

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

        // Créé une nouvel méthode.
        $existedUsername = $this->userModel->findOne(["username" =>$_POST["pseudo"]]);
        $existedEmail = $this->userModel->findOne(["email" =>$_POST["email"]]);

        if(!$existedUsername && !$existedEmail){
            $passwordHash = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $result = $this->userModel->save(
                $_POST["pseudo"],
                $_POST["email"],
                $passwordHash,
                $_POST["firstName"],
                $_POST["lastName"] 
            );
        }else{
            Session::set("error", "Pseudo ou email incorrect");
            $this->redirect("inscription");
        }
    }

    public function loginPage(){
        $this->render("connexion");
    }

    public function login(){
        $this->checkPostKeys($_POST, ["pseudo", "password"]);
        
        $existingUser = $this->userModel->findOne(["username" =>$_POST["pseudo"]]);

        if($existingUser){

            $verifyPassword = new StringValidator($_POST["password"]);
            $verifyPassword->checkPassword($existingUser->password);

            if($verifyPassword->getErrors()){
                $this->render("connexion");
                echo "Mot de pa sse incorrect";
                return;
            }

            Session::set("user", $existingUser);

            $this->redirect("/poll");

        }else{
            $this->render("connexion");
            echo "Pseudo incorrect";
            
        }
        
    }

    public function accountPage(){
        $this->render("myAccount");
    }

    public function accountSet(){
        
    }

}