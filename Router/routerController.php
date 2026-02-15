<?php

require_once "./Database/DatabaseClass.php";
require_once "./controllers/homeController.php";
// require_once "./Router/config.php";

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

    private function AllowedMethod($rMethod) {
        //take the requested methodn and verify it
        $allowedMethods = ["get", "byId"];
        if (in_array($rMethod, $allowedMethods)) {
            return $rMethod;
        } else {
            return null;
        }
    }

    private function mapControllerMethod($route, $method = null) {
         $routeArray = [
            "home" => ["controller" => "homeController", "method" => $method],
            "edit" => ["controller" => "editController",  "method" => $method]
            ];

        if (array_key_exists($route, $routeArray)) {
            //dynamically create controller
            $request = $routeArray[$route]["controller"];
            $controller = new $request($this->conn);
            $method = $routeArray[$route]["method"];

            return ["controller" => $controller, "method" => $method];
            
        } else {
            //return home page redirect if route doesnt exists
            return  0;
            
        }

    }

    private function checkMethod ($routeData) {
        $controller = $routeData["controller"];
        $method = $routeData["method"];

        //check if method has been set and if it exists for that class
        if ($method && method_exists($controller, $method)) {
            return ["controller" => $controller, "method" => $method];
        } else {
            //map home page route for redirecting
            return ["controller" => $controller, "method" => "get"];
        }

    }

    
    
    public function handleRequest() {

        $resources = $this->constructRoute();

        //route to home page if no valid route has been entered
        $Route = $resources[0] ?? "home";
        $method = $resources[1] ?? null;
        $subdata = $resources[2] ?? null;

        //check if requested method is allowed
        $method = $this->AllowedMethod($method);

        //check the route, first resource
        $routeData = $this->mapControllerMethod($Route, $method);

        //if invalid route data, redirect home
        if (!$routeData) {
            $routeData = $this->mapControllerMethod("home", "get");
        }

        //return controller and method to index
        return ["route" => $this->checkMethod($routeData), "id" => $subdata ];
        }
    

}

