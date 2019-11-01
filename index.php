<?php

ob_start();

ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);

header('Content-Type: text/html; charset=utf-8');

require 'classes/System.php';

spl_autoload_register(array('System', 'auto_load'));

$request = explode('?', $_SERVER['REQUEST_URI']);

$exp_uri = explode('/', $request[0]);

$action = empty($exp_uri[1])
    ? 'home'
    : $exp_uri[1];

$controller = new Controller();

$controller->$action($exp_uri[2] ?? null);
