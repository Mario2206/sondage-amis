<?php 

namespace Core\Model\Converters;

class ArrayMapper {

    /**
     * For grouping data in associative array by a property name
     * 
     * @param string $propertyName
     * @param array<Object> $dataToProcess
     * 
     * @return  array
     */
    public static function groupByPropertyOfSubObject(string $propertyName, array $dataToProcess) : array {
        $data = [];

        foreach($dataToProcess as $item ) {
            $data[$item->$propertyName][] = ["answer"=>$item->answer, "nVoter" =>$item->nVoter];
        }

        return $data;
    }

}