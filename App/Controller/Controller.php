<?php

namespace App\Controller;

class Controller {

    protected function render (string $pageName) {
        require(__DIR__ . "/../View/$pageName.php");
    } 

}