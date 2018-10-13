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

        if(isset($url['2']) && !empty($url['2']) ) {
            $class = ucfirst($url['2'].'Controller');
            if(!class_exists($class)) {
                DefaultController::show('common/404');    
            }
        } else {
            DefaultController::show('home');
        }

        if(isset($url['3']) && !empty($url['3']) ) {
            $method = $url['3'];
        } else {
            DefaultController::show('common/404');
        }
        
        // If the method exists for this class
        if(is_callable(array($class, $method))) {
            return $class::$method();
        } else {
            DefaultController::show('common/404');
        }
        
    }
}