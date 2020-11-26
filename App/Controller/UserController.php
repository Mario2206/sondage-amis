<?php 

namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Tools\Session;
use Core\Validator\stringValidator;


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
        Session::clean("error");
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
            $this->redirectWithErrors("/register", "Information incorrect");
        }

        $uniqueUser = $this->userModel->checkUnique(["email" =>$_POST["email"], "password" =>$_POST["password"]]);
        

        if($uniqueUser){
            $passwordHash = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $result = $this->userModel->save(
                $_POST["pseudo"],
                $_POST["email"],
                $passwordHash,
                $_POST["firstName"],
                $_POST["lastName"] 
            );
            $this->redirect("/login");
        }else{
            Session::set("error", "Pseudo ou email incorrect");
            $this->redirect("/register");
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