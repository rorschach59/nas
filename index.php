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

// Init the router
$engine = new \League\Plates\Engine(PATH_VIEWS);
$sidebarController = new Controller\SidebarController();
$sidebarContent = $sidebarController->getMenuContent();

echo $engine->render('common/header', compact(''));
echo $engine->render('common/sidebar', compact('sidebarContent'));
echo $engine->render('common/footer', compact(''));
