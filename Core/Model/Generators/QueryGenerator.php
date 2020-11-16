<?php

namespace Core\Model\Generators;

class QueryGenerator {

    /**
     * For generating insertion query
     * 
     * @param string $table 
     * @param array $keys (column names)
     * @param array $data (to persist)
     * 
     * @return string
     */
    public static function generateInsertQuery(string $table,array $keys, array $data) : string {
        $query = self::insertTableWithKeysQuery($table, $keys);
     
        $query .= "VALUES ";
        $query .= self::generateValuesQuery($data);

        return $query;
    }

    public static function generateInsertManyQuery (string $table, array $keys, array $dataGroup) : string {
        $query = self:: insertTableWithKeysQuery($table, $keys );
        $query .= "VALUES ";
        $valuesQueries = array_map(function ($data) {
            return self::generateValuesQuery($data);
        }, $dataGroup);

        $query .= implode(", ",$valuesQueries);

        var_dump($query);

        return $query;
    }

    /**
     * For generating first part of insertion query
     * 
     * @param string $table
     * @param array $keys (column names)
     * 
     * @return string
     */
    private static function insertTableWithKeysQuery(string $table, array $keys) : string {
        $query = " INSERT INTO " . $table . "(";
        $query .= implode (",", $keys) . ") ";
        return $query;
    }

    /**
     * For generating values part of prepared query
     * 
     * @param array $data (to insert)
     * 
     * @return string 
     */
    private static function generateValuesQuery (array $data) : string {
        $query = array_reduce($data, function ($acc) {
            return $acc .= "?, ";
        });
        $query = trim($query, ", ");

        return "( " . $query . " )";
    }

}