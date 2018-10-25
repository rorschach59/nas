<?php

class FileController extends DefaultController
{

    public function __construct()
    {

    }

    public static function dir()
    {
        if(isset($_POST['from']) && !empty($_POST['from'])) {
            FormController::postForm();
        }
        DefaultController::show('dir', compact('dir'));
    }

}