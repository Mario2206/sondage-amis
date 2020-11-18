<?php

namespace App\Model;

use Core\Model\Model;

class PollModel extends Model {

        const TABLE_NAME = "poll";

        const KEYS = ["pollName", "description", "createdAt"];

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
        public function insert(string $pollName, string $description, string $createdAt) {
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
            return $this->_find(self::TABLE_NAME, $filters, $wantedValue, $limit, $order);
        }
        

    }