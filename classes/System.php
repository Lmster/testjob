<?php

abstract class System
{
    public static function auto_load($class)
    {
        $path = realpath('classes/') . '/' . $class . '.php';

        if (file_exists($path)) {
            require_once $path;
        }
    }
}