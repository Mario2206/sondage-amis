<?php 

namespace Core\Validator;

class StringValidator {

    private $value = "";

    private $error = [];

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getErrors(){
        return $this->error;
    }


    public function isEmail()
    {
        if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)){
            $this->error[] = "La valeur n'est pas un email";
        }
        return $this;
    }

    public function checkLength(int $min, int $max){
        $length = strlen($this->value); 
        if($length < $min || $length > $max){
            $this->error[] = "La taille n'est pas conforme";
        }
        return $this;
    }

    public function checkRetype(string $password){
        if($this->value != $password){
            $this->error[] = "Les deux mots de passes ne correspondes pas";
        }
        return $this;
    }

}