<?php 

namespace Core\Tools;

class Session  {


    public static function set ($key, $data) {
        $_SESSION[$key] = $data;
    }

    public static function get(string $key) {
        return $_SESSION[$key];
    }

    public static function clean (string $key) {
        unset($_SESSION[$key]);
    }

}