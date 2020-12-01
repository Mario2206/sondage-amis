<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Form\UserForm;
use Core\Controller\Controller;
use Core\Tools\Session;



class AccountController extends Controller{

    private $userModel;
    private $userForm;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->userForm = new UserForm();
    }   

    public function accountPage(){
        $error = Session::get("error");
        $this->render("myAccount", compact("error"));
    }

    public function accountSet(){
        Session::clean("error");
        $this->checkPostKeys($_POST, ["username", "email", "password", "password-retype", "firstName", "lastName"]);

        $validateError = $this->userForm->validateInput($_POST);
        
        if($validateError){
            $this->redirectWithErrors("/poll/myAccount", "error");
        }

        $user = Session::get("user");
        
        $idUser = $user->idUser;
        $postFilter = \array_filter($_POST, function($key){
            return $key != "password-retype";
        }, ARRAY_FILTER_USE_KEY);
        
        $postFilter["password"] = password_hash($postFilter["password"], PASSWORD_BCRYPT);

        $this->userModel->update($postFilter,["idUser" =>$idUser]);

        $this->redirect(ACCOUNT);
    }
}