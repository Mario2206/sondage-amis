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
        $this->checkPostKeys($_POST, ["username", "email", "password", "password-retype", "firstName", "lastName"]);

        $validateError = $this->validateInput($_POST);
        
        if($validateError){
            $this->redirectWithErrors("/register", "error");
        }

        $uniqueUser = $this->userModel->checkUnique(["email" =>$_POST["email"], "password" =>$_POST["password"]]);
        

        if($uniqueUser){
            $passwordHash = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $result = $this->userModel->save(
                $_POST["username"],
                $_POST["email"],
                $passwordHash,
                $_POST["firstName"],
                $_POST["lastName"] 
            );

            if(!$result) $this->redirectWithErrors("/login", "Server Error");

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
        $this->checkPostKeys($_POST, ["username", "password"]);
        
        $existingUser = $this->userModel->findOne(["username" =>$_POST["username"]]);

        if($existingUser){

            $verifyPassword = new StringValidator($_POST["password"]);
            $verifyPassword->checkPassword($existingUser->password);

            if($verifyPassword->getErrors()){
                $this->redirectWithErrors("/login","Mot de passe incorrect");
            }

            Session::set("user", $existingUser);

            $this->redirect("/poll");

        }else{
            $this->redirectWithErrors("/login","Pseudo incorrect");
            
        }
        
    }

    public function accountPage(){
        $error = Session::get("error");
        $this->render("myAccount", compact("error"));
    }

    public function accountSet(){
        Session::clean("error");
        $this->checkPostKeys($_POST, ["username", "email", "password", "password-retype", "firstName", "lastName"]);

        $validateError = $this->validateInput($_POST);
        
        if($validateError){
            $this->redirectWithErrors("/poll/myAccount", "error");
        }

        $user = Session::get("user");
        $idUser = $user->idUser;
        $postFilter = \array_filter($_POST, function($key){
            return $key != "password-retype";
        }, ARRAY_FILTER_USE_KEY);
        $this->userModel->update($postFilter,["idUser" =>$idUser]);


    }

    private function validateInput($user){

        $validatePseudo = new StringValidator($user['username']);
        $validatePseudo->checkLength(2, 50);

        $validateEmail = new StringValidator($user['email']);
        $validateEmail
            ->checkLength(10, 150)
            ->isEmail();
    
        $validatePassword = new StringValidator($user['password']);
        $validatePassword->checkLength(10, 150);

        $validateRetype = new StringValidator($user['password-retype']);
        $validateRetype->checkRetype($user['password']);

        return array_merge(
            $validatePseudo->getErrors(),
            $validateEmail->getErrors(),
            $validatePassword->getErrors(),
            $validateRetype->getErrors()
        );
    }
}