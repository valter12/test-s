<?php

namespace Backend\BackendBundle\Additional;

class Debug {

    public static function d($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    public static function d1($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die;
    }

}