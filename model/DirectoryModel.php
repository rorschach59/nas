<?php

namespace Model;

require 'model/DatabaseModel.php';
use Model\DatabaseModel;

class DirectoryModel extends DatabaseModel
{

    protected static $db = '';
    protected static $result = '';

    public function __construct()
    {

    }

    public function getDirectory()
    {
        return Database::getDatabase();            
    }

    public static function select($query)
    {
        self::$db = Database::getDatabase();
        self::$result = self::$db->prepare($query);
        self::$result->execute();
        return self::$result->fetchAll(\PDO::FETCH_ASSOC);
    }


 


}