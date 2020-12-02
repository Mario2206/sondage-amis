<?php

namespace App\Controller;

use App\Model\FriendsModel;
use Core\Controller\Controller;
use Core\Tools\Session;

class FriendsController extends Controller{

    private $friendsModel;
    private $user;

    public function __construct(){
        $this->friendsModel = new FriendsModel();
        $this->user = Session::get("user");
    }

    public function friendsPage(){

        $idUser = $this->user->idUser;

        $friends = $this->friendsModel->getFriends($idUser);

        $this->render("friendsView", compact("friends"));

    }

    public function addFriend(){

        $idUser = $this->user->idUser;

        // $friends = $this->friendsModel->getFriends($idUser);

        $varFriend = $this->friendsModel->findFriendId($_POST["username"]);

        $idFriend = $varFriend[0]->idUser;

        $friendsYet = $this->friendsModel->friendsYet($idUser, $idFriend);

        if(!$friendsYet){
            $this->friendsModel->addFriend($idUser, $idFriend);
        }

        $this->redirect(FRIENDS);
    }


    public function acceptFriend($friendId){
        
        $idUser = $this->user->idUser;

        $this->friendsModel->acceptFriend($idUser, $friendId);

        $this->redirect(FRIENDS);

    }


    public function rejectFriend($friendId){

        $idUser = $this->user->idUser;

        $this->friendsModel->rejectFriend($idUser, $friendId);

 
    }

    public function removeFriend($friendId){

        $idUser = $this->user->idUser;

        $this->friendsModel->rejectFriend($idUser, $friendId);
    }


}