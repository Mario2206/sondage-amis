<?php 

namespace Core\Validator;

class ArrayValidator {

    private  $_value = [];

    private $_errors = [];

    public function __construct(array $value )
    {
        $this->_value = $value;
    }

    public function getValues() : array {
        return $this->_value;
    }

    public function getErrors () : array {
        return $this->_errors;
    }

    public function noEmptyValue() : self {
        foreach($this->_value as $val) {
            if(empty($val)) return $this->_errors[] = "A value in array is empty";
        }
        return $this;
    }

}