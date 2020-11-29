<?php

namespace App\Model;

use Core\Model\Converters\ArrayMapper;
use Core\Model\Model;
use DateTime;

class PollModel extends Model {
        
        const TABLE_NAME = "poll";

        const KEYS = ["pollName", "description", "createdAt", "idUser", "availableAt", "unAvailableAt"];

        public function __construct()
        {
            parent::__construct(self::TABLE_NAME);
        }

        /**
         * For inserting many rows to Database
         * 
         * @param array $pollDataGroup
         * 
         * @return int (last inserted id)
         */
        public function insert(
                string $pollName, 
                string $description, 
                string $createdAt, 
                string $user_id,
                string $availableAt,
                string $unvailableAt
        ) {
           return $this->_insert(self::KEYS, func_get_args());
        }

        /**
         * For getting row(s) from Database
         * 
         * @param array $filters
         * @param array $wantedValues (default : ["*"])
         * @param array $limit [start, offset]
         * @param array $order ["by"=> columnName, "desc"=>bool]
         */
        public function find (array $filters = [], array $wantedValue = ["*"], array $limit = [], array $order = []) {
            return $this->_find($filters, $wantedValue, $limit, $order);
        }

        public function getPollAndRef(string $pollId) {

            $poll = $this->_find(["idPoll" => $pollId]);

            $req = $this->_db->prepare("SELECT questions.question, answers.answer, answers.nVoter FROM questions INNER JOIN answers ON questions.idQuestion = answers.questionId WHERE idPoll = :id_poll ");
            $req->execute(["id_poll"=>$pollId]);
            $questions = $req->fetchAll();

            $formatedQuestions = ArrayMapper::groupByPropertyOfSubObject("question", $questions);

            return [
                "poll" => $poll[0], 
                "questions" =>  $formatedQuestions
            ];
        }
        

    }