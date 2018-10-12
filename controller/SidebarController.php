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

    public static function mkmap($dir)
    {
        echo "<ul class=\"dirSidebar\">";
        $folder = opendir($dir);
        while ($file = readdir($folder)) {
            if ($file != "." && $file != "..") {
                   $pathfile = $dir.'/'.$file;
                   echo "<li data-file=\"$file\"><a href=$pathfile>$file</a></li>";
   
                   if (filetype($pathfile) == 'dir') {
                       self::mkmap($pathfile);
                   }
            }
        }
        closedir($folder);
        echo "</ul>";
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
        $dossiers = array();

        $dossiers = 
        [
            '1' =>
                [
                    'name' => 'test',
                    'link' => '?directory=test',
                    '2' =>
                        [
                            'name' => 'test2',
                            'link' => '?directory=test&directory_1=test2',
                            '4' =>
                                [
                                    'name' => 'test4',
                                    'link' => '?directory=test&directory_1=test2&directory_2=test4',
                                ]
                        ],
                ],  
            '3' => 
                [
                    'name' => 'test',
                    'link' => '?directory=test3'
                ]
        ];

        // function dirToArray($dir) {
  
        //     $result = array();
         
        //     $cdir = scandir($dir);
        //     foreach ($cdir as $key => $value)
        //     {
        //        if (!in_array($value,array(".","..")))
        //        {
        //           if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
        //           {
        //              $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
        //           }
        //           else
        //           {
        //              $result[] = $value;
        //           }
        //        }
        //     }
           
        //     return $result;
        //  } 

        function dirToArray($dir) {
  
            $result = array();
         
            $cdir = scandir($dir);
            foreach ($cdir as $key => $value)
            {
               if (!in_array($value,array(".","..")))
               {
                  if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                  {
                     $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                  }
                  else
                  {
                     $result[] = $value;
                  }
               }
            }
           
            return $result;
         } 

        $handle = '/home/nas';
        //dump(dirToArray($handle));
        //echo dirToArray($handle);

        foreach($content as $value) {
            array_push($directories,explode('/', $value['path']));            
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