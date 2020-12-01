<?php

namespace App\Model;

use Core\Model\Converters\ArrayMapper;
use Core\Model\Model;

class FriendsModel extends Model{

    const TABLE_NAME = "friends";

    const KEYS = ["idUser", "idFriend"];
    

    public function __construct(){
        parent::__construct(self::TABLE_NAME);
    }

    public function find (array $filters = [], array $wantedValue = ["*"], array $limit = [], array $order = []) {
        return $this->_find($filters, $wantedValue, $limit, $order);
    }

    public function getFriends($userId){
        $friends = $this->_find(["idUser" => $userId]);

        $req = $this->_db->prepare["SELECT friends.idUser, friends.idFriend FROM friends WHERE idUser = :id_user "];
        $req->execute(["id_user" =>$userId]);
        $friendsName = $req->fetchAll();

        
    }


}