<?php

namespace App\Controller;

use App\Model\FriendsModel;
use Core\Controller\Controller;

class FriendsController extends Controller{

    private $friendsModel;

    public function __construct(){
        $this->friendsModel = new FriendsModel();
    }




    public function friendsPage(){

        





        $this->render("friendsView");
    }
}