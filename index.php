<?php

// Require libraries
require 'vendor/autoload.php';

// Autoload classes
spl_autoload_register(function($class) {
    $file = 'controller/'.$class.'.php';

    if(file_exists($file)) {
        require $file;
    }
});

// Path to the views
const PATH_VIEWS = 'view';

// Return the view called with the datas
RouterController::router();