<?php

require_once "./Database/DatabaseClass.php";
require_once "./controllers/homeController.php";
require_once "./Router/config.php";

class Router {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }


    private function constructRoute() {
        //map route to correct controller
        //router inlezen
        $uri = trim($_SERVER['REQUEST_URI'], "/");

        $resources = explode("/", $uri);

        //set remove directory
        $remove = $resources[0] ?? null;
        $resourcesUnfinished = array_diff($resources, ["$remove"] );

        //reset indexes
        $resourcesF = array_values($resourcesUnfinished);

        return $resourcesF;

    }
    
    public function handleRequest(){

    $resources = $this->constructRoute();

    $Route = $resources[0] ?? "home";
        
        $routeArray = [
            "home" => "homeController",
            "edit" => "editController"
            ];

        if (array_key_exists($Route, $routeArray)) {
            //dynamically create controller
            $request = $routeArray[$Route];
            $controller = new $request($this->conn);
            

            return $controller;
        }
        }
    }



