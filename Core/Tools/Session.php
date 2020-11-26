<?php 

namespace Core\Tools;

class Session  {


    public static function set ($key, $data) {
        $_SESSION[$key] = $data;
    }

    public static function get(string $key) {
        return isset($_SESSION[$key]) ?  $_SESSION[$key] : null;
    }

    public static function clean (string $key) {
        unset($_SESSION[$key]);
    }

}