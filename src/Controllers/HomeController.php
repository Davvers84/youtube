<?php
namespace Youtube\Controllers;

class HomeController {
    private $model;

    function __construct( $tile ) {
        /** Loading the corresponding Model class **/
        $this->model = new $tile;
    }
    public function index() {
        return "Index Method";
    }
    public function login() {
        echo "Login Method";
    }
}