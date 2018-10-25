<?php

class RouterController extends DefaultController
{
    /*
    *
    * Check if class and method exist and return the view
    */
    public static function router()
    {

        $url = explode('/',$_SERVER['REQUEST_URI']);
        
        if (isset($url['2']) && !empty($url['2']) && isset($url['3']) && !empty($url['3'])) {
            $class = ucfirst($url['2'].'Controller');
            $method = $url['3'];

             // If the method exists for this class
            if(is_callable(array($class, $method))) {
                return $class::$method();
            } else {
                DefaultController::show('common/404');
            }
        } elseif (isset($url['2']) && !empty($url['2']) && $url['2'] == 'nas' && isset($_GET) && !empty($_GET)) {
            HomeController::home();
        } elseif ($_SERVER['SCRIPT_URL'] !== '/nas/') {
            DefaultController::show('common/404');
        } else {
            HomeController::home();
        }

    }
}