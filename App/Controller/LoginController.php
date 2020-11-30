<?php 

namespace App\Controller;

use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Tools\Session;
use Core\Validator\stringValidator;


class LoginController extends Controller{
    
    private $userModel;

    public function __construct(){
        $this->userModel = new UserModel();
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
                $this->redirectWithErrors(LOGIN,"Mot de passe incorrect");
            }

            Session::set("user", $existingUser);

            $this->redirect(POLL_LIST);

        }else{
            $this->redirectWithErrors(LOGIN,"Pseudo incorrect");
            
        } 
    }
}