<?php

namespace App\Model;

use Core\Model\Model;

class PollMessagesModel extends Model {

    const TABLE_NAME = "tchatmessages";

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }


    public function insert(string $message, string $userId, string $pollId) {
        $this->_insert(["message", "idUser", "idPoll", "createdAt"], [$message, $userId, $pollId]);
    }

}