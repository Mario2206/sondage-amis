<?php

namespace App\Model;

use Core\Model\Converters\ArrayMapper;
use Core\Model\Model;
use PDO;

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
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

        $answer = $bdd->query('SELECT idUser, idFriend FROM friends WHERE idUser = :id_user');

        return $answer;
    }
}