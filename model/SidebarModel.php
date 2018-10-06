<?php

namespace Model;

require 'model/DatabaseModel.php';
use Model\Database;

class SidebarModel extends DatabaseModel
{

    protected static $db = '';
    protected static $result = '';

    public function __construct()
    {

    }

    public function getDirectories()
    {
        $select = DatabaseModel::select('SELECT * FROM directory');
        return $select;
    }




 


}