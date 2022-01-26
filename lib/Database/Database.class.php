<?php

namespace Database;

use mysqli;

class Database
{
    public static function connection($use_database=false, $server="localhost", $username="root", $password="", $database="zombie")
    {
        $connection = null;
        if($use_database)
            $connection = new mysqli($server, $username, $password, $database);
        else
            $connection = new mysqli($server, $username, $password);
        if($connection->connect_error){
            return null;
        }else{
            return $connection;
        } 
    }
}