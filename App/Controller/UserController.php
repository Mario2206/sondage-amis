<?php 

namespace App\Controller;

use Core\Controller\Controller;

class UserController extends Controller{
    public function registerPage() {
        $this->render("inscription");

    }
    public function register(){
        $this->checkPostKeys($_POST, ["pseudo", "email", "password", "password-retype"]);
        
    }
}