<?php

namespace Models;

class User
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->init();
    }

    private function init()
    {
        $table = "CREATE TABLE IF NOT EXISTS User(_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(40) NOT NULL, password VARCHAR(60) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        $this->connection->query($table);
    }

    public function getByUsername($username)
    {
        $query = "SELECT _id FROM User WHERE username='$username' LIMIT 1";
        $num = $this->connection->query($query)->num_rows;
        if($num != 0) return true;
        else return false;
    }

    public function create($username, $password)
    {
        $password = md5($password);
        if(!$this->getByUsername($username)){
            $query = "INSERT INTO User (username, password) VALUES ('$username','$password')";
            return $this->connection->query($query);
        }else return false;
    }
}