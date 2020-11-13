<?php

namespace App\Controller;

class HomeController extends Controller{

    public function homepage() {
        $this->render("homeView");   
    }    

}