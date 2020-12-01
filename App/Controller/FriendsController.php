<?php

namespace App\Controller;

use Core\Controller\Controller;

class FriendsController extends Controller{

    public function friendsPage(){
        $this->render("friendsView");

    }
}