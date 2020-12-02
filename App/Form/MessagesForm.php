<?php 

namespace App\Form;

use Core\Validator\AbstractForm;
use Core\Validator\StringValidator;

class MessagesForm extends AbstractForm {


    public function validate() {

        $this->checkPostKeys($this->formValues,["pollMessage"]);

        $messageValidation = new StringValidator($this->formValues["pollMessage"]);
        $messageValidation->checkLength(1, 100);

        $this->processValidatorErrors([$messageValidation]);


    }


}