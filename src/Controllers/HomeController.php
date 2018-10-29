<?php
namespace Youtube\Controllers;

use Youtube\Models\HomeModel;

class HomeController {
    private $model;

    function __construct() {
        /** Loading the corresponding Model class **/
        $this->model = new HomeModel();
    }
    public function index() {
        return "Index Method";
    }
    public function login() {
        echo "Login Method";
    }
}