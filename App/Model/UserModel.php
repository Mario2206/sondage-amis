<?php

namespace App\Model;

use Core\Model\Model;

class UserModel extends Model{

    const TABLE_NAME = "users";

    public function __construct(){
        parent::__construct(self::TABLE_NAME);
    }

    public function findOne(array $filters, array $wantedValues=["*"]){
        return $this->_find($filters, $wantedValues);
    }

    public function save(string $pseudo, string $email, string $password, string $firstName, string $lastName){
        return $this->_insert(["username", "email", "password", "firstName", "lastName"],[$pseudo, $email, $password, $firstName, $lastName]);
    }

}