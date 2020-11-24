<?php

namespace Core\Model;

use Core\Database\Database;
use Core\Model\Generators\QueryBuilder;

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

        $query = QueryBuilder::insert($this->_tableName, $keys ,[$data]);

        $req = $this->_db->prepare($query);

        $res = $req ->execute($data);

        if($res) {
            return $this->_db->lastInsertId();
        } else return $res;
       
    }

    /**
     * For inserting multiple rows in database
     * 
     * @param array $keys (column names)
     * @param array $dataGroup (group of data) eg : [0=> [...data for first row], 1 => [... data for second row]]
     * 
     * @return int (last insert id) | bool (false if the request failed)
     * 
     */
    protected function _insertMany (array $keys, array $dataGroup) {
        
        $query = QueryBuilder::insert($this->_tableName, $keys, $dataGroup);
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

    /**
     * For getting element from db table
     *
     * @param $table : string
     * @param $filters : array ["key" => "value"]
     * @param $wantedValue : array ["wantedValue"]
     * @param $limit : array ["start-number", "offset-number"]
     * @param $order : array ["by"=>key, "desc" => boolean]
     *
     * return array
     * */
    protected function _find(array $filters = [], array $wantedValue = ["*"], array $limit = [], array $order = [], bool $isRegex = false) : array {
        $vars = [];
 
        $query = QueryBuilder::select($wantedValue, $this->_tableName);
 
         if($filters) {
 
             $query .= " " . QueryBuilder::filters(array_keys($filters),$isRegex);
             $vars = array_values($filters);
         }
 
         if($limit) {
             $query .= " " .  QueryBuilder::limit();
             $vars= array_merge($vars, $limit);
         }
 
         if($order) {
              $query =" " .  QueryBuilder::order($order["by"], $order["desc"] );
         }
       
         $req = $this->_db->prepare($query);
         $req->execute($vars);
 
         return $req->fetchall();
 
     }

}