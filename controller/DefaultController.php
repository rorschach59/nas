<?php

namespace Controller;

require 'model/DefaultModel.php';
require 'model/DirectoryModel.php';

use Model\DirectoryModel;

class DefaultController
{

    public function __construct()
    {

        /**
         * Chargement des classes grâce au namespace
         * @example : Api\Pdf\Facture -> include ./Pdf/Facture.php
        */
        // spl_autoload_register(function($class) {

        //    return var_dump('toto');

        //     if(false !== strpos($class, 'Vendor\\') && in_array(strpos($class, 'Vendor\\'), [0, 1])) {
        //         $path = preg_replace('/Vendor/', '', $class, 1);
        //         $path = 'vendor' . DIRECTORY_SEPARATOR . 'lib' . $path;
        //     } else {
        //         $path = preg_replace('/Api/', '', $class, 1);
        //     }
            
        //     $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        //     $file = '.' . DIRECTORY_SEPARATOR . $path . '.php';
            
        //     if(file_exists($file)) {
        //         require '.' . DIRECTORY_SEPARATOR . $path . '.php';
        //     }
        // });

    }

    public function showIndex()
    {
        return DirectoryModel::select('SELECT * FROM directory');
    }


 


}