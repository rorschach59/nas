<?php

// namespace Controller;

//require 'model/DefaultModel.php';
require 'model/SidebarModel.php';

use Model\DirectoryModel;
use Model\SidebarModel;

class SidebarController extends DefaultController
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

}