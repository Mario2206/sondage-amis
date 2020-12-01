<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Form\UserForm;
use Core\Controller\Controller;
use Core\Tools\Session;



class RegisterController extends Controller{

    private $userModel;
    private $userForm;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->userForm = new UserForm();
    }   

    public function registerPage() {
        $error = Session::get("error");
        $this->render("inscription", compact("error"));

    }
    public function register(){
        Session::clean("error");
        $this->checkPostKeys($_POST, ["username", "email", "password", "password-retype", "firstName", "lastName"]);

        $validateError = $this->userForm->validateInput($_POST);
        
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
}