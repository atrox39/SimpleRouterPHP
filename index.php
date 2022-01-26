<?php
session_start();
include_once('./autoload.php');

use Database\Database;
use Routing\Route;
use Routing\Router;

$connection = Database::connection();

Router::add(new Route("/", "GET", function(){
    echo "Test";
}));

Router::run();