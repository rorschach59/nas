<?php

require 'model/DefaultModel.php';
require 'model/DirectoryModel.php';

use Model\DirectoryModel;

class DefaultController
{

    public function __construct()
    {

    }

    /**
     * Show a template
     * @param string $file Pathfile
     * @param array  $data Datas will be used on the view
     */
    public static function show($file, array $data = array())
    {
        
        // Call the class for render
        $engine = new \League\Plates\Engine(PATH_VIEWS);

        // Notification message
        $flash_message = (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) ? (object) $_SESSION['flash'] : null;

        // Add each datas to the view
        foreach($data as $key => $value) {
            $engine->addData( [ $key => $value ] );
        }

        // Delete the extension, not usefull but just in case
        $file = str_replace('.php', '', $file);

        // Render the template
        echo $engine->render('common/header', compact(''));
        echo $engine->render('common/sidebar', compact(''));
        echo $engine->render($file);
        echo $engine->render('common/footer', compact(''));
        
        // Delete the notification messages to see them only one time
        if(isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
        die();
    }


 


}