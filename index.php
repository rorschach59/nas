<?php

session_start();

// Require libraries
require 'vendor/autoload.php';

// Autoload classes
spl_autoload_register(function($class) {
    $file = 'controller/'.$class.'.php';

    if(file_exists($file)) {
        require $file;
    }
});

const PATH_VIEWS = 'view';
const PATH_UPLOAD = '/home/nas';
const DOMAINE = 'http://192.168.1.17/nas/';

// Return the view called with the datas
RouterController::router();