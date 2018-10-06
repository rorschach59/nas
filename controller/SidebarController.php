<?php

namespace Controller;

//require 'model/DefaultModel.php';
require 'model/SidebarModel.php';

use Model\DirectoryModel;
use Model\SidebarModel;

class SidebarController
{

    public function __construct()
    {

    }

    public function getMenuContent()
    {
        $sidebarModel = new SidebarModel();
        $content = $sidebarModel->getDirectories();

        $i = 0;
        $directory = array(
            '0' => 'photos',
            '1' => '2018',
            '2' => 'vacances'
        );

        $directories = array();
        foreach($content as $value) {
            array_push($directories,explode('/', $value['path']));            
        }        
        
        foreach ($directories as $key => $value) {
            //dump(count($value));
        }


        $link = 'http://192.168.1.16/fonctions/';
        $get = '?';
        
        return $directories;

        

        // if(isset($_GET) && !empty($_GET)) {
    
        //     $countDirectory = 0;
    
        //     foreach($_GET as $key => $value) {
        //         if(explode('_', $key)[0] === 'directory') {
        //             $countDirectory++;
        //         }
                
        //     }
        // }
    
        //echo '<a href=" ' . $link . $get . ' " > Clique mon ami </a>';

        //return $content;
    }

}