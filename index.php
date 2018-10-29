<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 29/10/18
 * Time: 20:10
 */
require "vendor/autoload.php";

use Youtube\Controllers\HomeController;

// Check if path is available or not empty
if(isset($_SERVER['REQUEST_URI'])){
    $path = $_SERVER['REQUEST_URI'];
    $pathSplit = explode('/', ltrim($path));

    if(array_key_exists(1, $pathSplit)) {
        $reqController = $pathSplit[1];
    }
    if(array_key_exists(2, $pathSplit)) {
        $method = $pathSplit[2];
    } else {
        $method = 'index';
    }
    if(array_key_exists(3, $pathSplit)) {
        $request = $pathSplit[3];
    }
}
if($path === '/') {
    $ControllerObj = new HomeController();
    print $ControllerObj->index();
}

$reqControllerExists = __DIR__ . '/src/Controllers/' . ucfirst($reqController) . 'Controller.php';
echo $reqControllerExists . '<br/>';

if (file_exists($reqControllerExists)) {
    $controller = ucfirst($reqController) . 'Controller';
    $ControllerObj = new $controller();
    if($request) {
        return $ControllerObj->$method(json_encode($request));
    } else {
        return $ControllerObj->$method();
    }
} else {
    header('HTTP/1.1 404 Not Found');
    die('404 - The file - '.$reqController.' - not found');
}