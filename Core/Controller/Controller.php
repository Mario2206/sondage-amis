<?php

namespace Core\Controller;

use Core\Tools\Session;
use Core\View\Template\ITemplate;

class Controller {

    /**
     * For rendering a view
     */
    protected function render (string $pageName, array $vars = []) {
        extract($vars);
        require(__DIR__ . "/../../App/View/$pageName.php");
    } 

    protected function redirect (string $path) {
        header("Location:" . MAIN_PATH . $path);
        die();
    }

    protected function protectPageFor (string $role, string $redirectionRoute) {
        if(!Session::get($role)) {
            $this->redirect($redirectionRoute);
        }
    }


     /*
     * @param $post : array
     * @param $requiredKeys : array
     *
     * return boolean
     * */
    protected function checkPostKeys(array $post, array $requiredKeys) : void {
        $postKeys = array_keys($post);
        $diff = array_diff($requiredKeys, $postKeys);
        if(count($diff) !== 0) {
            throw new \Exception("Post keys are missing", 400);
        }
    }

}