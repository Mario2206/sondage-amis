<?php

namespace Core\Model;

use Core\Database\Database;
use Core\Model\Generators\QueryGenerator;

abstract class Model {

    protected $_tableName = "";
    protected $_db;

    public function __construct(string $tableName)
    {
        $this->_db = Database::connect();
        $this->_tableName = $tableName;
    }

    /**
     * 
     * For inserting data to database  
     * 
     * @param array $keys (group of all column names)
     * @param array $data (data to persist)
     * 
     * @return int (last inserted id) | bool false
     * 
     */
    protected function _insert(array $keys, array $data) {

        $query = QueryGenerator::generateInsertQuery($this->_tableName, $keys ,$data);

        $req = $this->_db->prepare($query);

        $res = $req ->execute($data);

        if($res) {
            return $this->_db->lastInsertId();
        } else return $res;
       
    }

    public function _insertMany (array $keys, array $dataGroup) {
        
        $query = QueryGenerator::generateInsertManyQuery($this->_tableName, $keys, $dataGroup);
        $req = $this->_db->prepare($query);
        $dataForQuery = [];
        foreach($dataGroup as $data) {
            
            foreach($data as $entry) {
                $dataForQuery[] = $entry;
            }

        }

        $res = $req->execute($dataForQuery);

        if($res) {
            return $this->_db->lastInsertId();
        } else return $req;

    }

}