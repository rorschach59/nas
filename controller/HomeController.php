<?php

class HomeController extends DefaultController
{

    public function __construct()
    {

    }

    public static function home()
    {

        if(isset($_POST['from']) && !empty($_POST['from'])) {
            FormController::postForm();
        }

        DefaultController::show('home');

    }

}