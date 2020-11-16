<?php

namespace App\Model;

use Core\Model\Model;

class AnswerModel extends Model {

    const TABLE_NAME = "answers";

    const KEYS = ["answer", "nVoter", "questionId"];

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    public function insertMany (array $answers, string $questionId) {
        $data = array_map(function ($item) use ($questionId) {
            return [$item, 0, $questionId];
        }, $answers);
        return $this->_insertMany(self::KEYS, $data);
    }

}