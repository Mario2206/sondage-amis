<?php

namespace App\Form;

use Core\Controller\Controller;
use Core\Validator\StringValidator;

class UserForm extends Controller{

    public function validateInput($user){

        $validatePseudo = new StringValidator($user['username']);
        $validatePseudo->checkLength(2, 50);

        $validateEmail = new StringValidator($user['email']);
        $validateEmail
            ->checkLength(10, 150)
            ->isEmail();

        $validatePassword = new StringValidator($user['password']);
        $validatePassword->checkLength(10, 150);

        $validateRetype = new StringValidator($user['password-retype']);
        $validateRetype->checkRetype($user['password']);

        return array_merge(
            $validatePseudo->getErrors(),
            $validateEmail->getErrors(),
            $validatePassword->getErrors(),
            $validateRetype->getErrors()
        );
    }
}