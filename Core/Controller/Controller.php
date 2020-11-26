<?php

namespace Core\Controller;

use Core\Tools\Session;

class Controller {

    /**
     * For rendering a view
     * 
     * @param string $pageName
     * @param array $vars (variables to pass to view)
     */
    protected function render (string $pageName, array $vars = []) {
        extract($vars);
        require(__DIR__ . "/../../App/View/$pageName.php");
    } 

    /**
     * For redirecting to path
     * 
     * @param string $path
     */
    protected function redirect (string $path) {
        header("Location:" . MAIN_PATH . $path);
        die();
    }

    /**
     * For redirecting to path with error
     * 
     * @param string $path 
     * @param string | string[] $error 
     */
    protected function redirectWithErrors (string $path, $error) {
        Session::set('error', $error);
        $this->redirect($path);
    }

    /**
     * For protecting page for specific role
     * 
     * @param string $role 
     * @param string $redirectionRoute
     * 
     */
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