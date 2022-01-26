<?php
spl_autoload_register(function($class){
    $path = str_replace("\\", "/", $class);
    $path = "./lib/".$path.".class.php";
    if(file_exists($path)) require_once($path);
    else{
        $path = str_replace("\\", "/", $class);
        $path = "./lib/".$path.".model.php";
        echo $path;
        if(file_exists($path)) require_once($path);
    }
});