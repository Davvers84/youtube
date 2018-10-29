<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 29/10/18
 * Time: 20:10
 */
require "vendor/autoload.php";

use Youtube\Controllers\HomeController;
use Youtube\Models\HomeModel;


// Check if path is available or not empty
if(isset($_SERVER['REQUEST_URI'])){
    $path= $_SERVER['REQUEST_URI'];
    // Do a path split
    $path_split = explode('/', ltrim($path));
}else{
    // Set Path to '/'
    $path_split = '/';
}
if($path === '/') {
    /* match with index route
    *   Import IndexController and match requested method with it
    */

    $ModelObj = new HomeModel();
    $ControllerObj = new HomeController($ModelObj);

    print $ControllerObj->index();

} else {
    // Controllers other than Index Will be handled here
}