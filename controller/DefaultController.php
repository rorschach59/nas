<?php

namespace Controller;

require 'model/DefaultModel.php';
require 'model/DirectoryModel.php';

use Model\DirectoryModel;

class DefaultController
{

    public function __construct()
    {

    }

    public function showIndex()
    {
        return 'Bienvenue sur la page d\'accueil';
    }


 


}