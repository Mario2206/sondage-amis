<?php
namespace App\Model;

use Core\Model\Model;

class QuestionModel extends Model {

    const TABLE_NAME = "questions";
    const KEYS = ["idPoll","question"];

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    public function insert(string $idPoll, string $questionValue) {
        return $this->_insert(self::KEYS, func_get_args());
    }

}