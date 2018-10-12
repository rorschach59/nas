<?php

// Require libraries
require 'vendor/autoload.php';

// Require auto controller
spl_autoload_register(function($class) {
    $file = 'controller/'.substr($class, 11).'.php';
    
    if(file_exists($file)) {
        require $file;
    }
});

const PATH_VIEWS = 'view';

// dump(explode('/',$_SERVER['REQUEST_URI']));

// Init the router
$engine = new \League\Plates\Engine(PATH_VIEWS);
// $u = \League\Url\Url::createFromServer($_SERVER);

$sidebarController = new Controller\SidebarController();

echo $engine->render('common/header', compact(''));
echo $engine->render('common/sidebar', compact('sidebarController'));
echo $engine->render('home', compact(''));
echo $engine->render('common/footer', compact(''));